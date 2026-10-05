<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Culinary;
use App\Models\Accommodation;
use App\Models\Transportation;
use Illuminate\Support\Str;
use App\Models\PrayerPlace;
use App\Models\Culture;

class RegionController extends Controller
{
    private function categoryMeta(): array
    {
        return [
            'entertainment' => [
                'label' => 'Entertainment',
                'icon'  => '📍',
                'desc'  => 'Destinations and activities to enjoy your time.',
            ],
            'resto-cafe' => [
                'label' => 'Resto & Cafe',
                'icon'  => '☕',
                'desc'  => 'Culinary spots, restaurants, and cozy cafes.',
            ],
            'accommodation' => [
                'label' => 'Accommodation',
                'icon'  => '🛏️',
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
            'culture' => [
                'label' => 'Culture',
                'icon'  => '🎭',
                'desc'  => 'Historical sites, heritage, and local traditions.',
            ],
        ];
    }

    /**
     * Regency ID per wilayah (sesuai data di Filament).
     */
    private function getRegencyId($slug): ?int
    {
        return match($slug) {
            'west-surabaya'    => 515,
            'central-surabaya' => 516,
            'east-surabaya'    => 517,
            'south-surabaya'   => 518,
            'north-surabaya'   => 519,
            default            => null,
        };
    }

    /**
     * Filter wilayah: data yang regency-nya sudah dipisah di Filament (515-519),
     * ATAU data yang masih di "Kota Surabaya" (329) tapi lokasinya menyebut wilayah tsb.
     */
    private function regionFilter($slug): \Closure
    {
        $regencyId = $this->getRegencyId($slug);
        $keywords  = match($slug) {
            'east-surabaya'    => ['Timur'],
            'west-surabaya'    => ['Barat'],
            'north-surabaya'   => ['Utara'],
            'south-surabaya'   => ['Selatan'],
            'central-surabaya' => ['Pusat', 'Tengah'],
            default            => [],
        };

        return function ($q) use ($regencyId, $keywords) {
            if (!$regencyId) return;
            $q->where(function ($q) use ($regencyId, $keywords) {
                $q->where('regency_id', $regencyId)
                  ->orWhere(function ($q2) use ($keywords) {
                      $q2->where('regency_id', 329)->where(function ($q3) use ($keywords) {
                          foreach ($keywords as $k) {
                              $q3->orWhere('location', 'like', "%{$k}%");
                          }
                      });
                  });
            });
        };
    }
    private function getRegionKeyword($slug): string
    {
        return match($slug) {
            'east-surabaya' => 'Timur',
            'west-surabaya' => 'Barat',
            'north-surabaya' => 'Utara',
            'south-surabaya' => 'Selatan',
            'central-surabaya' => 'Pusat',
            default => ''
        };
    }

    public function show($slug)
    {
        $regencyId  = 329;
        $regionName = ucwords(str_replace('-', ' ', $slug));
        $keyword = $this->getRegionKeyword($slug);

        $filterByLocation = $this->regionFilter($slug);

        $entertainment  = Destination::with('images')->where($filterByLocation)->latest()->get();
        $restoCafe      = Culinary::with('images')->where('category', 'resto-cafe')->where($filterByLocation)->latest()->get();
        $accommodations = Accommodation::where($filterByLocation)->latest()->get();
        $transportations= Transportation::where('regency_id', $regencyId)->latest()->get();
        $barClub        = Culinary::with('images')->where('category', 'bar-club')->where($filterByLocation)->latest()->get();
        $prayerPlaces   = PrayerPlace::where($filterByLocation)->latest()->get();
        $culture        = Culture::where($filterByLocation)->latest()->get(); // Culture model doesn't use regency_id mostly but we can filter by location

        $categories = $this->categoryMeta();

        return view('regions.show', compact(
            'regionName', 'slug',
            'entertainment', 'restoCafe', 'accommodations',
            'transportations', 'barClub', 'prayerPlaces', 'culture',
            'categories'
        ));
    }

    public function category($slug, $category)
    {
        $regencyId  = 329;
        $regionName = ucwords(str_replace('-', ' ', $slug));
        $categories = $this->categoryMeta();
        $keyword = $this->getRegionKeyword($slug);

        if (!array_key_exists($category, $categories)) {
            abort(404);
        }

        $meta = $categories[$category];
        $items = collect([]);
        
        $filterByLocation = $this->regionFilter($slug);

        switch ($category) {
            case 'entertainment':
                $items = Destination::with('images')
                    ->where($filterByLocation)
                    ->latest()->get();
                break;

            case 'resto-cafe':
                $items = Culinary::with('images')
                    ->where('category', 'resto-cafe')
                    ->where($filterByLocation)
                    ->latest()->get();
                break;

            case 'bar-club':
                $items = Culinary::with('images')
                    ->where('category', 'bar-club')
                    ->where($filterByLocation)
                    ->latest()->get();
                break;

            case 'accommodation':
                $items = Accommodation::where($filterByLocation)
                    ->latest()->get();
                break;

            case 'transport':
                $items = Transportation::where('regency_id', $regencyId)
                    ->latest()->get();
                break;

            case 'prayer-places':
                $items = PrayerPlace::where($filterByLocation)
                    ->latest()->get();
                break;
                
            case 'culture':
                $items = Culture::where($filterByLocation)
                    ->latest()->get();
                break;
        }

        return view('regions.category', compact(
            'regionName', 'slug', 'category', 'meta', 'items', 'categories'
        ));
    }
}