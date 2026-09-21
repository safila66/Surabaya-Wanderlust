<?php

namespace App\Http\Controllers;

use App\Models\BestTime;

class BestTimeController extends Controller
{
    public function index()
    {
        $bestTimes = BestTime::with([
            'destination.regency.province'
        ])
        ->latest('last_updated')
        ->get();

        return view('best-time.index', compact('bestTimes'));
    }
}