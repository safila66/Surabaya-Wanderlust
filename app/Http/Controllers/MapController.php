<?php
namespace App\Http\Controllers;
use App\Models\Destination;
use App\Models\Culinary;
use App\Models\Accommodation;
class MapController extends Controller {
        public function index() {
        $dests = Destination::whereNotNull('latitude')->get()->map(function($d) {
            $d->type = 'destination';
            $d->url = route('destinations.show', $d->slug);
            $d->default_image = 'images/destination-default.jpg';
            return $d;
        });
        $culs = Culinary::whereNotNull('latitude')->get()->map(function($c) {
            $c->type = 'culinary';
            $c->category = $c->category ?? 'Kuliner';
            $c->url = route('culinary.show', $c->slug);
            $c->default_image = \App\Support\CulinaryImage::defaultFor($c);
            return $c;
        });
        $accs = Accommodation::whereNotNull('latitude')->get()->map(function($a) {
            $a->type = 'accommodation';
            $a->category = $a->type ?? 'Akomodasi';
            $a->url = route('accommodations.show', $a->slug);
            $a->default_image = 'images/accommodation-default.jpg';
            return $a;
        });
        
        $destinations = $dests->concat($culs)->concat($accs)->values();
        return view('map.index', compact('destinations'));
    }
}
