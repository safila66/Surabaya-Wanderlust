<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LocalRule extends Model
{
    protected $fillable = [
        'regency_id',
        'title',
        'type',
        'description',
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