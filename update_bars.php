<?php
$db = new PDO('mysql:host=127.0.0.1;dbname=nusaexplore;port=3306', 'root', '');

// Get all bar-club ids
$stmt = $db->query("SELECT id FROM culinaries WHERE category = 'bar-club'");
$ids = $stmt->fetchAll(PDO::FETCH_COLUMN);

$locations = ['Surabaya Pusat', 'Surabaya Barat', 'Surabaya Selatan', 'Surabaya Timur', 'Surabaya Utara'];

$stmt = $db->prepare("UPDATE culinaries SET location = ? WHERE id = ?");

$count = 0;
foreach ($ids as $index => $id) {
    $loc = $locations[$index % count($locations)];
    $stmt->execute([$loc, $id]);
    $count++;
}

echo "Updated $count bar-club locations." . PHP_EOL;
