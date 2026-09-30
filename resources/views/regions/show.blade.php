<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $regionName }} — Surabaya Wanderlust</title>
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* Apply saved theme before render to prevent flash */
        html[data-theme="light"] { --bg-primary: #e8f4fd; }
    </style>

    <script>
        // Apply theme immediately to prevent FOUC
        (function () {
            const t = localStorage.getItem('sw-theme') || 'dark';
            document.documentElement.setAttribute('data-theme', t);
        })();
    </script>
</head>
<body>

@include('partials.navbar')

{{-- ── HERO ──────────────────────────────────────────────── --}}
<section class="page-hero">
    <div class="page-hero-bg" style="background-image: url('https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?auto=format&fit=crop&w=2000&q=90');"></div>
    <div class="page-hero-overlay"></div>
    <div class="page-hero-content">
        <span class="page-hero-kicker">✦ Regional Guide</span>
        <h1 class="page-hero-title">{{ $regionName }}</h1>
        <p class="page-hero-desc">
            Discover the best entertainment, dining, accommodation, transport, and more in {{ $regionName }}.
        </p>
    </div>
</section>


{{-- ── CATEGORIES ────────────────────────────────────────── --}}
<section class="section" style="padding-bottom: 0;">
    <div class="container-main" style="padding: 0 7%; max-width:1240px; margin:auto;">

        <div class="section-kicker">Browse by Category</div>
        <h2 class="section-title-text" style="margin-bottom:24px;">What are you looking for?</h2>

        <div class="cat-scroll">
            @foreach($categories as $slug_cat => $cat)
                <a href="{{ route('regions.category', [$slug, $slug_cat]) }}" class="cat-btn">
                    <div class="cat-icon">{{ $cat['icon'] }}</div>
                    <div class="cat-name">{{ $cat['label'] }}</div>
                </a>
            @endforeach
        </div>

    </div>
</section>


{{-- ── ENTERTAINMENT ─────────────────────────────────────── --}}
<section class="section" id="entertainment">
    <div class="container-main" style="padding: 0 7%; max-width:1240px; margin:auto;">
        <div class="section-heading">
            <div>
                <div class="section-kicker">🎢 Entertainment</div>
                <h2 class="section-title-text" style="font-size:28px;">Destinations &amp; Activities</h2>
                <p class="section-sub">Find the best places to have fun in {{ $regionName }}.</p>
            </div>
            <a href="{{ route('regions.category', [$slug, 'entertainment']) }}" class="see-all-link">See all →</a>
        </div>

        @if($entertainment->count())
            <div class="grid-auto">
                @foreach($entertainment->take(6) as $item)
                    <a href="{{ route('destinations.show', $item->slug ?? '#') }}" class="item-card">
                        @if($item->images->first()?->image_url ?? null)
                            <div style="overflow:hidden; height:195px;">
                                <img src="{{ $item->images->first()->image_url }}" alt="{{ $item->name }}" class="item-image">
                            </div>
                        @elseif($item->image ?? null)
                            <div style="overflow:hidden; height:195px;">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="item-image">
                            </div>
                        @else
                            <div class="card-img-placeholder">🏛️</div>
                        @endif
                        <div class="item-info">
                            <h3>{{ $item->name }}</h3>
                            <p>{{ Str::limit($item->description, 85) }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div class="empty-state-icon">🎢</div>
                <h3>No entertainment found</h3>
                <p>Data belum tersedia di region ini.</p>
            </div>
        @endif
    </div>
</section>


{{-- ── RESTO & CAFE ──────────────────────────────────────── --}}
<section class="section section-alt" id="resto-cafe">
    <div class="container-main" style="padding: 0 7%; max-width:1240px; margin:auto;">
        <div class="section-heading">
            <div>
                <div class="section-kicker">☕ Culinary</div>
                <h2 class="section-title-text" style="font-size:28px;">Resto &amp; Cafe</h2>
                <p class="section-sub">Best dining spots and cozy cafes.</p>
            </div>
            <a href="{{ route('regions.category', [$slug, 'resto-cafe']) }}" class="see-all-link">See all →</a>
        </div>

        @if($restoCafe->count())
            <div class="grid-auto">
                @foreach($restoCafe->take(6) as $item)
                    <a href="{{ route('culinary.show', $item->slug ?? '#') }}" class="item-card">
                        @if($item->images->first()?->image_url ?? null)
                            <div style="overflow:hidden; height:195px;">
                                <img src="{{ $item->images->first()->image_url }}" alt="{{ $item->name }}" class="item-image">
                            </div>
                        @elseif($item->image ?? null)
                            <div style="overflow:hidden; height:195px;">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="item-image">
                            </div>
                        @else
                            <div class="card-img-placeholder">🍜</div>
                        @endif
                        <div class="item-info">
                            <h3>{{ $item->name }}</h3>
                            <p>{{ Str::limit($item->description, 85) }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div class="empty-state-icon">☕</div>
                <h3>No culinary found</h3>
                <p>Data belum tersedia di region ini.</p>
            </div>
        @endif
    </div>
</section>


{{-- ── ACCOMMODATION ─────────────────────────────────────── --}}
<section class="section" id="accommodation">
    <div class="container-main" style="padding: 0 7%; max-width:1240px; margin:auto;">
        <div class="section-heading">
            <div>
                <div class="section-kicker">🏨 Stay</div>
                <h2 class="section-title-text" style="font-size:28px;">Accommodation</h2>
                <p class="section-sub">Hotels, guesthouses, and more.</p>
            </div>
            <a href="{{ route('regions.category', [$slug, 'accommodation']) }}" class="see-all-link">See all →</a>
        </div>

        @if($accommodations->count())
            <div class="grid-auto">
                @foreach($accommodations->take(6) as $item)
                    <div class="item-card">
                        @php $imgUrl = $item->image ?? null; @endphp
                        @if($imgUrl)
                            <div style="overflow:hidden; height:195px;">
                                <img src="{{ $imgUrl }}" alt="{{ $item->name }}" class="item-image">
                            </div>
                        @else
                            <div class="card-img-placeholder">🏨</div>
                        @endif
                        <div class="item-info">
                            <h3>{{ $item->name }}</h3>
                            <p>{{ Str::limit($item->description, 85) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div class="empty-state-icon">🏨</div>
                <h3>No accommodation found</h3>
                <p>Data belum tersedia di region ini.</p>
            </div>
        @endif
    </div>
</section>


{{-- ── TRANSPORT ─────────────────────────────────────────── --}}
<section class="section section-alt" id="transport">
    <div class="container-main" style="padding: 0 7%; max-width:1240px; margin:auto;">
        <div class="section-heading">
            <div>
                <div class="section-kicker">🚌 Getting Around</div>
                <h2 class="section-title-text" style="font-size:28px;">Transport</h2>
                <p class="section-sub">Public transport, rentals, and stations.</p>
            </div>
            <a href="{{ route('regions.category', [$slug, 'transport']) }}" class="see-all-link">See all →</a>
        </div>

        @if($transportations->count())
            <div class="grid-auto">
                @foreach($transportations->take(6) as $item)
                    <div class="item-card">
                        @php $imgUrl = $item->image ?? null; @endphp
                        @if($imgUrl)
                            <div style="overflow:hidden; height:195px;">
                                <img src="{{ $imgUrl }}" alt="{{ $item->name }}" class="item-image">
                            </div>
                        @else
                            <div class="card-img-placeholder">🚌</div>
                        @endif
                        <div class="item-info">
                            <h3>{{ $item->name }}</h3>
                            <p>{{ Str::limit($item->description, 85) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div class="empty-state-icon">🚌</div>
                <h3>No transport found</h3>
                <p>Data belum tersedia di region ini.</p>
            </div>
        @endif
    </div>
</section>


{{-- ── BAR & CLUB ─────────────────────────────────────── --}}
<section class="section" id="bar-club">
    <div class="container-main" style="padding: 0 7%; max-width:1240px; margin:auto;">
        <div class="section-heading">
            <div>
                <div class="section-kicker">🍸 Nightlife</div>
                <h2 class="section-title-text" style="font-size:28px;">Bar &amp; Club</h2>
                <p class="section-sub">Nightlife and places to socialize.</p>
            </div>
            <a href="{{ route('regions.category', [$slug, 'bar-club']) }}" class="see-all-link">See all →</a>
        </div>

        @if($barClub->count())
            <div class="grid-auto">
                @foreach($barClub->take(6) as $item)
                    <div class="item-card">
                        @if($item->image ?? null)
                            <div style="overflow:hidden; height:195px;">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="item-image">
                            </div>
                        @else
                            <div class="card-img-placeholder">🍸</div>
                        @endif
                        <div class="item-info">
                            <h3>{{ $item->name }}</h3>
                            <p>{{ Str::limit($item->description, 85) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div class="empty-state-icon">🍸</div>
                <h3>No bar or club found</h3>
                <p>Data belum tersedia di region ini.</p>
            </div>
        @endif
    </div>
</section>

{{-- ── PRAYER PLACES ─────────────────────────────────────────── --}}
<section class="section section-alt" id="prayer-places">
    <div class="container-main" style="padding: 0 7%; max-width:1240px; margin:auto;">
        <div class="section-heading">
            <div>
                <div class="section-kicker">🕌 Religious</div>
                <h2 class="section-title-text" style="font-size:28px;">Prayer Places</h2>
                <p class="section-sub">Mosques, churches, temples, and prayer places.</p>
            </div>
            <a href="{{ route('regions.category', [$slug, 'prayer-places']) }}" class="see-all-link">See all →</a>
        </div>

        @if($prayerPlaces->count())
            <div class="grid-auto">
                @foreach($prayerPlaces->take(6) as $item)
                    <div class="item-card">
                        @php $imgUrl = $item->image ?? null; @endphp
                        @if($imgUrl)
                            <div style="overflow:hidden; height:195px;">
                                <img src="{{ asset('storage/' . $imgUrl) }}" alt="{{ $item->name }}" class="item-image">
                            </div>
                        @else
                            <div class="card-img-placeholder">🕌</div>
                        @endif
                        <div class="item-info">
                            <h3>{{ $item->name }}</h3>
                            <p>{{ Str::limit($item->description, 85) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div class="empty-state-icon">🕌</div>
                <h3>No prayer places found</h3>
                <p>Data belum tersedia di region ini.</p>
            </div>
        @endif
    </div>
</section>

@include('partials.footer')

</body>
</html>
