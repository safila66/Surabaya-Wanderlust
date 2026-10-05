<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <title>@yield('title', 'Surabaya Wanderlust - Explore Surabaya Beyond the Destination')</title>

    {{-- Anti-flicker: apply saved theme immediately --}}
    <script>(function(){var t=localStorage.getItem('sw-theme')||'dark';document.documentElement.setAttribute('data-theme',t);})()</script>

    {{-- Unified stylesheet --}}
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">

    <style>

        /* =========================================================
           RESET + FLUID TOKENS
        ========================================================== */

        * { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            /* satu variabel untuk padding kiri-kanan semua section */
            --pad-x: clamp(1.125rem, 7vw, 7.5rem);
        }

        html { scroll-behavior: smooth; -webkit-text-size-adjust: 100%; }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-primary);
            background: var(--bg-primary);
            overflow-x: hidden;
            min-height: 100vh;
        }

        img { max-width: 100%; }

        .region-section .section-title h2,
        .best-time-section .section-title h2 {
            font-family: 'Libre Baskerville', serif;
            color: var(--gold);
            text-shadow: 0 0.125rem 0.375rem rgba(0, 0, 0, 0.5);
        }
        .region-section .section-title p,
        .best-time-section .section-title p { color: rgba(255,255,255,0.85); text-shadow: none; }

        /* =========================================================
           NAVBAR
        ========================================================== */

        .navbar {
            width: 100%;
            padding: 1.25rem var(--pad-x);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            background: transparent;
            border-bottom: none;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 50;
        }

        .logo-link { text-decoration: none; color: inherit; display: block; }

        .logo {
            font-family: 'Perpetua Titling MT', 'Libre Baskerville', serif;
            font-size: clamp(1rem, 2vw, 1.25rem);
            font-weight: bold;
            line-height: 1.1;
            color: var(--gold);
        }

        .tagline { margin-top: 0.1875rem; font-size: clamp(0.6875rem, 1.2vw, 0.9375rem); color: #aedcff; }

        .nav-menu { display: flex; align-items: center; gap: clamp(0.75rem, 1.8vw, 1.5625rem); }

        .nav-menu a {
            text-decoration: none;
            color: #ffff11;
            font-size: clamp(0.6875rem, 1vw, 0.8125rem);
            font-weight: 500;
            white-space: nowrap;
            transition: 0.25s ease;
        }
        .nav-menu a:hover { color: var(--gold); }

        /* tombol hamburger (hanya tampil di layar kecil) */
        .nav-toggle {
            display: none;
            background: rgba(0,0,0,0.35);
            border: 1px solid rgba(255,255,255,0.4);
            color: #fff;
            font-size: 1.5rem;
            line-height: 1;
            padding: 0.375rem 0.75rem;
            border-radius: 0.5rem;
            cursor: pointer;
        }

        /* =========================================================
           HERO
        ========================================================== */

        .hero {
            min-height: clamp(26.25rem, 70vh, 40rem);
            min-height: clamp(26.25rem, 70svh, 40rem);
            padding: clamp(7.5rem, 18vh, 9.375rem) var(--pad-x) 4.375rem;
            display: flex;
            align-items: center;
            background:
                linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)),
                url('{{ asset("images/home-surabaya.jpg") }}');
            background-size: cover;
            background-position: center;
        }

        .hero-content { width: 100%; max-width: 43.75rem; color: white; }

        .hero-content h1,
        .hero-content h1 .highlight {
            font-family: 'Libre Baskerville', serif;
            font-size: clamp(2rem, 5vw, 3rem);
            font-weight: 800;
            line-height: 1.15;
            overflow-wrap: break-word;
        }
        .hero-content h1 { color: white; }
        .hero-content h1 .highlight { color: var(--gold); }

        .hero-content p {
            font-family: 'Centaur', serif;
            max-width: 40.625rem;
            font-size: clamp(0.9375rem, 1.4vw, 1rem);
            color: rgba(255,255,255,0.9);
            line-height: 1.7;
            margin-bottom: 2.5rem;
        }

        .search-box {
            max-width: 40.625rem;
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(1rem);
            -webkit-backdrop-filter: blur(1rem);
            padding: 0.5rem;
            border: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 3.125rem;
            box-shadow: 0 0.5rem 2rem rgba(0, 0, 0, 0.25);
        }

        .search-box input {
            flex: 1;
            min-width: 0;
            border: none;
            outline: none;
            background: transparent;
            padding: 1rem 1.25rem;
            font-family: 'Libre Baskerville', serif;
            font-size: clamp(0.9375rem, 1.6vw, 1.25rem);
            color: white;
        }
        .search-box input::placeholder { color: rgba(255, 255, 255, 0.75); }

        .search-box button {
            flex-shrink: 0;
            border: 1px solid rgba(255, 255, 255, 0.4);
            background: rgb(255, 240, 24);
            color: #0342ff;
            padding: 0 1.75rem;
            height: 3rem;
            border-radius: 3.125rem;
            font-weight: bold;
            font-family: 'Perpetua Titling MT', serif;
            font-size: 0.9375rem;
            cursor: pointer;
            transition: 0.25s ease;
        }
        .search-box button:hover { background: rgba(255, 255, 255, 0.4); }

        /* =========================================================
           FEATURED REGION SLIDER
        ========================================================== */

        .featured-region { width: 100%; background: var(--bg-primary); }

        .featured-wrapper {
            position: relative;
            width: 100%;
            height: clamp(28.75rem, 80vh, 43.75rem);
            height: clamp(28.75rem, 80svh, 43.75rem);
            overflow: hidden;
        }

        .featured-slider { position: relative; width: 100%; height: 100%; }

        .featured-slide {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.8s ease, visibility 0.8s ease;
        }
        .featured-slide.active { opacity: 1; visibility: visible; }

        .featured-slide::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.05), rgba(0,0,0,0.08) 30%, rgba(0,0,0,0.72));
            z-index: 1;
        }

        .featured-image { display: block; width: 100%; height: 100%; object-fit: cover; object-position: center; }

        .featured-content {
            position: absolute;
            left: 10%;
            right: 10%;
            bottom: clamp(4.375rem, 12vh, 6.5625rem);
            max-width: 47.5rem;
            /* judul panjang tidak akan menabrak navbar */
            max-height: calc(100% - 8.125rem);
            overflow: hidden;
            color: white;
            z-index: 3;
        }

        .featured-label {
            display: block;
            margin-bottom: 0.875rem;
            font-size: clamp(0.625rem, 1.2vw, 0.9375rem);
            font-weight: bold;
            letter-spacing: clamp(0.1875rem, 0.5vw, 0.375rem);
            text-transform: uppercase;
            color: white;
            text-shadow: 0 0.125rem 0.625rem rgba(0,0,0,0.35);
        }

        .featured-content h2 {
            font-family: 'Libre Baskerville', serif;
            /* mengecil mengikuti lebar DAN tinggi layar */
            font-size: clamp(2.25rem, min(7vw, 11vh), 5.125rem);
            line-height: 0.95;
            margin-bottom: 1.25rem;
            font-weight: 800;
            letter-spacing: 0.125rem;
            text-transform: uppercase;
            overflow-wrap: break-word;
            color: white;
            text-shadow: 0 0.25rem 0.9375rem rgba(0,0,0,0.35);
        }

        .featured-content p {
            max-width: 42.5rem;
            font-size: clamp(0.9375rem, 1.6vw, 1.1875rem);
            line-height: 1.6;
            color: rgba(255,255,255,0.96);
            text-shadow: 0 0.125rem 0.5rem rgba(0,0,0,0.30);
        }

        .featured-cta-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            margin-top: 1.25rem;
            padding: 0.6rem 1.5rem;
            background: var(--gold, #c9a227);
            color: #07112a;
            font-size: 0.875rem;
            font-weight: 700;
            text-decoration: none;
            border-radius: 2rem;
            transition: 0.25s ease;
            letter-spacing: 0.03em;
        }
        .featured-cta-btn:hover {
            background: #fff;
            color: #07112a;
            transform: translateX(3px);
        }

        /* ARROWS */
        .featured-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            width: clamp(2.5rem, 5vw, 4.5rem);
            height: clamp(3.375rem, 6.5vw, 5.625rem);
            border: none;
            background: rgba(0,0,0,0.55);
            color: white;
            font-size: clamp(1.5rem, 3vw, 2.625rem);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.25s ease;
        }
        .featured-arrow:hover { background: rgba(15,118,110,0.95); }
        .featured-prev { left: 0; }
        .featured-next { right: 0; }

        /* DOTS */
        .featured-dots {
            position: absolute;
            z-index: 10;
            bottom: 1.75rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            gap: 0.5625rem;
        }
        .featured-dot {
            width: 0.5625rem; height: 0.5625rem; padding: 0; border: none; border-radius: 50%;
            background: rgba(255,255,255,0.55); cursor: pointer; transition: 0.25s ease;
        }
        .featured-dot.active { width: 1.875rem; border-radius: 0.625rem; background: var(--bg-card); }

        /* =========================================================
           GENERAL SECTION
        ========================================================== */

        .section { padding: clamp(3rem, 7vw, 4.6875rem) var(--pad-x); }

        .section-title { text-align: center; margin-bottom: clamp(1.75rem, 4vw, 2.625rem); }

        .section-title h2 {
            font-family: 'Libre Baskerville', serif;
            font-size: clamp(1.625rem, 3.5vw, 2.5rem);
            margin-bottom: 0.6875rem;
            overflow-wrap: break-word;
        }

        .section-title p {
            max-width: 43.75rem;
            margin: auto;
            color: var(--text-muted);
            line-height: 1.7;
            font-size: clamp(0.9375rem, 1.6vw, 1.25rem);
        }

        /* =========================================================
           RECOMMENDATION / BEST TIME
        ========================================================== */

        .best-time-section {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            z-index: 1;
            margin-bottom: -2.3125rem;   /* hapus baris ini kalau celahnya sudah beres */
            background: none;
        }

        .best-time-section::before {
            content: "";
            position: absolute;
            inset: -1.25rem;
            z-index: -1;
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.30), rgba(0, 0, 0, 0.30)),
                url('{{ asset("images/monthly-bg.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(0.0625rem);
        }

        .recommendation-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1.5625rem;
        }

        .recommendation-card {
            display: block;
            min-width: 0;
            background: var(--bg-card);
            border-radius: 0.9375rem;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            box-shadow: 0 0.375rem 1.375rem rgba(0,0,0,0.06);
            transition: 0.25s ease;
            text-decoration: none;
            color: inherit;
            cursor: pointer;
        }
        .recommendation-card:hover { transform: translateY(-0.3125rem); box-shadow: 0 0.75rem 1.875rem rgba(0,0,0,0.10); border-color: #d1d5db; }

        .recommendation-image { display: block; width: 100%; height: clamp(10.625rem, 16vw, 13.125rem); object-fit: cover; }

        .recommendation-content { padding: 1.375rem; }

        .month-badge {
            display: inline-block;
            margin-bottom: 0.6875rem;
            padding: 0.375rem 0.75rem;
            background: #ccfbf1;
            color: #0f766e;
            border-radius: 1.25rem;
            font-size: 0.75rem;
            font-weight: bold;
        }

        .recommendation-content h3 { font-size: 1.25rem; margin-bottom: 0.5rem; color: var(--text-heading); }

        .destination-location { color: #6b7280 !important; font-size: 0.8125rem !important; margin-bottom: 0.75rem; }

        .recommendation-description { color: var(--text-muted); font-size: 0.875rem; line-height: 1.65; }

        .best-time-info { margin-top: 1.0625rem; color: var(--text-muted); font-size: 0.8125rem; line-height: 1.9; }
        .best-time-info strong { color: #374151; }

        .recommendation-link { display: inline-block; margin-top: 1.0625rem; color: #0f766e; text-decoration: none; font-size: 0.875rem; font-weight: bold; }
        .recommendation-link:hover { color: #115e59; }

        /* =========================================================
           EXPLORE BY REGION
        ========================================================== */

        .region-section {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            z-index: 1;
            background: none;
        }

        .region-section::before {
            content: "";
            position: absolute;
            inset: -1.25rem;
            z-index: -1;
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.30), rgba(0, 0, 0, 0.30)),
                url('{{ asset("images/region-bg.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(0.0625rem);
        }

        .region-section::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: -0.0625rem;
            height: 12.5rem;
            z-index: -1;
            pointer-events: none;
            background: linear-gradient(to bottom, rgba(13, 27, 62, 0) 0%, var(--bg-primary) 100%);
        }

        .region-slider-container { position: relative; width: 100%; overflow: hidden; }

        .region-track { display: flex; width: 100%; transition: transform 0.65s ease; }

        .region-page {
            flex: 0 0 100%;
            width: 100%;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            grid-template-rows: repeat(2, 1fr);
            gap: 1.375rem;
            padding: 0.1875rem;
        }

        .region-card {
            position: relative;
            min-width: 0;
            min-height: clamp(12.5rem, 20vw, 15.3125rem);
            overflow: hidden;
            border-radius: 1rem;
            text-decoration: none;
            background: var(--footer-bg);
            box-shadow: 0 0.4375rem 1.5625rem rgba(0,0,0,0.08);
            transition: 0.3s ease;
            cursor: pointer;
        }
        .region-card:hover { transform: translateY(-0.3125rem); box-shadow: 0 0.875rem 2rem rgba(0,0,0,0.14); }

        .region-image { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
        .region-card:hover .region-image { transform: scale(1.07); }

        .region-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.78), rgba(0,0,0,0.08) 70%); }

        .region-content { position: absolute; left: 1.375rem; right: 1.375rem; bottom: 1.25rem; z-index: 2; color: white; }

        .region-content h3 {
            font-family: 'Libre Baskerville', serif;
            font-size: clamp(1.25rem, 2.4vw, 2rem);
            margin-bottom: 0.375rem;
            color: white;
            overflow-wrap: break-word;
        }
        .region-content p { color: rgba(255,255,255,0.88); font-size: 0.8125rem; margin-bottom: 0.625rem; }
        .region-explore { color: white; font-size: 0.8125rem; font-weight: bold; }

        /* ARROWS (di dalam container, tidak lagi terpotong overflow) */
        .region-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            width: clamp(2.5rem, 4vw, 3.25rem);
            height: clamp(3.125rem, 5vw, 3.875rem);
            border: none;
            background: rgba(0,0,0,0.60);
            color: white;
            font-size: clamp(1.5rem, 2.4vw, 1.875rem);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
            transition: 0.25s ease;
        }
        .region-arrow:hover { background: #0f766e; }
        .region-prev { left: 0.5rem; }
        .region-next { right: 0.5rem; }

        /* DOTS */
        .region-dots { display: flex; justify-content: center; align-items: center; gap: 0.5rem; margin-top: 1.5625rem; }
        .region-dot { width: 0.5rem; height: 0.5rem; border: none; padding: 0; border-radius: 50%; background: #cbd5e1; cursor: pointer; transition: 0.25s ease; }
        .region-dot.active { width: 1.75rem; border-radius: 0.625rem; background: #0f766e; }

        /* EMPTY MESSAGE */
        .empty-message {
            grid-column: 1 / -1;
            text-align: center;
            padding: 2.8125rem;
            background: var(--bg-card);
            border-radius: 0.9375rem;
            border: 1px solid var(--border);
        }
        .empty-message h3 { margin-bottom: 0.625rem; }
        .empty-message p { color: #777777; }

        /* =========================================================
           FEATURES
        ========================================================== */

        

        .feature-grid { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 1.25rem; }

        .feature {
            display: block;
            min-width: 0;
            background: var(--bg-card);
            padding: 1.75rem 1.375rem;
            border-radius: 0.9375rem;
            text-align: center;
            border: 1px solid var(--border);
            transition: 0.25s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }
        .feature:hover { transform: translateY(-0.3125rem); box-shadow: 0 0.75rem 1.875rem rgba(0,0,0,0.09); border-color: #d1d5db; }

        .feature-icon { font-size: 2.0625rem; margin-bottom: 0.9375rem; }
        .feature h3 { margin-bottom: 0.5rem; font-size: 1.125rem; color: var(--text-heading); }
        .feature p { color: var(--text-muted); font-size: 0.875rem; line-height: 1.6; }

        /* =========================================================
           TABLET  (<= 1100px)
        ========================================================== */

        @media (max-width: 1100px) {
            .recommendation-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .feature-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        /* =========================================================
           NAVBAR -> HAMBURGER  (<= 1000px)
        ========================================================== */

        @media (max-width: 1000px) {
            .nav-toggle { display: block; }
            .nav-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                flex-direction: column;
                align-items: flex-start;
                gap: 0;
                padding: 0.5rem var(--pad-x) 1rem;
                background: rgba(13, 27, 62, 0.96);
            }
            .nav-menu a { width: 100%; padding: 0.75rem 0; font-size: 0.875rem; }
            .navbar.open .nav-menu { display: flex; }
        }

        /* =========================================================
           TABLET SMALL  (<= 900px)
        ========================================================== */

        @media (max-width: 900px) {
            .featured-content { left: 8%; right: 8%; }
            .region-page { grid-template-columns: repeat(2, minmax(0, 1fr)); grid-template-rows: repeat(3, 1fr); }
        }

        /* =========================================================
           MOBILE  (<= 600px)
        ========================================================== */

        @media (max-width: 600px) {
            .hero { padding-bottom: 4.0625rem; }
            .search-box { flex-direction: column; gap: 0.5rem; padding: 0; background: transparent; border: none; box-shadow: none; }
            .search-box input { width: 100%; border-radius: 0.5rem; background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.35); }
            .search-box button { width: 100%; padding: 0.875rem; }
            .featured-dots { bottom: 1.25rem; }
            .featured-dot.active { width: 1.5625rem; }
            .featured-content h2 { line-height: 1; margin-bottom: 0.9375rem; }
            .featured-content p { line-height: 1.5; }
            .recommendation-grid { grid-template-columns: 1fr; }
            .region-page { grid-template-columns: 1fr; grid-template-rows: none; grid-auto-rows: 11.5625rem; gap: 0.9375rem; }
            .region-card { min-height: 11.5625rem; }
            .feature-grid { grid-template-columns: 1fr; }
        }

                    /* USER REQUESTED HEIGHT OVERRIDES */
        .hero {
            min-height: 600px !important;
            height: 600px !important;
        }
        .featured-region, .featured-wrapper {
            min-height: 600px !important;
            height: 600px !important;
        }
        .best-time-section {
            min-height: 600px !important;
            height: auto !important;
            padding-top: 40px !important;
            padding-bottom: 40px !important;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .region-section {
            min-height: 600px !important;
            height: auto !important;
            padding-top: 40px !important;
            padding-bottom: 40px !important;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        /* SMALLER CARDS FOR REGION AND MONTHLY */
        .region-card {
            height: 260px !important;
            min-height: 260px !important;
        }
        .region-content h3 {
            font-size: 24px !important;
        }
        .recommendation-card {
            height: 340px !important;
            display: flex;
            flex-direction: column;
        }
        .recommendation-image {
            height: 160px !important;
        }
        .recommendation-content {
            padding: 15px !important;
            flex: 1;
            overflow: hidden;
        }
        .recommendation-content h3 {
            font-size: 18px !important;
            margin-bottom: 5px !important;
        }
        .recommendation-content p:last-child {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            font-size: 13px !important;
        }
        .month-badge {
            margin-bottom: 8px !important;
            padding: 4px 10px !important;
        }
                            </style>

    @stack('styles')

</head>

<body>

    @yield('content')

    {{-- Toggle menu hamburger: butuh <button class="nav-toggle"> di dalam .navbar --}}
    <script>
        document.addEventListener('click', function (e) {
            var btn = e.target.closest('.nav-toggle');
            if (!btn) return;
            var nav = btn.closest('.navbar');
            if (nav) nav.classList.toggle('open');
        });
    </script>

    @stack('scripts')

</body>
</html>