<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Destination;
use App\Models\Accommodation;
use App\Models\Culture;

echo "Destinations:\n";
foreach(Destination::take(3)->get() as $d) echo $d->name . ' - ' . $d->location . "\n";

echo "\nAccommodations:\n";
foreach(Accommodation::take(3)->get() as $d) echo $d->name . ' - ' . $d->location . "\n";

echo "\nCultures:\n";
foreach(Culture::take(3)->get() as $d) echo $d->name . ' - ' . $d->location . "\n";
