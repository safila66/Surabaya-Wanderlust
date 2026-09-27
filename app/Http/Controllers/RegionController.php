<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Culinary;
use App\Models\Accommodation;
use App\Models\Transportation;
use Illuminate\Support\Str;

class RegionController extends Controller
{
    public function show($slug)
    {
        // Surabaya regency_id is 329
        $regencyId = 329;
        
        $regionName = ucwords(str_replace('-', ' ', $slug));

        $entertainment = Destination::with('images')
            ->where('regency_id', $regencyId)
            ->latest()
            ->get();

        $restoCafe = Culinary::with('images')
            ->where('regency_id', $regencyId)
            ->latest()
            ->get();

        $accommodations = Accommodation::where('regency_id', $regencyId)
            ->latest()
            ->get();

        $transportations = Transportation::where('regency_id', $regencyId)
            ->latest()
            ->get();

        // Currently no model for Bar & Club or Prayer Places, we'll pass empty collections
        $barClub = collect([]);
        $prayerPlaces = collect([]);

        return view('regions.show', compact(
            'regionName',
            'slug',
            'entertainment',
            'restoCafe',
            'accommodations',
            'transportations',
            'barClub',
            'prayerPlaces'
        ));
    }
}
