<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function tour(Request $request)
    {
        $query = Tour::with('images');

        // Lọc theo location
        if ($request->filled('search__location')) {
            $query->where('location', $request->search__location);
        }

        // Lọc theo loại hình tour
        if ($request->filled('search__type')) {
            $query->where('type', $request->search__type);
        }

        // Lọc theo thời lượng
        if ($request->filled('search__duration')) {
            $query->where('duration', $request->search__duration);
        }

        // Lọc theo trạng thái đang giảm giá
        if ($request->filled('on_sale') && $request->on_sale == 'true') {
            $query->where('on_sale', true);
        }

        // Sắp xếp
        if ($request->filled('sort')) {
            if ($request->sort === 'price_high') {
                $query->orderBy('price_per_person', 'desc');
            } elseif ($request->sort === 'price_low') {
                $query->orderBy('price_per_person', 'asc');
            }
        }

        // Lấy danh sách tour
        $tours = $query->get();
        $tours = $query->paginate(1);

        return view('tours.tour', compact('tours'));
    }

    public function show($id)
    {
        $tour = Tour::with(['schedules', 'features', 'reviews', 'images', 'hotel'])->findOrFail($id);

        $suggestedTours = Tour::with('images')->inRandomOrder()->take(3)->get();

        return view('tours.show', compact('tour', 'suggestedTours'));
    }
}
