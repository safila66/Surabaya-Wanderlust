<?php
$pagesDir = 'C:\laragon\www\nusaexplore\app\Filament\Resources';
$directories = ['Culinaries', 'Destinations', 'Accommodations'];

foreach ($directories as $dir) {
    $path = $pagesDir . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . 'Pages';
    $files = glob($path . '/*.php');
    
    foreach ($files as $file) {
        $content = file_get_contents($file);
        
        // Skip List pages
        if (strpos($file, 'List') !== false) {
            continue;
        }

        // Check if getRedirectUrl is already there
        if (strpos($content, 'function getRedirectUrl') === false) {
            // Find the last closing brace and insert the method right before it
            $replacement = "\n    protected function getRedirectUrl(): string\n    {\n        return \->getResource()::getUrl('index');\n    }\n}\n";
            $content = preg_replace('/\}\s*$/', $replacement, $content);
            file_put_contents($file, $content);
        }
    }
}
echo 'Pages updated successfully.';
