<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'feature',
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
