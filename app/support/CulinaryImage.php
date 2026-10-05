<?php

namespace App\Support;

class CulinaryImage
{
    // Upload fotonya ke public/images/ dengan nama persis seperti ini (ganti ekstensi kalau pakai .png / .webp)
    public const CAFE_RESTO = 'images/resto-cafe-default.jpg';
    public const BAR_CLUB   = 'images/bar-club-default.jpg';

    /**
     * Pilih gambar default berdasarkan kategori kuliner.
     * Kategori yang mengandung kata "bar" atau "club" -> default Bar & Club,
     * selain itu -> default Cafe & Resto.
     */
    public static function defaultFor($culinary): string
    {
        $value = '';

        // Nama kolom kategori belum diketahui pasti, jadi beberapa kemungkinan dicek
        foreach (['category', 'type', 'kategori', 'jenis'] as $col) {
            $v = $culinary->{$col} ?? null;

            if (is_object($v)) {
                $v = $v->name ?? '';
            }

            if (is_string($v) && $v !== '') {
                $value = $v;
                break;
            }
        }

        $value = strtolower($value);

        return (str_contains($value, 'bar') || str_contains($value, 'club'))
            ? self::BAR_CLUB
            : self::CAFE_RESTO;
    }
}