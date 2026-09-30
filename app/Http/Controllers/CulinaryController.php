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
        $selectedRegion = $request->get('region');
        $foodName = $request->get('food_name');

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

        $culinaries = $query
            ->orderBy('name')
            ->get();

        return view('culinary.index', [
            'culinaries' => $culinaries,
            'provinces' => collect(),
            'regencies' => collect(),
            'selectedProvince' => '',
            'selectedRegency' => '',
            'selectedRegion' => $selectedRegion,
            'foodName' => $foodName
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

        return view('culinary.show', compact(
            'culinary',
            'recommendedCulinaries'
        ));
    }
}