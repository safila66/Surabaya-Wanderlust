<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$dest_reg = App\Models\Destination::pluck('regency_id')->unique()->toArray();
$cul_reg = App\Models\Culinary::pluck('regency_id')->unique()->toArray();
$acc_reg = App\Models\Accommodation::pluck('regency_id')->unique()->toArray();

echo "Dest Regency IDs: " . implode(', ', $dest_reg) . PHP_EOL;
echo "Cul Regency IDs: " . implode(', ', $cul_reg) . PHP_EOL;
echo "Acc Regency IDs: " . implode(', ', $acc_reg) . PHP_EOL;
