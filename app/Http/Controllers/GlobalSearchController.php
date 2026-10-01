<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Culinary;
use App\Models\Accommodation;

class GlobalSearchController extends Controller
{
    public function search(Request $request)
    {
        $q = $request->input('search');
        
        if (!$q) {
            return redirect()->back();
        }

        // Try to find exact or very close matches
        $culinary = Culinary::where('name', 'LIKE', "%{$q}%")->first();
        if ($culinary) {
            return redirect()->route('culinary.show', $culinary->slug);
        }

        $dest = Destination::where('name', 'LIKE', "%{$q}%")->first();
        if ($dest) {
            return redirect()->route('destinations.show', $dest->slug);
        }

        $acc = Accommodation::where('name', 'LIKE', "%{$q}%")->first();
        if ($acc) {
            return redirect()->route('accommodations.show', $acc->slug);
        }

        // If no direct matches, maybe fallback to destinations index with search query
        return redirect()->route('destinations.index', ['search' => $q])->with('error', 'Pencarian tidak ditemukan.');
    }
}
