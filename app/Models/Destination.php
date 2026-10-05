<?php

namespace App\Models;

use App\Support\Media; // BARU
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Destination extends Model
{
    /** Kategori destinasi: kunci disimpan di database, label ditampilkan ke user. */
    public const CATEGORIES = [
        'alam'     => 'Alam & Taman',
        'sejarah'  => 'Sejarah & Monumen',
        'budaya'   => 'Budaya & Seni',
        'religi'   => 'Religi',
        'belanja'  => 'Belanja',
        'edukasi'  => 'Edukasi & Keluarga',
    ];

    protected $fillable = [
        'regency_id',
        'name',
        'slug',
        'category',
        'description',
        'activities',
        'opening_hours',
        'ticket_price',
        'ticket_url',
        'facilities',
        'accessibility',
        'visit_duration',
        'location',
        'maps_url',
        'latitude',
        'longitude',
        'image',
    ];

    protected $casts = [
        'latitude'  => 'float',
        'longitude' => 'float',
    ];

    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class);
    }

    public function bestTime(): HasOne
    {
        return $this->hasOne(BestTime::class);
    }

    public function tourismStatistics(): HasMany
    {
        return $this->hasMany(TourismStatistic::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(DestinationImage::class)
            ->orderBy('sort_order');
    }

    public function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable')
            ->where('is_approved', true)
            ->latest();
    }

    public function travelPosts(): HasMany
    {
        return $this->hasMany(TravelPost::class)
            ->where('is_published', true)
            ->latest();
    }

    /** User yang menyimpan destinasi ini ke wishlist. */
    public function wishlistedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'wishlists', 'destination_id', 'user_id')
            ->withTimestamps();
    }

    // Dipakai di Blade sebagai {{ $destination->category_label }}
    public function getCategoryLabelAttribute(): ?string
    {
        return self::CATEGORIES[$this->category] ?? null;
    }

    // BARU: dipakai di Blade sebagai {{ $destination->cover_url }}
    public function getCoverUrlAttribute(): string
    {
        if (filled($this->image)) {
            return Media::url($this->image);
        }

        $first = $this->relationLoaded('images')
            ? $this->images->first()
            : $this->images()->first();

        return $first ? $first->url : Media::FALLBACK;
    }
}