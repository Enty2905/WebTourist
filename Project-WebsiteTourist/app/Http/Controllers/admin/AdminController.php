<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Post;
use App\Models\User;
use App\Models\Tour;
use App\Models\TourFeature;
use App\Models\TourImage;
use App\Models\TourSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function dashboard()
    {
        try {
            $users = User::all();
            $tours = Tour::all();
            $hotels = Hotel::all();
            $posts = Post::with('user')->orderBy('created_at', 'desc')->get();

            return view('admin.admin', compact('users', 'tours', 'hotels', 'posts'));
        } catch (\Exception $e) {
            Log::error('Error loading dashboard: ' . $e->getMessage());
            return redirect()->route('admin.dashboard')->with('error', 'Đã xảy ra lỗi khi tải trang. Vui lòng thử lại.');
        }
    }

    public function destroyUser($id)
    {
        try {
            User::findOrFail($id)->delete();
            return redirect()->route('admin.dashboard')->with('success', 'Xóa người dùng thành công!');
        } catch (\Exception $e) {
            Log::error('Error deleting user: ' . $e->getMessage());
            return redirect()->route('admin.dashboard')->with('error', 'Không thể xóa người dùng. Vui lòng thử lại.');
        }
    }

    public function destroyTour($id)
    {
        try {
            Tour::findOrFail($id)->delete();
            return redirect()->route('admin.dashboard')->with('success', 'Xóa tour thành công!');
        } catch (\Exception $e) {
            Log::error('Error deleting tour: ' . $e->getMessage());
            return redirect()->route('admin.dashboard')->with('error', 'Không thể xóa tour. Vui lòng thử lại.');
        }
    }

    public function storeUser(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'phone' => 'nullable|string|max:15',
                'dob' => 'nullable|date',
                'gender' => 'required|in:Nam,Nữ,Khác',
                'role' => 'required|in:admin,user',
            ]);

            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'dob' => $validated['dob'] ?? null,
                'gender' => $validated['gender'],
                'role' => $validated['role'],
                'password' => Hash::make('password123'),
            ]);

            return redirect()->back()->with('success', 'Người dùng được thêm thành công!');
        } catch (\Exception $e) {
            Log::error('Error creating user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi thêm người dùng. Vui lòng thử lại.');
        }
    }

    public function storeTour(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price_per_person' => 'required|numeric|min:0',
                'duration' => 'required|integer|min:1',
                'location' => 'required|string|max:255',
                'hotel_id' => 'required|exists:hotels,id',
                'type' => 'required|string|in:Phiêu lưu,Thư giãn,Tham quan thành phố,Thiên nhiên & Động vật hoang dã',
                'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'features' => 'nullable|string',
                'schedules' => 'nullable|string',
            ]);

            $tour = Tour::create([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'price_per_person' => $validated['price_per_person'],
                'duration' => $validated['duration'],
                'location' => $validated['location'],
                'hotel_id' => $validated['hotel_id'],
                'type' => $validated['type'],
            ]);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $folderPath = public_path('assets/img/tours');
                    if (!File::exists($folderPath)) {
                        File::makeDirectory($folderPath, 0777, true);
                    }

                    $filename = uniqid() . '_' . $file->getClientOriginalName();
                    $filePath = 'tours/' . $filename;

                    $file->move($folderPath, $filename);

                    TourImage::create([
                        'tour_id' => $tour->id,
                        'image_url' => $filePath,
                        'is_main' => false,
                    ]);
                }
            }

            if ($request->features) {
                $features = explode("\n", $request->features);
                foreach ($features as $feature) {
                    TourFeature::create([
                        'tour_id' => $tour->id,
                        'feature' => trim($feature),
                    ]);
                }
            }

            if ($request->schedules) {
                $schedules = explode("\n", $request->schedules);
                foreach ($schedules as $schedule) {
                    [$day, $title, $description] = explode(';', $schedule);
                    TourSchedule::create([
                        'tour_id' => $tour->id,
                        'day_number' => (int)$day,
                        'title' => $title,
                        'description' => $description,
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Tour được thêm thành công!');
        } catch (\Exception $e) {
            Log::error('Error creating tour: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi thêm tour. Vui lòng thử lại.');
        }
    }

    public function updateUser(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
                'phone' => 'nullable|string|max:15',
                'role' => 'required|in:admin,user',
            ]);

            $user = User::findOrFail($id);

            $user->name = $validated['name'];
            $user->email = $validated['email'];
            $user->phone = $validated['phone'];
            $user->role = $validated['role'];

            $user->save();

            return redirect()->route('admin.dashboard')->with('success', 'Cập nhật thông tin người dùng thành công!');
        } catch (\Exception $e) {
            Log::error('Error updating user: ' . $e->getMessage());
            return redirect()->route('admin.dashboard')->with('error', 'Đã xảy ra lỗi khi cập nhật người dùng. Vui lòng thử lại.');
        }
    }

    public function updateTour(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price_per_person' => 'required|numeric|min:0',
                'duration' => 'required|integer|min:1',
                'location' => 'required|string|max:255',
                'hotel_id' => 'required|exists:hotels,id',
                'type' => 'required|string|in:standard,luxury,adventure,family',
                'remove_images' => 'nullable|array',
                'new_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'schedules' => 'nullable|string',
            ]);

            $tour = Tour::findOrFail($id);
            $tour->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'price_per_person' => $validated['price_per_person'],
                'duration' => $validated['duration'],
                'location' => $validated['location'],
                'hotel_id' => $validated['hotel_id'],
                'type' => $validated['type'],
            ]);

            if ($request->remove_images) {
                foreach ($request->remove_images as $image) {
                    TourImage::where('tour_id', $id)->where('image_url', $image)->delete();
                    $filePath = public_path('assets/img/' . $image);
                    if (File::exists($filePath)) {
                        File::delete($filePath);
                    }
                }
            }

            if ($request->hasFile('new_images')) {
                foreach ($request->file('new_images') as $file) {
                    $folderPath = public_path('assets/img/tours');
                    if (!File::exists($folderPath)) {
                        File::makeDirectory($folderPath, 0777, true);
                    }

                    $filename = uniqid() . '_' . $file->getClientOriginalName();
                    $filePath = 'tours/' . $filename;
                    $file->move($folderPath, $filename);

                    TourImage::create([
                        'tour_id' => $tour->id,
                        'image_url' => $filePath,
                        'is_main' => false,
                    ]);
                }
            }

            if ($request->has('schedules')) {
                TourSchedule::where('tour_id', $tour->id)->delete();

                $schedules = explode("\n", $request->schedules);
                foreach ($schedules as $schedule) {
                    if (empty(trim($schedule))) continue;

                    $parts = explode(';', $schedule);
                    if (count($parts) >= 3) {
                        $day = trim($parts[0]);
                        $title = trim($parts[1]);
                        $description = trim($parts[2]);

                        TourSchedule::create([
                            'tour_id' => $tour->id,
                            'day_number' => (int)$day,
                            'title' => $title,
                            'description' => $description,
                        ]);
                    }
                }
            }

            return redirect()->route('admin.dashboard')->with('success', 'Cập nhật tour thành công!');
        } catch (\Exception $e) {
            Log::error('Error updating tour: ' . $e->getMessage());
            return redirect()->route('admin.dashboard')->with('error', 'Đã xảy ra lỗi khi cập nhật tour. Vui lòng thử lại.');
        }
    }

    public function approvePost($id)
    {
        $post = Post::findOrFail($id);

        if ($post->is_approved) {
            $post->is_approved = false;
            $message = 'Bài viết đã bị hủy duyệt.';
        } else {
            $post->is_approved = true;
            $message = 'Bài viết đã được duyệt.';
        }

        $post->save();

        return redirect()->route('admin.dashboard')->with('success', $message);
    }

    public function destroyPost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Bài viết đã bị xóa.');
    }
}
