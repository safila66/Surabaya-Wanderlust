<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $meta['label'] }} in {{ $regionName }} — Surabaya Wanderlust</title>
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <script>
        (function () {
            const t = localStorage.getItem('sw-theme') || 'dark';
            document.documentElement.setAttribute('data-theme', t);
        })();
    </script>
</head>
<body>

@include('partials.navbar')

{{-- ── HERO ──────────────────────────────────────────────── --}}
<section class="page-hero" style="min-height:360px;">
    <div class="page-hero-bg" style="background-image: url('https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?auto=format&fit=crop&w=2000&q=90');"></div>
    <div class="page-hero-overlay"></div>
    <div class="page-hero-content">

        {{-- Breadcrumb --}}
        <ul class="breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('regions.show', $slug) }}">{{ $regionName }}</a></li>
            <li>{{ $meta['label'] }}</li>
        </ul>

        <span class="page-hero-kicker">{{ $meta['icon'] }} {{ $regionName }}</span>
        <h1 class="page-hero-title">{{ $meta['label'] }}</h1>
        <p class="page-hero-desc">{{ $meta['desc'] }}</p>
    </div>
</section>


{{-- ── OTHER CATEGORIES ─────────────────────────────────── --}}
<section class="section" style="padding-bottom: 0;">
    <div style="max-width:1240px; margin:auto; padding:0 7%;">
        <p style="font-size:12px; font-weight:700; letter-spacing:2px; color:var(--text-muted); text-transform:uppercase; margin-bottom:16px;">Other Categories</p>
        <div class="cat-scroll">
            @foreach($categories as $slug_cat => $cat)
                <a href="{{ route('regions.category', [$slug, $slug_cat]) }}"
                   class="cat-btn {{ $category === $slug_cat ? 'cat-btn-active' : '' }}">
                    <div class="cat-icon">{{ $cat['icon'] }}</div>
                    <div class="cat-name">{{ $cat['label'] }}</div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<style>
    .cat-btn-active {
        background: var(--gold-light) !important;
        border-color: var(--gold-border) !important;
    }
    .cat-btn-active .cat-name {
        color: var(--gold) !important;
    }
</style>


{{-- ── ITEMS LIST ────────────────────────────────────────── --}}
<section class="section">
    <div style="max-width:1240px; margin:auto; padding:0 7%;">

        <div class="section-heading" style="margin-bottom:32px;">
            <div>
                <div class="section-kicker">{{ $meta['icon'] }} {{ $meta['label'] }}</div>
                <h2 class="section-title-text">{{ $meta['label'] }} in {{ $regionName }}</h2>
                <p class="section-sub">{{ $meta['desc'] }}</p>
            </div>
            <span class="badge badge-gold">{{ $items->count() }} found</span>
        </div>

        @if($items->count())
            <div class="grid-auto">
                @foreach($items as $item)

                    @php
                        // Resolve URL based on category
                        $url = '#';
                        $target = '';
                        if ($category === 'entertainment' && isset($item->slug)) {
                            $url = route('destinations.show', $item->slug);
                        } elseif (($category === 'resto-cafe' || $category === 'bar-club') && isset($item->slug)) {
                            $url = route('culinary.show', $item->slug);
                        } elseif ($category === 'accommodation' && isset($item->slug)) {
                            $url = route('accommodations.show', $item->slug);
                        } elseif ($category === 'transport') {
                            $url = $item->ticket_url ?? '#';
                            if ($url !== '#') $target = 'target="_blank"';
                        }

                        // Resolve image (pakai gambar default bila belum diupload)
                        $defaults = [
                            'entertainment' => 'images/destination-default.jpg',
                            'resto-cafe'    => \App\Support\CulinaryImage::CAFE_RESTO,
                            'bar-club'      => \App\Support\CulinaryImage::BAR_CLUB,
                            'accommodation' => 'images/accommodation-default.jpg',
                        ];
                        $rawImg = (isset($item->images) ? $item->images->first()?->image : null) ?: ($item->image ?? null);
                        $imgUrl = \App\Support\Media::url($rawImg, $defaults[$category] ?? null);

                        // Placeholder emoji
                        $emojis = [
                            'entertainment'  => '🏛️',
                            'resto-cafe'     => '🍜',
                            'accommodation'  => '🏨',
                            'transport'      => '🚌',
                            'bar-club'       => '🍸',
                            'prayer-places'  => '🕌',
                        ];
                        $emoji = $emojis[$category] ?? '📍';
                    @endphp

                    <a href="{{ $url }}" {!! $target !!} class="item-card">
                        @if($imgUrl)
                            <div style="overflow:hidden; height:210px;">
                                <img src="{{ $imgUrl }}" alt="{{ $item->name }}" class="item-image">
                            </div>
                        @else
                            <div class="card-img-placeholder" style="height:210px; font-size:48px;">{{ $emoji }}</div>
                        @endif

                        <div class="item-info">
                            <h3>{{ $item->name }}</h3>
                            <p>{{ Str::limit($item->description ?? '', 100) }}</p>

                            @if(isset($item->price_range) && $item->price_range)
                                <div style="margin-top:12px; display:inline-flex; align-items:center; gap:5px; font-size:12px; font-weight:600; color:var(--teal);">
                                    <i class="fa-solid fa-tag fa-xs"></i>
                                    {{ $item->price_range }}
                                </div>
                            @endif
                                                        @if($category === 'accommodation')
                                <div style="margin-top: 15px; display: flex; gap: 8px; flex-wrap: wrap;">
                                    @if(isset($item->booking_url) && $item->booking_url)
                                        <a href="{{ $item->booking_url }}" target="_blank" class="btn-primary" style="background: #00B14F; color: white; border-radius: 999px; padding: 6px 14px; font-size: 11px; text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">
                                            🏨 Book Traveloka/Agoda
                                        </a>
                                    @endif
                                    @if(isset($item->official_url) && $item->official_url)
                                        <a href="{{ $item->official_url }}" target="_blank" class="btn-primary" style="background: var(--gold); color: white; border-radius: 999px; padding: 6px 14px; font-size: 11px; text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">
                                            🌐 Web Resmi
                                        </a>
                                    @endif
                                </div>
                            @endif

                            @if(isset($item->ticket_price) && $item->ticket_price)
                                <div style="margin-top:12px; display:inline-flex; align-items:center; gap:5px; font-size:12px; font-weight:600; color:var(--teal);">
                                    <i class="fa-solid fa-ticket fa-xs"></i>
                                    {{ $item->ticket_price }}
                                </div>
                            @endif
                        </div>
                    </a>

                @endforeach
            </div>

        @else

            <div class="empty-state">
                <div class="empty-state-icon">{{ $meta['icon'] }}</div>
                <h3>No {{ strtolower($meta['label']) }} found</h3>
                <p>Data belum tersedia untuk kategori ini di {{ $regionName }}.</p>
                <a href="{{ route('regions.show', $slug) }}" class="btn-outline" style="margin-top:24px; display:inline-flex;">
                    ← Back to {{ $regionName }}
                </a>
            </div>

        @endif

    </div>
</section>


@include('partials.footer')

</body>
</html>
