<?php
$db = new PDO('mysql:host=127.0.0.1;dbname=nusaexplore;port=3306', 'root', '');
$db->exec("UPDATE culinaries SET regency_id = 329");
echo "Updated culinaries regency_id to 329.\n";
