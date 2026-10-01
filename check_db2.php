<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$cult = App\Models\Culture::count();
$trans = App\Models\Transportation::count();
$guide = App\Models\TravelGuide::count();

echo 'Cultures: ' . $cult . PHP_EOL;
echo 'Transportations: ' . $trans . PHP_EOL;
echo 'TravelGuides: ' . $guide . PHP_EOL;
