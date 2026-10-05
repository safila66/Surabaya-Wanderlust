<?php
$db = new PDO('mysql:host=127.0.0.1;dbname=nusaexplore;port=3306', 'root', '');

$regencyId = 329; // Surabaya

$transports = [
    [
        'name' => 'Gojek',
        'type' => 'Ride-hailing',
        'description' => 'Aplikasi ojek online dan taksi online untuk keliling Surabaya dengan mudah.',
        'ticket_url' => 'https://www.gojek.com/', // Or deep link if available, but web is safe
        'image' => 'https://images.unsplash.com/photo-1549315053-5d5194eb38e8?w=800&q=80', // Replace with proper image later if needed, or leave null for emoji
    ],
    [
        'name' => 'Grab',
        'type' => 'Ride-hailing',
        'description' => 'Layanan transportasi online Grab untuk perjalanan aman dan nyaman.',
        'ticket_url' => 'https://www.grab.com/id/',
        'image' => 'https://images.unsplash.com/photo-1563200788-29ec3e5bc351?w=800&q=80',
    ],
    [
        'name' => 'Maxim',
        'type' => 'Ride-hailing',
        'description' => 'Alternatif transportasi online yang lebih terjangkau di Surabaya.',
        'ticket_url' => 'https://id.taximaxim.com/',
        'image' => 'https://images.unsplash.com/photo-1611416517780-eff3a13b0359?w=800&q=80',
    ],
    [
        'name' => 'Green SM',
        'type' => 'Ride-hailing',
        'description' => 'Transportasi ramah lingkungan dengan mobil listrik di Surabaya.',
        'ticket_url' => 'https://www.xanhsm.com/id/',
        'image' => 'https://images.unsplash.com/photo-1593941707882-a5bba14938c7?w=800&q=80',
    ],
    [
        'name' => 'Suroboyo Bus',
        'type' => 'Public Transport',
        'description' => 'Bus kota Surabaya yang nyaman. Bayar bisa pakai botol plastik atau e-money.',
        'ticket_url' => 'https://play.google.com/store/apps/details?id=go.surabaya.gobus',
        'image' => 'https://images.unsplash.com/photo-1570125909232-eb263c188f7e?w=800&q=80',
    ],
    [
        'name' => 'Wira Wiri Suroboyo',
        'type' => 'Public Transport',
        'description' => 'Feeder angkutan pengumpan yang menjangkau area permukiman Surabaya.',
        'ticket_url' => 'https://play.google.com/store/apps/details?id=go.surabaya.gobus',
        'image' => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=800&q=80',
    ]
];

$stmt = $db->prepare("INSERT INTO transportations (regency_id, name, type, description, ticket_url, image) VALUES (?, ?, ?, ?, ?, ?)");

foreach ($transports as $t) {
    // Check if exists
    $check = $db->prepare("SELECT id FROM transportations WHERE name = ?");
    $check->execute([$t['name']]);
    if (!$check->fetch()) {
        $stmt->execute([
            $regencyId, 
            $t['name'], 
            $t['type'], 
            $t['description'], 
            $t['ticket_url'], 
            $t['image']
        ]);
        echo "Inserted {$t['name']}" . PHP_EOL;
    } else {
        echo "{$t['name']} already exists." . PHP_EOL;
    }
}
