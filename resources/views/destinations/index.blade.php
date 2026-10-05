<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations — Surabaya Wanderlust</title>

    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        .filter-form {
            margin-bottom: 30px;
            padding: 20px;
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 12px;
        }
        .filter-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            align-items: flex-end;
        }
        .filter-label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: bold;
            color: var(--text-primary);
        }
        .filter-input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #fff;
            color: #000;
        }
        .filter-actions { grid-column: 1 / -1; display: flex; align-items: center; justify-content: flex-end; gap: 12px; }
        .filter-submit {
            height: 46px;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            background: var(--gold);
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }
        .filter-reset { font-size: 13px; color: var(--text-primary); text-decoration: underline; white-space: nowrap; }

        .map-section { margin-bottom: 36px; }
        .map-section-head { display: flex; justify-content: space-between; align-items: baseline; gap: 12px; margin-bottom: 10px; }
        .map-section-head h3 { margin: 0; font-size: 18px; }
        .map-section-head span { font-size: 13px; opacity: .7; }

        .uni-card-cat { align-self: flex-start; margin-bottom: 8px; }

        @media (max-width: 900px) { .filter-grid { grid-template-columns: 1fr 1fr; } }
        @media (max-width: 560px) { .filter-grid { grid-template-columns: 1fr; } }
    </style>

    <script>
        (function () {
            const t = localStorage.getItem('sw-theme') || 'dark';
            document.documentElement.setAttribute('data-theme', t);
        })();
    </script>
</head>
<body>

@include('partials.navbar')

@php
    $hasFilter = request()->hasAny(['region', 'category', 'search_name', 'search', 'price_min', 'price_max']);
@endphp

{{-- ── HERO ──────────────────────────────────────────────── --}}
<section class="page-hero">
    <div class="page-hero-bg" style="background-image: url('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=1800&q=85&fit=crop');"></div>
    <div class="page-hero-overlay"></div>
    <div class="page-hero-content">
        <span class="page-hero-kicker">✦ Explore Surabaya</span>
        <h1 class="page-hero-title">Discover Every<br>Corner of Surabaya.</h1>
        <p class="page-hero-desc">
            Temukan destinasi menarik dari berbagai penjuru kota Surabaya —
            dari monumen bersejarah hingga taman kota yang indah.
        </p>
    </div>
</section>


{{-- ── DESTINATIONS GRID ─────────────────────────────────── --}}
<section class="section">
    <div style="max-width:1240px; margin:auto; padding:0 7%;">

        {{-- ── FILTER ── --}}
        <section class="filter-section">
            <form action="{{ route('destinations.index') }}" method="GET" class="filter-form">
                <div class="filter-grid">

                    <div>
                        <label class="filter-label" for="filter-region">Region (Wilayah)</label>
                        <select id="filter-region" name="region" class="filter-input" onchange="this.form.submit()">
                            <option value="">Semua Wilayah</option>
                            @foreach(['Surabaya Barat', 'Surabaya Timur', 'Surabaya Selatan', 'Surabaya Tengah', 'Surabaya Utara'] as $region)
                                <option value="{{ $region }}" {{ request('region') === $region ? 'selected' : '' }}>{{ $region }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="filter-label" for="filter-category">Kategori</label>
                        <select id="filter-category" name="category" class="filter-input" onchange="this.form.submit()">
                            <option value="">Semua Kategori</option>
                            @foreach($categories as $key => $label)
                                <option value="{{ $key }}" {{ request('category') === $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="filter-label" for="filter-search">Cari Nama</label>
                        <input id="filter-search" type="text" name="search_name"
                               value="{{ request('search_name') }}" placeholder="Cari nama..."
                               class="filter-input">
                    </div>

                    @include('partials.price-slider', ['max' => $sliderMax ?? 100000, 'step' => $sliderStep ?? 5000])

                    <div class="filter-actions">
                        <button type="submit" class="btn-primary filter-submit">Filter</button>
                        @if($hasFilter)
                            <a href="{{ route('destinations.index') }}" class="filter-reset">Reset</a>
                        @endif
                    </div>

                </div>
            </form>
        </section>

        {{-- ── PETA ── --}}
        @if(count($mapPoints) > 0)
            <section class="map-section">
                <div class="map-section-head">
                    <h3>Peta Destinasi</h3>
                    <span>{{ count($mapPoints) }} lokasi</span>
                </div>
                @include('partials.destination-map', ['id' => 'index', 'height' => 380, 'points' => $mapPoints])
            </section>
        @endif

        <div class="section-heading">
            <div>
                <div class="section-kicker">All Destinations</div>
                <h2 class="section-title-text" style="font-size:30px;">Destinations</h2>
                <p class="section-sub">Pilih destinasi dan temukan pengalaman perjalananmu.</p>
            </div>
            <span class="badge badge-gold">
                {{ $destinations->total() }} Destinations
            </span>
        </div>


        @if($destinations->count() > 0)

            <div class="grid-auto">
                @foreach($destinations as $destination)

                    <div class="dest-wrap">

                        <a href="{{ route('destinations.show', $destination->slug) }}" class="uni-card">

                            {{-- Image: pakai accessor cover_url yang sama dengan halaman detail --}}
                            <div class="uni-card-image-wrap">
                                <img
                                    class="uni-card-image"
                                    src="{{ $destination->cover_url }}"
                                    alt="{{ $destination->name }}"
                                    loading="lazy"
                                    onerror="this.onerror=null;this.src='{{ \App\Support\Media::fallback() }}';">
                            </div>

                            {{-- Body --}}
                            <div class="uni-card-body">

                                @if($destination->regency)
                                    <span class="uni-card-label">
                                        <i class="fa-solid fa-location-dot fa-xs"></i>
                                        {{ $destination->regency->name }}
                                        @if($destination->regency->province)
                                            · {{ $destination->regency->province->name }}
                                        @endif
                                    </span>
                                @endif

                                <div class="uni-card-title">{{ $destination->name }}</div>

                                @if($destination->category_label)
                                    <span class="badge badge-gold uni-card-cat">{{ $destination->category_label }}</span>
                                @endif

                                <div class="uni-card-desc">
                                    {{ \Illuminate\Support\Str::limit($destination->description, 110) }}
                                </div>

                                <div class="uni-card-meta">
                                    @if($destination->ticket_price)
                                        <span style="font-size:12px; color:var(--teal); font-weight:600;">
                                            <i class="fa-solid fa-ticket fa-xs"></i>
                                            {{ $destination->ticket_price }}
                                        </span>
                                    @else
                                        <span></span>
                                    @endif

                                    <span class="uni-card-link">
                                        Explore <i class="fa-solid fa-arrow-right fa-xs"></i>
                                    </span>
                                </div>

                            </div>

                        </a>

                        {{-- Tombol hati: di luar <a> supaya klik tidak membuka halaman detail --}}
                        @include('partials.wishlist-button', [
                            'destination' => $destination,
                            'on'          => in_array($destination->id, $wishlistedIds, true),
                            'floating'    => true,
                        ])

                    </div>

                @endforeach
            </div>

            {{-- ── PAGINATION (tombol halaman) ── --}}
            {{ $destinations->onEachSide(1)->links('partials.pagination') }}

        @else

            <div class="empty-state">
                <div class="empty-state-icon">🗺️</div>
                @if($hasFilter)
                    <h3>Destinasi tidak ditemukan</h3>
                    <p>Tidak ada destinasi yang cocok dengan filter kamu. Coba ubah kata kunci, wilayah, kategori, atau rentang harga.</p>
                    <a href="{{ route('destinations.index') }}" class="filter-reset">Reset filter</a>
                @else
                    <h3>Belum ada destinasi</h3>
                    <p>Destinasi akan muncul di sini setelah ditambahkan.</p>
                @endif
            </div>

        @endif

    </div>
</section>


@include('partials.footer')

@include('partials.wishlist-assets')

</body>
</html>