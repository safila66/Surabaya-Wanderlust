<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\TransitStop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DestinationController extends Controller
{
    private const PRICE_MAX        = 100000;
    private const PRICE_STEP       = 5000;
    private const PER_PAGE         = 12;
    private const NEARBY_RADIUS_KM = 5;
    private const MAP_MAX_POINTS   = 500;

    public function index(Request $request)
    {
        // orderByDesc('id') sebagai pembeda: data seeder biasanya punya created_at
        // yang sama, tanpa ini urutan antar halaman bisa tidak stabil (data dobel/hilang).
        $query = Destination::with(['images', 'regency.province'])
            ->latest()
            ->orderByDesc('id');

        $search = trim((string) ($request->input('search_name') ?: $request->input('search')));
        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('regency', fn ($r) => $r->where('name', 'like', "%{$search}%"));
            });
        }

        if ($request->filled('region')) {
            $region = $request->input('region');
            $query->whereHas('regency', fn ($q) => $q->where('name', 'like', "%{$region}%"));
        }

        // Hanya terima kategori yang memang terdaftar
        $category = (string) $request->input('category', '');
        if ($category !== '' && array_key_exists($category, Destination::CATEGORIES)) {
            $query->where('category', $category);
        }

        $minPrice = max(0, (int) $request->input('price_min', 0));
        $maxPrice = min(self::PRICE_MAX, (int) $request->input('price_max', self::PRICE_MAX));

        if ($minPrice > $maxPrice) {
            [$minPrice, $maxPrice] = [$maxPrice, $minPrice];
        }

        // Rentang harga destinasi dianggap cocok jika beririsan dengan rentang filter.
        if ($minPrice > 0) {
            $query->where('price_max', '>=', $minPrice);
        }
        if ($maxPrice < self::PRICE_MAX) {
            $query->where(function ($q) use ($maxPrice) {
                $q->whereNull('price_min')->orWhere('price_min', '<=', $maxPrice);
            });
        }

        // Titik peta: semua destinasi yang cocok dengan filter (bukan hanya halaman ini)
        $mapPoints = (clone $query)
            ->setEagerLoads([])
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->limit(self::MAP_MAX_POINTS)
            ->get(['id', 'name', 'slug', 'latitude', 'longitude'])
            ->map(fn ($d) => [
                'name' => $d->name,
                'lat'  => (float) $d->latitude,
                'lng'  => (float) $d->longitude,
                'url'  => route('destinations.show', $d->slug),
            ])
            ->values()
            ->all();

        // ID destinasi yang sudah ada di wishlist user (untuk mengisi ikon hati)
        $wishlistedIds = Auth::check()
            ? DB::table('wishlists')->where('user_id', Auth::id())->pluck('destination_id')->all()
            : [];

        return view('destinations.index', [
            'destinations'  => $query->paginate(self::PER_PAGE)->withQueryString(),
            'sliderMax'     => self::PRICE_MAX,
            'sliderStep'    => self::PRICE_STEP,
            'categories'    => Destination::CATEGORIES,
            'mapPoints'     => $mapPoints,
            'wishlistedIds' => $wishlistedIds,
        ]);
    }

    public function show(string $slug)
    {
        $destination = Destination::with([
            'images',
            'regency',
            'bestTime',
            'reviews' => fn ($q) => $q->where('is_approved', true)->latest(),
        ])->where('slug', $slug)->firstOrFail();

        $reviewCount   = $destination->reviews->count();
        $averageRating = $reviewCount > 0 ? $destination->reviews->avg('rating') : 0;

        $relatedDestinations = Destination::with('images')
            ->where('regency_id', $destination->regency_id)
            ->where('id', '!=', $destination->id)
            ->take(4)
            ->get();

        // Halte terdekat (radius 5 km) dihitung di database dengan rumus Haversine,
        // jadi tidak perlu memuat semua halte ke memori.
        $nearestStops = collect();
        if ($destination->latitude && $destination->longitude) {
            $lat = (float) $destination->latitude;
            $lng = (float) $destination->longitude;

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

        $isWishlisted = Auth::check()
            && $destination->wishlistedBy()->where('users.id', Auth::id())->exists();

        return view('destinations.show', compact(
            'destination',
            'relatedDestinations',
            'nearestStops',
            'reviewCount',
            'averageRating',
            'isWishlisted'
        ));
    }

    /** Tambah/hapus destinasi dari wishlist. Mengembalikan JSON untuk fetch, atau redirect untuk form biasa. */
    public function toggleWishlist(Request $request, string $slug)
    {
        $destination = Destination::where('slug', $slug)->firstOrFail();

        $result     = $destination->wishlistedBy()->toggle(Auth::id());
        $wishlisted = count($result['attached']) > 0;

        if ($request->wantsJson()) {
            return response()->json(['wishlisted' => $wishlisted]);
        }

        $to = $request->boolean('to_profile')
            ? redirect(route('profile.show') . '#wishlist')
            : redirect()->back();

        return $to->with('success', $wishlisted ? 'Ditambahkan ke wishlist.' : 'Dihapus dari wishlist.');
    }

    public function storeReview(Request $request, string $slug)
    {
        $destination = Destination::where('slug', $slug)->firstOrFail();

        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
            'media'   => 'nullable|file|mimes:jpeg,png,jpg,mp4,mov|max:20480',
        ]);

        $mediaPath = $request->hasFile('media')
            ? $request->file('media')->store('reviews', 'public')
            : null;

        $destination->reviews()->create([
            'user_id'     => Auth::id(), // supaya review muncul di tab "My Reviews" di profil
            'name'        => $data['name'],
            'rating'      => $data['rating'],
            'comment'     => $data['comment'],
            'media_path'  => $mediaPath,
            'is_approved' => true,
        ]);

        return redirect()->back()->with('success', 'Review added successfully!');
    }
}