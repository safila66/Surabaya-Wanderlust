<!DOCTYPE html>
<html lang="id">
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

        /* Hero khusus culinary — tanpa foto background */
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

        /* Cards grid */
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
        }
        @media (max-width: 600px) {
            .culinary-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>

<body>

@include('partials.navbar')

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
<section class="filter-section">
    <div class="filter-card">
        <div class="filter-card-title">??? Explore Culinary by Region</div>

        <form action="{{ route('culinary.index') }}" method="GET">
            <div style="display:grid; grid-template-columns: 1fr 1fr auto; gap:16px; align-items:flex-end;">

                <div>
                    <label class="filter-label">Region</label>
                    <select name="region" id="region" class="filter-select">
                        <option value="">All Regions</option>
                        <option value="barat" {{ request('region') == 'barat' ? 'selected' : '' }}>Surabaya Barat</option>
                        <option value="timur" {{ request('region') == 'timur' ? 'selected' : '' }}>Surabaya Timur</option>
                        <option value="tengah" {{ request('region') == 'tengah' ? 'selected' : '' }}>Surabaya Tengah</option>
                        <option value="utara" {{ request('region') == 'utara' ? 'selected' : '' }}>Surabaya Utara</option>
                        <option value="selatan" {{ request('region') == 'selatan' ? 'selected' : '' }}>Surabaya Selatan</option>
                    </select>
                </div>

                <div>
                    <label class="filter-label">Food Name</label>
                    <input type="text" name="food_name" class="filter-select" placeholder="Search food name..." value="{{ request('food_name') }}">
                </div>

                <div>
                    <button type="submit" class="btn-primary" style="width:100%; justify-content:center;">
                        Explore
                    </button>
                </div>

            </div>
        </form>
    </div>
</section>


{{-- ── CULINARY LIST ──────────────────────────────────────── --}}
<section class="section">

    <div style="max-width:1250px; margin:auto;">

        <div class="section-heading" style="margin-bottom:30px;">
            <div>
                <span class="section-title-kicker">Local Flavours</span>
                <h2 style="font-size:30px; font-weight:800; color:#fff; margin-top:6px;">
                    Culinary from every corner.
                </h2>
            </div>
            <span class="result-count">{{ $culinaries->count() }} culinary found</span>
        </div>

        @if ($culinaries->count())

            <div class="culinary-grid">
                @foreach ($culinaries as $culinary)
                    <div class="uni-card">

                        <div class="card-placeholder" style="position:relative; overflow:hidden;">
                            @if ($culinary->image)
                                <img
                                    class="uni-card-image"
                                    src="{{ asset('storage/' . $culinary->image) }}"
                                    alt="{{ $culinary->name }}"
                                    style="position:absolute; inset:0; width:100%; height:100%; object-fit:cover;">
                            @else
                                <i class="fa-solid fa-utensils"></i>
                            @endif
                        </div>

                        <div class="uni-card-body">
                            <span class="uni-card-label">
                                {{ $culinary->regency->name ?? 'Surabaya' }}
                                @if ($culinary->regency?->province)
                                    · {{ $culinary->regency->province->name }}
                                @endif
                            </span>
                            <div class="uni-card-title">{{ $culinary->name }}</div>
                            <div class="uni-card-desc">
                                {{ \Illuminate\Support\Str::limit($culinary->description, 110) }}
                            </div>
                            <div class="uni-card-meta">
                                <span class="price-tag">
                                    @if ($culinary->price_range)
                                        <i class="fa-solid fa-tag"></i>
                                        {{ $culinary->price_range }}
                                    @else
                                        <i class="fa-solid fa-bowl-rice"></i>
                                        Local dish
                                    @endif
                                </span>
                                <a href="{{ route('culinary.show', $culinary->slug) }}" class="uni-card-link">
                                    Explore →
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        @else

            <div class="empty-state">
                <div style="font-size:48px; margin-bottom:16px;">🍜</div>
                <h3>No culinary found</h3>
                <p>Try exploring another province or city.</p>
            </div>

        @endif

    </div>
</section>


@include('partials.footer')

</body>
</html>
