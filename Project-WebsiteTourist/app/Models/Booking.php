<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'customer_name',
        'customer_email',
        'phone',
        'num_people',
        'total_price',
        'booking_date',
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
