<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Culinary;

echo "Culinaries:\n";
foreach(Culinary::all() as $d) echo $d->name . ' - ' . $d->location . "\n";
