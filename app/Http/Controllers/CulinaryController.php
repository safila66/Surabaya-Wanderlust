<?php

namespace App\Http\Controllers;

use App\Models\Culinary;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;

class CulinaryController extends Controller
{
    public function index(Request $request)
    {
        $provinces = Province::orderBy('name')->get();

        $selectedProvince = $request->get('province');
        $selectedRegency = $request->get('regency');

        $regencies = collect();

        if ($selectedProvince) {
            $province = Province::where('slug', $selectedProvince)->first();

            if ($province) {
                $regencies = Regency::where('province_id', $province->id)
                    ->orderBy('name')
                    ->get();
            }
        }

        if ($selectedRegency) {
            $regency = Regency::where('slug', $selectedRegency)->first();

            if ($regency && !$selectedProvince) {
                $regencies = collect([$regency]);
            }
        }

        $query = Culinary::with([
            'regency.province'
        ]);

        if ($selectedProvince) {
            $query->whereHas('regency.province', function ($q) use ($selectedProvince) {
                $q->where('slug', $selectedProvince);
            });
        }

        if ($selectedRegency) {
            $query->whereHas('regency', function ($q) use ($selectedRegency) {
                $q->where('slug', $selectedRegency);
            });
        }

        $culinaries = $query
            ->orderBy('name')
            ->get();

        return view('culinary.index', compact(
            'culinaries',
            'provinces',
            'regencies',
            'selectedProvince',
            'selectedRegency'
        ));
    }

    public function show($slug)
    {
        $culinary = Culinary::with([
            'regency.province',
            'images'
        ])
        ->where('slug', $slug)
        ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | RECOMMENDED CULINARY
        |--------------------------------------------------------------------------
        | Mengambil maksimal 10 makanan lain dari
        | kota/kabupaten yang sama.
        */

        $recommendedCulinaries = Culinary::with([
            'regency',
            'images'
        ])
        ->where('regency_id', $culinary->regency_id)
        ->where('id', '!=', $culinary->id)
        ->orderBy('name')
        ->take(10)
        ->get();

        return view('culinary.show', compact(
            'culinary',
            'recommendedCulinaries'
        ));
    }
}