<?php
$db = new PDO('mysql:host=127.0.0.1;dbname=nusaexplore;port=3306', 'root', '');

$destImageUpdates = [
    3 => 'https://images.unsplash.com/photo-1534567153574-2b12153a87f0?w=800&q=80', // zoo/animals
    4 => 'https://images.unsplash.com/photo-1550060594-1a91e57c66cb?w=800&q=80', // bamboo forest
    6 => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800&q=80', // mosque
    7 => 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?w=800&q=80', // temple
    8 => 'https://images.unsplash.com/photo-1545642531-1554c9354921?w=800&q=80', // bridge
    9 => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=800&q=80', // beach
    10 => 'https://images.unsplash.com/photo-1568699920775-d28a4fe18078?w=800&q=80', // old town
    11 => 'https://images.unsplash.com/photo-1568699920775-d28a4fe18078?w=800&q=80', // kembang jepun
    12 => 'https://images.unsplash.com/photo-1551522435-a13afa10f103?w=800&q=80', // museum
    13 => 'https://images.unsplash.com/photo-1598894010870-c91d5d766e5d?w=800&q=80', // jembatan merah
    14 => 'https://images.unsplash.com/photo-1508669232496-137b159c1cdb?w=800&q=80', // pos bloc
    15 => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&q=80', // pasar pabean
    16 => 'https://images.unsplash.com/photo-1599839619722-39751411ea63?w=800&q=80', // benteng
    17 => 'https://images.unsplash.com/photo-1580397581145-cdb6a35b7d3f?w=800&q=80', // monjaya
    18 => 'https://images.unsplash.com/photo-1506509939523-26fb71b86b46?w=800&q=80', // kenjeran park
];

$stmt = $db->prepare("UPDATE destinations SET image = ? WHERE id = ?");
$updated = 0;
foreach ($destImageUpdates as $id => $url) {
    $stmt->execute([$url, $id]);
    $updated++;
}

echo "Updated $updated destination images to Unsplash URLs." . PHP_EOL;

// Update location of ID 13 to Surabaya Pusat
$db->exec("UPDATE destinations SET location = 'Surabaya Pusat' WHERE id = 13");
echo "Updated location for ID 13" . PHP_EOL;
