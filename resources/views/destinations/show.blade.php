<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>(function(){var t='dark';try{t=localStorage.getItem('sw-theme')||'dark';}catch(e){}document.documentElement.setAttribute('data-theme',t);})()</script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>{{ $destination->name }} - Surabaya Wanderlust</title>
    <meta name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags((string) $destination->description), 155) }}">
    <style>
        .ds-wrap { width: 100%; max-width: 1120px; margin: 0 auto; box-sizing: border-box; padding: 104px 20px 64px; }
        .ds-crumb { display: flex; flex-wrap: wrap; gap: 8px; font-size: 13px; opacity: .7; margin-bottom: 16px; }
        .ds-crumb a { color: var(--gold); text-decoration: none; font-weight: 600; }

        .ds-ok { background: rgba(60,180,100,.15); border: 1px solid rgba(60,180,100,.4); padding: 10px 14px; border-radius: 10px; font-size: 13px; margin-bottom: 18px; }

        /* Gallery */
        .ds-gallery { margin-bottom: 24px; }
        .ds-main { position: relative; height: 440px; border-radius: 20px; overflow: hidden; background: linear-gradient(135deg, #17275f, #07112a 60%, #2b2410) center/cover no-repeat; cursor: zoom-in; }
        .ds-main::after { content: ''; position: absolute; inset: 0; background: linear-gradient(to top, rgba(3,8,20,.55), transparent 45%); pointer-events: none; }
        .ds-wish { position: absolute; top: 16px; right: 16px; z-index: 3; }
        /* Tombol hati dari partials/wishlist-button */
        .wish-form { margin: 0; }
        .wish-btn { width: 46px; height: 46px; border: 0; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; cursor: pointer; background: rgba(7,17,42,.72); backdrop-filter: blur(4px); transition: transform .15s, background .15s; padding: 0; }
        .wish-btn:hover { transform: scale(1.08); background: rgba(7,17,42,.92); }
        .wish-btn svg { width: 22px; height: 22px; fill: none; stroke: #fff; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .wish-btn.is-on svg { fill: #ef4b6c; stroke: #ef4b6c; }
        .ds-way h2 { color: var(--gold); font-size: 28px; margin: 4px 0 8px; }
        .ds-eyebrow { font-size: 12px; font-weight: 800; letter-spacing: 3px; text-transform: uppercase; color: var(--gold); }
        .ds-addr { margin: 0 0 20px; font-size: 15px; opacity: .7; }
        .ds-btn-lg { padding: 16px 28px; font-size: 15px; }
        .ds-hr { border: 0; border-top: 1px solid var(--border); margin: 26px 0 22px; }
        .ds-get { font-family: 'Playfair Display', serif; font-size: 24px; font-weight: 400; color: var(--gold); margin: 0 0 8px; }
        .ds-sub2 { margin: 0 0 16px; font-size: 14.5px; opacity: .7; }
        .ds-pills { display: flex; flex-wrap: wrap; gap: 10px; }
        .ds-pill { display: inline-flex; align-items: center; gap: 12px; padding: 14px 24px; border-radius: 999px; border: 1px solid var(--border); background: rgba(255,255,255,.03); color: var(--text-primary); font-weight: 800; font-size: 15px; text-decoration: none; transition: border-color .15s, background .15s; }
        .ds-pill:hover { border-color: var(--gold-border); background: var(--gold-light); }
        .ds-pill .dot { width: 14px; height: 14px; border-radius: 50%; flex: none; }
        .ds-note { margin: 20px 0 0; font-size: 14px; font-style: italic; line-height: 1.6; opacity: .65; }
        .ds-sub { font-size: 13px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase; opacity: .7; margin: 20px 0 10px; }
        .ds-nav { position: absolute; top: 50%; transform: translateY(-50%); z-index: 2; width: 42px; height: 42px; border: 0; border-radius: 50%; background: rgba(7,17,42,.72); color: #fff; cursor: pointer; font-size: 15px; }
        .ds-nav:hover { background: rgba(7,17,42,.92); }
        .ds-nav.prev { left: 14px; } .ds-nav.next { right: 14px; }
        .ds-count { position: absolute; right: 16px; bottom: 14px; z-index: 2; font-size: 12px; font-weight: 700; padding: 5px 12px; border-radius: 999px; background: rgba(7,17,42,.72); color: #fff; }
        .ds-thumbs { display: flex; gap: 10px; margin-top: 12px; overflow-x: auto; padding-bottom: 4px; }
        .ds-thumb { flex: none; width: 96px; height: 68px; border-radius: 10px; border: 2px solid transparent; background: #17275f center/cover no-repeat; cursor: pointer; opacity: .65; transition: .15s; }
        .ds-thumb:hover { opacity: 1; }
        .ds-thumb.is-active { opacity: 1; border-color: var(--gold); }

        /* Layout */
        .ds-grid { display: grid; grid-template-columns: minmax(0, 1fr) 340px; gap: 24px; align-items: start; }
        .ds-side { align-self: start; }

        .ds-title { display: flex; justify-content: space-between; align-items: flex-start; gap: 16px; margin-bottom: 10px; }
        .ds-title h1 { margin: 0; font-family: 'Playfair Display', serif; font-size: 34px; line-height: 1.15; }
        .ds-meta { display: flex; flex-wrap: wrap; gap: 8px 18px; font-size: 14px; opacity: .8; margin-bottom: 22px; }
        .ds-meta i { margin-right: 6px; color: var(--gold); }
        .ds-star { color: var(--gold); white-space: nowrap; }
        .ds-chip { display: inline-flex; align-items: center; gap: 6px; font-size: 11px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase; padding: 4px 12px; border-radius: 999px; background: var(--gold-light); color: var(--gold); border: 1px solid var(--gold-border); }

        .ds-card { background: var(--bg-surface); border: 1px solid var(--border); border-radius: 18px; padding: 24px; margin-bottom: 20px; }
        .ds-card h2 { font-family: 'Playfair Display', serif; font-size: 21px; margin: 0 0 14px; }
        .ds-desc { line-height: 1.75; font-size: 15px; white-space: pre-line; word-break: break-word; }
        .ds-desc.is-clamped { display: -webkit-box; -webkit-line-clamp: 8; -webkit-box-orient: vertical; overflow: hidden; }
        .ds-link { background: none; border: 0; color: var(--gold); font-weight: 700; cursor: pointer; padding: 8px 0 0; font-size: 14px; font-family: inherit; }

        .ds-row { display: flex; justify-content: space-between; align-items: flex-start; gap: 12px; padding: 12px 0; border-bottom: 1px solid var(--border); font-size: 14px; }
        .ds-row:first-of-type { padding-top: 0; }
        .ds-row:last-child { border-bottom: 0; padding-bottom: 0; }
        .ds-row small { display: block; opacity: .65; margin-top: 3px; font-size: 12.5px; line-height: 1.5; }
        .ds-row .k { opacity: .65; text-transform: capitalize; }
        .ds-row .v { font-weight: 700; text-align: right; }

        .ds-btn { border: 0; padding: 11px 22px; border-radius: 999px; background: var(--gold); color: #07112a; font-weight: 800; font-size: 13px; cursor: pointer; font-family: 'Plus Jakarta Sans', sans-serif; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; gap: 8px; transition: background .15s; }
        .ds-btn:hover { background: var(--gold-dark); }
        .ds-btn-ghost { background: transparent; border: 1px solid var(--gold-border); color: var(--gold); }
        .ds-btn-ghost:hover { background: var(--gold-light); }
        .ds-btn-block { display: flex; width: 100%; margin-top: 10px; }

        .ds-price { font-family: 'Playfair Display', serif; font-size: 26px; font-weight: 700; color: var(--gold); margin: 0 0 4px; }
        .ds-price small { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px; opacity: .7; color: var(--text-primary); font-weight: 500; }

        /* Reviews */
        .ds-sum { display: grid; grid-template-columns: 140px 1fr; gap: 24px; align-items: center; margin-bottom: 22px; }
        .ds-big { text-align: center; }
        .ds-big b { display: block; font-family: 'Playfair Display', serif; font-size: 48px; line-height: 1; }
        .ds-bars { display: grid; gap: 6px; }
        .ds-bar { display: grid; grid-template-columns: 22px 1fr 28px; gap: 8px; align-items: center; font-size: 12px; opacity: .85; }
        .ds-bar i { height: 7px; border-radius: 99px; background: var(--border); position: relative; overflow: hidden; display: block; }
        .ds-bar i span { position: absolute; inset: 0 auto 0 0; background: var(--gold); border-radius: 99px; }
        .ds-review { padding: 16px 0; border-bottom: 1px solid var(--border); }
        .ds-review:last-of-type { border-bottom: 0; }
        .ds-review[hidden] { display: none; }
        .ds-rhead { display: flex; justify-content: space-between; gap: 12px; align-items: center; }
        .ds-av { width: 36px; height: 36px; border-radius: 50%; background: var(--gold-light); color: var(--gold); display: inline-flex; align-items: center; justify-content: center; font-weight: 800; margin-right: 10px; flex: none; }
        .ds-rbody { margin: 10px 0 0; font-size: 14.5px; line-height: 1.65; word-break: break-word; white-space: pre-line; }
        .ds-rmedia { margin-top: 10px; max-width: 320px; border-radius: 12px; display: block; }
        .ds-time { font-size: 12px; opacity: .6; }

        .ds-field { margin-bottom: 14px; }
        .ds-field label { display: block; font-size: 12px; font-weight: 700; letter-spacing: .5px; text-transform: uppercase; margin-bottom: 6px; opacity: .85; }
        .ds-input { width: 100%; box-sizing: border-box; padding: 12px 14px; border-radius: 12px; border: 1px solid var(--border); background: rgba(255,255,255,.08); color: var(--text-primary); font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px; outline: none; resize: vertical; }
        [data-theme="light"] .ds-input { background: rgba(255,255,255,.9); }
        .ds-input:focus { border-color: var(--gold); box-shadow: 0 0 0 3px var(--gold-light); }
        .ds-err { color: #e05555; font-size: 12px; margin-top: 5px; }
        .ds-stars { display: inline-flex; flex-direction: row-reverse; gap: 4px; }
        .ds-stars input { display: none; }
        .ds-stars label { font-size: 28px; cursor: pointer; color: var(--border); margin: 0; text-transform: none; letter-spacing: 0; opacity: 1; transition: color .1s; }
        .ds-stars label:hover, .ds-stars label:hover ~ label, .ds-stars input:checked ~ label { color: var(--gold); }

        /* Related */
        .ds-rel { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 16px; }
        .ds-item { display: block; text-decoration: none; color: inherit; border: 1px solid var(--border); border-radius: 16px; overflow: hidden; background: var(--bg-surface); transition: transform .15s, border-color .15s; }
        .ds-item:hover { transform: translateY(-3px); border-color: var(--gold-border); }
        .ds-item .img { height: 140px; background: linear-gradient(135deg, #17275f, #07112a) center/cover no-repeat; }
        .ds-item b { display: block; padding: 12px 14px 2px; font-size: 14.5px; }
        .ds-item span { display: block; padding: 0 14px 14px; font-size: 12px; opacity: .65; }

        /* Lightbox */
        .ds-lb { position: fixed; inset: 0; z-index: 9999; background: rgba(3,8,20,.92); display: none; align-items: center; justify-content: center; }
        .ds-lb.is-open { display: flex; }
        .ds-lb img { max-width: 92vw; max-height: 88vh; border-radius: 12px; }
        .ds-lb button { position: absolute; border: 0; width: 46px; height: 46px; border-radius: 50%; background: rgba(255,255,255,.15); color: #fff; font-size: 18px; cursor: pointer; }
        .ds-lb .x { top: 18px; right: 18px; } .ds-lb .p { left: 18px; top: 50%; } .ds-lb .n { right: 18px; top: 50%; }

        .ds-toast { position: fixed; left: 50%; bottom: 28px; transform: translateX(-50%); background: var(--bg-surface); border: 1px solid var(--gold-border); color: var(--text-primary); padding: 10px 18px; border-radius: 999px; font-size: 13px; z-index: 9999; opacity: 0; pointer-events: none; transition: opacity .2s; }
        .ds-toast.is-on { opacity: 1; }

        @media (max-width: 900px) {
            .ds-grid { grid-template-columns: 1fr; }
            .ds-side { position: static; }
            .ds-main { height: 320px; }
        }
        @media (max-width: 600px) {
            .ds-wrap { padding-top: 92px; }
            .ds-title h1 { font-size: 26px; }
            .ds-main { height: 240px; border-radius: 16px; }
            .ds-card { padding: 18px; }
            .ds-sum { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
@include('partials.navbar')

@php
    use Illuminate\Support\Str;

    // URL gambar: cari sendiri kolom yang berisi nama file gambar (jpg/png/webp/...),
    // lalu cek lokasi aslinya di folder public. Tidak bergantung pada nama kolom.
    $imgExt = '/\.(jpe?g|png|webp|gif|avif|svg)(\?.*)?$/i';
    $imgUrl = function ($img) use ($imgExt) {
        if (!$img) return null;

        $raw = null;
        if (is_string($img)) {
            $raw = $img;
        } else {
            $attrs = $img->getAttributes();
            foreach (['image_path', 'path', 'url', 'image_url', 'image', 'file', 'photo', 'src', 'filename'] as $k) {
                if (!empty($attrs[$k]) && is_string($attrs[$k]) && preg_match($imgExt, $attrs[$k])) { $raw = $attrs[$k]; break; }
            }
            if (!$raw) {
                foreach ($attrs as $v) {
                    if (is_string($v) && preg_match($imgExt, $v)) { $raw = $v; break; }
                }
            }
        }
        if (!$raw) return null;

        if (Str::startsWith($raw, ['http://', 'https://', '//', 'data:'])) return $raw;

        $p = ltrim(str_replace('\\', '/', $raw), '/');
        foreach ([$p, 'storage/' . $p, 'images/' . $p, 'images/destinations/' . $p, 'img/' . $p] as $c) {
            if (file_exists(public_path($c))) return asset($c);
        }
        return asset(Str::startsWith($p, ['images/', 'img/', 'storage/', 'assets/', 'uploads/']) ? $p : 'storage/' . $p);
    };

    $gallery = $destination->images->map(fn ($i) => $imgUrl($i))->filter()->values()->all();

    // Cadangan: kalau gambar disimpan langsung di tabel destinations
    if (!$gallery) {
        $dAttrs = $destination->getAttributes();
        foreach (['image', 'image_url', 'thumbnail', 'photo', 'cover', 'picture'] as $k) {
            if (!empty($dAttrs[$k]) && ($u = $imgUrl($dAttrs[$k]))) { $gallery = [$u]; break; }
        }
    }
    $cover = $gallery[0] ?? null;

    // Gambar bawaan kalau destinasi belum punya foto (cek lokasi umum di folder public)
    $defaultImg = null;
    foreach (['images/default-destination.jpg', 'images/default.jpg', 'images/placeholder.jpg', 'images/no-image.jpg',
              'images/default-destination.png', 'images/default.png', 'images/placeholder.png', 'images/no-image.png',
              'images/default-destination.webp', 'img/default.jpg', 'img/placeholder.jpg'] as $c) {
        if (file_exists(public_path($c))) { $defaultImg = asset($c); break; }
    }
    if (!$cover && $defaultImg) $cover = $defaultImg;

    // Foto kartu destinasi lain: relasi images, kolom tabel, accessor model, lalu gambar bawaan
    $destImg = function ($d) use ($imgUrl, $imgExt, $defaultImg) {
        if ($u = $imgUrl($d->images->first())) return $u;
        foreach ($d->getAttributes() as $v) {
            if (is_string($v) && preg_match($imgExt, $v)) return $imgUrl($v);
        }
        foreach (['image_url', 'thumbnail', 'thumbnail_url', 'cover_url', 'main_image', 'primary_image', 'photo_url'] as $a) {
            $v = rescue(fn () => $d->{$a}, null, false);
            if (is_string($v) && $v !== '') return $imgUrl($v);
        }
        return $defaultImg;
    };

    $stars = fn ($n) => str_repeat('★', (int) round($n)) . str_repeat('☆', 5 - (int) round($n));

    $priceMin = (int) ($destination->price_min ?? 0);
    $priceMax = (int) ($destination->price_max ?? 0);
    $rp = fn ($n) => 'Rp ' . number_format($n, 0, ',', '.');

    $dist = $destination->reviews->groupBy('rating')->map->count();

    $bt = $destination->bestTime;
    if ($bt instanceof \Illuminate\Support\Collection) $bt = $bt->first();
    $btRows = [];
    if ($bt) {
        foreach ($bt->getAttributes() as $k => $v) {
            if (in_array($k, ['id', 'destination_id', 'created_at', 'updated_at'], true)) continue;
            if ($v === null || $v === '') continue;
            $btRows[Str::of($k)->replace('_', ' ')->toString()] = $v;
        }
    }

    $hasCoords = $destination->latitude && $destination->longitude;
    // Teks alamat singkat + link Google Maps + aplikasi transportasi online
    $dAttrs2 = $destination->getAttributes();
    $addressText = null;
    foreach (['address', 'location', 'area', 'district'] as $k) {
        if (!empty($dAttrs2[$k]) && is_string($dAttrs2[$k])) { $addressText = $dAttrs2[$k]; break; }
    }
    $addressText = $addressText ?: ($destination->regency?->name ?? 'Surabaya');

    $mapQuery = urlencode(trim($destination->name . ' ' . ($destination->regency?->name ?? '') . ' Jawa Timur'));
    $gmapsUrl = null;
    foreach (['maps_url', 'map_url', 'google_maps_url', 'maps_link', 'gmaps_url', 'gmaps_link'] as $k) {
        if (!empty($dAttrs2[$k]) && is_string($dAttrs2[$k])) { $gmapsUrl = $dAttrs2[$k]; break; }
    }
    $gmapsUrl = $gmapsUrl ?: ($hasCoords
        ? 'https://www.google.com/maps/search/?api=1&query=' . $destination->latitude . ',' . $destination->longitude
        : 'https://www.google.com/maps/search/?api=1&query=' . $mapQuery);

    // Ubah URL di sini kalau kamu punya link yang lebih spesifik (deep link) di halaman kuliner.
    $rideApps = [
        ['name' => 'Gojek',   'color' => '#00aa13', 'url' => 'https://www.gojek.com/'],
        ['name' => 'Grab',    'color' => '#00b14f', 'url' => 'https://www.grab.com/id/'],
        ['name' => 'Maxim',   'color' => '#ffdd00', 'url' => 'https://taximaxim.com/id/'],
        ['name' => 'GreenSM', 'color' => '#e11d2e', 'url' => 'https://www.google.com/search?q=Green+SM+taksi+listrik+Surabaya'],
    ];

    $reviewAction = \Illuminate\Support\Facades\Route::has('destinations.reviews.store')
        ? route('destinations.reviews.store', $destination->slug)
        : url('/destinations/' . $destination->slug . '/reviews');

    $stopPoints = $nearestStops->filter(fn ($s) => $s->latitude && $s->longitude)->map(fn ($s) => [
        'name' => $s->name, 'lat' => (float) $s->latitude, 'lng' => (float) $s->longitude,
    ])->values()->all();
@endphp

<main class="ds-wrap">

    <nav class="ds-crumb" aria-label="Breadcrumb">
        <a href="{{ route('destinations.index') }}">Destinasi</a> <span>/</span>
        @if($destination->regency)<span>{{ $destination->regency->name }}</span> <span>/</span>@endif
        <span>{{ $destination->name }}</span>
    </nav>

    @if(session('success'))
        <div class="ds-ok"><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</div>
    @endif

    {{-- GALLERY --}}
    <section class="ds-gallery">
        <div class="ds-main" id="ds-main" @if($cover) style="background-image:url('{{ $cover }}')" @endif>
            <div class="ds-wish">
                @include('partials.wishlist-button', ['destination' => $destination, 'on' => $isWishlisted, 'floating' => false])
            </div>
            @if(count($gallery) > 1)
                <button type="button" class="ds-nav prev" id="g-prev" aria-label="Sebelumnya"><i class="fa-solid fa-chevron-left"></i></button>
                <button type="button" class="ds-nav next" id="g-next" aria-label="Berikutnya"><i class="fa-solid fa-chevron-right"></i></button>
                <span class="ds-count" id="g-count">1 / {{ count($gallery) }}</span>
            @endif
        </div>
        @if(count($gallery) > 1)
            <div class="ds-thumbs" id="ds-thumbs">
                @foreach($gallery as $i => $u)
                    <button type="button" class="ds-thumb {{ $i === 0 ? 'is-active' : '' }}" data-i="{{ $i }}" style="background-image:url('{{ $u }}')" aria-label="Foto {{ $i + 1 }}"></button>
                @endforeach
            </div>
        @endif
    </section>

    <div class="ds-grid">

        {{-- KOLOM UTAMA --}}
        <div>
            <div class="ds-title">
                <h1>{{ $destination->name }}</h1>
                <button type="button" class="ds-btn ds-btn-ghost" id="share-btn"><i class="fa-solid fa-share-nodes"></i> Share</button>
            </div>

            <div class="ds-meta">
                @if($destination->regency)
                    <span><i class="fa-solid fa-location-dot"></i>{{ $destination->regency->name }}</span>
                @endif
                @if(!empty($destination->category_label))
                    <span class="ds-chip">{{ $destination->category_label }}</span>
                @endif
                <span class="ds-star">
                    <i class="fa-solid fa-star"></i> {{ number_format($averageRating, 1) }}
                    <span style="opacity:.7;color:var(--text-primary)">({{ $reviewCount }} review)</span>
                </span>
            </div>

            {{-- Tentang --}}
            <section class="ds-card">
                <h2>Tentang {{ $destination->name }}</h2>
                <div class="ds-desc is-clamped" id="ds-desc">{{ $destination->description }}</div>
                <button type="button" class="ds-link" id="ds-more" hidden>Baca selengkapnya</button>
            </section>

            {{-- Waktu terbaik --}}
            @if(count($btRows))
                <section class="ds-card">
                    <h2><i class="fa-regular fa-clock" style="color:var(--gold)"></i> Waktu terbaik berkunjung</h2>
                    @foreach($btRows as $k => $v)
                        <div class="ds-row"><span class="k">{{ $k }}</span><span class="v">{{ is_scalar($v) ? $v : json_encode($v) }}</span></div>
                    @endforeach
                </section>
            @endif

            {{-- Review --}}
            <section class="ds-card" id="reviews">
                <h2>Review ({{ $reviewCount }})</h2>

                @if($reviewCount > 0)
                    <div class="ds-sum">
                        <div class="ds-big">
                            <b>{{ number_format($averageRating, 1) }}</b>
                            <div class="ds-star">{{ $stars($averageRating) }}</div>
                            <div class="ds-time">{{ $reviewCount }} review</div>
                        </div>
                        <div class="ds-bars">
                            @for($i = 5; $i >= 1; $i--)
                                @php $c = $dist[$i] ?? 0; $pct = $reviewCount ? round($c / $reviewCount * 100) : 0; @endphp
                                <div class="ds-bar"><span>{{ $i }}★</span><i><span style="width:{{ $pct }}%"></span></i><span>{{ $c }}</span></div>
                            @endfor
                        </div>
                    </div>
                @endif

                @forelse($destination->reviews as $idx => $r)
                    @php
                        $mp = $r->media_path ?? null;
                        $mu = $mp ? asset('storage/' . ltrim($mp, '/')) : null;
                        $isVideo = $mp && Str::endsWith(Str::lower($mp), ['.mp4', '.mov']);
                    @endphp
                    <article class="ds-review" @if($idx >= 5) hidden data-extra @endif>
                        <div class="ds-rhead">
                            <div style="display:flex;align-items:center">
                                <span class="ds-av">{{ Str::upper(Str::substr($r->name ?: '?', 0, 1)) }}</span>
                                <div><b>{{ $r->name }}</b><div class="ds-time">{{ $r->created_at->diffForHumans() }}</div></div>
                            </div>
                            <div class="ds-star">{{ $stars($r->rating) }}</div>
                        </div>
                        <p class="ds-rbody">{{ $r->comment }}</p>
                        @if($mu)
                            @if($isVideo)
                                <video class="ds-rmedia" src="{{ $mu }}" controls preload="metadata"></video>
                            @else
                                <img class="ds-rmedia" src="{{ $mu }}" alt="Foto dari {{ $r->name }}" loading="lazy">
                            @endif
                        @endif
                    </article>
                @empty
                    <p style="opacity:.65;margin:0">Belum ada review. Jadilah yang pertama!</p>
                @endforelse

                @if($destination->reviews->count() > 5)
                    <button type="button" class="ds-link" id="rv-more">Tampilkan semua review</button>
                @endif
            </section>

            {{-- Form review --}}
            <section class="ds-card" id="write-review">
                <h2>Tulis review</h2>
                <form action="{{ $reviewAction }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="ds-field">
                        <label for="rv-name">Nama</label>
                        <input class="ds-input" id="rv-name" type="text" name="name" maxlength="255" value="{{ old('name', auth()->user()->name ?? '') }}" required>
                        @error('name')<div class="ds-err">{{ $message }}</div>@enderror
                    </div>
                    <div class="ds-field">
                        <label>Rating</label>
                        <div class="ds-stars">
                            @for($i = 5; $i >= 1; $i--)
                                <input type="radio" id="st{{ $i }}" name="rating" value="{{ $i }}" @checked(old('rating') == $i) required>
                                <label for="st{{ $i }}" title="{{ $i }} bintang">★</label>
                            @endfor
                        </div>
                        @error('rating')<div class="ds-err">{{ $message }}</div>@enderror
                    </div>
                    <div class="ds-field">
                        <label for="rv-comment">Ceritakan pengalamanmu <span style="float:right;text-transform:none;font-weight:500"><span id="rv-count">0</span>/1000</span></label>
                        <textarea class="ds-input" id="rv-comment" name="comment" rows="4" maxlength="1000" required>{{ old('comment') }}</textarea>
                        @error('comment')<div class="ds-err">{{ $message }}</div>@enderror
                    </div>
                    <div class="ds-field">
                        <label for="rv-media">Foto / video (opsional, maks 20 MB)</label>
                        <input class="ds-input" id="rv-media" type="file" name="media" accept="image/png,image/jpeg,video/mp4,video/quicktime">
                        @error('media')<div class="ds-err">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="ds-btn"><i class="fa-solid fa-paper-plane"></i> Kirim review</button>
                </form>
            </section>
        </div>

        {{-- SIDEBAR --}}
        <aside class="ds-side">
            <section class="ds-card">
                <h2>Informasi</h2>
                @if($priceMax > 0)
                    <p class="ds-price">
                        {{ $priceMin > 0 && $priceMin !== $priceMax ? $rp($priceMin) . ' – ' . $rp($priceMax) : $rp($priceMax) }}
                        <small>/ orang</small>
                    </p>
                @else
                    <p class="ds-price">Gratis <small>atau belum ada info harga</small></p>
                @endif
                <div style="margin-top:14px">
                    @if($destination->regency)
                        <div class="ds-row"><span class="k">Kota / Kab.</span><span class="v">{{ $destination->regency->name }}</span></div>
                    @endif
                    @if(!empty($destination->category_label))
                        <div class="ds-row"><span class="k">Kategori</span><span class="v">{{ $destination->category_label }}</span></div>
                    @endif
                    <div class="ds-row"><span class="k">Rating</span><span class="v ds-star">{{ number_format($averageRating, 1) }} ★</span></div>
                </div>
                <a href="#write-review" class="ds-btn ds-btn-block"><i class="fa-regular fa-pen-to-square"></i> Tulis review</a>
            </section>


            {{-- Find your way --}}
            <section class="ds-card ds-way" id="find-your-way">
                <div class="ds-eyebrow">Location</div>
                <h2>Find Your Way</h2>
                <p class="ds-addr">{{ $addressText }}</p>
                <a class="ds-btn ds-btn-lg" href="{{ $gmapsUrl }}" target="_blank" rel="noopener">View on Google Maps →</a>

                <hr class="ds-hr">

                <h3 class="ds-get">Get Me There</h3>
                <p class="ds-sub2">Pesan transportasi online ke lokasi ini.</p>
                <div class="ds-pills">
                    @foreach($rideApps as $app)
                        <a class="ds-pill" href="{{ $app['url'] }}" target="_blank" rel="noopener">
                            <span class="dot" style="background:{{ $app['color'] }}"></span>{{ $app['name'] }}
                        </a>
                    @endforeach
                </div>

                @if($nearestStops->isNotEmpty())
                    <div class="ds-sub" style="margin-top:22px">Halte Suroboyo Bus / Wira Wiri terdekat</div>
                    @foreach($nearestStops as $stop)
                        <div class="ds-row">
                            <div><b>{{ $stop->name }}</b></div>
                            <span class="v">{{ number_format($stop->calculated_distance, 1) }} km</span>
                        </div>
                    @endforeach
                @else
                    <p class="ds-note">Tidak ada stasiun atau halte Suroboyo Bus/Wira Wiri dalam radius 5km.</p>
                @endif
            </section>
        </aside>
    </div>

    {{-- Destinasi lain --}}
    @if($relatedDestinations->isNotEmpty())
        <section style="margin-top:12px">
            <h2 style="font-family:'Playfair Display',serif;font-size:24px;margin:0 0 16px">Things to do in {{ $destination->regency?->name ?? 'sekitar sini' }}</h2>
            <div class="ds-rel">
                @foreach($relatedDestinations as $d)
                    @php $u = $destImg($d); @endphp
                    <a class="ds-item" href="{{ route('destinations.show', $d->slug) }}">
                        <div class="img" @if($u) style="background-image:url('{{ $u }}')" @endif></div>
                        <b>{{ $d->name }}</b>
                        <span>{{ !empty($d->category_label) ? $d->category_label : 'Lihat detail' }}</span>
                    </a>
                @endforeach
            </div>
        </section>
    @endif
</main>

{{-- Lightbox --}}
<div class="ds-lb" id="ds-lb" role="dialog" aria-modal="true" aria-label="Galeri foto">
    <button type="button" class="x" id="lb-x" aria-label="Tutup"><i class="fa-solid fa-xmark"></i></button>
    <button type="button" class="p" id="lb-p" aria-label="Sebelumnya"><i class="fa-solid fa-chevron-left"></i></button>
    <img id="lb-img" alt="">
    <button type="button" class="n" id="lb-n" aria-label="Berikutnya"><i class="fa-solid fa-chevron-right"></i></button>
</div>
<div class="ds-toast" id="ds-toast"></div>

@include('partials.footer')

<script>
(function () {
    const $ = (id) => document.getElementById(id);
    const images = @json($gallery);
    let cur = 0;

    function toast(msg) {
        const t = $('ds-toast'); t.textContent = msg; t.classList.add('is-on');
        setTimeout(() => t.classList.remove('is-on'), 2000);
    }

    /* Galeri */
    const main = $('ds-main');
    function show(i) {
        if (!images.length) return;
        cur = (i + images.length) % images.length;
        main.style.backgroundImage = `url('${images[cur]}')`;
        const c = $('g-count'); if (c) c.textContent = (cur + 1) + ' / ' + images.length;
        document.querySelectorAll('.ds-thumb').forEach(t => t.classList.toggle('is-active', +t.dataset.i === cur));
        if ($('ds-lb').classList.contains('is-open')) $('lb-img').src = images[cur];
    }
    $('g-prev')?.addEventListener('click', (e) => { e.stopPropagation(); show(cur - 1); });
    $('g-next')?.addEventListener('click', (e) => { e.stopPropagation(); show(cur + 1); });
    document.querySelectorAll('.ds-thumb').forEach(t => t.addEventListener('click', () => show(+t.dataset.i)));

    /* Lightbox */
    const lb = $('ds-lb');
    function openLb() { if (!images.length) return; $('lb-img').src = images[cur]; lb.classList.add('is-open'); }
    function closeLb() { lb.classList.remove('is-open'); }
    main.addEventListener('click', (e) => {
        if (e.target.closest('button, a, form')) return; // jangan bentrok dengan tombol wishlist / panah
        openLb();
    });
    $('lb-x').addEventListener('click', closeLb);
    $('lb-p').addEventListener('click', () => show(cur - 1));
    $('lb-n').addEventListener('click', () => show(cur + 1));
    lb.addEventListener('click', (e) => { if (e.target === lb) closeLb(); });
    document.addEventListener('keydown', (e) => {
        if (!lb.classList.contains('is-open')) return;
        if (e.key === 'Escape') closeLb();
        if (e.key === 'ArrowLeft') show(cur - 1);
        if (e.key === 'ArrowRight') show(cur + 1);
    });

    /* Deskripsi: baca selengkapnya */
    const desc = $('ds-desc'), more = $('ds-more');
    if (desc && desc.scrollHeight > desc.clientHeight + 4) {
        more.hidden = false;
        more.addEventListener('click', () => {
            const clamped = desc.classList.toggle('is-clamped');
            more.textContent = clamped ? 'Baca selengkapnya' : 'Tampilkan lebih sedikit';
        });
    }

    /* Review: tampilkan semua */
    $('rv-more')?.addEventListener('click', function () {
        document.querySelectorAll('[data-extra]').forEach(el => el.hidden = false);
        this.remove();
    });

    /* Counter komentar */
    const ta = $('rv-comment');
    if (ta) {
        const upd = () => { $('rv-count').textContent = ta.value.length; };
        ta.addEventListener('input', upd); upd();
    }
    const media = $('rv-media');
    media?.addEventListener('change', () => {
        const f = media.files[0];
        if (f && f.size > 20 * 1024 * 1024) { alert('Ukuran file maksimal 20 MB.'); media.value = ''; }
    });

    /* Share */
    $('share-btn').addEventListener('click', async () => {
        const data = { title: @json($destination->name), url: location.href };
        try {
            if (navigator.share) { await navigator.share(data); return; }
            await navigator.clipboard.writeText(location.href);
            toast('Link disalin');
        } catch (e) { /* dibatalkan pengguna */ }
    });

})();
</script>
</body>
</html>