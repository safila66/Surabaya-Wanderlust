import re

file_path = r'C:\laragon\www\nusaexplore\resources\views\regions\category.blade.php'
with open(file_path, 'r', encoding='utf-8') as f:
    content = f.read()

# Fix image handling
pattern = re.compile(
    r'@if\(\$imgUrl\)[\s\r\n]+<div style="overflow:hidden; height:195px;">[\s\r\n]+<img src="\{\{ (?:asset\(\'storage/\' \. )?\$imgUrl[\)]? \}\}" alt="\{\{ \$item->name \}\}" class="item-image">[\s\r\n]+</div>[\s\r\n]+@else|'
    r'@if\(\$item->image \?\? null\)[\s\r\n]+<div style="overflow:hidden; height:195px;">[\s\r\n]+<img src="\{\{ asset\(\'storage/\' \. \$item->image\) \}\}" alt="\{\{ \$item->name \}\}" class="item-image">[\s\r\n]+</div>[\s\r\n]+@else',
    re.DOTALL
)

replacement = r'''@php $imgUrl = $item->image ?? null; @endphp
                        @if($imgUrl)
                            <div style="overflow:hidden; height:195px;">
                                @if(Str::startsWith($imgUrl, ['http://', 'https://']))
                                    <img src="{{ $imgUrl }}" alt="{{ $item->name }}" class="item-image">
                                @else
                                    <img src="{{ asset('storage/' . $imgUrl) }}" alt="{{ $item->name }}" class="item-image">
                                @endif
                            </div>
                        @else'''

content = pattern.sub(replacement, content)

with open(file_path, 'w', encoding='utf-8') as f:
    f.write(content)
