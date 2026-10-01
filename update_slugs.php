<?php
$files = [
    'C:\laragon\www\nusaexplore\app\Filament\Resources\Culinaries\Schemas\CulinaryForm.php',
    'C:\laragon\www\nusaexplore\app\Filament\Resources\Accommodations\Schemas\AccommodationForm.php',
    'C:\laragon\www\nusaexplore\app\Filament\Resources\Destinations\Schemas\DestinationForm.php'
];

$oldText = "TextInput::make('name')->required(),\n                    TextInput::make('slug')->required(),";
$newText = "TextInput::make('name')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (string $operation, $state, \Filament\Forms\Set $set) => $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null),
                    TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true),";

foreach ($files as $file) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        // Sometimes line endings differ, let's use regex
        $content = preg_replace('/TextInput::make\(\'name\'\)->required\(\),\s*TextInput::make\(\'slug\'\)->required\(\),/', $newText, $content);
        file_put_contents($file, $content);
    }
}
echo 'Replaced successfully.';
