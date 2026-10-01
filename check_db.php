<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo 'Provinces total: ' . App\Models\Province::count() . PHP_EOL;
echo 'Regencies total: ' . App\Models\Regency::count() . PHP_EOL;

$dest = App\Models\Destination::whereHas('regency', function($q){ $q->where('name', 'not like', '%Surabaya%'); })->count();
$cul = App\Models\Culinary::whereHas('regency', function($q){ $q->where('name', 'not like', '%Surabaya%'); })->count();
$acc = App\Models\Accommodation::whereHas('regency', function($q){ $q->where('name', 'not like', '%Surabaya%'); })->count();

echo 'Non-Surabaya Destinations: ' . $dest . PHP_EOL;
echo 'Non-Surabaya Culinaries: ' . $cul . PHP_EOL;
echo 'Non-Surabaya Accommodations: ' . $acc . PHP_EOL;
