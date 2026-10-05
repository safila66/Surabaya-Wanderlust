<?php
$db = new PDO('mysql:host=127.0.0.1;dbname=nusaexplore;port=3306', 'root', '');
$stmt = $db->query("SELECT id, name, image FROM destinations WHERE name IN ('Monumen kapal selam', 'Tugu Pahlawan', 'Surabaya North Quay')");
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
