<?php
$pagesDir = 'C:\laragon\www\nusaexplore\app\Filament\Resources';
$directories = ['Culinaries', 'Destinations', 'Accommodations'];

foreach ($directories as $dir) {
    $path = $pagesDir . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . 'Pages';
    $files = glob($path . '/*.php');
    
    foreach ($files as $file) {
        $content = file_get_contents($file);
        $content = str_replace('return \->getResource()::getUrl(\'index\');', 'return $this->getResource()::getUrl(\'index\');', $content);
        file_put_contents($file, $content);
    }
}
