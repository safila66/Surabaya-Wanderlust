<?php
$pagesDir = 'C:\laragon\www\nusaexplore\app\Filament\Resources';
$directories = ['TravelGuides', 'PrayerPlaces', 'Transportations', 'TransitStops', 'Cultures'];

foreach ($directories as $dir) {
    $path = $pagesDir . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . 'Pages';
    if (!is_dir($path)) continue;
    $files = glob($path . '/*.php');
    
    foreach ($files as $file) {
        $content = file_get_contents($file);
        
        // Skip List pages
        if (strpos($file, 'List') !== false) {
            continue;
        }

        // Check if getRedirectUrl is already there
        if (strpos($content, 'function getRedirectUrl') === false) {
            $replacement = "\n    protected function getRedirectUrl(): string\n    {\n        return \->getResource()::getUrl('index');\n    }\n}\n";
            $content = preg_replace('/\}\s*$/', $replacement, $content);
            file_put_contents($file, $content);
        }
    }
}
