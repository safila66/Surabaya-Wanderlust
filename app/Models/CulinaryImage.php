<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CulinaryImage extends Model
{
    protected $fillable = [
        'culinary_id',
        'user_id',
        'image',
        'caption',
        'sort_order',
        'is_approved',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    public function culinary(): BelongsTo
    {
        return $this->belongsTo(Culinary::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}