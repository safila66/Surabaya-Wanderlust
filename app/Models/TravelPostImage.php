<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TravelPostImage extends Model
{
    protected $fillable = [
        'travel_post_id',
        'image',
        'caption',
        'sort_order',
    ];

    public function travelPost(): BelongsTo
    {
        return $this->belongsTo(TravelPost::class);
    }
}