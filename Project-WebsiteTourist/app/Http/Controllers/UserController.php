<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function profile()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$user) {
            abort(403, 'Bạn cần đăng nhập để xem thông tin cá nhân.');
        }

        $bookings = $user->bookings()->with('tour')->get();

        return view('users.profile', [
            'user' => $user,
            'bookings' => $bookings,
        ]);
    }

    public function updateAjax(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:Nam,Nữ,Khác',
        ]);

        $user->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật thành công!',
            'user' => $user,
        ]);
    }

    public function updateAvatar(Request $request)
    {
        if ($request->hasFile('avt')) {
            $file = $request->file('avt');

            $folderPath = 'assets/img/avt';
            if (!Storage::exists($folderPath)) {
                Storage::makeDirectory($folderPath, 0777, true);
            }

            $filename = now()->format('Y-m-d-H-i-s') . '.' . $file->getClientOriginalExtension();

            $file->move(public_path($folderPath), $filename);

            /** @var \App\Models\User $user */
            $user = Auth::user();
            $user->avt = $filename;
            $user->save();

            return response()->json(['success' => true, 'filename' => $filename]);
        }

        return response()->json(['success' => false, 'message' => 'Không có file được tải lên.']);
    }
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ], 422);
        }
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Mật khẩu hiện tại không đúng'
            ], 422);
        }

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Đổi mật khẩu thành công'
        ]);
    }
    public function showForgotPasswordForm()
    {
        return view('auth.forgot_password');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);
    
        $email = $request->email;
    
        $token = Str::random(64);
    
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],
            [
                'token' => $token,
                'created_at' => now()
            ]
        );
    
        Mail::send('emails.forgot_password', ['token' => $token], function ($message) use ($email) {
            $message->to($email)->subject('Đặt lại mật khẩu của bạn');
        });
    
        return redirect()->route('password.request')->with('status', 'Email đặt lại mật khẩu đã được gửi, vui lòng kiểm tra hộp thư của bạn.');
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.reset_password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:8|confirmed',
    ]);
    $tokenData = DB::table('password_reset_tokens')->where([
        'email' => $request->email,
        'token' => $request->token,
    ])->first();

    if (!$tokenData) {
        return back()->withErrors(['email' => 'Token không hợp lệ hoặc đã hết hạn.']);
    }

    $user = User::where('email', $request->email)->first();
    $user->password = Hash::make($request->password);
    $user->save();

    DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

    return redirect()->route('login')->with('status', 'Mật khẩu của bạn đã được đặt lại thành công.');
}
}
