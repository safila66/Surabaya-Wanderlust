<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TravelGuide extends Model
{
    protected $fillable = [
        'regency_id',
        'title',
        'slug',
        'description',
        'getting_around',
        'travel_tips',
        'local_rules',
        'best_time',
        'estimated_budget',
        'image',
        'source',
        'source_url',
        'last_updated',
    ];

    protected $casts = [
        'last_updated' => 'date',
    ];

    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class);
    }
}