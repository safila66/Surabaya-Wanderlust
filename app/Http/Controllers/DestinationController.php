<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\TransitStop;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    private const PRICE_MAX  = 100000;
    private const PRICE_STEP = 5000;

    public function index(Request $request)
    {
        $query = Destination::with(['images', 'regency.province'])->latest();

        $search = $request->input('search_name') ?: $request->input('search');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('regency', function ($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->filled('region')) {
            $region = $request->input('region');
            $query->whereHas('regency', fn ($q) => $q->where('name', 'like', "%{$region}%"));
        }

        $minPrice = (int) $request->input('price_min', 0);
        $maxPrice = (int) $request->input('price_max', self::PRICE_MAX);

        if ($minPrice > 0) {
            $query->where('price_min', '>=', $minPrice);
        }
        if ($maxPrice < self::PRICE_MAX) {
            $query->where('price_max', '<=', $maxPrice);
        }

        return view('destinations.index', [
            'destinations' => $query->paginate(12)->withQueryString(),
            'sliderMax'    => self::PRICE_MAX,
            'sliderStep'   => self::PRICE_STEP,
        ]);
    }

    public function show($slug)
    {
        $destination = Destination::with(['images', 'regency', 'reviews', 'bestTime'])->where('slug', $slug)->firstOrFail();

        $reviewCount = $destination->reviews->count();
        $averageRating = $reviewCount > 0 ? $destination->reviews->avg('rating') : 0;

        $relatedDestinations = Destination::where('regency_id', $destination->regency_id)
                                ->where('id', '!=', $destination->id)
                                ->take(4)->get();
                                
        // Calculate Nearest Transit Stops
        $nearestStops = collect();
        if ($destination->latitude && $destination->longitude) {
            $stops = TransitStop::all();
            foreach ($stops as $stop) {
                if ($stop->latitude && $stop->longitude) {
                    $latFrom = deg2rad($destination->latitude); $lonFrom = deg2rad($destination->longitude);
                    $latTo = deg2rad($stop->latitude); $lonTo = deg2rad($stop->longitude);
                    $latDelta = $latTo - $latFrom; $lonDelta = $lonTo - $lonFrom;
                    $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
                    $distance = $angle * 6371; 
                    
                    $stop->calculated_distance = $distance;
                    $nearestStops->push($stop);
                }
            }
            
            // Sort by distance and take top 5 within 5km
            $nearestStops = $nearestStops->sortBy('calculated_distance')->filter(function ($stop) {
                return $stop->calculated_distance <= 5; // within 5km
            })->take(5);
        }

        return view('destinations.show', compact('destination', 'relatedDestinations', 'nearestStops', 'reviewCount', 'averageRating'));
    }

    public function storeReview(Request $request, $slug)
    {
        $destination = Destination::where('slug', $slug)->firstOrFail();
        
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
        
        $destination->reviews()->create([
            'name' => $request->name,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'media_path' => $mediaPath,
            'is_approved' => true,
        ]);
        
        return redirect()->back()->with('success', 'Review added successfully!');
    }
}