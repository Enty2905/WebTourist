<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Booking;
use Illuminate\Http\Request;

class TourController extends Controller
{
    // Hiển thị danh sách tour
    public function index()
    {
        $tours = Tour::with('images')->get(); // Lấy danh sách tour và hình ảnh kèm theo
        return view('tours.index', compact('tours'));
    }

    // Hiển thị chi tiết tour
    public function show($id)
    {
        $tour = Tour::with(['schedules', 'features', 'reviews', 'images'])->findOrFail($id);
        return view('tours.show', compact('tour'));
    }

    // Đặt tour
    public function book(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'phone' => 'required',
            'num_people' => 'required|integer|min:1',
        ]);

        $tour = Tour::findOrFail($id);

        $booking = Booking::create([
            'tour_id' => $id,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'phone' => $request->phone,
            'num_people' => $request->num_people,
            'total_price' => $tour->price_per_person * $request->num_people,
            'booking_date' => now(),
        ]);

        return redirect()->route('tours.show', $id)->with('success', 'Đặt tour thành công!');
    }
}
