<?php
$controllerFile = 'C:\laragon\www\nusaexplore\app\Http\Controllers\CulinaryController.php';
$content = file_get_contents($controllerFile);

$search = <<<SEARCH
        $reviewCount = $culinary->reviews()->count();
        $averageRating = $reviewCount > 0 ? $culinary->reviews()->avg('rating') : 0;

        return view('culinary.show', compact('reviewCount', 'averageRating',
            'culinary',
            'recommendedCulinaries'
        ));
SEARCH;

$replace = <<<REPLACE
        $reviewCount = $culinary->reviews()->count();
        $averageRating = $reviewCount > 0 ? $culinary->reviews()->avg('rating') : 0;

        $nearestStops = collect();
        if ($culinary->latitude && $culinary->longitude) {
            $stops = \App\Models\TransitStop::all();
            foreach ($stops as $stop) {
                if ($stop->latitude && $stop->longitude) {
                    $latFrom = deg2rad($culinary->latitude); $lonFrom = deg2rad($culinary->longitude);
                    $latTo = deg2rad($stop->latitude); $lonTo = deg2rad($stop->longitude);
                    $latDelta = $latTo - $latFrom; $lonDelta = $lonTo - $lonFrom;
                    $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
                    $distance = $angle * 6371; 
                    
                    $stop->calculated_distance = $distance;
                    $nearestStops->push($stop);
                }
            }
            $nearestStops = $nearestStops->where('calculated_distance', '<=', 5)->sortBy('calculated_distance')->take(5);
        }

        $mapsLink = $culinary->maps_url;
        if (!$mapsLink) {
            $query = urlencode($culinary->name . ' ' . ($culinary->location ?? $culinary->regency->name ?? 'Surabaya')));
            $mapsLink = 'https://www.google.com/maps/search/?api=1&query=' . $query;
        }

        return view('culinary.show', compact('reviewCount', 'averageRating',
            'culinary',
            'recommendedCulinaries',
            'nearestStops',
            'mapsLink'
        ));
REPLACE;

$newContent = str_replace($search, $replace, $content);
file_put_contents($controllerFile, $newContent);
echo "Replaced.";
