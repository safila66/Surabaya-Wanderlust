<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BestTime extends Model
{
    protected $fillable = [
        'destination_id',
        'best_month',
        'best_time',
        'weather',
        'temperature',
        'scenery',
        'crowd_level',
        'recommended_activities',
        'reason',
        'last_updated',
    ];

    protected $casts = [
        'last_updated' => 'date',
    ];

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }
}