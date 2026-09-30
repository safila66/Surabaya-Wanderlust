<?php

namespace App\Http\Controllers;

use App\Models\Culture;

class CultureController extends Controller
{
    public function index()
    {
        return view('culture.index');
    }

    public function heritage()
    {
        $items = Culture::where('category', 'Heritage')->orWhere('category', 'like', '%heritage%')->get();
        return view('culture.show_category', ['title' => 'Heritage', 'items' => $items]);
    }

    public function traditions()
    {
        $items = Culture::where('category', 'Tradition')->orWhere('category', 'like', '%tradition%')->get();
        return view('culture.show_category', ['title' => 'Traditions', 'items' => $items]);
    }

    public function arts()
    {
        $items = Culture::where('category', 'Arts')->orWhere('category', 'like', '%art%')->get();
        return view('culture.show_category', ['title' => 'Arts & Identity', 'items' => $items]);
    }
}