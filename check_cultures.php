<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Culture;

$cultures = Culture::whereNull('image')->orWhere('image', '')->get();
foreach ($cultures as $c) {
    echo $c->id . '|' . $c->category . '|' . $c->name . "\n";
}
