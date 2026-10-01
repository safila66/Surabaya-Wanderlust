<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Destination;

$images = [
    'Monumen kapal selam' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/39/Monumen_Kapal_Selam_Surabaya.jpg/800px-Monumen_Kapal_Selam_Surabaya.jpg',
    'Tugu Pahlawan' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Tugu_Pahlawan_Surabaya.jpg/800px-Tugu_Pahlawan_Surabaya.jpg',
    'Surabaya North Quay' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b3/Surabaya_North_Quay.jpg/800px-Surabaya_North_Quay.jpg',
];

$count = 0;
foreach ($images as $name => $url) {
    $d = Destination::where('name', $name)->first();
    if ($d) {
        $d->image = $url;
        $d->save();
        $count++;
        echo "Updated: $name\n";
    }
}
echo "Total updated: $count\n";
