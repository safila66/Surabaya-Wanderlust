<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Budget extends Model
{
    protected $fillable = [
        'regency_id',
        'transport_cost',
        'accommodation_cost',
        'food_cost',
        'ticket_cost',
        'other_cost',
        'total_cost',
        'notes',
        'last_updated',
        'source',
    ];

    protected $casts = [
        'last_updated' => 'date',
    ];

    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class);
    }
}