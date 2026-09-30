<?php

namespace App\Http\Controllers;

use App\Models\Culinary;
use App\Models\TransitStop;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;

class CulinaryController extends Controller
{

    const PRICE_MAX = 500000;
    const PRICE_STEP = 5000;

    public function index(Request $request)
    {
        $selectedRegion = $request->get('region');
        $foodName = $request->get('search_name');   // sebelumnya 'food_name', tidak cocok dengan form

        $query = Culinary::with([
            'regency.province'
        ]);

        if ($selectedRegion) {
            $query->where(function($q) use ($selectedRegion) {
                $q->where('where_to_buy', 'like', '%' . $selectedRegion . '%')
                  ->orWhere('description', 'like', '%' . $selectedRegion . '%')
                  ->orWhere('location', 'like', '%' . $selectedRegion . '%');
            });
        }

        if ($foodName) {
            $query->where('name', 'like', '%' . $foodName . '%');
        }

        $minPrice = (int) $request->input('price_min', 0);
        $maxPrice = (int) $request->input('price_max', self::PRICE_MAX);

        if ($minPrice > 0) {
            $query->where('price_min', '>=', $minPrice);
        }

        if ($maxPrice < self::PRICE_MAX) {
            $query->where('price_max', '<=', $maxPrice);
        }

        $culinaries = $query
            ->orderBy('name')
            ->get();

        return view('culinary.index', [
            'culinaries' => $culinaries,
            'provinces' => collect(), 'sliderMax' => self::PRICE_MAX, 'sliderStep' => self::PRICE_STEP,
            'regencies' => collect(),
            'selectedProvince' => '',
            'selectedRegency' => '',
            'selectedRegion' => $selectedRegion,
            'foodName' => $foodName,
            'sliderMax' => self::PRICE_MAX,
            'sliderStep' => self::PRICE_STEP,
        ]);
    }

    public function show($slug)
    {
        $culinary = Culinary::with([
            'regency.province',
            'images'
        ])
        ->where('slug', $slug)
        ->firstOrFail();

        $recommendedCulinaries = Culinary::with([
            'regency',
            'images'
        ])
        ->where('regency_id', $culinary->regency_id)
        ->where('id', '!=', $culinary->id)
        ->orderBy('name')
        ->take(10)
        ->get();

        $reviewCount = $culinary->reviews()->count();
        $averageRating = $reviewCount > 0 ? $culinary->reviews()->avg('rating') : 0;

        return view('culinary.show', compact('reviewCount', 'averageRating',
            'culinary',
            'recommendedCulinaries'
        ));
    }

    public function storeReview(Request $request, $slug)
    {
        $culinary = Culinary::where('slug', $slug)->firstOrFail();

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

        $culinary->reviews()->create([
            'name' => $request->name,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'media_path' => $mediaPath,
            'is_approved' => true,
        ]);

        return redirect()->back()->with('success', 'Review added successfully!');
    }
}