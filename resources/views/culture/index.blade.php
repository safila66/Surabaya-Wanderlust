<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <script>(function(){var t=localStorage.getItem('sw-theme')||'dark';document.documentElement.setAttribute('data-theme',t);})()</script>
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culture - Surabaya Wanderlust</title>
</head>
<body>
@include('partials.navbar')

<header class="page-hero" style="background-image: linear-gradient(rgba(7, 17, 42, 0.55), rgba(7, 17, 42, 0.75)), url('https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Suro_and_Boyo_statue%2C_Surabaya.jpg/1280px-Suro_and_Boyo_statue%2C_Surabaya.jpg');">
    <div class="container-main text-center">
        <span class="uni-card-label" style="color:var(--gold); display:block; margin-bottom:12px;">Discover Surabaya</span>
        <h1 class="page-hero-title">Culture beyond the destination.</h1>
        <p class="page-hero-desc" style="margin: 0 auto;">Explore the traditions, heritage, arts, stories, and local identities that make every region in Surabaya unique.</p>
    </div>
</header>

<main class="section container-main">
    <div class="grid-3">
        <a href="{{ route('culture.traditions') }}" class="item-card">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/Masjid_Sunan_Ampel_2.jpg/800px-Masjid_Sunan_Ampel_2.jpg" alt="Traditions" class="item-image">
            <div class="item-info">
                <h3>Traditions</h3>
                <p>Discover local traditions and cultural practices from different regions across Surabaya.</p>
            </div>
        </a>
        <a href="{{ route('culture.heritage') }}" class="item-card">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/Balai_Pemuda_Surabaya.jpg/800px-Balai_Pemuda_Surabaya.jpg" alt="Heritage" class="item-image">
            <div class="item-info">
                <h3>Heritage</h3>
                <p>Learn about historical places, cultural heritage, and stories that shape Surabaya's identity.</p>
            </div>
        </a>
        <a href="{{ route('culture.arts') }}" class="item-card">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/House_of_Sampoerna.jpg/800px-House_of_Sampoerna.jpg" alt="Arts & Identity" class="item-image">
            <div class="item-info">
                <h3>Arts & Identity</h3>
                <p>Get to know traditional arts, crafts, performances, and local expressions from across Surabaya.</p>
            </div>
        </a>
    </div>
</main>

@include('partials.footer')
</body>
</html>