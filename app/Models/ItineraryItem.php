<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItineraryItem extends Model
{
    protected $fillable = [
        'trip_plan_id',
        'day_number',
        'time',
        'activity',
        'location',
        'description',
        'estimated_cost',
        'duration',
        'maps_url',
    ];

    public function tripPlan(): BelongsTo
    {
        return $this->belongsTo(TripPlan::class);
    }
}