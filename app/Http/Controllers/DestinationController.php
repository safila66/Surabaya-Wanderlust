<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Menampilkan semua destinasi wisata.
     */
    public function index()
    {
        $destinations = Destination::with('regency.province')
            ->latest()
            ->get();

        return view('destinations.index', compact('destinations'));
    }

    /**
     * Menampilkan detail satu destinasi.
     */
    public function show($slug)
    {
        $destination = Destination::with([
            'regency.province',
            'bestTime',
            'tourismStatistics',
            'images',
            'reviews',
        ])
        ->where('slug', $slug)
        ->firstOrFail();

        // Menghitung rating berdasarkan review pengguna
        $averageRating = $destination->reviews->avg('rating') ?? 0;

        // Menghitung jumlah review
        $reviewCount = $destination->reviews->count();

        return view('destinations.show', compact(
            'destination',
            'averageRating',
            'reviewCount'
        ));
    }
}