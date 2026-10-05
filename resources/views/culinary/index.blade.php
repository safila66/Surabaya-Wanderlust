<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culinary | Surabaya Wanderlust</title>

    {{-- Unified CSS --}}
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* ─── PAGE-SPECIFIC OVERRIDES ─────────────────────── */

        /* Hero khusus culinary */
        .culinary-hero {
            position: relative;
            padding: 105px 5% 70px;
            background:
                linear-gradient(135deg, rgba(7,17,42,0.92) 0%, rgba(18,34,84,0.88) 100%),
                url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=1600&h=700&fit=crop') center/cover no-repeat;
            overflow: hidden;
        }

        .culinary-hero::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 60px;
            background: linear-gradient(to bottom, transparent, var(--navy));
        }

        /* ── Filter ── */
        .culinary-filter {
            max-width: 1240px;
            margin: -30px auto 0;
            padding: 0 7%;
            position: relative;
            z-index: 10;
        }
        .filter-form {
            margin-bottom: 30px;
            padding: 20px;
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 12px;
        }
        .filter-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr auto;
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
        .filter-actions { display: flex; align-items: center; gap: 12px; }
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

        /* ── Cards grid ── */
        .culinary-grid {
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
            .culinary-grid { grid-template-columns: repeat(2, 1fr); }
            .filter-grid   { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 600px) {
            .culinary-grid { grid-template-columns: 1fr; }
            .filter-grid   { grid-template-columns: 1fr; }
        }
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
    $hasFilter = request()->hasAny(['region', 'search_name', 'price_min', 'price_max']);
@endphp

{{-- ── HERO ──────────────────────────────────────────────── --}}
<section class="culinary-hero">
    <div class="page-hero-content">
        <span class="page-hero-kicker">✦ Taste Surabaya</span>
        <h1 class="page-hero-title">
            Discover the<br>flavors of Surabaya.
        </h1>
        <p class="page-hero-desc">
            Explore local dishes, traditional flavors, and culinary stories
            from cities and regions across Surabaya.
        </p>
    </div>
</section>


{{-- ── FILTER ────────────────────────────────────────────── --}}
<section class="filter-section culinary-filter">
    <form action="{{ url()->current() }}" method="GET" class="filter-form">
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
                <label class="filter-label" for="filter-search">Cari Nama</label>
                <input id="filter-search" type="text" name="search_name"
                       value="{{ request('search_name') }}" placeholder="Cari nama..."
                       class="filter-input">
            </div>

            @include('partials.price-slider', ['max' => $sliderMax, 'step' => $sliderStep])

            <div class="filter-actions">
                <button type="submit" class="btn-primary filter-submit">Filter</button>
                @if($hasFilter)
                    <a href="{{ url()->current() }}" class="filter-reset">Reset</a>
                @endif
            </div>

        </div>
    </form>
</section>


{{-- ── CULINARY LIST ──────────────────────────────────────── --}}
<section class="section">

    <div style="max-width:1250px; margin:auto;">

        <div class="section-heading" style="margin-bottom:30px;">
            <div>
                <span class="section-title-kicker">Local Flavours</span>
                <h2 style="font-size:30px; font-weight:800; color:var(--text-primary, #fff); margin-top:6px;">
                    Culinary from every corner.
                </h2>
            </div>
            <span class="result-count">{{ $culinaries->total() }} culinary found</span>
        </div>

        @if ($culinaries->count())

            <div class="culinary-grid">
                @foreach ($culinaries as $culinary)

                    {{-- Default gambar otomatis: Cafe & Resto atau Bar & Club, sesuai kategori --}}
                    @php $cardDefault = \App\Support\CulinaryImage::defaultFor($culinary); @endphp

                    <a href="{{ route('culinary.show', $culinary->slug) }}" class="uni-card" style="text-decoration: none; color: inherit; display: flex; flex-direction: column;">

                        <div class="card-placeholder" style="position:relative; overflow:hidden;">
                            <img
                                class="uni-card-image"
                                src="{{ \App\Support\Media::url($culinary->image, $cardDefault) }}"
                                alt="{{ $culinary->name }}"
                                loading="lazy"
                                onerror="this.onerror=null;this.src='{{ \App\Support\Media::fallback($cardDefault) }}';"
                                style="position:absolute; inset:0; width:100%; height:100%; object-fit:cover; transition: transform 0.5s ease;">
                        </div>

                        <div class="uni-card-body" style="flex: 1; display: flex; flex-direction: column;">
                            <span class="uni-card-label">
                                {{ $culinary->regency->name ?? 'Surabaya' }}
                                @if ($culinary->regency?->province)
                                    · {{ $culinary->regency->province->name }}
                                @endif
                            </span>
                            <div class="uni-card-title">{{ $culinary->name }}</div>
                            <div class="uni-card-desc" style="flex: 1;">
                                {{ \Illuminate\Support\Str::limit($culinary->description, 110) }}
                            </div>
                            <div class="uni-card-meta" style="margin-top: 15px;">
                                <span class="price-tag">
                                    @if ($culinary->price_range)
                                        <i class="fa-solid fa-tag"></i>
                                        {{ $culinary->price_range }}
                                    @else
                                        <i class="fa-solid fa-bowl-rice"></i>
                                        Local dish
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

            {{-- ── PAGINATION (tombol halaman) ── --}}
            {{ $culinaries->onEachSide(1)->links('partials.pagination', ['label' => 'kuliner']) }}

        @else

            <div class="empty-state">
                <div style="font-size:48px; margin-bottom:16px;">🍜</div>
                <h3>No culinary found</h3>
                <p>Try changing your filters or exploring another region.</p>
                @if($hasFilter)
                    <a href="{{ url()->current() }}" class="filter-reset">Reset filter</a>
                @endif
            </div>

        @endif

    </div>
</section>


@include('partials.footer')

</body>
</html>