<?php
$files = [
    'C:\laragon\www\nusaexplore\app\Filament\Resources\Culinaries\Schemas\CulinaryForm.php',
    'C:\laragon\www\nusaexplore\app\Filament\Resources\Accommodations\Schemas\AccommodationForm.php',
    'C:\laragon\www\nusaexplore\app\Filament\Resources\Destinations\Schemas\DestinationForm.php'
];

$oldSelectPriceRange = "Select::make('price_range')
                        ->options([
                            'Gratis' => 'Gratis',
                            'Di bawah Rp 25.000' => 'Di bawah Rp 25.000',
                            'Rp 25.000 - Rp 50.000' => 'Rp 25.000 - Rp 50.000',
                            'Rp 50.000 - Rp 100.000' => 'Rp 50.000 - Rp 100.000',
                            'Rp 100.000 - Rp 250.000' => 'Rp 100.000 - Rp 250.000',
                            'Rp 250.000 - Rp 500.000' => 'Rp 250.000 - Rp 500.000',
                            'Rp 500.000 - Rp 1.000.000' => 'Rp 500.000 - Rp 1.000.000',
                            'Di atas Rp 1.000.000' => 'Di atas Rp 1.000.000',
                            'Bervariasi' => 'Bervariasi',
                        ])
                        ->searchable()";

$newInputPriceRange = "TextInput::make('price_range')
                        ->datalist([
                            'Gratis',
                            'Di bawah Rp 25.000',
                            'Rp 25.000 - Rp 50.000',
                            'Rp 50.000 - Rp 100.000',
                            'Rp 100.000 - Rp 250.000',
                            'Rp 250.000 - Rp 500.000',
                            'Rp 500.000 - Rp 1.000.000',
                            'Di atas Rp 1.000.000',
                            'Bervariasi',
                        ])";

$oldSelectTicketPrice = "Select::make('ticket_price')
                        ->options([
                            'Gratis' => 'Gratis',
                            'Di bawah Rp 25.000' => 'Di bawah Rp 25.000',
                            'Rp 25.000 - Rp 50.000' => 'Rp 25.000 - Rp 50.000',
                            'Rp 50.000 - Rp 100.000' => 'Rp 50.000 - Rp 100.000',
                            'Rp 100.000 - Rp 250.000' => 'Rp 100.000 - Rp 250.000',
                            'Rp 250.000 - Rp 500.000' => 'Rp 250.000 - Rp 500.000',
                            'Rp 500.000 - Rp 1.000.000' => 'Rp 500.000 - Rp 1.000.000',
                            'Di atas Rp 1.000.000' => 'Di atas Rp 1.000.000',
                            'Bervariasi' => 'Bervariasi',
                        ])
                        ->searchable()";

$newInputTicketPrice = "TextInput::make('ticket_price')
                        ->datalist([
                            'Gratis',
                            'Di bawah Rp 25.000',
                            'Rp 25.000 - Rp 50.000',
                            'Rp 50.000 - Rp 100.000',
                            'Rp 100.000 - Rp 250.000',
                            'Rp 250.000 - Rp 500.000',
                            'Rp 500.000 - Rp 1.000.000',
                            'Di atas Rp 1.000.000',
                            'Bervariasi',
                        ])";

foreach ($files as $file) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        $content = str_replace($oldSelectPriceRange, $newInputPriceRange, $content);
        $content = str_replace($oldSelectTicketPrice, $newInputTicketPrice, $content);
        file_put_contents($file, $content);
    }
}
echo 'Replaced successfully.';
