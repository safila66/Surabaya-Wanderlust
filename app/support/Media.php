<?php

namespace App\Support;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Media
{
    /** Gambar default lokal (taruh filenya di public/images/). */
    public const DEFAULT_IMAGE = 'images/destination-default.jpg';

    /** Cadangan paling akhir kalau file default lokal juga belum ada. */
    public const FALLBACK = 'https://images.unsplash.com/photo-1522383225653-ed111181a951?auto=format&fit=crop&w=1800&q=85';

    /**
     * URL gambar default.
     * Contoh: Media::fallback()                              -> public/images/destination-default.jpg
     *         Media::fallback('images/destination-default.jpg') -> default khusus destinasi
     */
    public static function fallback(?string $default = null): string
    {
        $default = ltrim($default ?: self::DEFAULT_IMAGE, '/');

        return is_file(public_path($default))
            ? asset($default)
            : self::FALLBACK;
    }

    /**
     * Ubah nilai kolom gambar dari database jadi URL yang bisa dibuka browser.
     *
     * Urutan:
     *  1. kolom kosong                      -> gambar default
     *  2. URL penuh (http/https)            -> dipakai apa adanya
     *  3. file ada di folder public/        -> asset('images/xxx.jpg')
     *  4. file ada di storage/app/public    -> asset('storage/xxx.jpg')
     *  5. file tidak ditemukan              -> gambar default
     */
    public static function url(?string $path, ?string $default = null): string
    {
        if (blank($path)) {
            return self::fallback($default);
        }

        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        $path = ltrim($path, '/');

        if (Str::startsWith($path, 'storage/')) {
            $path = Str::after($path, 'storage/');
        }

        if (Str::startsWith($path, 'public/')) {
            $path = Str::after($path, 'public/');
        }

        if (is_file(public_path($path))) {
            return asset($path);
        }

        if (Storage::disk('public')->exists($path)) {
            return asset('storage/' . $path);
        }

        return self::fallback($default);
    }
}