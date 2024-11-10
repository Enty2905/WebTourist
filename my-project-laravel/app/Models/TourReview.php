<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'user_name',
        'rating',
        'comment',
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
