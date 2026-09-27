<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $regionName }} Recommendations — NusaExplore</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { font-family: Arial, sans-serif; background: #f6f4ee; color: #26352f; }
        a { text-decoration: none; }
        .navbar { height: 78px; padding: 0 7%; display: flex; align-items: center; justify-content: space-between; background: #ffffff; border-bottom: 1px solid #e8e5dc; position: relative; z-index: 20; }
        .brand { color: #24584a; font-size: 24px; font-weight: 800; }
        .brand-sub { margin-top: 3px; color: #8a8d86; font-size: 10px; }
        .nav-links { display: flex; gap: 25px; }
        .nav-links a { color: #505a54; font-size: 12px; font-weight: 600; }
        .nav-links a:hover { color: #24584a; }

        .province-hero { min-height: 400px; position: relative; display: flex; align-items: flex-end; padding: 80px 8%; background: linear-gradient(to top, rgba(20, 35, 29, .82), rgba(20, 35, 29, .08)), url("https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?auto=format&fit=crop&w=2000&q=90"); background-size: cover; background-position: center; }
        .hero-inner { max-width: 850px; color: white; }
        .hero-kicker { font-size: 12px; letter-spacing: 4px; text-transform: uppercase; margin-bottom: 13px; color: #e5d4a5; }
        .hero-inner h1 { font-size: 62px; line-height: 1; margin-bottom: 20px; }
        .hero-inner p { max-width: 720px; font-size: 16px; line-height: 1.7; color: rgba(255,255,255,.9); }

        .container { width: 86%; max-width: 1250px; margin: auto; }
        .section { padding: 40px 0 70px; }
        .section-heading { margin-bottom: 25px; }
        .section-heading h2 { color: #263b33; font-size: 29px; }
        .section-heading p { margin-top: 8px; color: #7b817d; font-size: 14px; }
        
        .item-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 18px; }
        .item-card { background: white; padding: 22px; border-radius: 17px; border: 1px solid #e8e5dc; transition: .25s ease; }
        .item-card:hover { transform: translateY(-4px); border-color: #b8c7b7; box-shadow: 0 12px 28px rgba(30, 60, 45, .08); }
        .item-image { width: 100%; height: 180px; object-fit: cover; border-radius: 10px; margin-bottom: 15px; }
        .item-card h3 { color: #2b463b; font-size: 17px; margin-bottom: 8px; }
        .item-card p { color: #7c827d; font-size: 12px; line-height: 1.5; }
        
        .empty { background: white; padding: 35px; border-radius: 18px; text-align: center; color: #7b817d; }
        
        .categories-section { padding: 50px 0 10px; }
        .categories-header { margin-bottom: 20px; }
        .categories-header h2 { color: #263b33; font-size: 24px; }
        .categories-scroll { display: flex; gap: 15px; overflow-x: auto; padding-bottom: 15px; scrollbar-width: none; }
        .categories-scroll::-webkit-scrollbar { display: none; }
        .category-btn { flex: 0 0 auto; background: white; border: 1px solid #e8e5dc; border-radius: 16px; padding: 20px 15px; min-width: 120px; text-align: center; transition: 0.2s ease; box-shadow: 0 4px 12px rgba(0,0,0,0.03); display: flex; flex-direction: column; align-items: center; justify-content: center;}
        .category-btn:hover { transform: translateY(-3px); border-color: #b8c7b7; box-shadow: 0 8px 20px rgba(30, 60, 45, .08); }
        .cat-icon { font-size: 32px; margin-bottom: 10px; }
        .cat-name { color: #2b463b; font-size: 13px; font-weight: 600; }

        footer { padding: 45px 7%; background: #203c32; color: white; text-align: center; }
        footer h3 { font-size: 22px; }
        footer p { margin-top: 8px; color: #c8d2cc; font-size: 13px; }
    </style>
</head>
<body>
    <nav class="navbar">
        <div>
            <div class="brand">NusaExplore</div>
            <div class="brand-sub">Explore Surabaya Beyond the Destination</div>
        </div>
        <div class="nav-links">
            <a href="{{ route('home') }}">HOME</a>
            <a href="{{ route('destinations.index') }}">DESTINATIONS</a>
            <a href="{{ route('provinces.index') }}">REGIONS</a>
        </div>
    </nav>

    <section class="province-hero">
        <div class="hero-inner">
            <div class="hero-kicker">Regional Recommendations</div>
            <h1>{{ $regionName }}</h1>
            <p>Discover the best accommodations, transportation, entertainment, restaurants, cafes, bars, and more in {{ $regionName }}.</p>
        </div>
    </section>

    <!-- Categories Navigation -->
    <section class="categories-section container">
        <div class="categories-header">
            <h2>Categories</h2>
        </div>
        <div class="categories-scroll">
            <a href="#entertainment" class="category-btn">
                <div class="cat-icon">🎢</div>
                <div class="cat-name">Entertainment</div>
            </a>
            <a href="#resto-cafe" class="category-btn">
                <div class="cat-icon">☕</div>
                <div class="cat-name">Resto & Cafe</div>
            </a>
            <a href="#accommodation" class="category-btn">
                <div class="cat-icon">🏨</div>
                <div class="cat-name">Accommodation</div>
            </a>
            <a href="#transport" class="category-btn">
                <div class="cat-icon">🚌</div>
                <div class="cat-name">Transport</div>
            </a>
            <a href="#bar-club" class="category-btn">
                <div class="cat-icon">🍸</div>
                <div class="cat-name">Bar & Club</div>
            </a>
            <a href="#prayer-places" class="category-btn">
                <div class="cat-icon">🕌</div>
                <div class="cat-name">Prayer Places</div>
            </a>
        </div>
    </section>

    <!-- Entertainment -->
    <section class="section" id="entertainment">
        <div class="container">
            <div class="section-heading">
                <h2>Entertainment</h2>
                <p>Destinations and activities to enjoy your time.</p>
            </div>
            @if ($entertainment->count())
                <div class="item-grid">
                    @foreach ($entertainment as $item)
                        <a href="{{ route('destinations.show', $item->slug ?? '') }}" class="item-card" style="display: block; color: inherit;">
                            <img src="{{ $item->images->first()?->image_url ?? $item->image ?? 'https://images.unsplash.com/photo-1512100356356-de1b84283e18?w=800&q=80' }}" alt="{{ $item->name }}" class="item-image">
                            <h3>{{ $item->name }}</h3>
                            <p>{{ Str::limit($item->description, 80) }}</p>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="empty">Belum ada data entertainment tersedia di region ini.</div>
            @endif
        </div>
    </section>

    <!-- Resto & Cafe -->
    <section class="section" id="resto-cafe">
        <div class="container">
            <div class="section-heading">
                <h2>Resto & Cafe</h2>
                <p>Culinary spots, restaurants, and cozy cafes.</p>
            </div>
            @if ($restoCafe->count())
                <div class="item-grid">
                    @foreach ($restoCafe as $item)
                        <a href="{{ route('culinary.show', $item->slug ?? '') }}" class="item-card" style="display: block; color: inherit;">
                            <img src="{{ $item->images->first()?->image_url ?? $item->image ?? 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=800&q=80' }}" alt="{{ $item->name }}" class="item-image">
                            <h3>{{ $item->name }}</h3>
                            <p>{{ Str::limit($item->description, 80) }}</p>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="empty">Belum ada data resto & cafe tersedia di region ini.</div>
            @endif
        </div>
    </section>

    <!-- Accommodation -->
    <section class="section" id="accommodation">
        <div class="container">
            <div class="section-heading">
                <h2>Accommodation</h2>
                <p>Places to stay, from hotels to guesthouses.</p>
            </div>
            @if ($accommodations->count())
                <div class="item-grid">
                    @foreach ($accommodations as $item)
                        <a href="#" class="item-card" style="display: block; color: inherit;">
                            <img src="{{ $item->image ?? 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800&q=80' }}" alt="{{ $item->name }}" class="item-image">
                            <h3>{{ $item->name }}</h3>
                            <p>{{ Str::limit($item->description, 80) }}</p>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="empty">Belum ada data akomodasi tersedia di region ini.</div>
            @endif
        </div>
    </section>

    <!-- Transport -->
    <section class="section" id="transport">
        <div class="container">
            <div class="section-heading">
                <h2>Transport</h2>
                <p>Public transportations, rentals, and stations.</p>
            </div>
            @if ($transportations->count())
                <div class="item-grid">
                    @foreach ($transportations as $item)
                        <a href="#" class="item-card" style="display: block; color: inherit;">
                            <img src="{{ $item->image ?? 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=800&q=80' }}" alt="{{ $item->name }}" class="item-image">
                            <h3>{{ $item->name }}</h3>
                            <p>{{ Str::limit($item->description, 80) }}</p>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="empty">Belum ada data transport tersedia di region ini.</div>
            @endif
        </div>
    </section>

    <!-- Bar & Club -->
    <section class="section" id="bar-club">
        <div class="container">
            <div class="section-heading">
                <h2>Bar & Club</h2>
                <p>Nightlife and places to socialize.</p>
            </div>
            @if ($barClub->count())
                <div class="item-grid">
                    @foreach ($barClub as $item)
                        <a href="#" class="item-card" style="display: block; color: inherit;">
                            <h3>{{ $item->name }}</h3>
                            <p>{{ Str::limit($item->description, 80) }}</p>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="empty">Belum ada data bar & club tersedia di region ini.</div>
            @endif
        </div>
    </section>

    <!-- Prayer Places -->
    <section class="section" id="prayer-places">
        <div class="container">
            <div class="section-heading">
                <h2>Prayer Places</h2>
                <p>Mosques, churches, temples, and other prayer places.</p>
            </div>
            @if ($prayerPlaces->count())
                <div class="item-grid">
                    @foreach ($prayerPlaces as $item)
                        <a href="#" class="item-card" style="display: block; color: inherit;">
                            <h3>{{ $item->name }}</h3>
                            <p>{{ Str::limit($item->description, 80) }}</p>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="empty">Belum ada data prayer places tersedia di region ini.</div>
            @endif
        </div>
    </section>

    <footer>
        <h3>NusaExplore</h3>
        <p>Explore Surabaya Beyond the Destination</p>
        <p>© {{ date('Y') }} NusaExplore</p>
    </footer>
</body>
</html>
