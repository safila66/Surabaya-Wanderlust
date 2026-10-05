<?php
$db = new PDO('mysql:host=127.0.0.1;dbname=nusaexplore;port=3306', 'root', '');

$tables = ['destinations', 'culinaries', 'accommodations', 'prayer_places', 'cultures'];

foreach ($tables as $table) {
    echo "--- $table ---" . PHP_EOL;
    $stmt = $db->query("SELECT location, COUNT(*) as cnt FROM $table GROUP BY location");
    foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $r) {
        echo ($r['location'] ?? 'NULL') . ": " . $r['cnt'] . PHP_EOL;
    }
}
