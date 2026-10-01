<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Destination;

$names = ['Monumen kapal selam', 'Tugu Pahlawan', 'Surabaya North Quay', 'East Surabaya', 'West Surabaya', 'Central Surabaya'];
$dests = Destination::whereIn('name', $names)->get();
foreach($dests as $d) {
    echo "Dest: {$d->name}, Image: {$d->image}\n";
}
