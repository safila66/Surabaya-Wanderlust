<?php
$db = new PDO('mysql:host=127.0.0.1;dbname=nusaexplore;port=3306', 'root', '');

$stmt = $db->query("SELECT id, image FROM destinations WHERE image LIKE 'https://images.unsplash.com%'");
foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $r) {
    $url = $r['image'];
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($code == 404) {
        $newUrl = "https://picsum.photos/seed/dest_{$r['id']}/800/600";
        $db->exec("UPDATE destinations SET image = '$newUrl' WHERE id = {$r['id']}");
        echo "Updated destination {$r['id']} to $newUrl\n";
    }
}

$stmt = $db->query("SELECT id, image FROM cultures WHERE image LIKE 'https://images.unsplash.com%'");
foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $r) {
    $url = $r['image'];
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($code == 404) {
        $newUrl = "https://picsum.photos/seed/cult_{$r['id']}/800/600";
        $db->exec("UPDATE cultures SET image = '$newUrl' WHERE id = {$r['id']}");
        echo "Updated culture {$r['id']} to $newUrl\n";
    }
}
