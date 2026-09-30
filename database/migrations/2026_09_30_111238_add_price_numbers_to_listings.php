<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // tabel => kolom teks harga yang lama
    private array $sources = [
        'destinations'   => 'ticket_price',
        'culinaries'     => 'price_range',
        'accommodations' => 'price_range',
    ];

    public function up(): void
    {
        foreach ($this->sources as $table => $source) {
            Schema::table($table, function (Blueprint $t) {
                $t->unsignedInteger('price_min')->nullable();
                $t->unsignedInteger('price_max')->nullable();
            });

            DB::table($table)->orderBy('id')->each(function ($row) use ($table, $source) {
                [$min, $max] = $this->parsePrice($row->$source);

                DB::table($table)->where('id', $row->id)
                    ->update(['price_min' => $min, 'price_max' => $max]);
            });
        }
    }

    public function down(): void
    {
        foreach (array_keys($this->sources) as $table) {
            Schema::table($table, fn (Blueprint $t) => $t->dropColumn(['price_min', 'price_max']));
        }
    }

    private function parsePrice(?string $text): array
    {
        if ($text === null || trim($text) === '') {
            return [null, null];
        }

        // tangkap angka + satuan opsional: 50.000 | 50rb | 2jt
        preg_match_all('/(\d[\d.,]*)\s*(rb|ribu|k|jt|juta)?/i', $text, $matches, PREG_SET_ORDER);

        $numbers = [];
        foreach ($matches as $m) {
            $n = (int) preg_replace('/\D/', '', $m[1]);
            $n *= match (strtolower($m[2] ?? '')) {
                'rb', 'ribu', 'k' => 1000,
                'jt', 'juta'      => 1000000,
                default           => 1,
            };
            $numbers[] = $n;
        }

        $isFree = (bool) preg_match('/gratis|free/i', $text);

        if (! $numbers) {
            return $isFree ? [0, 0] : [null, null];
        }

        return [$isFree ? 0 : min($numbers), max($numbers)];
    }
};