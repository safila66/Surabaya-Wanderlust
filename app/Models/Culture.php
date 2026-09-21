<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Culture extends Model
{
    protected $fillable = [
        'regency_id',
        'name',
        'slug',
        'category',
        'description',
        'history',
        'tradition',
        'local_language',
        'location',
        'image',
        'source',
    ];

    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class);
    }
}