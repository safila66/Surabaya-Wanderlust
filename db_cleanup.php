<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Province;
use App\Models\Regency;

$keepRegencies = ['Kota Surabaya', 'Surabaya Barat', 'Surabaya Tengah', 'Surabaya Timur', 'Surabaya Selatan', 'Surabaya Utara'];
$keepProvinces = ['Jawa Timur'];

$deletedRegencies = Regency::whereNotIn('name', $keepRegencies)->delete();
$deletedProvinces = Province::whereNotIn('name', $keepProvinces)->delete();

echo 'Deleted Regencies: ' . $deletedRegencies . PHP_EOL;
echo 'Deleted Provinces: ' . $deletedProvinces . PHP_EOL;
