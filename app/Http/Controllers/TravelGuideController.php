<?php

namespace App\Http\Controllers;

class TravelGuideController extends Controller
{
    public function index()
    {
        return view('travel-guide.index');
    }
}