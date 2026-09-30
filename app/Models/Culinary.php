<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Culinary extends Model
{
    protected $fillable = [
        'regency_id',
        'name',
        'category',
        'slug',
        'description',
        'history',
        'ingredients',
        'taste',
        'price_range',
        'gofood_url',
        'grabfood_url',
        'shopeefood_url',
        'reservation_required',
        'where_to_buy',
        'location',
        'souvenir',
        'image', 'menu_image', 'menu_description', 'latitude', 'longitude', 'maps_url',
        'source',
    ];

    protected $casts = [
        'souvenir' => 'boolean',
    ];

    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(CulinaryImage::class)
            ->where('is_approved', true)
            ->orderBy('sort_order');
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
}