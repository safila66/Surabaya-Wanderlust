<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

/**
 * Tambahkan ke model User:   use \App\Models\Concerns\HasProfile;
 * Lalu masukkan ke $fillable: 'username', 'avatar', 'banner', 'bio', 'location', 'website'
 * (JANGAN masukkan 'role' ke fillable).
 */
trait HasProfile
{
    /** Otomatis dipanggil Eloquent: user baru (mis. dari register) langsung dapat username. */
    protected static function bootHasProfile(): void
    {
        static::creating(function ($user) {
            if (blank($user->username)) {
                $user->username = static::uniqueUsername($user->email ?: $user->name);
            }
        });
    }

    public static function uniqueUsername(string $seed): string
    {
        $base = Str::of(Str::before($seed, '@'))
            ->lower()
            ->replaceMatches('/[^a-z0-9_]/', '')
            ->limit(15, '')
            ->toString() ?: 'user';

        $username = $base;
        $i = 1;
        while (static::where('username', $username)->exists()) {
            $username = $base . $i++;
        }

        return $username;
    }

    // asset() dipakai (bukan Storage::url) supaya tetap jalan walau APP_URL
    // berbeda dengan host yang dibuka di browser (mis. 127.0.0.1:8000).
    protected function avatarUrl(): Attribute
    {
        return Attribute::get(fn () => $this->avatar ? asset('storage/' . $this->avatar) : null);
    }

    protected function bannerUrl(): Attribute
    {
        return Attribute::get(fn () => $this->banner ? asset('storage/' . $this->banner) : null);
    }

    protected function initial(): Attribute
    {
        return Attribute::get(fn () => Str::upper(mb_substr($this->name ?? '?', 0, 1)));
    }
}