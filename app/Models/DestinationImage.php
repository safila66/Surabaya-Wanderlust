<?php

namespace App\Models;

use App\Support\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * CATATAN: kalau model ini sudah ada, cukup tambahkan method getUrlAttribute().
 */
class DestinationImage extends Model
{
    protected $guarded = [];

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    /**
     * Dipakai di Blade: {{ $image->url }}
     * Mencoba beberapa kemungkinan nama kolom; sesuaikan kalau kolommu beda.
     */
    public function getUrlAttribute(): string
    {
        $path = $this->attributes['image']
            ?? $this->attributes['image_path']
            ?? $this->attributes['image_url']
            ?? $this->attributes['path']
            ?? null;

        return Media::url($path);
    }
}