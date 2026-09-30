<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accommodation;
use App\Models\TransitStop;

class AccommodationController extends Controller
{
    private const PRICE_MAX  = 2000000;
    private const PRICE_STEP = 50000;

    public function index(Request $request)
    {
        $query = Accommodation::with('regency.province');

        if ($request->filled('search_name')) { $query->where('name', 'like', '%' . $request->search_name . '%'); }
        if ($request->filled('region')) { $query->whereHas('regency', function($q) use ($request) { $q->where('name', 'like', '%' . $request->region . '%'); }); }

        $minPrice = (int) $request->input('price_min', 0);
        $maxPrice = (int) $request->input('price_max', self::PRICE_MAX);

        if ($minPrice > 0) {
            $query->where('price_min', '>=', $minPrice);
        }
        if ($maxPrice < self::PRICE_MAX) {
            $query->where('price_max', '<=', $maxPrice);
        }

        return view('accommodations.index', [
            'accommodations' => $query->latest()->get(),
            'sliderMax'      => self::PRICE_MAX,
            'sliderStep'     => self::PRICE_STEP,
        ]);
    }

    public function show($slug)
    {
        $accommodation = Accommodation::with(['reviews'])->where('slug', $slug)->firstOrFail();

        $reviewCount = $accommodation->reviews->count();
        $averageRating = $reviewCount > 0 ? $accommodation->reviews->avg('rating') : 0;
        $relatedAccommodations = Accommodation::where('id', '!=', $accommodation->id)->take(4)->get();

        $nearestStops = collect();
        if ($accommodation->latitude && $accommodation->longitude) {
            $stops = TransitStop::all();
            foreach ($stops as $stop) {
                if ($stop->latitude && $stop->longitude) {
                    $latFrom = deg2rad($accommodation->latitude); $lonFrom = deg2rad($accommodation->longitude);
                    $latTo = deg2rad($stop->latitude); $lonTo = deg2rad($stop->longitude);
                    $latDelta = $latTo - $latFrom; $lonDelta = $lonTo - $lonFrom;
                    $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
                    $stop->calculated_distance = $angle * 6371;
                    $nearestStops->push($stop);
                }
            }
            $nearestStops = $nearestStops->sortBy('calculated_distance')->filter(fn($s) => $s->calculated_distance <= 5)->take(5);
        }

        return view('accommodations.show', compact('accommodation', 'nearestStops', 'reviewCount', 'averageRating', 'relatedAccommodations'));
    }

    public function storeReview(Request $request, $slug)
    {
        $accommodation = Accommodation::where('slug', $slug)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
            'media' => 'nullable|file|mimes:jpeg,png,jpg,mp4,mov|max:20480',
        ]);

        $mediaPath = null;
        if ($request->hasFile('media')) {
            $mediaPath = $request->file('media')->store('reviews', 'public');
        }

        $accommodation->reviews()->create([
            'name' => $request->name,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'media_path' => $mediaPath,
            'is_approved' => true,
        ]);

        return redirect()->back()->with('success', 'Review added successfully!');
    }
}