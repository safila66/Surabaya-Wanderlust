<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    protected $fillable = [
        'regency_id',
        'name',
        'slug',
        'description',
        'activities',
        'opening_hours',
        'ticket_price',
        'facilities',
        'accessibility',
        'visit_duration',
        'location',
        'maps_url',
        'image',
    ];

    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class);
    }

    public function bestTime(): HasOne
    {
        return $this->hasOne(BestTime::class);
    }

    public function tourismStatistics(): HasMany
    {
        return $this->hasMany(TourismStatistic::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(DestinationImage::class)
            ->orderBy('sort_order');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class)
            ->where('is_approved', true)
            ->latest();
    }

    public function travelPosts(): HasMany
    {
        return $this->hasMany(TravelPost::class)
            ->where('is_published', true)
            ->latest();
    }
}