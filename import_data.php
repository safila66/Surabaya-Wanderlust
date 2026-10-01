<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Culinary;
use App\Models\Regency;
use Illuminate\Support\Str;

$data = <<<DATA
Resto
Sby Timur
Ayam Goreng Pusaka https://share.google/L3hj7d3pn0VZxiytc
Depot Bu Rudy https://share.google/xkekjoak9ejjmWX6X
Soto Ayam Lamongan Cak Harhttps://share.google/lxRDMoB50kFhlXZjQ
Sate Kelopo Ondomohen Bu Asih https://share.google/bAQlCEemNnn1LvlQH
Uda Wandi https://share.google/1zjABsTof8rZ2cib6
Bakso Solo Samrat https://share.google/NVBo4ZrEwvSRfbMHs
Tahu Telor Pak Jayen Pusat https://share.google/njLrpyUogQ7PZkHtO
Lontong Balap Pak H.Woko https://maps.app.goo.gl/rTv4vpdRbHjXAuZj9
Wapo Prasmanan https://maps.app.goo.gl/EKNcCcNiektVWPZeA
Almaz Frid Chiken https://maps.app.goo.gl/9MqX3EvurggVBUqt7
Sby Utara
Nasi Cumi Pasar Atom Ibu Atun https://maps.app.goo.gl/vpeApearuYJ7zHze7
Empal Pengamponhttps://maps.app.goo.gl/45a6YBPQVxd83ikt5
Cakue Penelehhttps://maps.app.goo.gl/ZkVd9bWVB4xdxyFX6
Lontong Mie Ny. Marlia https://maps.app.goo.gl/mEFTe5p2A2XG3XbA6
Es Kacang Ijo Goyang Lidahhttps://maps.app.goo.gl/4KZoU77wfiR9RUL8A
Lontong Balap Rajawali [ https://maps.app.goo.gl/kxSqizDT7NgwR3Vv9](https://maps.app.goo.gl/kxSqizDT7NgwR3Vv9)
Ayam Bakar Wong Krembangan https://maps.app.goo.gl/YTjp9GT5BnSmFqak8
Rujak Buah Madura Toko Barokah https://maps.app.goo.gl/b4ozKif4Fdw2j8Nk6
Bubur Madura Pasar Atom https://maps.app.goo.gl/XiYXdFHKsL1rPjEC8
Soto Ayam Lamongan Djoko Taruphttps://maps.app.goo.gl/LSQycMg2Kii2QHuE6
Sby Selatan
Sego Sambel Mak Yeye https://maps.app.goo.gl/jK4svrnBDLCB2ZgMA
Rawon Pak Pangathttps://maps.app.goo.gl/ZHeN8SAyzGfRgN7q7
Bebek Sinjay A. Yani https://maps.app.goo.gl/B1QXGZkQKpfy9iqv7
Ayam Bakar Primarasa https://maps.app.goo.gl/XJaLnPgEsSPDF5YA7
Warteg Bahari https://maps.app.goo.gl/FsamapxgkbsB6A759
Spesial Belut Surabaya H. Poer https://maps.app.goo.gl/LwASGUXsLAiKNo6y8
Soto Madura Wawan https://maps.app.goo.gl/aTeCxwfCNP6PLLno8
Tahu tek songgo prapatan kebonsari https://maps.app.goo.gl/dhMdE2vkxB3hKtqRA
Rujak cingur legenda https://maps.app.goo.gl/V8q1QyvV3Q1ZHqeu5
Aneka Hidangan Nikmat Rasa https://maps.app.goo.gl/UumE9QUteXSdvbNVA
Sby Pusat
Pangsit Mie Ayam Undaan https://maps.app.goo.gl/b4oMwPooun9GiGdV6
Mie Ayam Jakarta Siola https://maps.app.goo.gl/bsQ9DJZZ65gkNoSm8
Sego Sambel Mbak Sol https://maps.app.goo.gl/JGPqkwEnGecjej8M6
Depot WD Genteng https://maps.app.goo.gl/znoYYQt2VwE4dMYa7
Apeng Kwetiau Medan https://maps.app.goo.gl/2yPUsbCyhsZqycWP6
Bakmi Lanka https://maps.app.goo.gl/AbsPxCSsPYxCNBbh7
Wizzme https://maps.app.goo.gl/u1EdxTCak1CKPxnV9
Ah Pek Kopitiamhttps://maps.app.goo.gl/nPokXKzVKSuywwALA
Depot Bamara https://maps.app.goo.gl/tShj2GCNX7HHhV2v9
Ngastina https://maps.app.goo.gl/BWhAMivF7pE2tqBc8
Sby Barat
Pawon Ndeso https://maps.app.goo.gl/CTNASYMzw3emDPB5A
Cak Geprot https://maps.app.goo.gl/2HRGhBDWEdZf6KNEA
Bakso Donohttps://maps.app.goo.gl/G5Pit4Migtqoj5BK9
Pangsit Mie Ayam Jakarta AsemRowohttps://maps.app.goo.gl/5976E7s2u6gcuQ646
New Pelabuhan Restohttps://maps.app.goo.gl/1HtuaCbxb12VLq2C9
Kamarasa Eatery https://maps.app.goo.gl/RkwZdSqb5EsftwKC9
DS Bistro https://maps.app.goo.gl/doGUgha82RpEbiyS6
Angkringan Kapok Lombok https://maps.app.goo.gl/cGHAjzdsPBz6wTFy7
Seblak BWhttps://maps.app.goo.gl/RD2urC5hvQ1o8cEq8
Phad Thai Paradise https://maps.app.goo.gl/wkybryAAz9wiA7JX6
Cafe
Sby Timur
Coste Coffee https://maps.app.goo.gl/Ksujwku9VxFwY4BXA
Borre Cafe https://maps.app.goo.gl/ygK8FnKtDqWaXWMo8
Historica https://maps.app.goo.gl/JxhN4xoHVWQuStwq9
Kogu Space https://maps.app.goo.gl/emKLENuKRSUtr8uC8
AADK https://maps.app.goo.gl/hyhBSgGdnh8W7qk26
Second Cup Coffee https://maps.app.goo.gl/fhoeEnF8A4zhQdsL6
Fourspace Coffee https://maps.app.goo.gl/swk2SqDhjNQtwnJg9
Moengkopi JiwARTspace https://maps.app.goo.gl/UvsjvgUnREVK5BBP9
Patdua Coffee & Eatery https://maps.app.goo.gl/Kvn7AF19PYEJQYSR8
Tetra Coffee & Eatery https://maps.app.goo.gl/B2hfat9UmtZsubYg7
Sby Utara
Fifteenth Coffee Kota Lama https://maps.app.goo.gl/PgMfLNv269jU745u8
Saat Seduh Coffee Jembatan Merah https://maps.app.goo.gl/V4BK7N4hWqhpVCUF9
Takopi https://maps.app.goo.gl/QqQHWtdGUw329ieE8
Kafetien 88 https://maps.app.goo.gl/w1UE2dwnUFmh4FNX9
Petekan Riverside https://maps.app.goo.gl/t5J39xwu8k7gabT59
Portéa Coffee & Eatery https://maps.app.goo.gl/R4tKs4JQLJkbshF6A
Van Java Cafe https://maps.app.goo.gl/HoBJBeuEjatZ51QC7
Tonggi Coffee Rooftop Cafe https://maps.app.goo.gl/C5RMZwiLunHiPWBJA
Rume Croissant & Bread https://maps.app.goo.gl/bLKQfHWFLnMDgR9D8
Toko Kopi Sigan https://maps.app.goo.gl/pzW1crmYWc6cfcRv8
Sby Selatan
Brain Coffee Surabaya https://maps.app.goo.gl/hR7rVn67G2M2QLSA9
DeMandailing Cafe https://maps.app.goo.gl/QwjVfCSyUZiYZtEg7
BARA CAFE https://maps.app.goo.gl/XQ9qRCfyX4LvZ1CF9
BOBER cafe & ruang komunitas https://maps.app.goo.gl/7NYadPLRArMPj3Jx8
Redback Specialty Coffee https://maps.app.goo.gl/Dvs3NxUBoNGZ4gBn8
VERTE Café https://maps.app.goo.gl/5dFdPQaico5pvPuB8
RING Coffee & Eatery https://maps.app.goo.gl/4oMujUDr56ivpgkf7
La Scala Coffee Wiyung https://maps.app.goo.gl/jUYZfeZD3AJZYg3FA
Ultra Coffee https://maps.app.goo.gl/DnCj7uFRrBF6LBTh7
Cafe Jalan Korea https://maps.app.goo.gl/qGqTJ42k6jdAJHNa7
Sby Pusat
Zangrandi Ice Cream https://maps.app.goo.gl/uVvMqx9VGEbWSvQA6
Calibre Coffee Roasters https://maps.app.goo.gl/SvQQTE44Q1xLKmb89
Coffee Toffee Apsari Grahadi https://maps.app.goo.gl/hp7zphKy8fdwpgts9
Java Cup https://maps.app.goo.gl/TUiDoCrGVvfdEQ7n8
Bronn Coffee https://maps.app.goo.gl/eLrHCPw4DwgdkRJz9
Blue Doors Surabaya https://maps.app.goo.gl/w8tB4Uxc9KV3WpWm7
Threelogy Coffee Mojopahit https://maps.app.goo.gl/3gxNCJg2kuGB2FXbA
Sambang Cafe & Eatery https://maps.app.goo.gl/XV7zsaiRPiFRXa9AA
Djavahaus Coffee & Eatery https://maps.app.goo.gl/ovVRQRwrAiXsb3p2A
Firstfl oor Coffeehttps://maps.app.goo.gl/kufrhvJf1353uoZ87
Sby Barat
The Library Coffee & Pastries https://maps.app.goo.gl/AafKwaSTPwsKNxQz7
Kudos Cafe https://maps.app.goo.gl/f3fLmx3akeLANPmz8
Alura Coffee https://maps.app.goo.gl/v3TkzK81nyi1f7tG9
Brew and Else https://maps.app.goo.gl/poeqHR7x3ikcKuwA9
DeMandailing Cafe https://maps.app.goo.gl/WRtwrhjK2VznkYZX9
Gatherinc Bistro and Bakery https://maps.app.goo.gl/g8G475rFMFmj5XG37
HUE Coffee https://maps.app.goo.gl/1RrUSNww14rj5GjV6
Pause Coffee https://maps.app.goo.gl/BCJi6Ku545GE489XA
Bagi Kopi Citraland https://maps.app.goo.gl/WTeaNE8ueXaCygUz7
Senses https://maps.app.goo.gl/Aus5giJpCLvuhnDe6
Bar/Club
Sby Timur
Old Wood Bistro & Bar https://maps.app.goo.gl/ZVUaSYW12Tp7oRHm6
Shelter Club Surabaya https://maps.app.goo.gl/6jebhXpN75ZjDMQD9
STADIUM https://maps.app.goo.gl/ZsHxiFJXkjzkXg3n7
Dining Club https://maps.app.goo.gl/zep42KXci7UZvSEG9
Helen’s Night https://maps.app.goo.gl/eRkM4gK5BxtsK5go7
Camden https://maps.app.goo.gl/bxZ9PCCrvhUkDvdP8
Sby Utara
KANTOR Club https://maps.app.goo.gl/D4g86KFZhupKfs9a6
Alcatraz JMP https://maps.app.goo.gl/AAqFPJpEpM11cyxH6
N’Club https://maps.app.goo.gl/T9aEzS4ZB9xEanDX7
Sby Selatan
Club 360 Surabaya https://maps.app.goo.gl/sMSbNMyHL55KBFjJ8
Fortytwo https://maps.app.goo.gl/NCDJGbrPB2KtbzjD9
BV Luxury Club https://maps.app.goo.gl/oW7uRMoF9CtXB9Aj8
Alexa Club https://maps.app.goo.gl/sV7oA2RYSELRJsbb7
Sby Pusat
Ambyar Superclub Basra Surabaya https://maps.app.goo.gl/hRuiSd81QEq9R5HV8
KOWLOON (Crave & Groove) https://maps.app.goo.gl/zuSYyjAM3yS9ocgB8
IBIZA club surabaya https://maps.app.goo.gl/SViKTKPFRBn7bEQa6
Top Ten Club Coyote Bar https://maps.app.goo.gl/6Ke8NwCuuAuKXeHw7
TRIBES Bar & Lounge https://maps.app.goo.gl/jE5vUUKPS5zR2FY69
Mantis Bar & Lounge https://maps.app.goo.gl/X4H6y3DqjbFyjHqR9
VALHALLA Spectaclub https://maps.app.goo.gl/osXFpUeFe891YJfE6
Club Deluxe Surabaya https://maps.app.goo.gl/zFSTtj29V7521DVv6
Club Stasiun Surabaya https://maps.app.goo.gl/RvAzZE9EZSbyysj97
Black Owl https://maps.app.goo.gl/9aDiBWEhzSJYZHfH7
Sby Barat
Blackhole KTV https://maps.app.goo.gl/Je2BYHN27Z2JfRJX6
The Avenue Lounge Barhttps://maps.app.goo.gl/3RmARXBFjHNG1wJw8
XIXI KTV & Lounge https://maps.app.goo.gl/63EP9fAtxPoPpoSe7
Soiree Rooftop Bar Surabaya https://maps.app.goo.gl/xPVQ5bDJG2ua6rTX8
Meduza Surabayahttps://maps.app.goo.gl/6UjX9ha6xesHhti2A
W Superclub https://maps.app.goo.gl/GQCmbMB5Un6hYtGGA
DATA;

$lines = explode("\n", $data);
$currentCategory = 'resto-cafe';
$currentRegencyId = null;

$regencies = [
    'Sby Timur' => Regency::where('name', 'Surabaya Timur')->value('id'),
    'Sby Utara' => Regency::where('name', 'Surabaya Utara')->value('id'),
    'Sby Selatan' => Regency::where('name', 'Surabaya Selatan')->value('id'),
    'Sby Pusat' => Regency::where('name', 'Surabaya Tengah')->value('id'),
    'Sby Barat' => Regency::where('name', 'Surabaya Barat')->value('id'),
];

$count = 0;

foreach ($lines as $line) {
    $line = trim($line);
    if (empty($line)) continue;

    if (in_array($line, ['Resto', 'Cafe', 'Bar/Club'])) {
        if ($line == 'Resto' || $line == 'Cafe') {
            $currentCategory = 'resto-cafe';
        } else {
            $currentCategory = 'bar-club';
        }
        continue;
    }

    if (array_key_exists($line, $regencies)) {
        $currentRegencyId = $regencies[$line];
        continue;
    }

    $pos = strpos($line, 'http');
    if ($pos !== false) {
        $name = trim(substr($line, 0, $pos));
        $url = trim(substr($line, $pos));
        
        if (preg_match('/(https?:\/\/[^\s\]\)]+)/', $url, $matches)) {
            $url = $matches[1];
        }
        
        $slug = Str::slug($name);
        
        $existing = Culinary::where('slug', $slug)->first();
        if (!$existing) {
            Culinary::create([
                'regency_id' => $currentRegencyId,
                'category' => $currentCategory,
                'name' => $name,
                'slug' => $slug,
                'maps_url' => $url,
                'souvenir' => false,
                'reservation_required' => false
            ]);
            $count++;
        } else {
            $existing->update([
                'maps_url' => $url,
                'regency_id' => $currentRegencyId,
                'category' => $currentCategory
            ]);
            $count++;
        }
    }
}

echo "Successfully imported $count culinaries.";
