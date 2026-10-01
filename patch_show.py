import re

file_path = r'C:\laragon\www\nusaexplore\resources\views\regions\show.blade.php'
with open(file_path, 'r', encoding='utf-8') as f:
    content = f.read()

# Fix image handling in all sections
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

culture_section = r'''
{{-- 🎭 CULTURE 🎭 --}}
<section class="section" id="culture">
    <div class="container-main" style="padding: 0 7%; max-width:1240px; margin:auto;">
        <div class="section-heading">
            <div>
                <div class="section-kicker">🎭 Heritage</div>
                <h2 class="section-title-text" style="font-size:28px;">Culture</h2>
                <p class="section-sub">Historical sites, heritage, and local traditions.</p>
            </div>
            <a href="{{ route('regions.category', [$slug, 'culture']) }}" class="see-all-link">See all &rarr;</a>
        </div>

        @if($culture->count())
            <div class="grid-auto">
                @foreach($culture->take(6) as $item)
                    <div class="item-card">
                        @php $imgUrl = $item->image ?? null; @endphp
                        @if($imgUrl)
                            <div style="overflow:hidden; height:195px;">
                                @if(Str::startsWith($imgUrl, ['http://', 'https://']))
                                    <img src="{{ $imgUrl }}" alt="{{ $item->name ?? $item->title }}" class="item-image">
                                @else
                                    <img src="{{ asset('storage/' . $imgUrl) }}" alt="{{ $item->name ?? $item->title }}" class="item-image">
                                @endif
                            </div>
                        @else
                            <div class="card-img-placeholder">🎭</div>
                        @endif
                        <div class="item-info">
                            <h3>{{ $item->name ?? $item->title }}</h3>
                            <p>{{ Str::limit($item->description, 85) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div class="empty-state-icon">🎭</div>
                <h3>No culture found</h3>
                <p>Data belum tersedia di region ini.</p>
            </div>
        @endif
    </div>
</section>

'''

if 'id="culture"' not in content:
    # Insert before Prayer Places
    content = content.replace('{{-- 🕌 PRAYER PLACES 🕌 --}}', culture_section + '{{-- 🕌 PRAYER PLACES 🕌 --}}')

with open(file_path, 'w', encoding='utf-8') as f:
    f.write(content)
