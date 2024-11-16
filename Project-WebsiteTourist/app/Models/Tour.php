<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price_per_person',
        'duration',
        'location',
        'hotel_id',
        'type',
        'image',
    ];

    public function schedules()
    {
        return $this->hasMany(TourSchedule::class);
    }

    public function features()
    {
        return $this->hasMany(TourFeature::class);
    }

    public function reviews()
    {
        return $this->hasMany(TourReview::class);
    }

    public function images()
    {
        return $this->hasMany(TourImage::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
