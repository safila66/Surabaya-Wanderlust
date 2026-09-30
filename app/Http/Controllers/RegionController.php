<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Culinary;
use App\Models\Accommodation;
use App\Models\Transportation;
use Illuminate\Support\Str;
use App\Models\PrayerPlace;

class RegionController extends Controller
{
    private function categoryMeta(): array
    {
        return [
            'entertainment' => [
                'label' => 'Entertainment',
                'icon'  => '🎢',
                'desc'  => 'Destinations and activities to enjoy your time.',
            ],
            'resto-cafe' => [
                'label' => 'Resto & Cafe',
                'icon'  => '☕',
                'desc'  => 'Culinary spots, restaurants, and cozy cafes.',
            ],
            'accommodation' => [
                'label' => 'Accommodation',
                'icon'  => '🏨',
                'desc'  => 'Places to stay, from hotels to guesthouses.',
            ],
            'transport' => [
                'label' => 'Transport',
                'icon'  => '🚌',
                'desc'  => 'Public transportations, rentals, and stations.',
            ],
            'bar-club' => [
                'label' => 'Bar & Club',
                'icon'  => '🍸',
                'desc'  => 'Nightlife and places to socialize.',
            ],
            'prayer-places' => [
                'label' => 'Prayer Places',
                'icon'  => '🕌',
                'desc'  => 'Mosques, churches, temples, and prayer places.',
            ],
        ];
    }

    public function show($slug)
    {
        $regencyId  = 329;
        $regionName = ucwords(str_replace('-', ' ', $slug));

        $entertainment  = Destination::with('images')->where('regency_id', $regencyId)->latest()->get();
        $restoCafe      = Culinary::with('images')->where('regency_id', $regencyId)->where('category', 'resto-cafe')->latest()->get();
        $accommodations = Accommodation::where('regency_id', $regencyId)->latest()->get();
        $transportations= Transportation::where('regency_id', $regencyId)->latest()->get();
        $barClub        = Culinary::with('images')->where('regency_id', $regencyId)->where('category', 'bar-club')->latest()->get();
        $prayerPlaces   = collect([]);

        $categories = $this->categoryMeta();

        return view('regions.show', compact(
            'regionName', 'slug',
            'entertainment', 'restoCafe', 'accommodations',
            'transportations', 'barClub', 'prayerPlaces',
            'categories'
        ));
    }

    public function category($slug, $category)
    {
        $regencyId  = 329;
        $regionName = ucwords(str_replace('-', ' ', $slug));
        $categories = $this->categoryMeta();

        if (!array_key_exists($category, $categories)) {
            abort(404);
        }

        $meta = $categories[$category];

        $items = collect([]);

        switch ($category) {
            case 'entertainment':
                $items = Destination::with('images')
                    ->where('regency_id', $regencyId)
                    ->latest()->get();
                break;

            case 'resto-cafe':
                $items = Culinary::with('images')
                    ->where('regency_id', $regencyId)
                    ->where('category', 'resto-cafe')
                    ->latest()->get();
                break;

            case 'bar-club':
                $items = Culinary::with('images')
                    ->where('regency_id', $regencyId)
                    ->where('category', 'bar-club')
                    ->latest()->get();
                break;

            case 'accommodation':
                $items = Accommodation::where('regency_id', $regencyId)
                    ->latest()->get();
                break;

            case 'transport':
                $items = Transportation::where('regency_id', $regencyId)
                    ->latest()->get();
                break;

            case 'prayer-places':
                $items = collect([]);
                break;
        }

        return view('regions.category', compact(
            'regionName', 'slug', 'category', 'meta', 'items', 'categories'
        ));
    }
}