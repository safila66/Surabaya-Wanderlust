<!DOCTYPE html>
<html lang="id">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Perpetua+Titling+MT:wght@400;700&family=Engraves+MT:wght@400;:wght@700;800&family=centaur:wght@400;:wght@700;800&family=Garamond:wght@400;500&display=swap" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Surabaya Wanderlust - Explore Surabaya Beyond the Destination')</title>

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
            font-family: Libre Baskerville, serif;
            color: #b8f9a4;
            background: #8fd4ff;
            overflow-x: hidden;
        }


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
            font-size: 35px;
            font-weight: bold;
            color: #f4e80b;
        }

        .tagline {
            margin-top: 3px;
            font-size: 12px;
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
    color: #f4e80b;
}

        /* =========================================================
           HERO
        ========================================================== */

        .hero {
            min-height: 540px;
            padding: 200px 7% 90px;
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
            max-width: 700px;
            color: white;
        }
        .hero-content h1 {
    font-family: 'Garamond', serif;
    font-size: 60px;
    font-weight: 800;
    color: #ffffff;
}
       .hero-content h1 .highlight {
    font-family: 'Engraves MT', serif;
    font-size: 60px;
    font-weight: 800;
    color: #a2ffab;
}

.hero-content p {
    font-family: 'centaur', serif;
    max-width: 650px;
    font-size: 16px;
    line-height: 1.7;
    margin-bottom: 40px;
}

       .search-box {
    max-width: 650px;
    display: flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    padding: 8px;
    border: 1px solid rgba(255, 255, 255, 0.35);
    border-radius: 50px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
}

.search-box input {
    flex: 1;
    border: none;
    outline: none;
    background: transparent;
    padding: 16px 20px;
    font-family: 'Garamond', serif;
    font-size: 20px;
    color: #ffffff;
}

.search-box input::placeholder {
    color: rgba(255, 255, 255, 0.75);
}

.search-box button {
    border: 1px solid rgba(255, 255, 255, 0.4);
    background: rgb(255, 240, 24);
    color: #0342ff;
    padding: 0 28px;
    height: 48px;
    border-radius: 50px;
    font-weight: bold;
    font-family: 'Perpetua Titling MT', serif;
    font-size: 15px;
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
            background: #a4e7ff;
        }

        .featured-wrapper {
            position: relative;
            width: 100%;
            height: 650px;
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
            left: 10%;
            bottom: 105px;
            max-width: 760px;
            color: white;
            z-index: 3;
        }

        .featured-label {
            display: block;
            margin-bottom: 14px;
            font-size: 15px;
            font-weight: bold;
            letter-spacing: 6px;
            text-transform: uppercase;
            color: white;
            text-shadow: 0 2px 10px rgba(0,0,0,0.35);
        }

        .featured-content h2 {
            font-size: 82px;
            line-height: 0.92;
            margin-bottom: 23px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: white;
            text-shadow: 0 4px 15px rgba(0,0,0,0.35);
        }

        .featured-content p {
            max-width: 680px;
            font-size: 19px;
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
            width: 72px;
            height: 90px;
            border: none;
            background: rgba(0,0,0,0.55);
            color: white;
            font-size: 42px;
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
            bottom: 28px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .featured-dot {
            width: 9px;
            height: 9px;
            padding: 0;
            border: none;
            border-radius: 50%;
            background: rgba(255,255,255,0.55);
            cursor: pointer;
            transition: 0.25s ease;
        }

        .featured-dot.active {
            width: 30px;
            border-radius: 10px;
            background: white;
        }

        /* =========================================================
           GENERAL SECTION
        ========================================================== */

        .section { padding: 75px 7%; }

        .section-title {
            text-align: center;
            margin-bottom: 42px;
        }

        .section-title h2 {
            font-size: 34px;
            margin-bottom: 11px;
        }

        .section-title p {
            max-width: 700px;
            margin: auto;
            color: #6b7280;
            line-height: 1.7;
            font-size: 15px;
        }

        /* =========================================================
           RECOMMENDATION / BEST TIME
        ========================================================== */

        .best-time-section { background: #f8fafc; }

        .recommendation-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .recommendation-card {
            display: block;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            box-shadow: 0 6px 22px rgba(0,0,0,0.06);
            transition: 0.25s ease;
            text-decoration: none;
            color: inherit;
            cursor: pointer;
        }

        .recommendation-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.10);
            border-color: #d1d5db;
        }

        .recommendation-image {
            display: block;
            width: 100%;
            height: 210px;
            object-fit: cover;
        }

        .recommendation-content { padding: 22px; }

        .month-badge {
            display: inline-block;
            margin-bottom: 11px;
            padding: 6px 12px;
            background: #ccfbf1;
            color: #0f766e;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .recommendation-content h3 {
            font-size: 20px;
            margin-bottom: 8px;
            color: #1f2937;
        }

        .destination-location {
            color: #6b7280 !important;
            font-size: 13px !important;
            margin-bottom: 12px;
        }

        .recommendation-description {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.65;
        }

        .best-time-info {
            margin-top: 17px;
            color: #6b7280;
            font-size: 13px;
            line-height: 1.9;
        }

        .best-time-info strong { color: #374151; }

        .recommendation-link {
            display: inline-block;
            margin-top: 17px;
            color: #0f766e;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }

        .recommendation-link:hover { color: #115e59; }

        /* =========================================================
           EXPLORE BY REGION
        ========================================================== */

        .region-section {
            background: #ffffff;
            overflow: hidden;
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
            gap: 22px;
            padding: 3px;
        }

        .region-card {
            position: relative;
            min-height: 245px;
            overflow: hidden;
            border-radius: 16px;
            text-decoration: none;
            background: #111827;
            box-shadow: 0 7px 25px rgba(0,0,0,0.08);
            transition: 0.3s ease;
            cursor: pointer;
        }

        .region-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 14px 32px rgba(0,0,0,0.14);
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
            left: 22px;
            right: 22px;
            bottom: 20px;
            z-index: 2;
            color: white;
        }

        .region-content h3 {
            font-size: 23px;
            margin-bottom: 6px;
            color: white;
        }

        .region-content p {
            color: rgba(255,255,255,0.88);
            font-size: 13px;
            margin-bottom: 10px;
        }

        .region-explore {
            color: white;
            font-size: 13px;
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
            width: 52px;
            height: 62px;
            border: none;
            background: rgba(0,0,0,0.60);
            color: white;
            font-size: 30px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: 0.25s ease;
        }

        .region-arrow:hover { background: #0f766e; }
        .region-prev { left: -10px; }
        .region-next { right: -10px; }

        /* =========================================================
           REGION DOTS
        ========================================================== */

        .region-dots {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 25px;
        }

        .region-dot {
            width: 8px;
            height: 8px;
            border: none;
            padding: 0;
            border-radius: 50%;
            background: #cbd5e1;
            cursor: pointer;
            transition: 0.25s ease;
        }

        .region-dot.active {
            width: 28px;
            border-radius: 10px;
            background: #0f766e;
        }

        /* =========================================================
           EMPTY MESSAGE
        ========================================================== */

        .empty-message {
            grid-column: 1 / -1;
            text-align: center;
            padding: 45px;
            background: white;
            border-radius: 15px;
            border: 1px solid #eeeeee;
        }

        .empty-message h3 { margin-bottom: 10px; }
        .empty-message p { color: #777777; }

        /* =========================================================
           FEATURES
        ========================================================== */

        .features { background: #f8fafc; }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .feature {
            display: block;
            background: white;
            padding: 28px 22px;
            border-radius: 15px;
            text-align: center;
            border: 1px solid #eeeeee;
            transition: 0.25s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }

        .feature:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.09);
            border-color: #d1d5db;
        }

        .feature-icon {
            font-size: 33px;
            margin-bottom: 15px;
        }

        .feature h3 {
            margin-bottom: 8px;
            font-size: 18px;
            color: #1f2937;
        }

        .feature p {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.6;
        }

        /* =========================================================
           FOOTER
        ========================================================== */

        footer {
            background: #111827;
            color: white;
            padding: 40px 7%;
            text-align: center;
        }

        footer h3 { font-size: 21px; }

        footer p {
            color: #cbd5e1;
            font-size: 14px;
        }

        /* =========================================================
           TABLET
        ========================================================== */

        @media (max-width: 1100px) {
            .nav-menu { gap: 14px; }
            .nav-menu a { font-size: 11px; }
            .featured-content h2 { font-size: 68px; }
            .recommendation-grid { grid-template-columns: repeat(2, 1fr); }
            .feature-grid { grid-template-columns: repeat(2, 1fr); }
            .region-card { min-height: 220px; }
        }

        /* =========================================================
           TABLET SMALL
        ========================================================== */

        @media (max-width: 900px) {
            .navbar { padding: 18px 5%; }
            .nav-menu { display: none; }
            .hero { min-height: 500px; padding: 140px 5% 70px; }
            .hero-content h1 { font-size: 43px; }
            .section { padding: 60px 5%; }
            .featured-wrapper { height: 560px; }
            .featured-content { left: 8%; right: 8%; bottom: 90px; }
            .featured-content h2 { font-size: 58px; }
            .featured-content p { font-size: 17px; }
            .featured-arrow { width: 58px; height: 75px; font-size: 34px; }
            .region-page { grid-template-columns: repeat(2, 1fr); grid-template-rows: repeat(3, 1fr); }
        }

        /* =========================================================
           MOBILE
        ========================================================== */

        @media (max-width: 600px) {
            .hero { min-height: 510px; padding: 150px 6% 65px; }
            .hero-content h1 { font-size: 34px; }
            .hero-content p { font-size: 15px; }
            .search-box { flex-direction: column; gap: 8px; padding: 0; background: transparent; }
            .search-box input { width: 100%; border-radius: 8px; }
            .search-box button { width: 100%; padding: 14px; }
            .featured-wrapper { height: 520px; }
            .featured-content { left: 8%; right: 8%; bottom: 72px; }
            .featured-label { font-size: 10px; letter-spacing: 3px; }
            .featured-content h2 { font-size: 43px; line-height: 1; margin-bottom: 15px; }
            .featured-content p { font-size: 14px; line-height: 1.5; }
            .featured-arrow { width: 43px; height: 58px; font-size: 27px; }
            .featured-dots { bottom: 20px; }
            .featured-dot.active { width: 25px; }
            .section { padding: 50px 5%; }
            .section-title { margin-bottom: 30px; }
            .section-title h2 { font-size: 27px; }
            .recommendation-grid { grid-template-columns: 1fr; }
            .region-page { grid-template-columns: 1fr; grid-template-rows: repeat(6, 185px); gap: 15px; }
            .region-card { min-height: 185px; }
            .region-content h3 { font-size: 20px; }
            .region-prev { left: -7px; }
            .region-next { right: -7px; }
            .region-arrow { width: 42px; height: 52px; font-size: 25px; }
            .feature-grid { grid-template-columns: 1fr; }
        }

    </style>

    @stack('styles')

</head>

<body>

    @yield('content')

    @stack('scripts')

</body>

</html>
