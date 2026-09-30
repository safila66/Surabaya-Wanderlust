<?php

namespace App\Http\Controllers;

use App\Models\TravelGuide;

class TravelGuideController extends Controller
{
    public function index()
    {
        return view('travel-guide.index');
    }

    public function gettingAround()
    {
        $items = TravelGuide::whereNotNull('getting_around')->get();
        return view('travel-guide.show_category', ['title' => 'Getting Around', 'items' => $items, 'field' => 'getting_around']);
    }

    public function beforeYouGo()
    {
        $items = TravelGuide::whereNotNull('local_rules')->get();
        return view('travel-guide.show_category', ['title' => 'Before You Go', 'items' => $items, 'field' => 'local_rules']);
    }

    public function tips()
    {
        $items = TravelGuide::whereNotNull('travel_tips')->get();
        return view('travel-guide.show_category', ['title' => 'Travel Tips', 'items' => $items, 'field' => 'travel_tips']);
    }
}