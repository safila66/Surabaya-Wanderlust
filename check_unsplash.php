<?php
$db = new PDO('mysql:host=127.0.0.1;dbname=nusaexplore;port=3306', 'root', '');
$stmt = $db->query("SELECT id, name, image FROM destinations WHERE image LIKE 'https://images.unsplash.com%'");
foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $r) {
    $url = $r['image'];
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    echo "[$code] " . $r['name'] . ": " . $url . "\n";
}
