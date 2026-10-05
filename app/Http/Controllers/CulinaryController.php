<?php

namespace App\Http\Controllers;

use App\Models\Culinary;
use App\Models\TransitStop;
use Illuminate\Http\Request;

class CulinaryController extends Controller
{
    private const PRICE_MAX        = 500000;
    private const PRICE_STEP       = 5000;
    private const PER_PAGE         = 12;
    private const NEARBY_RADIUS_KM = 5;

    public function index(Request $request)
    {
        // orderBy('id') sebagai pembeda supaya urutan antar halaman stabil
        // kalau ada nama yang sama.
        $query = Culinary::with('regency.province')
            ->orderBy('name')
            ->orderBy('id');

        $selectedRegion = trim((string) $request->input('region'));
        if ($selectedRegion !== '') {
            $query->where(function ($q) use ($selectedRegion) {
                $q->where('where_to_buy', 'like', "%{$selectedRegion}%")
                  ->orWhere('description', 'like', "%{$selectedRegion}%")
                  ->orWhere('location', 'like', "%{$selectedRegion}%");
            });
        }

        $foodName = trim((string) $request->input('search_name'));
        if ($foodName !== '') {
            $query->where('name', 'like', "%{$foodName}%");
        }

        $minPrice = max(0, (int) $request->input('price_min', 0));
        $maxPrice = min(self::PRICE_MAX, (int) $request->input('price_max', self::PRICE_MAX));

        if ($minPrice > $maxPrice) {
            [$minPrice, $maxPrice] = [$maxPrice, $minPrice];
        }

        // Rentang harga kuliner dianggap cocok jika beririsan dengan rentang filter.
        if ($minPrice > 0) {
            $query->where('price_max', '>=', $minPrice);
        }
        if ($maxPrice < self::PRICE_MAX) {
            $query->where(function ($q) use ($maxPrice) {
                $q->whereNull('price_min')->orWhere('price_min', '<=', $maxPrice);
            });
        }

        return view('culinary.index', [
            'culinaries' => $query->paginate(self::PER_PAGE)->withQueryString(),
            'sliderMax'  => self::PRICE_MAX,
            'sliderStep' => self::PRICE_STEP,
        ]);
    }

    public function show(string $slug)
    {
        $culinary = Culinary::with([
            'regency.province',
            'images',
            'reviews' => fn ($q) => $q->where('is_approved', true)->latest(),
        ])->where('slug', $slug)->firstOrFail();

        $recommendedCulinaries = Culinary::with(['regency', 'images'])
            ->where('regency_id', $culinary->regency_id)
            ->where('id', '!=', $culinary->id)
            ->orderBy('name')
            ->take(10)
            ->get();

        $reviewCount   = $culinary->reviews->count();
        $averageRating = $reviewCount > 0 ? $culinary->reviews->avg('rating') : 0;

        // Halte terdekat (radius 5 km) dihitung di database dengan rumus Haversine.
        $nearestStops = collect();
        if ($culinary->latitude && $culinary->longitude) {
            $lat = (float) $culinary->latitude;
            $lng = (float) $culinary->longitude;

            $nearestStops = TransitStop::query()
                ->whereNotNull('latitude')
                ->whereNotNull('longitude')
                ->selectRaw(
                    '*, (6371 * acos(least(1, cos(radians(?)) * cos(radians(latitude))
                        * cos(radians(longitude) - radians(?))
                        + sin(radians(?)) * sin(radians(latitude))))) AS calculated_distance',
                    [$lat, $lng, $lat]
                )
                ->having('calculated_distance', '<=', self::NEARBY_RADIUS_KM)
                ->orderBy('calculated_distance')
                ->limit(5)
                ->get();
        }

        $mapsLink = $culinary->maps_url;
        if (!$mapsLink) {
            $place    = $culinary->location ?? $culinary->regency->name ?? 'Surabaya';
            $mapsLink = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($culinary->name . ' ' . $place);
        }

        return view('culinary.show', compact(
            'reviewCount',
            'averageRating',
            'culinary',
            'recommendedCulinaries',
            'nearestStops',
            'mapsLink'
        ));
    }

    public function storeReview(Request $request, string $slug)
    {
        $culinary = Culinary::where('slug', $slug)->firstOrFail();

        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
            'media'   => 'nullable|file|mimes:jpeg,png,jpg,mp4,mov|max:20480',
        ]);

        $mediaPath = $request->hasFile('media')
            ? $request->file('media')->store('reviews', 'public')
            : null;

        $culinary->reviews()->create([
            'name'        => $data['name'],
            'rating'      => $data['rating'],
            'comment'     => $data['comment'],
            'media_path'  => $mediaPath,
            'is_approved' => true,
        ]);

        return redirect()->back()->with('success', 'Review added successfully!');
    }
}