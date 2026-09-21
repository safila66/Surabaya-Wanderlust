<?php

namespace App\Http\Controllers;

use App\Models\Province;

class ProvinceController extends Controller
{
    public function index()
    {
        $provinces = Province::withCount('regencies')
            ->orderBy('name')
            ->get();

        return view('provinces.index', compact('provinces'));
    }

    public function show($slug)
    {
        $province = Province::with([
            'regencies' => function ($query) {
                $query->orderBy('name');
            },
            'regencies.destinations'
        ])
        ->where('slug', $slug)
        ->firstOrFail();

        return view('provinces.show', compact('province'));
    }
}