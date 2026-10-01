<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Culture;

$images = [
    'Masjid dan Makam Sunan Ampel' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/Masjid_Sunan_Ampel_2.jpg/800px-Masjid_Sunan_Ampel_2.jpg',
    'Kelenteng Sanggar Agung Kenjeran' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/be/Klenteng_Sanggar_Agung%2C_Kenjeran%2C_Surabaya.jpg/800px-Klenteng_Sanggar_Agung%2C_Kenjeran%2C_Surabaya.jpg',
    'Kampung Kembang Jepun' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Kembang_Jepun_Street.jpg/800px-Kembang_Jepun_Street.jpg',
    'Museum House of Sampoerna' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/House_of_Sampoerna.jpg/800px-House_of_Sampoerna.jpg',
    'Jembatan Merah' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/Jembatan_Merah_Surabaya.jpg/800px-Jembatan_Merah_Surabaya.jpg',
    'Pos Bloc Surabaya' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Kantor_Pos_Besar_Surabaya.jpg/800px-Kantor_Pos_Besar_Surabaya.jpg',
    'Pasar Pabean' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/Pasar_Pabean.jpg/800px-Pasar_Pabean.jpg',
    'Benteng Kedung Cowek' => 'https://images.unsplash.com/photo-1599839619722-39751411ea63?w=800&q=80',
    'Monumen Jalesveva Jayamahe' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Monjaya_Surabaya.jpg/800px-Monjaya_Surabaya.jpg',
    'Patung Buddha Empat Wajah Kenjeran' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Four_Faced_Buddha_Statue_in_Surabaya.jpg/800px-Four_Faced_Buddha_Statue_in_Surabaya.jpg',
    'Balai pemuda' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/Balai_Pemuda_Surabaya.jpg/800px-Balai_Pemuda_Surabaya.jpg',
    'Balai pemuda (Heritage)' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/Balai_Pemuda_Surabaya.jpg/800px-Balai_Pemuda_Surabaya.jpg',
    'Museum siola' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/94/Gedung_Siola.jpg/800px-Gedung_Siola.jpg',
    'Museum sepuluh november' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Museum_Sepuluh_Nopember.jpg/800px-Museum_Sepuluh_Nopember.jpg',
    'Museum W.R. Soepratman' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Makam_W._R._Soepratman.jpg/800px-Makam_W._R._Soepratman.jpg',
    'Museum Pendidikan Surabaya' => 'https://images.unsplash.com/photo-1546410531-bb4caa6b424d?w=800&q=80',
    'Monumen kapal selam' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/39/Monumen_Kapal_Selam_Surabaya.jpg/800px-Monumen_Kapal_Selam_Surabaya.jpg',
    'Tugu Pahlawan' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Tugu_Pahlawan_Surabaya.jpg/800px-Tugu_Pahlawan_Surabaya.jpg',
    'Hotel Majapahit' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Hotel_Majapahit_Surabaya.jpg/800px-Hotel_Majapahit_Surabaya.jpg',
    'Gedung Negara Grahadi' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Gedung_Negara_Grahadi_Surabaya.jpg/800px-Gedung_Negara_Grahadi_Surabaya.jpg',
    'Rumah HOS Tjokroaminoto Peneleh' => 'https://images.unsplash.com/photo-1582555172866-f73bb12a2ab3?w=800&q=80',
    'Kampung Lawas Maspati' => 'https://images.unsplash.com/photo-1549473889-14f410d83298?w=800&q=80',
    'Monumen Bambu Runcing' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/Bambu_Runcing_Monument.jpg/800px-Bambu_Runcing_Monument.jpg',
    'Masjid Nasional Al-Akbar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4b/Masjid_Al_Akbar_Surabaya.jpg/800px-Masjid_Al_Akbar_Surabaya.jpg',
    'Patung Suro dan Boyo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Suro_and_Boyo_statue%2C_Surabaya.jpg/800px-Suro_and_Boyo_statue%2C_Surabaya.jpg',
    'Pintu Air Jagir Wonokromo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Pintu_Air_Jagir.jpg/800px-Pintu_Air_Jagir.jpg',
];

$count = 0;
foreach ($images as $name => $url) {
    $culture = Culture::where('name', $name)->first();
    if ($culture) {
        $culture->image = $url;
        $culture->save();
        $count++;
        echo "Updated: $name\n";
    }
}
echo "Total updated: $count\n";
