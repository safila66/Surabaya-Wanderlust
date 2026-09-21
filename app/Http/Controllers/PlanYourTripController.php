<?php

namespace App\Http\Controllers;

class PlanYourTripController extends Controller
{
    public function index()
    {
        return view('plan-your-trip.index');
    }
}