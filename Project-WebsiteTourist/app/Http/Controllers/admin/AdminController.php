<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\User;
use App\Models\Tour;
use App\Models\TourFeature;
use App\Models\TourImage;
use App\Models\TourSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        $tours = Tour::all();
        $hotels = Hotel::all();
        return view('admin.admin', compact('users', 'tours', 'hotels'));
    }
    public function destroyUser($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Xóa người dùng thành công!');
    }
    public function destroyTour($id)
    {
        Tour::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Xóa tour thành công!');
    }
    public function storeUser(Request $request)
    {
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
    }
    public function storeTour(Request $request)
    {
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

                try {
                    $file->move($folderPath, $filename);

                    TourImage::create([
                        'tour_id' => $tour->id,
                        'image_url' => $filePath,
                        'is_main' => false,
                    ]);
                } catch (\Exception $e) {
                    Log::error('Error uploading image: ' . $e->getMessage());
                    return back()->with('error', 'Không thể upload ảnh');
                }
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
    }
    public function updateUser(Request $request, $id)
    {
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
    }
    public function updateTour(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_per_person' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'location' => 'required|string|max:255',
            'hotel_id' => 'required|exists:hotels,id',
            'type' => 'required|string|in:standard,luxury,adventure,family',
            'remove_images' => 'nullable|array', // Các ảnh cần xóa
            'new_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Ảnh mới
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

        return redirect()->route('admin.dashboard')->with('success', 'Cập nhật tour thành công!');
    }
}
