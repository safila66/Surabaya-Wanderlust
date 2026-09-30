<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accommodations | Surabaya Wanderlust</title>

    {{-- Unified CSS --}}
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* ─── PAGE-SPECIFIC OVERRIDES ─────────────────────── */

        /* Hero khusus accommodations */
        .accommodations-hero {
            position: relative;
            padding: 105px 5% 70px;
            background:
                linear-gradient(135deg, rgba(7,17,42,0.92) 0%, rgba(18,34,84,0.88) 100%),
                url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=1600&h=700&fit=crop') center/cover no-repeat;
            overflow: hidden;
        }

        .accommodations-hero::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 60px;
            background: linear-gradient(to bottom, transparent, var(--navy));
        }

        /* Cards grid */
        .accommodations-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        /* Placeholder image */
        .card-placeholder {
            width: 100%;
            height: 175px;
            background: rgba(255,255,255,0.05);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(244,232,11,0.4);
            font-size: 30px;
        }

        /* Price tag */
        .price-tag {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 11px;
            font-weight: 600;
            color: var(--teal);
        }

        /* Result count */
        .result-count {
            font-size: 12px;
            color: var(--text-muted);
            font-weight: 500;
        }

        @media (max-width: 900px) {
            .accommodations-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 600px) {
            .accommodations-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>

<body>

@include('partials.navbar')

{{-- ── HERO ──────────────────────────────────────────────── --}}
<section class="accommodations-hero">
    <div class="page-hero-content">
        <span class="page-hero-kicker">✦ Stay in Surabaya</span>
        <h1 class="page-hero-title">
            Find Your Perfect<br>Stay in Surabaya.
        </h1>
        <p class="page-hero-desc">
            Explore hotels, guesthouses, and places to stay
            across cities and regions in Surabaya.
        </p>
    </div>
</section>


{{-- ── FILTER ────────────────────────────────────────────── --}}
<section class="filter-section" style="max-width:1240px; margin:auto; padding:0 7%; margin-top: -30px; position:relative; z-index: 10;">
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

            @include('partials.price-slider', ['max' => $sliderMax, 'step' => $sliderStep])

            <div>
                <button type="submit" class="btn-primary" style="background: var(--gold); border: none; padding: 12px 24px; border-radius: 8px; font-weight: bold; color: white; cursor: pointer; height: 46px;">Filter</button>
            </div>
        </div>
    </form>
</section>


{{-- ── ACCOMMODATIONS LIST ────────────────────────────────── --}}
<section class="section">

    <div style="max-width:1250px; margin:auto;">

        <div class="section-heading" style="margin-bottom:30px;">
            <div>
                <span class="section-title-kicker">Where to Stay</span>
                <h2 style="font-size:30px; font-weight:800; color:#fff; margin-top:6px;">
                    Accommodations from every corner.
                </h2>
            </div>
            <span class="result-count">{{ $accommodations->count() }} accommodations found</span>
        </div>

        @if ($accommodations->count())

            <div class="accommodations-grid">
                @foreach ($accommodations as $accommodation)
                    <a href="{{ route('accommodations.show', $accommodation->slug) }}" class="uni-card" style="text-decoration: none; color: inherit; display: flex; flex-direction: column;">

                        <div class="card-placeholder" style="position:relative; overflow:hidden;">
                            @if ($accommodation->image)
                                <img
                                    class="uni-card-image"
                                    src="{{ asset('storage/' . $accommodation->image) }}"
                                    alt="{{ $accommodation->name }}"
                                    style="position:absolute; inset:0; width:100%; height:100%; object-fit:cover; transition: transform 0.5s ease;">
                            @else
                                <i class="fa-solid fa-bed" style="transition: transform 0.5s ease;"></i>
                            @endif
                        </div>

                        <div class="uni-card-body" style="flex: 1; display: flex; flex-direction: column;">
                            <span class="uni-card-label">
                                {{ $accommodation->regency->name ?? 'Surabaya' }}
                                @if ($accommodation->regency?->province)
                                    · {{ $accommodation->regency->province->name }}
                                @endif
                            </span>
                            <div class="uni-card-title">{{ $accommodation->name }}</div>
                            <div class="uni-card-desc" style="flex: 1;">
                                {{ \Illuminate\Support\Str::limit($accommodation->description, 110) }}
                            </div>
                            <div class="uni-card-meta" style="margin-top: 15px;">
                                <span class="price-tag">
                                    @if ($accommodation->price_range)
                                        <i class="fa-solid fa-tag"></i>
                                        {{ $accommodation->price_range }}
                                    @else
                                        <i class="fa-solid fa-bed"></i>
                                        Accommodation
                                    @endif
                                </span>
                                <span class="uni-card-link" style="pointer-events: none;">
                                    Explore →
                                </span>
                            </div>
                        </div>

                    </a>
                @endforeach
            </div>

        @else

            <div class="empty-state">
                <div style="font-size:48px; margin-bottom:16px;">🛏️</div>
                <h3>No accommodations found</h3>
                <p>Try changing your filters or exploring another region.</p>
            </div>

        @endif

    </div>
</section>


@include('partials.footer')

</body>
</html>