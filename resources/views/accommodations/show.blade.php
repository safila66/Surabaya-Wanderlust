@use('App\Support\Media')
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $accommodation->name }} — Surabaya Wanderlust</title>

    {{-- Anti-flicker: apply saved theme immediately --}}
    <script>(function(){var t=localStorage.getItem('sw-theme')||'dark';document.documentElement.setAttribute('data-theme',t);})()</script>

    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        /* ===== THEME TOKENS (sama dengan halaman Destinations & Culinary) ===== */
        html[data-theme="dark"] {
            --page-bg:      #0d1b3e;
            --cream-dark:   #07112a;
            --paper:        #122254;
            --card-border:  rgba(255,255,255,.12);
            --line:         rgba(255,255,255,.12);
            --text:         #ffffff;
            --text-soft:    #c9d2e6;
            --muted:        #8d99b5;
            --gold:         #f4c430;
            --brown:        #f4e80b;
            --star:         #f4c430;
            --bar-bg:       rgba(255,255,255,.12);
            --bar-fill:     #f4e80b;
            --btn-bg:       #f4c430;
            --btn-text:     #0d1b3e;
        }

        html[data-theme="light"] {
            --page-bg:      #cdebff;
            --cream-dark:   #d0e9fa;
            --paper:        #f4f9ff;
            --card-border:  rgba(0,100,200,.15);
            --line:         rgba(0,100,200,.15);
            --text:         #0d2340;
            --text-soft:    #35557f;
            --muted:        #4a6fa5;
            --gold:         #b07d00;
            --brown:        #8a6408;
            --star:         #c8960a;
            --bar-bg:       rgba(13,35,64,.12);
            --bar-fill:     #0d2340;
            --btn-bg:       #0d2340;
            --btn-text:     #ffffff;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        body {
            background: var(--page-bg) !important;
            color: var(--text) !important;
            font-family: 'DM Sans', sans-serif;
            line-height: 1.6;
        }

        a { text-decoration: none; color: inherit; }
        img { display: block; width: 100%; }

        /* ===== BREADCRUMB ===== */
        .breadcrumb { max-width: 1200px; margin: 90px auto 0; padding: 20px 25px 10px; font-size: 12px; color: var(--muted); }
        .breadcrumb a:hover { color: var(--gold); }
        .breadcrumb span { color: var(--gold); }

        /* ===== HERO ===== */
        .destination-hero { max-width: 1100px; margin: 0 auto; padding: 0 20px; }
        .hero-photo { height: 420px; border-radius: 18px; overflow: hidden; position: relative; background: var(--paper); }
        .hero-photo img { height: 100%; object-fit: cover; }
        .hero-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(22,31,26,.78) 0%, rgba(22,31,26,.2) 48%, rgba(22,31,26,.02) 100%); }
        .hero-content { position: absolute; bottom: 34px; left: 36px; right: 36px; color: #fff; text-shadow: 0 1px 8px rgba(0,0,0,.4); }
        .eyebrow { display: inline-block; font-size: 9px; letter-spacing: 2px; font-weight: 600; margin-bottom: 8px; text-transform: uppercase; }
        .hero-content h1 { font-family: 'Playfair Display', serif; font-size: clamp(32px, 5vw, 56px); line-height: 1; font-weight: 600; margin-bottom: 10px; color: #fff !important; text-shadow: 0 2px 14px rgba(0,0,0,.45); }
        .hero-location { font-size: 12px; opacity: .92; margin-bottom: 14px; }
        .rating-line { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
        .stars { color: #e7c979; letter-spacing: 2px; font-size: 14px; }
        .rating-number { font-weight: 700; }
        .review-count { opacity: .9; font-size: 11px; }

        /* ===== GALLERY ===== */
        .destination-gallery { max-width: 1100px; margin: 11px auto 0; padding: 0 20px; overflow: hidden; }
        .gallery-track { display: flex; gap: 10px; overflow-x: auto; scroll-behavior: smooth; scrollbar-width: none; cursor: grab; user-select: none; -webkit-overflow-scrolling: touch; }
        .gallery-track::-webkit-scrollbar { display: none; }
        .gallery-track.dragging { cursor: grabbing; scroll-behavior: auto; }
        .gallery-slide { flex: 0 0 210px; height: 120px; border-radius: 13px; overflow: hidden; position: relative; background: var(--paper); }
        .gallery-slide img { width: 100%; height: 100%; object-fit: cover; pointer-events: none; transition: transform .4s ease; }
        .gallery-slide:hover img { transform: scale(1.04); }

        /* ===== MAIN CONTENT ===== */
        .content { max-width: 1000px; margin: 48px auto 64px; padding: 0 20px; }
        .intro { max-width: 680px; margin-bottom: 36px; }
        .section-label { font-size: 9px; letter-spacing: 1.8px; text-transform: uppercase; color: var(--brown); font-weight: 700; margin-bottom: 7px; }
        .intro h2 { font-family: 'Playfair Display', serif; font-size: 28px; font-weight: 600; line-height: 1.2; color: var(--gold); margin-bottom: 13px; }
        .intro p { color: var(--text-soft); font-size: 13px; line-height: 1.85; }

        /* ===== QUICK INFO ===== */
        .quick-info { display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin-bottom: 48px; }
        .info-card { background: var(--paper); border: 1px solid var(--card-border); border-radius: 12px; padding: 16px; min-height: 95px; }
        .info-icon { font-size: 15px; margin-bottom: 9px; }
        .info-title { font-size: 9px; text-transform: uppercase; letter-spacing: 1.2px; color: var(--muted); margin-bottom: 3px; }
        .info-value { font-size: 12px; font-weight: 600; color: var(--gold); }

        /* ===== TWO COLUMN ===== */
        .two-column { display: grid; grid-template-columns: 1.45fr .8fr; gap: 40px; align-items: start; }
        .content-section { margin-bottom: 42px; }
        .content-section h3 { font-family: 'Playfair Display', serif; color: var(--gold); font-size: 22px; margin-bottom: 25px; }
        .content-section p { color: var(--text-soft); font-size: 13px; line-height: 1.85; }

        .activity-list { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
        .activity { background: var(--paper); color: var(--text); padding: 15px 17px; border-radius: 12px; border: 1px solid var(--card-border); font-size: 13px; }
        .activity::before { content: "✦"; color: var(--gold); margin-right: 8px; }

        /* ===== RATING BOX ===== */
        .rating-box { background: var(--paper); border-radius: 20px; padding: 30px; border: 1px solid var(--card-border); margin-bottom: 22px; }
        .rating-top { display: flex; align-items: center; gap: 17px; padding-bottom: 23px; border-bottom: 1px solid var(--line); margin-bottom: 20px; }
        .rating-big { font-family: 'Playfair Display', serif; font-size: 48px; line-height: 1; color: var(--gold); }
        .rating-total-stars { color: var(--star); letter-spacing: 2px; }
        .rating-total-text { font-size: 11px; color: var(--muted); margin-top: 3px; }
        .rating-row { display: flex; align-items: center; gap: 8px; margin-bottom: 7px; font-size: 11px; }
        .rating-row .row-stars { width: 70px; color: var(--star); letter-spacing: 1px; }
        .bar { flex: 1; height: 5px; background: var(--bar-bg); border-radius: 10px; overflow: hidden; }
        .bar-fill { height: 100%; background: var(--bar-fill); border-radius: 10px; }
        .rating-percent { width: 38px; text-align: right; color: var(--muted); }

        /* ===== REVIEWS ===== */
        .review-form { background: var(--paper); border: 1px solid var(--card-border); padding: 25px; border-radius: 16px; margin-bottom: 22px; }
        .review-form h4 { font-family: 'Playfair Display', serif; color: var(--gold); font-size: 18px; margin-bottom: 15px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; font-size: 13px; font-weight: 700; margin-bottom: 8px; color: var(--text); }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ccc; background: #fff; color: #000; font-family: inherit; font-size: 13px; }
        .form-success { background: rgba(10,191,138,.15); border: 1px solid #0abf8a; padding: 12px 16px; border-radius: 10px; margin-bottom: 15px; font-size: 13px; }
        .form-error { background: rgba(255,90,90,.12); border: 1px solid #ff7a7a; padding: 12px 16px; border-radius: 10px; margin-bottom: 15px; font-size: 13px; }
        .btn-submit { background: var(--btn-bg); color: var(--btn-text); border: none; padding: 12px 24px; border-radius: 999px; font-weight: 700; cursor: pointer; font-family: inherit; }
        .review-card { background: var(--paper); border-radius: 17px; padding: 22px; margin-bottom: 11px; border: 1px solid var(--card-border); }
        .review-user { font-weight: 600; font-size: 13px; color: var(--gold); }
        .review-date { font-size: 11px; color: var(--muted); margin-bottom: 9px; }
        .review-stars { color: var(--star); letter-spacing: 1px; font-size: 12px; margin-bottom: 7px; }
        .review-text { color: var(--text-soft); font-size: 13px; line-height: 1.7; }
        .empty-review { background: var(--paper); border-radius: 17px; padding: 28px; border: 1px solid var(--card-border); color: var(--muted); font-size: 13px; }

        /* ===== MAP / RIDE ===== */
        .map-card { background: var(--cream-dark); border: 1px solid var(--card-border); border-radius: 18px; padding: 25px; }
        .map-card h4 { font-family: 'Playfair Display', serif; color: var(--gold); font-size: 21px; margin-bottom: 7px; }
        .map-card p { font-size: 12px; color: var(--muted); margin-bottom: 18px; }
        .map-button { display: inline-block; background: var(--btn-bg); color: var(--btn-text); padding: 11px 17px; border-radius: 30px; font-size: 11px; font-weight: 700; transition: .2s ease; }
        .map-button:hover { opacity: .85; }
        .ride { margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--line); }
        .ride-title { font-family: 'Playfair Display', serif; font-size: 18px; color: var(--gold); margin-bottom: 4px; }
        .ride-desc { font-size: 12px; color: var(--muted); margin-bottom: 12px; }
        .ride-options { display: flex; flex-wrap: wrap; gap: 8px; }
        .ride-chip { display: inline-flex; align-items: center; gap: 8px; padding: 8px 16px; border-radius: 30px; border: 1.5px solid var(--card-border); color: var(--text); font-size: 12px; font-weight: 600; transition: .2s ease; }
        .ride-chip::before { content: ""; width: 10px; height: 10px; border-radius: 50%; background: var(--dot); box-shadow: 0 0 0 1px rgba(0,0,0,.15); }
        .ride-chip:hover { background: var(--btn-bg); color: var(--btn-text); border-color: var(--btn-bg); }
        .ride-sub { margin: 20px 0 10px; font-size: 11px; font-weight: 700; letter-spacing: .8px; text-transform: uppercase; color: var(--brown); }
        .stop-list { display: grid; gap: 8px; }
        .stop-item { display: flex; justify-content: space-between; align-items: center; gap: 12px; padding: 10px 14px; border-radius: 12px; background: var(--paper); border: 1px solid var(--card-border); }
        .stop-name { display: block; font-size: 13px; font-weight: 600; color: var(--text); }
        .stop-type { display: block; font-size: 11px; color: var(--muted); }
        .stop-dist { font-size: 12px; font-weight: 700; color: var(--gold); white-space: nowrap; }
        .ride-note { margin-top: 14px; font-size: 12px; font-style: italic; color: var(--muted); line-height: 1.6; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 850px) {
            .hero-photo { height: 430px; }
            .quick-info { grid-template-columns: 1fr 1fr; }
            .two-column { grid-template-columns: 1fr; }
        }
        @media (max-width: 550px) {
            .breadcrumb { padding-left: 20px; padding-right: 20px; }
            .destination-hero { padding: 0 15px; }
            .hero-photo { height: 400px; border-radius: 19px; }
            .hero-content { left: 25px; right: 25px; bottom: 28px; }
            .hero-content h1 { font-size: 42px; }
            .destination-gallery { padding: 0 15px; }
            .gallery-slide { flex-basis: 220px; height: 135px; }
            .content { padding: 0 20px; margin-top: 50px; }
            .intro h2 { font-size: 31px; }
            .quick-info { grid-template-columns: 1fr; }
            .activity-list { grid-template-columns: 1fr; }
        }
    </style>
</head>

<body>

@include('partials.navbar')

@php
    // Gambar default: taruh file di public/images/default-accommodation.jpg
    $defaultImg = 'images/default-accommodation.jpg';
    $fallback   = Media::fallback($defaultImg);
    $coverUrl   = Media::url($accommodation->image, $defaultImg);

    $counts = $accommodation->reviews->groupBy('rating')->map->count();

    // [FIX] Sebelumnya memakai $destination (tidak ada di halaman ini) -> error. Sekarang $accommodation.
    $mapsLink = $accommodation->maps_url
        ?: (($accommodation->latitude && $accommodation->longitude)
            ? 'https://maps.google.com/?q=' . $accommodation->latitude . ',' . $accommodation->longitude
            : 'https://www.google.com/maps/search/?api=1&query=' . urlencode($accommodation->name . ' ' . $accommodation->regency?->name));
@endphp

<!-- BREADCRUMB -->
<div class="breadcrumb">
    <a href="{{ route('home') }}">Home</a>
    &nbsp; / &nbsp;
    <a href="{{ route('accommodations.index') }}">Accommodations</a>
    &nbsp; / &nbsp;
    <span>{{ $accommodation->name }}</span>
</div>

<!-- HERO -->
<section class="destination-hero">
    <div class="hero-photo">

        <img src="{{ $coverUrl }}" alt="{{ $accommodation->name }}"
             onerror="this.onerror=null;this.src='{{ $fallback }}';">

        <div class="hero-overlay"></div>

        <div class="hero-content">
            <div class="eyebrow">STAY</div>

            <h1>{{ $accommodation->name }}</h1>

            <div class="hero-location">
                📍 {{ $accommodation->regency?->name ?? 'Surabaya' }}@if($accommodation->regency?->province), {{ $accommodation->regency->province->name }}@endif
            </div>

            <div class="rating-line">
                <span class="stars">
                    @for($i = 1; $i <= 5; $i++){{ $i <= round($averageRating) ? '★' : '☆' }}@endfor
                </span>

                <span class="rating-number">
                    @if($reviewCount > 0)
                        {{ number_format($averageRating, 1) }} / 5
                    @else
                        No rating yet
                    @endif
                </span>

                <span class="review-count">
                    · {{ $reviewCount }} {{ $reviewCount == 1 ? 'review' : 'reviews' }}
                </span>
            </div>
        </div>
    </div>
</section>

<!-- GALLERY -->
<section class="destination-gallery">
    <div class="gallery-track" id="galleryTrack">
        <div class="gallery-slide">
            <img src="{{ $coverUrl }}" alt="{{ $accommodation->name }}" draggable="false"
                 onerror="this.onerror=null;this.src='{{ $fallback }}';">
        </div>
    </div>
</section>

<!-- MAIN CONTENT -->
<main class="content">

    <!-- INTRO -->
    <section class="intro">
        <div class="section-label">ABOUT THE PLACE</div>
        <h2>{{ $accommodation->name }}</h2>
        <p>{{ $accommodation->description }}</p>
    </section>

    <!-- QUICK INFO -->
    <section class="quick-info">

        <div class="info-card">
            <div class="info-icon">📍</div>
            <div class="info-title">Location</div>
            <div class="info-value">{{ $accommodation->regency?->name }}</div>
        </div>

        <div class="info-card">
            <div class="info-icon">🎟</div>
            <div class="info-title">Ticket</div>
            <div class="info-value">
                {{ $accommodation->ticket_price ?? 'Information unavailable' }}
                @if($accommodation->ticket_price && stripos($accommodation->ticket_price, 'gratis') === false && stripos($accommodation->ticket_price, 'free') === false)
                    <div style="margin-top: 15px;">
                        <a href="{{ $accommodation->ticket_url ?? 'https://tiketwisata.surabaya.go.id/' }}" target="_blank" rel="noopener noreferrer" style="background: var(--btn-bg); color: var(--btn-text); border-radius: 999px; padding: 10px 20px; font-size: 13px; display: inline-flex; align-items: center; gap: 8px;">
                            🎟️ Beli Tiket Resmi
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <div class="info-card">
            <div class="info-icon">🕐</div>
            <div class="info-title">Opening Hours</div>
            <div class="info-value">{{ $accommodation->opening_hours ?? 'Information unavailable' }}</div>
        </div>

        <div class="info-card">
            <div class="info-icon">⏱</div>
            <div class="info-title">Visit Duration</div>
            <div class="info-value">{{ $accommodation->visit_duration ?? 'Flexible' }}</div>
        </div>

    </section>

    <!-- TWO COLUMN -->
    <div class="two-column">

        <!-- LEFT -->
        <div>

            <section class="content-section">
                <div class="section-label">EXPERIENCE</div>
                <h3>Things to Experience</h3>

                @if($accommodation->activities)
                    <div class="activity-list">
                        @foreach(explode(',', $accommodation->activities) as $activity)
                            <div class="activity">{{ trim($activity) }}</div>
                        @endforeach
                    </div>
                @else
                    <p>Explore the destination and discover experiences that suit your travel style.</p>
                @endif
            </section>

            <section class="content-section">
                <div class="section-label">WHAT YOU'LL FIND</div>
                <h3>Facilities</h3>
                <p>{{ $accommodation->facilities ?? 'Facility information will be updated by Surabaya Wanderlust.' }}</p>
            </section>

            <section class="content-section">
                <div class="section-label">TRAVEL NOTES</div>
                <h3>Accessibility</h3>
                <p>{{ $accommodation->accessibility ?? 'Accessibility information is currently being prepared.' }}</p>
            </section>

            <!-- REVIEWS -->
            <section class="content-section" id="reviews">

                <div class="section-label">VISITOR REVIEWS</div>
                <h3>What Travelers Say</h3>

                <div class="review-form">
                    <h4>Tulis Ulasan Anda</h4>

                    @if(session('success'))
                        <div class="form-success">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="form-error">
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ route('accommodations.reviews.store', $accommodation->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="rating">Rating (1-5)</label>
                            <select id="rating" name="rating" required>
                                <option value="5" @selected(old('rating') == 5)>⭐⭐⭐⭐⭐ (5) Sangat Bagus</option>
                                <option value="4" @selected(old('rating') == 4)>⭐⭐⭐⭐ (4) Bagus</option>
                                <option value="3" @selected(old('rating') == 3)>⭐⭐⭐ (3) Cukup</option>
                                <option value="2" @selected(old('rating') == 2)>⭐⭐ (2) Kurang</option>
                                <option value="1" @selected(old('rating') == 1)>⭐ (1) Sangat Kurang</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="comment">Komentar / Pengalaman Anda</label>
                            <textarea id="comment" name="comment" rows="4" required>{{ old('comment') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="media">Upload Foto/Video (Opsional)</label>
                            <input type="file" id="media" name="media" accept="image/*,video/*">
                        </div>

                        <button type="submit" class="btn-submit">Kirim Ulasan</button>
                    </form>
                </div>

                @forelse($accommodation->reviews as $review)
                    <div class="review-card">
                        <div class="review-user">{{ $review->name }}</div>
                        <div class="review-date">{{ $review->created_at->diffForHumans() }}</div>

                        <div class="review-stars">
                            @for($i = 1; $i <= 5; $i++){{ $i <= $review->rating ? '★' : '☆' }}@endfor
                        </div>

                        <div class="review-text">{{ $review->comment }}</div>
                    </div>
                @empty
                    <div class="empty-review">
                        Belum ada ulasan. Jadilah yang pertama memberikan penilaian dan pengalamanmu.
                    </div>
                @endforelse

            </section>

        </div>

        <!-- RIGHT -->
        <aside>

            <!-- RATING -->
            <div class="rating-box">

                <div class="rating-top">
                    <div class="rating-big">
                        {{ $reviewCount > 0 ? number_format($averageRating, 1) : '—' }}
                    </div>

                    <div>
                        <div class="rating-total-stars">
                            @if($reviewCount > 0)
                                @for($i = 1; $i <= 5; $i++){{ $i <= round($averageRating) ? '★' : '☆' }}@endfor
                            @else
                                ☆☆☆☆☆
                            @endif
                        </div>

                        <div class="rating-total-text">
                            Based on {{ $reviewCount }} {{ $reviewCount == 1 ? 'review' : 'reviews' }}
                        </div>
                    </div>
                </div>

                @foreach(range(5, 1) as $star)
                    @php $pct = $reviewCount > 0 ? (($counts[$star] ?? 0) / $reviewCount) * 100 : 0; @endphp

                    <div class="rating-row">
                        <span class="row-stars">{{ str_repeat('★', $star) }}{{ str_repeat('☆', 5 - $star) }}</span>
                        <div class="bar"><div class="bar-fill" style="width: {{ $pct }}%"></div></div>
                        <span class="rating-percent">{{ round($pct) }}%</span>
                    </div>
                @endforeach

            </div>

            <!-- LOCATION -->
            <div class="map-card">
                <div class="section-label">LOCATION</div>
                <h4>Find Your Way</h4>
                <p>{{ $accommodation->location ?? $accommodation->regency?->name }}</p>

                <a href="{{ $mapsLink }}" target="_blank" rel="noopener noreferrer" class="map-button">
                    View on Google Maps →
                </a>

                <div class="ride">
                    <div class="ride-title">Get Me There</div>
                    <div class="ride-desc">Pesan transportasi online ke lokasi ini.</div>

                    <div class="ride-options">
                        <a class="ride-chip" style="--dot:#00aa13" href="https://gojek.link/" target="_blank" rel="noopener noreferrer">Gojek</a>
                        <a class="ride-chip" style="--dot:#00b14f" href="https://grab.com/" target="_blank" rel="noopener noreferrer">Grab</a>
                        <a class="ride-chip" style="--dot:#fee000" href="https://maxim.com/" target="_blank" rel="noopener noreferrer">Maxim</a>
                        <a class="ride-chip" style="--dot:#ff0000" href="https://www.greensm.com/" target="_blank" rel="noopener noreferrer">GreenSM</a>
                    </div>

                    @if(isset($nearestStops) && $nearestStops->count() > 0)
                        <div class="ride-sub">Halte / stasiun terdekat (radius 5 km)</div>

                        <div class="stop-list">
                            @foreach($nearestStops as $stop)
                                @php $type = strtolower($stop->type); @endphp

                                <div class="stop-item">
                                    <div>
                                        <span class="stop-name">
                                            @if(str_contains($type, 'bus')) 🚌
                                            @elseif(str_contains($type, 'train') || str_contains($type, 'kereta')) 🚂
                                            @else 🚏
                                            @endif
                                            {{ $stop->name }}
                                        </span>
                                        <span class="stop-type">{{ $stop->type }}</span>
                                    </div>

                                    <span class="stop-dist">{{ number_format($stop->calculated_distance, 1) }} km</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="ride-note">Tidak ada stasiun atau halte Suroboyo Bus/Wira Wiri dalam radius 5km.</div>
                    @endif
                </div>
            </div>

        </aside>

    </div>

</main>

@include('partials.footer')

<script>
(function () {
    const track = document.getElementById('galleryTrack');
    if (!track) return;

    /* Desktop drag-to-scroll (touch memakai scroll bawaan browser) */
    let isDown = false, startX = 0, startScroll = 0;
    const stopDrag = () => { isDown = false; track.classList.remove('dragging'); };

    track.addEventListener('mousedown', (e) => { isDown = true; track.classList.add('dragging'); startX = e.pageX; startScroll = track.scrollLeft; });
    track.addEventListener('mouseup', stopDrag);
    track.addEventListener('mouseleave', stopDrag);
    track.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        track.scrollLeft = startScroll - (e.pageX - startX) * 1.4;
    });
})();
</script>

</body>
</html>