<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Accommodation extends Model
{
    protected $fillable = [
        'regency_id',
        'name',
        'slug',
        'description',
        'price_range',
        'distance',
        'facilities',
        'location',
        'maps_url',
        'booking_url',
        'official_url',
        'image', 'latitude', 'longitude',
        'source',
    ];

    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class);
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
}