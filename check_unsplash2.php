<?php
$regionImages = [
    'north-surabaya'   => 'https://images.unsplash.com/photo-1598894010870-c91d5d766e5d?w=800&q=80',
    'south-surabaya'   => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800&q=80',
    'east-surabaya'    => 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?w=800&q=80',
    'west-surabaya'    => 'https://images.unsplash.com/photo-1549473889-14f410d83298?w=800&q=80',
    'central-surabaya' => 'https://images.unsplash.com/photo-1580397581145-cdb6a35b7d3f?w=800&q=80',
];
foreach($regionImages as $name => $url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    echo "[$code] $name: $url\n";
}
