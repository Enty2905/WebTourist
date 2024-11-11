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

    // Quan hệ với bảng TourSchedule
    public function schedules()
    {
        return $this->hasMany(TourSchedule::class);
    }

    // Quan hệ với bảng TourFeature
    public function features()
    {
        return $this->hasMany(TourFeature::class);
    }

    // Quan hệ với bảng TourReview
    public function reviews()
    {
        return $this->hasMany(TourReview::class);
    }

    // Quan hệ với bảng TourImage
    public function images()
    {
        return $this->hasMany(TourImage::class);
    }

    // Quan hệ với bảng Hotel (1 tour có 1 khách sạn)
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

}
