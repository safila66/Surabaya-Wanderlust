<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Surabaya Wanderlust - Explore Surabaya Beyond the Destination')</title>

    {{-- Anti-flicker: apply saved theme immediately --}}
    <script>(function(){var t=localStorage.getItem('sw-theme')||'dark';document.documentElement.setAttribute('data-theme',t);})()</script>

    {{-- Unified stylesheet --}}
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">

    <style>

        /* =========================================================
           RESET
        ========================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-primary);
            background: var(--bg-primary);
            overflow-x: hidden;
        }
        .region-section .section-title h2 { font-family: 'Libre Baskerville', serif;
    color: var(--gold);
    text-shadow: 0 2px 6px rgba(0, 0, 0, 0.5);
}
.region-section .section-title p { color: rgba(255,255,255,0.85); text-shadow: none; }
.best-time-section .section-title h2 { font-family: 'Libre Baskerville', serif;
    color: var(--gold);
    text-shadow: 0 2px 6px rgba(0, 0, 0, 0.5);
}
.best-time-section .section-title p { color: rgba(255,255,255,0.85); text-shadow: none; }


        /* =========================================================
           NAVBAR
        ========================================================== */

       .navbar {
    width: 100%;
    padding: 20px 7%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: transparent;
    border-bottom: none;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 50;
}

        .logo-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .logo {
            font-family: 'Perpetua Titling MT', serif;
            font-size: 20px;
            white-space: normal;
            font-weight: bold;
            line-height: 1.1;
            color: var(--gold);
        }

        .tagline {
            margin-top: 3px;
            font-size: 15px;
            color: #aedcff;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .nav-menu a {
    text-decoration: none;
    color: #ffff11;
    font-size: 13px;
    font-weight: 500;
    transition: 0.25s ease;
}

.nav-menu a:hover {
    color: var(--gold);
}

        /* =========================================================
           HERO
        ========================================================== */

        .hero {
            min-height: 600px;
            padding: 120px 5% 60px;
            display: flex;
            align-items: center;
            background:
                linear-gradient(
                    rgba(0, 0, 0, 0.45),
                    rgba(0, 0, 0, 0.45)
                ),
               url('{{ asset("images/home-surabaya.jpg") }}');
            background-size: cover;
            background-position: center;
            }
            

        .hero-content {
            max-width: 600px;
            color: white;
        }
        .hero-content h1 {
    font-family: 'Libre Baskerville', serif;
    font-size: 38px;
    font-weight: 800;
    color: white;
}
       .hero-content h1 .highlight {
    font-family: 'Libre Baskerville', serif;
    font-size: 38px;
    font-weight: 800;
    color: var(--gold);
}

.hero-content p {
    font-family: 'centaur', serif;
    max-width: 550px;
    font-size: 13px; color: rgba(255,255,255,0.9);
    line-height: 1.7;
    margin-bottom: 28px;
}

       .search-box {
    max-width: 560px;
    display: flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    padding: 6px;
    border: 1px solid rgba(255, 255, 255, 0.35);
    border-radius: 50px;
    box-shadow: 0 6px 24px rgba(0, 0, 0, 0.25);
}

.search-box input {
    flex: 1;
    border: none;
    outline: none;
    background: transparent;
    padding: 12px 16px;
    font-family: 'Libre Baskerville', serif;
    font-size: 15px;
    color: white;
}

.search-box input::placeholder {
    color: rgba(255, 255, 255, 0.75);
}

.search-box button {
    border: 1px solid rgba(255, 255, 255, 0.4);
    background: rgb(255, 240, 24);
    color: #0342ff;
    padding: 0 22px;
    height: 40px;
    border-radius: 50px;
    font-weight: bold;
    font-family: 'Perpetua Titling MT', serif;
    font-size: 13px;
    cursor: pointer;
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    transition: 0.25s ease;
}

.search-box button:hover {
    background: rgba(255, 255, 255, 0.4);
}

        /* =========================================================
           FEATURED REGION SLIDER
        ========================================================== */

        .featured-region {
            width: 100%;
            padding: 0;
            margin: 0;
            background: var(--bg-primary);
        }

        .featured-wrapper {
            position: relative;
            width: 100%;
            height: 600px;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        .featured-slider {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .featured-slide {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.8s ease, visibility 0.8s ease;
        }

        .featured-slide.active {
            opacity: 1;
            visibility: visible;
        }

        .featured-slide::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.05), rgba(0,0,0,0.08) 30%, rgba(0,0,0,0.72));
            z-index: 1;
        }

        .featured-image {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .featured-content {
            position: absolute;
            left: 7%;
            bottom: 80px;
            max-width: 600px;
            color: white;
            z-index: 3;
        }

        .featured-label {
            display: block;
            margin-bottom: 10px;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 5px;
            text-transform: uppercase;
            color: white;
            text-shadow: 0 2px 10px rgba(0,0,0,0.35);
        }

        .featured-content h2 {
            font-family: 'Libre Baskerville', serif;
            font-size: 60px;
            line-height: 0.92;
            margin-bottom: 16px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: white;
            text-shadow: 0 4px 15px rgba(0,0,0,0.35);
        }

        .featured-content p {
            max-width: 540px;
            font-size: 15px;
            line-height: 1.6;
            color: rgba(255,255,255,0.96);
            text-shadow: 0 2px 8px rgba(0,0,0,0.30);
        }

        /* =========================================================
           FEATURED ARROWS
        ========================================================== */

        .featured-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            width: 56px;
            height: 70px;
            border: none;
            background: rgba(0,0,0,0.55);
            color: white;
            font-size: 32px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.25s ease;
        }

        .featured-arrow:hover { background: rgba(15,118,110,0.95); }
        .featured-prev { left: 0; }
        .featured-next { right: 0; }

        /* =========================================================
           FEATURED DOTS
        ========================================================== */

        .featured-dots {
            position: absolute;
            z-index: 10;
            bottom: 22px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .featured-dot {
            width: 7px;
            height: 7px;
            padding: 0;
            border: none;
            border-radius: 50%;
            background: rgba(255,255,255,0.55);
            cursor: pointer;
            transition: 0.25s ease;
        }

        .featured-dot.active {
            width: 24px;
            border-radius: 10px;
            background: var(--bg-card);
        }

        /* =========================================================
           GENERAL SECTION
        ========================================================== */

        .section { padding: 55px 5%; }

        .section-title {
            text-align: center;
            margin-bottom: 32px;
        }

         .section-title h2 { font-family: 'Libre Baskerville', serif; font-size: 30px; margin-bottom: 9px; }

        .section-title p {
            max-width: 580px;
            margin: auto;
            color: var(--text-muted);
            line-height: 1.7;
            font-size: 15px;
        }

        /* =========================================================
           RECOMMENDATION / BEST TIME
        ========================================================== */

       .best-time-section {
    min-height: 600px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
    isolation: isolate;
    overflow: hidden;
    z-index: 1;
    margin-bottom: -37px;
    background: none;
}

.best-time-section::before {
    content: "";
    position: absolute;
    inset: -20px;
    z-index: -1;
    background-image:
        linear-gradient(rgba(0, 0, 0, 0.30), rgba(0, 0, 0, 0.30)),
        url('{{ asset("images/monthly-bg.jpg") }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    filter: blur(1px);
}

        .recommendation-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .recommendation-card {
            display: block;
            background: var(--bg-card);
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            box-shadow: 0 4px 16px rgba(0,0,0,0.06);
            transition: 0.25s ease;
            text-decoration: none;
            color: inherit;
            cursor: pointer;
        }

        .recommendation-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 24px rgba(0,0,0,0.10);
            border-color: #d1d5db;
        }

        .recommendation-image {
            display: block;
            width: 100%;
            height: 170px;
            object-fit: cover;
        }

        .recommendation-content { padding: 16px; }

        .month-badge {
            display: inline-block;
            margin-bottom: 8px;
            padding: 4px 10px;
            background: #ccfbf1;
            color: #0f766e;
            border-radius: 20px;
            font-size: 10px;
            font-weight: bold;
        }

        .recommendation-content h3 {
            font-size: 16px;
            margin-bottom: 6px;
            color: var(--text-heading);
        }

        .destination-location {
            color: #6b7280 !important;
            font-size: 11px !important;
            margin-bottom: 10px;
        }

        .recommendation-description {
            color: var(--text-muted);
            font-size: 12px;
            line-height: 1.6;
        }

        .best-time-info {
            margin-top: 13px;
            color: var(--text-muted);
            font-size: 11px;
            line-height: 1.8;
        }

        .best-time-info strong { color: #374151; }

        .recommendation-link {
            display: inline-block;
            margin-top: 13px;
            color: #0f766e;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
        }

        .recommendation-link:hover { color: #115e59; }

        /* =========================================================
           EXPLORE BY REGION
        ========================================================== */

       .region-section {
    min-height: 600px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
    isolation: isolate;
    overflow: hidden;
    z-index: 1;
    background: none;
}

.region-section::before {
    content: "";
    position: absolute;
    inset: -20px;
    z-index: -1;
    background-image:
        linear-gradient(rgba(0, 0, 0, 0.30), rgba(0, 0, 0, 0.30)),
        url('{{ asset("images/region-bg.jpg") }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    filter: blur(1px);
}
.region-section::after {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    bottom: -1px;
    height: 160px;
    z-index: -1;
    pointer-events: none;
    background: linear-gradient(
        to bottom,
        rgba(13, 27, 62, 0) 0%,
        var(--bg-primary) 100%
    );
}

        .region-slider-container {
            position: relative;
            width: 100%;
            overflow: hidden;
        }

        .region-track {
            display: flex;
            width: 100%;
            transition: transform 0.65s ease;
        }

        .region-page {
            flex: 0 0 100%;
            width: 100%;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 16px;
            padding: 3px;
        }

        .region-card {
            position: relative;
            min-height: 200px;
            overflow: hidden;
            border-radius: 13px;
            text-decoration: none;
            background: var(--footer-bg);
            box-shadow: 0 5px 18px rgba(0,0,0,0.08);
            transition: 0.3s ease;
            cursor: pointer;
        }

        .region-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 24px rgba(0,0,0,0.14);
        }

        .region-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .region-card:hover .region-image { transform: scale(1.07); }

        .region-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.78), rgba(0,0,0,0.08) 70%);
        }

        .region-content {
            position: absolute;
            left: 16px;
            right: 16px;
            bottom: 16px;
            z-index: 2;
            color: white;
        }

        .region-content h3 { font-family: 'Libre Baskerville', serif; font-size: 24px;
            margin-bottom: 4px;
            color: white;
        }

        .region-content p {
            color: rgba(255,255,255,0.88);
            font-size: 11px;
            margin-bottom: 8px;
        }

        .region-explore {
            color: white;
            font-size: 11px;
            font-weight: bold;
        }

        /* =========================================================
           REGION ARROWS
        ========================================================== */

        .region-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            width: 42px;
            height: 50px;
            border: none;
            background: rgba(0,0,0,0.60);
            color: white;
            font-size: 24px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 7px;
            transition: 0.25s ease;
        }

        .region-arrow:hover { background: #0f766e; }
        .region-prev { left: -8px; }
        .region-next { right: -8px; }

        /* =========================================================
           REGION DOTS
        ========================================================== */

        .region-dots {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
            margin-top: 18px;
        }

        .region-dot {
            width: 7px;
            height: 7px;
            border: none;
            padding: 0;
            border-radius: 50%;
            background: #cbd5e1;
            cursor: pointer;
            transition: 0.25s ease;
        }

        .region-dot.active {
            width: 22px;
            border-radius: 10px;
            background: #0f766e;
        }

        /* =========================================================
           EMPTY MESSAGE
        ========================================================== */

        .empty-message {
            grid-column: 1 / -1;
            text-align: center;
            padding: 36px;
            background: var(--bg-card);
            border-radius: 12px;
            border: 1px solid var(--border);
        }

        .empty-message h3 { margin-bottom: 8px; }
        .empty-message p { color: #777777; }

        /* =========================================================
           FEATURES
        ========================================================== */

        .features {
    min-height: 600px;
    display: flex;
    flex-direction: column;
    justify-content: center; background: var(--bg-surface); }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
        }

        .feature {
            display: block;
            background: var(--bg-card);
            padding: 20px 16px;
            border-radius: 12px;
            text-align: center;
            border: 1px solid var(--border);
            transition: 0.25s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }

        .feature:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 24px rgba(0,0,0,0.09);
            border-color: #d1d5db;
        }

        .feature-icon {
            font-size: 26px;
            margin-bottom: 11px;
        }

        .feature h3 {
            margin-bottom: 6px;
            font-size: 15px;
            color: var(--text-heading);
        }

        .feature p {
            color: var(--text-muted);
            font-size: 12px;
            line-height: 1.55;
        }

        /* =========================================================
           TABLET
        ========================================================== */

        @media (max-width: 1100px) {
            .nav-menu { gap: 14px; }
            .nav-menu a { font-size: 11px; }
            .featured-content h2 { font-size: 50px; }
            .recommendation-grid { grid-template-columns: repeat(2, 1fr); }
            .feature-grid { grid-template-columns: repeat(2, 1fr); }
            .region-card { min-height: 180px; }
        }

        /* =========================================================
           TABLET SMALL
        ========================================================== */

        @media (max-width: 900px) {
            .navbar { padding: 14px 4%; }
            .nav-menu { display: none; }
            .hero { min-height: 420px; padding: 120px 4% 55px; }
            .hero-content h1 { font-size: 30px; }
            .section { padding: 48px 4%; }
            .featured-wrapper { height: 420px; }
            .featured-content { left: 6%; right: 6%; bottom: 60px; }
            .featured-content h2 { font-size: 36px; }
            .featured-content p { font-size: 13px; }
            .featured-arrow { width: 40px; height: 54px; font-size: 24px; }
            .region-page { grid-template-columns: repeat(2, 1fr); grid-template-rows: repeat(3, 1fr); }
        }

        /* =========================================================
           MOBILE
        ========================================================== */

        @media (max-width: 600px) {
            .hero { min-height: 420px; padding: 120px 5% 55px; }
            .hero-content h1 { font-size: 28px; }
            .hero-content p { font-size: 13px; }
            .search-box { flex-direction: column; gap: 8px; padding: 0; background: transparent; }
            .search-box input { width: 100%; border-radius: 8px; }
            .search-box button { width: 100%; padding: 12px; }
            .featured-wrapper { height: 420px; }
            .featured-content { left: 6%; right: 6%; bottom: 58px; }
            .featured-label { font-size: 9px; letter-spacing: 3px; }
            .featured-content h2 { font-size: 34px; line-height: 1; margin-bottom: 12px; }
            .featured-content p { color: rgba(255,255,255,0.9); line-height: 1.5; }
            .featured-arrow { width: 36px; height: 48px; font-size: 22px; }
            .featured-dots { bottom: 16px; }
            .featured-dot.active { width: 20px; }
            .section { padding: 40px 4%; }
            .section-title { margin-bottom: 24px; }
             .section-title h2 { font-family: 'Libre Baskerville', serif; font-size: 22px; }
            .recommendation-grid { grid-template-columns: 1fr; }
            .region-page { grid-template-columns: 1fr; grid-template-rows: repeat(6, 160px); gap: 12px; }
            .region-card { min-height: 160px; }
            .region-content h3 { font-family: 'Libre Baskerville', serif; font-size: 18px; }
            .region-prev { left: -6px; }
            .region-next { right: -6px; }
            .region-arrow { width: 36px; height: 44px; font-size: 20px; }
            .feature-grid { grid-template-columns: 1fr; }
        }


    .search-box input:-webkit-autofill,
.search-box input:-webkit-autofill:hover, 
.search-box input:-webkit-autofill:focus, 
.search-box input:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0 30px transparent inset !important;
    transition: background-color 5000s ease-in-out 0s;
    -webkit-text-fill-color: inherit !important;
}
.search-box input, 
.search-box input:focus, 
.search-box input:active {
    background-color: transparent !important;
}
</style>

    @stack('styles')

</head>

<body>

    @yield('content')

    @stack('scripts')

</body>

</html>

