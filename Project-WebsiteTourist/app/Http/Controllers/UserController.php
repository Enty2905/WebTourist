<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function bookings()
    {
        $user = Auth::user();
        if (!$user) {
            dd('User is null, not authenticated');
        }

        $user = Auth::user();

        $bookings = $user->bookings()->with('tour')->get();

        $data = $bookings->map(function ($booking) {
            return [
                'id' => $booking->id,
                'tour_name' => $booking->tour->name,
                'booking_date' => $booking->booking_date,
                'start_date' => $booking->start_date,
                'num_people' => $booking->num_people,
                'total_price' => $booking->total_price,
            ];
        });

        return response()->json($data);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }
}
