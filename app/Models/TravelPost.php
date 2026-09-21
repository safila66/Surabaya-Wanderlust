<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TravelPost extends Model
{
    protected $fillable = [
        'user_id',
        'destination_id',
        'title',
        'content',
        'rating',
        'cover_image',
        'is_published',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_published' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(TravelPostImage::class)
            ->orderBy('sort_order');
    }
}