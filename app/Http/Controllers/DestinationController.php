<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Menampilkan semua destinasi wisata.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $query = Destination::with('regency.province');
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('regency', function($q2) use ($search) {
                      $q2->where('name', 'like', "%{$search}%");
                  });
            });
        }
        
        $destinations = $query->latest()->get();

        return view('destinations.index', compact('destinations', 'search'));
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