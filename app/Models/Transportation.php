<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transportation extends Model
{
    protected $fillable = [
        'regency_id',
        'name',
        'type',
        'departure',
        'destination',
        'estimated_time',
        'estimated_cost',
        'description',
        'ticket_url',
        'image',
        'source',
    ];

    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class);
    }
}