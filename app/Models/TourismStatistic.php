<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TourismStatistic extends Model
{
    protected $fillable = [
        'destination_id',
        'year',
        'visitor_count',
        'ranking',
        'source',
        'source_url',
        'last_updated',
        'notes',
    ];

    protected $casts = [
        'year' => 'integer',
        'visitor_count' => 'integer',
        'ranking' => 'integer',
        'last_updated' => 'date',
    ];

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }
}