<?php
$db = new PDO('mysql:host=127.0.0.1;dbname=nusaexplore;port=3306', 'root', '');
$stmt = $db->query("DESCRIBE transportations");
foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $r) {
    echo $r['Field'] . PHP_EOL;
}
