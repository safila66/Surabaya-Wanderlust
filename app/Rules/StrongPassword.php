<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

/**
 * Password minimal 8 karakter, wajib mengandung huruf besar, angka, dan simbol.
 * Pesan error langsung berbahasa Indonesia (tidak perlu file lang).
 */
class StrongPassword implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $value = (string) $value;

        $ok = mb_strlen($value) >= 8
            && preg_match('/\p{Lu}/u', $value)
            && preg_match('/[0-9]/', $value)
            && preg_match('/[^\p{L}\p{N}\s]/u', $value);

        if (!$ok) {
            $fail('Password minimal 8 karakter dan harus mengandung huruf besar, angka, dan simbol (contoh: ! @ # $ %).');
        }
    }
}