<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <script>(function(){var t=localStorage.getItem('sw-theme')||'dark';document.documentElement.setAttribute('data-theme',t);})()</script>
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Guide - Surabaya Wanderlust</title>
</head>
<body>
@include('partials.navbar')

<header class="page-hero" style="background-image: linear-gradient(rgba(7, 17, 42, 0.6), rgba(7, 17, 42, 0.8)), url('https://images.unsplash.com/photo-1512753360435-329c4535a9a7?w=1600&q=80');">
    <div class="container-main text-center">
        <span class="uni-card-label" style="color:var(--gold); display:block; margin-bottom:12px;">Travel Smarter</span>
        <h1 class="page-hero-title">Your guide to travelling Surabaya.</h1>
        <p class="page-hero-desc" style="margin: 0 auto;">Practical information to help you understand destinations, prepare your journey, and travel more comfortably across Surabaya.</p>
    </div>
</header>

<main class="section container-main">
    <div class="grid-3">
        <a href="{{ route('travel-guide.getting-around') }}" class="item-card">
            <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=800&q=80" alt="Getting Around" class="item-image">
            <div class="item-info">
                <h3>Getting Around</h3>
                <p>Find useful information about transportation, estimated travel time, and ways to move around your destination.</p>
            </div>
        </a>
        <a href="{{ route('travel-guide.before-you-go') }}" class="item-card">
            <img src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?w=800&q=80" alt="Before You Go" class="item-image">
            <div class="item-info">
                <h3>Before You Go</h3>
                <p>Check important information, local etiquette, destination conditions, and other travel considerations.</p>
            </div>
        </a>
        <a href="{{ route('travel-guide.tips') }}" class="item-card">
            <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=800&q=80" alt="Travel Tips" class="item-image">
            <div class="item-info">
                <h3>Travel Tips</h3>
                <p>Prepare your trip with practical tips about what to bring, local conditions, and things worth knowing.</p>
            </div>
        </a>
    </div>
</main>

@include('partials.footer')
</body>
</html>