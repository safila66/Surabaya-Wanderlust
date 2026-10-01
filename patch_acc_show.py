import re

file_path = r'C:\laragon\www\nusaexplore\resources\views\accommodations\show.blade.php'
with open(file_path, 'r', encoding='utf-8') as f:
    content = f.read()

# Replace @forelse($accommodation->images as $image) with a safe array
replacement = r'''@php
            $galleryImages = method_exists($accommodation, 'images') ? $accommodation->images : ($accommodation->image ? [ (object)['image' => $accommodation->image, 'caption' => null] ] : []);
        @endphp
        @forelse($galleryImages as $image)'''

content = content.replace('@forelse($accommodation->images as $image)', replacement)

with open(file_path, 'w', encoding='utf-8') as f:
    f.write(content)
