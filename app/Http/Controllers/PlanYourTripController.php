<?php

namespace App\Http\Controllers;

use App\Models\TripPlan;
use App\Models\Destination;

class PlanYourTripController extends Controller
{
    public function index()
    {
        return view('plan-your-trip.index');
    }

    public function nature()
    {
        // For plan your trip by category, we can fetch destinations with related categories
        $items = Destination::where('category', 'like', '%nature%')->orWhere('category', 'like', '%alam%')->get();
        return view('plan-your-trip.show_category', ['title' => 'Nature Escape', 'items' => $items]);
    }

    public function culture()
    {
        $items = Destination::where('category', 'like', '%culture%')->orWhere('category', 'like', '%budaya%')->orWhere('category', 'like', '%heritage%')->get();
        return view('plan-your-trip.show_category', ['title' => 'Culture & Heritage', 'items' => $items]);
    }

    public function culinary()
    {
        $items = Destination::where('category', 'like', '%culinary%')->orWhere('category', 'like', '%kuliner%')->get();
        return view('plan-your-trip.show_category', ['title' => 'Culinary Journey', 'items' => $items]);
    }
}