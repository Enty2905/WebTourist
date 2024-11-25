<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{
    public function tour(Request $request)
    {
        $query = Tour::with('images');

        // Lọc theo location nếu có
        if ($request->filled('search__location')) {
            $location = $request->search__location;
            $query->where('location', $location);
        }

        // Lọc theo type nếu có
        if ($request->filled('search__type')) {
            $type = $request->search__type;
            $query->where('type', $type);
        }

        // Lọc theo duration nếu có
        if ($request->filled('search__duration')) {
            $duration = $request->search__duration;
            $query->where('duration', $duration);
        }

        // Lọc theo on_sale nếu có
        if ($request->filled('on_sale') && $request->on_sale == 'true') {
            $query->where('on_sale', true);
        }

        // Lọc theo sort nếu có
        if ($request->filled('sort')) {
            if ($request->sort === 'price_high') {
                $query->orderBy('price_per_person', 'desc');
            } elseif ($request->sort === 'price_low') {
                $query->orderBy('price_per_person', 'asc');
            }
        }

        // Paginate kết quả
        $tours = $query->paginate(9);

        return view('tours.tour', compact('tours'));
    }

    public function show($id)
    {
        $tour = Tour::with(['schedules', 'features', 'reviews', 'images', 'hotel'])->findOrFail($id);

        $suggestedTours = Tour::with('images')->inRandomOrder()->take(3)->get();

        return view('tours.show', compact('tour', 'suggestedTours'));
    }
    public function book(Request $request, $id)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'num_people' => 'required|integer|min:1',
        ]);

        $tour = Tour::findOrFail($id);
        $user = Auth::user();

        $booking = new Booking();
        $booking->tour_id = $tour->id;
        $booking->user_id = $user->id;
        $booking->start_date = $validated['start_date'];
        $booking->num_people = $validated['num_people'];
        $booking->total_price = $tour->price_per_person * $validated['num_people'];
        $booking->save();

        return redirect()->route('tours.show', $tour->id)->with('success', 'Đặt tour thành công!');
    }
}
