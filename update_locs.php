<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Culinary;
use App\Models\Destination;
use App\Models\Accommodation;
use App\Models\PrayerPlace;
use App\Models\Culture;

$data = [
    'Surabaya Timur' => [
        // Resto
        'Ayam Goreng Pusaka', 'Depot Bu Rudy', 'Soto Ayam Lamongan Cak Har', 'Sate Kelopo Ondomohen Bu Asih', 'Uda Wandi', 'Bakso Solo Samrat', 'Tahu Telor Pak Jayen Pusat', 'Lontong Balap Pak H.Woko', 'Wapo Prasmanan', 'Almaz Frid Chiken',
        // Cafe
        'Coste Coffee', 'Borre Cafe', 'Historica', 'Kogu Space', 'AADK', 'Second Cup Coffee', 'Fourspace Coffee', 'Moengkopi JiwARTspace', 'Patdua Coffee & Eatery', 'Tetra Coffee & Eatery',
        // Dest
        'Hutan Bambu Keputih', 'Pakuwon City Mall',
        // Culture
        
        // Acc
        'Mercure Surabaya Manyar', 'Novotel Samator Surabaya Timur', 'HARRIS Hotel & Conventions Gubeng', 'Oakwood Hotel & Residence Surabaya', 'Vasa Hotel Surabaya', 'Swiss-Belinn Manyar', 'G-Suites Hotel', 'Core Hotel Bonnet Surabaya', 'Bumi Surabaya City Resort', 'Tab Capsule Hotel - Kayoon', 'Kampi Hotel Tunjungan',
        // Prayer
        'Masjid Manarul Ilmi ITS', 'Masjid Ulul Albab UNAIR Kampus C', 'Musala Stasiun Surabaya Gubeng', 'Musala Galaxy Mall', 'Musala Pakuwon City Mall', 'Gereja Bethany Manyar Rejo', 'GKI Mulyosari Pakuwon City', 'Vihara Dharma Kasih',
    ],
    'Surabaya Utara' => [
        // Resto
        'Nasi Cumi Pasar Atom Ibu Atun', 'Empal Pengampon', 'Cakue Peneleh', 'Lontong Mie Ny. Marlia', 'Es Kacang Ijo Goyang Lidah', 'Lontong Balap Rajawali', 'Ayam Bakar Wong Krembangan', 'Rujak Buah Madura Toko Barokah', 'Bubur Madura Pasar Atom', 'Soto Ayam Lamongan Djoko Tarup',
        // Cafe
        'Fifteenth Coffee Kota Lama', 'Saat Seduh Coffee Jembatan Merah', 'Takopi', 'Kafetien 88', 'Petekan Riverside', 'Portéa Coffee & Eatery', 'Van Java Cafe', 'Tonggi Coffee Rooftop Cafe', 'Rume Croissant & Bread', 'Toko Kopi Sigan',
        // Dest
        'Masjid dan Makam Sunan Ampel', 'Kelenteng Sanggar Agung Kenjeran', 'Jembatan Nasional Suramadu', 'Surabaya North Quay', 'Pantai Ria Kenjeran', 'Kota tua Surabaya', 'Kampung Kembang Jepun', 'Museum House of Sampoerna', 'Jembatan Merah', 'Pos Bloc Surabaya', 'Pasar Pabean', 'Benteng Kedung Cowek', 'Monumen Jalesveva Jayamahe', 'Kenjeran Park', 'Patung Buddha Empat Wajah Kenjeran',
        // Culture
        
        // Acc
        'Hotel Arcadia by Horison', 'Pop! Hotel Stasiun Kota', 'Pesonna Hotel Ampel Surabaya', 'Kokoon Hotel Surabaya',
        // Prayer
        'Masjid Agung Sunan Ampel', 'Masjid Serang Panggung', 'Masjid Kemayoran', 'Musala Kenjeran Park', 'Gereja Katolik Kelahiran Santa Perawan Maria Kepanjen', 'Klenteng Hong Tiek Hian', 'Klenteng Hok An Kiong', 'Klenteng Pak Kik Bio', 'Klenteng Sanggar Agung Hong San Tang', 'Pura Agung Jagat Karana', 'Pura Segara Kenjeran',
    ],
    'Surabaya Selatan' => [
        // Resto
        'Sego Sambel Mak Yeye', 'Rawon Pak Pangat', 'Bebek Sinjay A. Yani', 'Ayam Bakar Primarasa', 'Warteg Bahari', 'Spesial Belut Surabaya H. Poer', 'Soto Madura Wawan', 'Tahu tek songgo prapatan kebonsari', 'Rujak cingur legenda', 'Aneka Hidangan Nikmat Rasa',
        // Cafe
        'Brain Coffee Surabaya', 'DeMandailing Cafe', 'BARA CAFE', 'BOBER cafe & ruang komunitas', 'Redback Specialty Coffee', 'VERTE Café', 'RING Coffee & Eatery', 'La Scala Coffee Wiyung', 'Ultra Coffee', 'Cafe Jalan Korea',
        // Dest
        'Kebun Binatang Surabaya', 'Surabaya Town Square', 'Masjid Nasional Al-Akbar', 'Suroboyo Carnival Park', 'Royal Plaza', 'Trans Snow World Surabaya', 'Taman Bungkul', 'Monumen Bambu Runcing', 'Pintu Air Jagir Wonokromo', 'Taman Pelangi',
        // Culture
        
        // Acc
        'Hotel Majapahit', 'JW Marriott Hotel Surabaya', 'Bumi Surabaya City Resort', 'Crown Prince Hotel Surabaya', 'Wyndham Surabaya', 'Platinum Hotel Tunjungan Surabaya', 'Midtown Hotel Surabaya', 'Artotel TS Suites Surabaya', 'Cleo Hotel Basuki Rahmat', 'Grand Inna Tunjungan Hotel', 'Swiss-Belinn Tunjungan Surabaya', 'Hotel 88 Embong Malang',
        // Prayer
        'Masjid Nasional Al-Akbar', 'Masjid Arif Nurul Huda Polda Jatim', 'Musala Kebun Binatang Surabaya', 'Musala Royal Plaza', 'Musala Terminal Joyoboyo',
    ],
    'Surabaya Pusat' => [
        // Resto
        'Pangsit Mie Ayam Undaan', 'Mie Ayam Jakarta Siola', 'Sego Sambel Mbak Sol', 'Depot WD Genteng', 'Apeng Kwetiau Medan', 'Bakmi Lanka', 'Wizzme', 'Ah Pek Kopitiam', 'Depot Bamara', 'Ngastina',
        // Cafe
        'Calibre Coffee Roasters', 'Coffee Toffee Apsari Grahadi', 'Java Cup', 'Bronn Coffee', 'Blue Doors Surabaya', 'Threelogy Coffee Mojopahit', 'Sambang Cafe & Eatery', 'Djavahaus Coffee & Eatery', 'Firstfl oor Coffee', 'The Library Coffee & Pastries',
        // Dest
        'Tugu Pahlawan', 'Tunjungan Plaza', 'Museum Sepuluh Nopember', 'Jalan Tunjungan', 'Alun-Alun Surabaya', 'Monumen Kapal Selam', 'Gedung Negara Grahadi', 'Museum Pendidikan Surabaya', 'Taman Prestasi', 'Rumah HOS Tjokroaminoto Peneleh', 'Kampung Lawas Maspati', 'Balai pemuda', 'Museum siola', 'Museum W.R. Soepratman',
        // Culture
        'Patung Suro dan Boyo',
        // Acc
        
        // Prayer
        'Masjid Muhammad Cheng Hoo', 'Masjid Jami Peneleh', 'Masjid Rahmat Kembang Kuning', 'Musala Tunjungan Plaza', 'Musala Stasiun Pasar Turi', 'Musala Grand City Mall', 'GPIB Immanuel Bubutan', 'Gereja Hati Kudus Yesus Katedral Surabaya', 'Klenteng Boen Bio Kapasan',
    ],
    'Surabaya Barat' => [
        // Resto
        'Pawon Ndeso', 'Cak Geprot', 'Bakso Dono', 'Pangsit Mie Ayam Jakarta AsemRowo', 'New Pelabuhan Resto', 'Kamarasa Eatery', 'DS Bistro', 'Angkringan Kapok Lombok', 'Seblak BW', 'Phad Thai Paradise',
        // Cafe
        'Kudos Cafe', 'Alura Coffee', 'Brew and Else', 'Gatherinc Bistro and Bakery', 'HUE Coffee', 'Pause Coffee', 'Bagi Kopi Citraland', 'Senses',
        // Dest
        'Pakuwon Mall', 'Ciputra Waterpark', 'Food Junction Grand Pakuwon', 'Lenmarc Mall', 'Graha Natura Park', 'Spazio',
        // Acc
        'The Westin Surabaya', 'Four Points by Sheraton Surabaya Pakuwon Indah', 'Ascott Waterplace Surabaya', 'Shangri-La Surabaya', 'Hotel Ciputra World Surabaya', 'Fairfield by Marriott Surabaya', 'HARRIS Hotel & Conventions Bundaran Satelit', 'Whiz Luxe Hotel Spazio Surabaya', 'Deka Hotel Surabaya HR Muhammad',
        // Prayer
        'Musala Pakuwon Mall', 'Musala Ciputra World', 'Musala Lenmarc Mall', 'GBI Citraland', 'Gibeon Church',
    ]
];

foreach ($data as $region => $names) {
    foreach ($names as $name) {
        $name = trim($name);
        
        $m = Culinary::where('name', 'like', "%{$name}%")->first();
        if($m) { $m->location = $region; $m->save(); continue; }
        
        $m = Destination::where('name', 'like', "%{$name}%")->first();
        if($m) { $m->location = $region; $m->save(); continue; }
        
        $m = Accommodation::where('name', 'like', "%{$name}%")->first();
        if($m) { $m->location = $region; $m->save(); continue; }
        
        $m = PrayerPlace::where('name', 'like', "%{$name}%")->first();
        if($m) { $m->location = $region; $m->save(); continue; }
        
        $m = Culture::where('name', 'like', "%{$name}%")->first();
        if($m) { $m->location = $region; $m->save(); continue; }
    }
}
echo "Locations updated.\n";
