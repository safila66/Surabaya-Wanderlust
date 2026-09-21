<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Regency;
use App\Models\Destination;
use App\Models\Culinary;
use App\Models\Culture;
use App\Models\BestTime;

class HomeController extends Controller
{
    public function index()
    {
        $provinces = Province::orderBy('name')
            ->get();

        $regencies = Regency::with('province')
            ->orderBy('name')
            ->get();

        $destinations = Destination::with('regency.province')
            ->latest()
            ->get();

        $culinaries = Culinary::latest()
            ->take(6)
            ->get();

        $cultures = Culture::latest()
            ->take(6)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | REKOMENDASI WISATA BULAN INI
        |--------------------------------------------------------------------------
        */

        // Bulan sekarang dalam bahasa Indonesia
        $currentMonth = now()->month;

        $monthMap = [
            'Januari'   => 1,
            'Februari'  => 2,
            'Maret'     => 3,
            'April'     => 4,
            'Mei'       => 5,
            'Juni'      => 6,
            'Juli'      => 7,
            'Agustus'   => 8,
            'September' => 9,
            'Oktober'   => 10,
            'November'  => 11,
            'Desember'  => 12,
        ];

        $popularThisMonth = BestTime::with(
            'destination.regency.province'
        )
        ->latest()
        ->get()
        ->filter(function ($bestTime) use ($currentMonth, $monthMap) {

            $bestMonth = $bestTime->best_month;

            // Ambil nama bulan dari data BestTime
            preg_match_all(
                '/Januari|Februari|Maret|April|Mei|Juni|Juli|Agustus|September|Oktober|November|Desember/i',
                $bestMonth,
                $matches
            );

            $months = $matches[0];

            if (empty($months)) {
                return false;
            }

            // Ubah nama bulan menjadi angka
            $monthNumbers = [];

            foreach ($months as $month) {
                foreach ($monthMap as $name => $number) {
                    if (strcasecmp($month, $name) === 0) {
                        $monthNumbers[] = $number;
                        break;
                    }
                }
            }

            if (empty($monthNumbers)) {
                return false;
            }

            /*
            |--------------------------------------------------------------
            | Jika data berupa rentang:
            | April - Oktober
            | maka semua bulan April sampai Oktober dianggap cocok.
            |--------------------------------------------------------------
            */

            if (count($monthNumbers) >= 2) {

                $startMonth = $monthNumbers[0];
                $endMonth = $monthNumbers[1];

                // Rentang normal, contoh April - Oktober
                if ($startMonth <= $endMonth) {
                    return $currentMonth >= $startMonth
                        && $currentMonth <= $endMonth;
                }

                // Rentang melewati akhir tahun,
                // contoh November - Februari
                return $currentMonth >= $startMonth
                    || $currentMonth <= $endMonth;
            }

            // Jika hanya satu bulan, contoh September
            return $currentMonth === $monthNumbers[0];
        })
        ->take(6);

        return view('home', compact(
            'provinces',
            'regencies',
            'destinations',
            'culinaries',
            'cultures',
            'popularThisMonth'
        ));
    }
}