<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations — Surabaya Wanderlust</title>

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
            <form action="" method="GET" style="margin-bottom: 30px; background: var(--bg-card); padding: 20px; border-radius: 12px; border: 1px solid var(--border);">
                <div style="display:grid; grid-template-columns: 1fr 1fr 1fr auto; gap:16px; align-items:flex-end;">
                    <div>
                        <label style="display:block; font-size: 13px; font-weight: bold; margin-bottom: 8px; color: var(--text-primary);">Region (Wilayah)</label>
                        <select name="region" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ccc; background: #fff; color: #000;" onchange="this.form.submit()">
                            <option value="">Semua Wilayah</option>
                            <option value="Surabaya Barat" {{ request('region') == 'Surabaya Barat' ? 'selected' : '' }}>Surabaya Barat</option>
                            <option value="Surabaya Timur" {{ request('region') == 'Surabaya Timur' ? 'selected' : '' }}>Surabaya Timur</option>
                            <option value="Surabaya Selatan" {{ request('region') == 'Surabaya Selatan' ? 'selected' : '' }}>Surabaya Selatan</option>
                            <option value="Surabaya Tengah" {{ request('region') == 'Surabaya Tengah' ? 'selected' : '' }}>Surabaya Tengah</option>
                            <option value="Surabaya Utara" {{ request('region') == 'Surabaya Utara' ? 'selected' : '' }}>Surabaya Utara</option>
                        </select>
                    </div>
                    <div>
                        <label style="display:block; font-size: 13px; font-weight: bold; margin-bottom: 8px; color: var(--text-primary);">Cari Nama</label>
                        <input type="text" name="search_name" value="{{ request('search_name') }}" placeholder="Cari nama..." style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ccc; background: #fff; color: #000;">
                    </div>

                    @include('partials.price-slider', ['max' => $sliderMax ?? 100000, 'step' => $sliderStep ?? 5000])

                    <div>
                        <button type="submit" class="btn-primary" style="background: var(--gold); border: none; padding: 12px 24px; border-radius: 8px; font-weight: bold; color: white; cursor: pointer; height: 46px;">Filter</button>
                    </div>
                </div>
            </form>
        </section>

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

                    <a href="{{ route('destinations.show', $destination->slug) }}" class="uni-card">

                        {{-- Image --}}
                        <div class="uni-card-image-wrap">
                            @if($destination->image)
                                <img
                                    class="uni-card-image"
                                    src="{{ asset('storage/' . $destination->image) }}"
                                    alt="{{ $destination->name }}">
                            @else
                                <div class="card-img-placeholder">
                                    <i class="fa-solid fa-mountain-sun"></i>
                                </div>
                            @endif
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

                @endforeach
            </div>

        @else

            <div class="empty-state">
                <div class="empty-state-icon">🗺️</div>
                <h3>Belum ada destinasi</h3>
                <p>Tidak ada destinasi yang cocok dengan filter kamu.</p>
            </div>

        @endif

    </div>
</section>


@include('partials.footer')

</body>
</html>