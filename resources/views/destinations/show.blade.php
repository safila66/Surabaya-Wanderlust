<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $destination->name }} — Surabaya Wanderlust</title>

    {{-- Anti-flicker: apply saved theme immediately --}}
    <script>(function(){var t=localStorage.getItem('sw-theme')||'dark';document.documentElement.setAttribute('data-theme',t);})()</script>

    {{-- Unified CSS --}}
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">


    <style>
        /* Override theme colors to match unified theme */
        :root {
            --cream: #0d1b3e;
            --cream-dark: #07112a;
            --paper: #122254;
            --green: #f4e80b;
            --green-soft: rgba(244,232,11,0.6);
            --brown: #f4e80b;
            --gold: #f4e80b;
            --terracotta: #0abf8a;
            --text: #ffffff;
            --muted: #7a86a1;
            --line: rgba(255,255,255,0.12);
            --white: #ffffff;
        }
        body {
            background: #0d1b3e !important;
            color: #ffffff !important;
        }
    </style>

    <style>{{-- Original inline styles below --}}

        :root {
            --cream: #f5f1e8;
            --cream-dark: #ebe4d5;
            --paper: #fbfaf6;
            --green: #304a3b;
            --green-soft: #66745c;
            --brown: #8a674d;
            --gold: #b29a6b;
            --terracotta: #a76f52;
            --text: #29332d;
            --muted: #77766d;
            --line: #ddd6c8;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: var(--cream);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        img {
            display: block;
            width: 100%;
        }


        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            display: none; /* digantikan oleh uni-navbar dari partials/navbar */
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: 'Playfair Display', serif;
            font-size: 23px;
            font-weight: 600;
            color: var(--green);
        }

        .brand-mark {
            width: 31px;
            height: 31px;
            border-radius: 50%;
            background: var(--green);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            font-family: 'DM Sans', sans-serif;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 28px;
            font-size: 13px;
            color: #53574f;
        }

        .nav-links a {
            transition: .2s ease;
        }

        .nav-links a:hover {
            color: var(--green);
        }

        .nav-button {
            background: var(--green);
            color: white !important;
            padding: 10px 18px;
            border-radius: 30px;
            font-size: 12px;
        }


        /* =========================
           BREADCRUMB
        ========================= */

        .breadcrumb {
            max-width: 1180px;
            margin: 0 auto;
            padding: 25px 25px 12px;
            font-size: 12px;
            color: var(--muted);
        }

        .breadcrumb a:hover {
            color: var(--green);
        }

        .breadcrumb span {
            color: var(--green);
        }


        /* =========================
           HERO
        ========================= */

        .destination-hero {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .hero-photo {
            height: 420px;
            border-radius: 18px;
            overflow: hidden;
            position: relative;
            background: #aaa;
        }

        .hero-photo img {
            height: 100%;
            object-fit: cover;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;

            background:
                linear-gradient(
                    to top,
                    rgba(22, 31, 26, .78) 0%,
                    rgba(22, 31, 26, .20) 48%,
                    rgba(22, 31, 26, .02) 100%
                );
        }

        .hero-content {
            position: absolute;
            bottom: 34px;
            left: 36px;
            right: 36px;
            color: white;
        }

        .eyebrow {
            display: inline-block;
            font-size: 9px;
            letter-spacing: 2px;
            font-weight: 600;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(32px, 5vw, 56px);
            line-height: 1;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .hero-location {
            font-size: 12px;
            opacity: .92;
            margin-bottom: 14px;
        }

        .rating-line {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .stars {
            color: #e7c979;
            letter-spacing: 2px;
            font-size: 14px;
        }

        .rating-number {
            font-weight: 700;
        }

        .review-count {
            opacity: .9;
            font-size: 11px;
        }


        /* =========================
           DESTINATION GALLERY
        ========================= */

        .destination-gallery {
            max-width: 1100px;
            margin: 11px auto 0;
            padding: 0 20px;
            overflow: hidden;
        }

        .gallery-track {
            display: flex;
            gap: 10px;

            overflow-x: auto;

            scroll-behavior: smooth;

            scrollbar-width: none;

            cursor: grab;

            user-select: none;

            -webkit-overflow-scrolling: touch;
        }

        .gallery-track::-webkit-scrollbar {
            display: none;
        }

        .gallery-track.dragging {
            cursor: grabbing;
            scroll-behavior: auto;
        }

        .gallery-slide {
            flex: 0 0 210px;
            height: 120px;

            border-radius: 13px;

            overflow: hidden;

            position: relative;

            background: #ddd;
        }

        .gallery-slide img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            pointer-events: none;

            transition: transform .4s ease;
        }

        .gallery-slide:hover img {
            transform: scale(1.04);
        }

        .gallery-caption {
            position: absolute;

            left: 10px;
            right: 10px;
            bottom: 8px;

            color: white;

            font-size: 9px;

            text-shadow:
                0 1px 5px rgba(0,0,0,.5);
        }


        /* =========================
           MAIN CONTENT
        ========================= */

        .content {
            max-width: 1000px;

            margin: 48px auto 64px;

            padding: 0 20px;
        }

        .intro {
            max-width: 680px;

            margin-bottom: 36px;
        }

        .section-label {
            font-size: 9px;

            letter-spacing: 1.8px;

            text-transform: uppercase;

            color: var(--brown);

            font-weight: 700;

            margin-bottom: 7px;
        }

        .intro h2 {
            font-family: 'Playfair Display', serif;

            font-size: 28px;

            font-weight: 600;

            line-height: 1.2;

            color: var(--green);

            margin-bottom: 13px;
        }

        .intro p {
            color: #65655e;

            font-size: 13px;

            line-height: 1.85;
        }


        /* =========================
           QUICK INFO
        ========================= */

        .quick-info {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 10px;

            margin-bottom: 48px;
        }

        .info-card {
            background: var(--paper);

            border:
                1px solid
                rgba(48, 74, 59, .08);

            border-radius: 12px;

            padding: 16px;

            min-height: 95px;
        }

        .info-icon {
            font-size: 15px;

            margin-bottom: 9px;
        }

        .info-title {
            font-size: 9px;

            text-transform: uppercase;

            letter-spacing: 1.2px;

            color: var(--muted);

            margin-bottom: 3px;
        }

        .info-value {
            font-size: 12px;

            font-weight: 600;

            color: var(--green);
        }


        /* =========================
           TWO COLUMN
        ========================= */

        .two-column {
            display: grid;

            grid-template-columns:
                1.45fr .8fr;

            gap: 40px;

            align-items: start;
        }

        .content-section {
            margin-bottom: 42px;
        }

        .content-section h3 {
            font-family: 'Playfair Display', serif;

            color: var(--green);

            font-size: 22px;

            margin-bottom: 14px;
        }

        .content-section p {
            color: #67675f;

            font-size: 13px;

            line-height: 1.85;
        }


        /* =========================
           ACTIVITIES
        ========================= */

        .activity-list {
            display: grid;

            grid-template-columns:
                1fr 1fr;

            gap: 10px;
        }

        .activity {
            background: var(--paper);

            padding: 15px 17px;

            border-radius: 12px;

            border:
                1px solid
                rgba(48, 74, 59, .07);

            font-size: 13px;
        }

        .activity::before {
            content: "✦";

            color: var(--gold);

            margin-right: 8px;
        }


        /* =========================
           BEST TIME
        ========================= */

        .best-time {
            background: var(--green);

            color: white;

            border-radius: 20px;

            padding: 28px;
        }

        .best-time .section-label {
            color: #d7c39b;
        }

        .best-time h3 {
            color: white;

            font-size: 27px;

            margin-bottom: 20px;
        }

        .best-time-grid {
            display: grid;

            grid-template-columns:
                1fr 1fr;

            gap: 10px;
        }

        .best-item {
            background:
                rgba(255,255,255,.08);

            border-radius: 12px;

            padding: 14px;
        }

        .best-item small {
            display: block;

            color: #bfc8c0;

            font-size: 10px;

            text-transform: uppercase;

            letter-spacing: 1px;

            margin-bottom: 4px;
        }

        .best-item strong {
            font-size: 13px;

            font-weight: 500;
        }


        /* =========================
           RATING BOX
        ========================= */

        .rating-box {
            background: var(--paper);

            border-radius: 20px;

            padding: 30px;

            border:
                1px solid
                rgba(48, 74, 59, .08);

            margin-bottom: 22px;
        }

        .rating-top {
            display: flex;

            align-items: center;

            gap: 17px;

            padding-bottom: 23px;

            border-bottom:
                1px solid
                var(--line);

            margin-bottom: 20px;
        }

        .rating-big {
            font-family: 'Playfair Display', serif;

            font-size: 48px;

            line-height: 1;

            color: var(--green);
        }

        .rating-total-stars {
            color: #c39d4e;

            letter-spacing: 2px;
        }

        .rating-total-text {
            font-size: 11px;

            color: var(--muted);

            margin-top: 3px;
        }

        .rating-row {
            display: flex;

            align-items: center;

            gap: 8px;

            margin-bottom: 7px;

            font-size: 11px;
        }

        .rating-row .row-stars {
            width: 70px;

            color: #bd9950;

            letter-spacing: 1px;
        }

        .bar {
            flex: 1;

            height: 5px;

            background: #e4dfd3;

            border-radius: 10px;

            overflow: hidden;
        }

        .bar-fill {
            height: 100%;

            background: var(--green-soft);

            border-radius: 10px;
        }

        .rating-percent {
            width: 38px;

            text-align: right;

            color: var(--muted);
        }


        /* =========================
           REVIEW
        ========================= */

        .reviews-title {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 22px;
        }

        .reviews-title h3 {
            margin-bottom: 0;
        }

        .review-card {
            background: var(--paper);

            border-radius: 17px;

            padding: 22px;

            margin-bottom: 11px;

            border:
                1px solid
                rgba(48, 74, 59, .06);
        }

        .review-head {
            display: flex;

            justify-content: space-between;

            gap: 15px;

            margin-bottom: 9px;
        }

        .review-user {
            font-weight: 600;

            font-size: 13px;

            color: var(--green);
        }

        .review-date {
            font-size: 11px;

            color: var(--muted);
        }

        .review-stars {
            color: #bd9950;

            letter-spacing: 1px;

            font-size: 12px;

            margin-bottom: 7px;
        }

        .review-text {
            color: #67675f;

            font-size: 13px;

            line-height: 1.7;
        }

        .empty-review {
            background: var(--paper);

            border-radius: 17px;

            padding: 28px;

            border:
                1px solid
                rgba(48, 74, 59, .06);

            color: var(--muted);

            font-size: 13px;
        }


        /* =========================
           MAP
        ========================= */

        .map-card {
            background: var(--cream-dark);

            border-radius: 18px;

            padding: 25px;

            margin-top: 25px;
        }

        .map-card h4 {
            font-family: 'Playfair Display', serif;

            color: var(--green);

            font-size: 21px;

            margin-bottom: 7px;
        }

        .map-card p {
            font-size: 12px;

            color: var(--muted);

            margin-bottom: 18px;
        }

        .map-button {
            display: inline-block;

            background: var(--green);

            color: white;

            padding: 11px 17px;

            border-radius: 30px;

            font-size: 11px;

            font-weight: 600;

            transition: .2s ease;
        }

        .map-button:hover {
            background: #243a2e;
        }


        /* =========================
           FOOTER
        ========================= */

        footer {
            background: #293c32;

            color: white;

            padding: 55px 7% 30px;
        }

        .footer-grid {
            max-width: 1100px;

            margin: auto;

            display: grid;

            grid-template-columns:
                1.4fr 1fr 1fr 1fr;

            gap: 40px;
        }

        .footer-brand {
            font-family: 'Playfair Display', serif;

            font-size: 23px;

            margin-bottom: 12px;
        }

        .footer-desc {
            font-size: 12px;

            color: #c2cbc4;

            max-width: 280px;

            line-height: 1.7;
        }

        .footer-title {
            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: 1.4px;

            margin-bottom: 15px;

            color: #d8c7a4;
        }

        .footer-links a {
            display: block;

            font-size: 12px;

            color: #c4cbc6;

            margin-bottom: 8px;
        }

        .footer-links a:hover {
            color: white;
        }

        .footer-bottom {
            max-width: 1100px;

            margin: 40px auto 0;

            padding-top: 20px;

            border-top:
                1px solid
                rgba(255,255,255,.12);

            font-size: 11px;

            color: #9daaa1;

            text-align: center;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 850px) {

            .nav-links {
                display: none;
            }

            .hero-photo {
                height: 430px;
            }

            .quick-info {
                grid-template-columns:
                    1fr 1fr;
            }

            .two-column {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns:
                    1fr 1fr;
            }
        }


        @media (max-width: 550px) {

            .navbar {
                padding: 0 20px;
            }

            .breadcrumb {
                padding-left: 20px;
                padding-right: 20px;
            }

            .destination-hero {
                padding: 0 15px;
            }

            .hero-photo {
                height: 400px;

                border-radius: 19px;
            }

            .hero-content {
                left: 25px;

                right: 25px;

                bottom: 28px;
            }

            .hero-content h1 {
                font-size: 42px;
            }

            .destination-gallery {
                padding: 0 15px;
            }

            .gallery-slide {
                flex-basis: 220px;

                height: 135px;
            }

            .content {
                padding: 0 20px;

                margin-top: 50px;
            }

            .intro h2 {
                font-size: 31px;
            }

            .quick-info {
                grid-template-columns: 1fr;
            }

            .activity-list {
                grid-template-columns: 1fr;
            }

            .best-time-grid {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }
        }

    </style>
</head>


<body>




<!-- =========================
     NAVBAR
========================= -->

@include('partials.navbar')

<!-- =========================
     BREADCRUMB
========================= -->

<div class="breadcrumb" style="max-width:1200px; margin:90px auto 0; padding:20px 25px 10px;">

    <a href="{{ route('home') }}">Home</a>

    &nbsp; / &nbsp;

    <a href="{{ route('provinces.show', $destination->regency->province->slug) }}">

        {{ $destination->regency->province->name }}

    </a>

    &nbsp; / &nbsp;


    <span>
        {{ $destination->name }}
    </span>

</div>



<!-- =========================
     HERO
========================= -->

<section class="destination-hero">

    <div class="hero-photo">


        @if($destination->image)

            <img
                src="{{ asset('storage/' . $destination->image) }}"
                alt="{{ $destination->name }}"
            >

        @else

            <img
                src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1800&q=85"
                alt="{{ $destination->name }}"
            >

        @endif


        <div class="hero-overlay"></div>


        <div class="hero-content">

            <div class="eyebrow">
                DISCOVER
            </div>


            <h1>
                {{ $destination->name }}
            </h1>


            <div class="hero-location">

                📍
                {{ $destination->regency->name }},
                {{ $destination->regency->province->name }}

            </div>


            <div class="rating-line">


                <span class="stars">

                    @for($i = 1; $i <= 5; $i++)

                        @if($i <= round($averageRating))
                            ★
                        @else
                            ☆
                        @endif

                    @endfor

                </span>


                <span class="rating-number">

                    @if($reviewCount > 0)

                        {{ number_format($averageRating, 1) }} / 5

                    @else

                        No rating yet

                    @endif

                </span>


                <span class="review-count">

                    · {{ $reviewCount }}
                    {{ $reviewCount == 1 ? 'review' : 'reviews' }}

                </span>

            </div>

        </div>

    </div>

</section>



<!-- =========================
     PHOTO GALLERY
========================= -->

<section class="destination-gallery">

    <div
        class="gallery-track"
        id="galleryTrack"
    >


        @forelse($destination->images as $image)


            <div class="gallery-slide">


                <img
                    src="{{ asset('storage/' . $image->image) }}"
                    alt="{{ $image->caption ?? $destination->name }}"
                    draggable="false"
                >


                @if($image->caption)

                    <div class="gallery-caption">

                        {{ $image->caption }}

                    </div>

                @endif


            </div>


        @empty


            <div class="gallery-slide">

                <img
                    src="{{ $destination->image
                        ? asset('storage/' . $destination->image)
                        : 'https://images.unsplash.com/photo-1522383225653-ed111181a951?auto=format&fit=crop&w=1800&q=85'
                    }}"
                    alt="{{ $destination->name }}"
                    draggable="false"
                >

            </div>


        @endforelse


    </div>

</section>



<!-- =========================
     MAIN CONTENT
========================= -->

<main class="content">


    <!-- INTRO -->

    <section class="intro">

        <div class="section-label">
            ABOUT THE DESTINATION
        </div>


        <h2>
            {{ $destination->name }}
        </h2>


        <p>
            {{ $destination->description }}
        </p>

    </section>



    <!-- QUICK INFORMATION -->

    <section class="quick-info">


        <div class="info-card">

            <div class="info-icon">
                📍
            </div>

            <div class="info-title">
                Location
            </div>

            <div class="info-value">
                {{ $destination->regency->name }}
            </div>

        </div>



        <div class="info-card">

            <div class="info-icon">
                🎟
            </div>

            <div class="info-title">
                Ticket
            </div>

            <div class="info-value">

                {{ $destination->ticket_price ?? 'Information unavailable' }}

            </div>

        </div>



        <div class="info-card">

            <div class="info-icon">
                🕐
            </div>

            <div class="info-title">
                Opening Hours
            </div>

            <div class="info-value">

                {{ $destination->opening_hours ?? 'Information unavailable' }}

            </div>

        </div>



        <div class="info-card">

            <div class="info-icon">
                ⏱
            </div>

            <div class="info-title">
                Visit Duration
            </div>

            <div class="info-value">

                {{ $destination->visit_duration ?? 'Flexible' }}

            </div>

        </div>


    </section>



    <!-- TWO COLUMN -->

    <div class="two-column">


        <!-- =========================
             LEFT
        ========================= -->

        <div>


            <!-- THINGS TO DO -->

            <section class="content-section">

                <div class="section-label">
                    EXPERIENCE
                </div>


                <h3>
                    Things to Experience
                </h3>


                @if($destination->activities)


                    <div class="activity-list">


                        @foreach(explode(',', $destination->activities) as $activity)


                            <div class="activity">

                                {{ trim($activity) }}

                            </div>


                        @endforeach


                    </div>


                @else


                    <p>

                        Explore the destination and discover
                        experiences that suit your travel style.

                    </p>


                @endif

            </section>



            <!-- FACILITIES -->

            <section class="content-section">

                <div class="section-label">
                    WHAT YOU'LL FIND
                </div>


                <h3>
                    Facilities
                </h3>


                <p>

                    {{
                        $destination->facilities
                        ?? 'Facility information will be updated by Surabaya Wanderlust.'
                    }}

                </p>

            </section>



            <!-- ACCESSIBILITY -->

            <section class="content-section">

                <div class="section-label">
                    TRAVEL NOTES
                </div>


                <h3>
                    Accessibility
                </h3>


                <p>

                    {{
                        $destination->accessibility
                        ?? 'Accessibility information is currently being prepared.'
                    }}

                </p>

            </section>



            <!-- =========================
                 REVIEWS
            ========================= -->

            <section class="content-section">


                <div class="reviews-title">


                    <div>

                        <div class="section-label">
                            VISITOR REVIEWS
                        </div>

                        <h3>
                            What Travelers Say
                        </h3>

                    </div>


                </div>



                @forelse($destination->reviews as $review)


                    <div class="review-card">


                        <div class="review-head">


                            <div>

                                <div class="review-user">

                                    {{ $review->name }}

                                </div>


                                <div class="review-date">

                                    {{ $review->created_at->diffForHumans() }}

                                </div>

                            </div>


                        </div>



                        <div class="review-stars">


                            @for($i = 1; $i <= 5; $i++)

                                @if($i <= $review->rating)
                                    ★
                                @else
                                    ☆
                                @endif

                            @endfor


                        </div>



                        <div class="review-text">

                            {{ $review->comment }}

                        </div>


                    </div>


                @empty


                    <div class="empty-review">

                        Belum ada ulasan untuk destinasi ini.
                        Jadilah pengunjung pertama yang memberikan
                        penilaian dan pengalamanmu.

                    </div>


                @endforelse


            </section>


        </div>



        <!-- =========================
             RIGHT
        ========================= -->

        <aside>


            <!-- =========================
                 RATING
            ========================= -->

            <div class="rating-box">


                <div class="rating-top">


                    <div class="rating-big">

                        @if($reviewCount > 0)

                            {{ number_format($averageRating, 1) }}

                        @else

                            —

                        @endif

                    </div>


                    <div>


                        <div class="rating-total-stars">


                            @if($reviewCount > 0)

                                @for($i = 1; $i <= 5; $i++)

                                    @if($i <= round($averageRating))
                                        ★
                                    @else
                                        ☆
                                    @endif

                                @endfor

                            @else

                                ☆☆☆☆☆

                            @endif


                        </div>


                        <div class="rating-total-text">

                            Based on
                            {{ $reviewCount }}
                            {{ $reviewCount == 1 ? 'review' : 'reviews' }}

                        </div>


                    </div>

                </div>



                <!-- 5 STAR -->

                <div class="rating-row">

                    <span class="row-stars">
                        ★★★★★
                    </span>


                    <div class="bar">

                        <div
                            class="bar-fill"
                            style="
                                width:
                                {{
                                    $reviewCount > 0
                                    ? ($destination->reviews->where('rating', 5)->count() / $reviewCount) * 100
                                    : 0
                                }}%
                            "
                        ></div>

                    </div>


                    <span class="rating-percent">

                        {{
                            $reviewCount > 0
                            ? round(($destination->reviews->where('rating', 5)->count() / $reviewCount) * 100)
                            : 0
                        }}%

                    </span>

                </div>



                <!-- 4 STAR -->

                <div class="rating-row">

                    <span class="row-stars">
                        ★★★★☆
                    </span>


                    <div class="bar">

                        <div
                            class="bar-fill"
                            style="
                                width:
                                {{
                                    $reviewCount > 0
                                    ? ($destination->reviews->where('rating', 4)->count() / $reviewCount) * 100
                                    : 0
                                }}%
                            "
                        ></div>

                    </div>


                    <span class="rating-percent">

                        {{
                            $reviewCount > 0
                            ? round(($destination->reviews->where('rating', 4)->count() / $reviewCount) * 100)
                            : 0
                        }}%

                    </span>

                </div>



                <!-- 3 STAR -->

                <div class="rating-row">

                    <span class="row-stars">
                        ★★★☆☆
                    </span>


                    <div class="bar">

                        <div
                            class="bar-fill"
                            style="
                                width:
                                {{
                                    $reviewCount > 0
                                    ? ($destination->reviews->where('rating', 3)->count() / $reviewCount) * 100
                                    : 0
                                }}%
                            "
                        ></div>

                    </div>


                    <span class="rating-percent">

                        {{
                            $reviewCount > 0
                            ? round(($destination->reviews->where('rating', 3)->count() / $reviewCount) * 100)
                            : 0
                        }}%

                    </span>

                </div>



                <!-- 2 STAR -->

                <div class="rating-row">

                    <span class="row-stars">
                        ★★☆☆☆
                    </span>


                    <div class="bar">

                        <div
                            class="bar-fill"
                            style="
                                width:
                                {{
                                    $reviewCount > 0
                                    ? ($destination->reviews->where('rating', 2)->count() / $reviewCount) * 100
                                    : 0
                                }}%
                            "
                        ></div>

                    </div>


                    <span class="rating-percent">

                        {{
                            $reviewCount > 0
                            ? round(($destination->reviews->where('rating', 2)->count() / $reviewCount) * 100)
                            : 0
                        }}%

                    </span>

                </div>



                <!-- 1 STAR -->

                <div class="rating-row">

                    <span class="row-stars">
                        ★☆☆☆☆
                    </span>


                    <div class="bar">

                        <div
                            class="bar-fill"
                            style="
                                width:
                                {{
                                    $reviewCount > 0
                                    ? ($destination->reviews->where('rating', 1)->count() / $reviewCount) * 100
                                    : 0
                                }}%
                            "
                        ></div>

                    </div>


                    <span class="rating-percent">

                        {{
                            $reviewCount > 0
                            ? round(($destination->reviews->where('rating', 1)->count() / $reviewCount) * 100)
                            : 0
                        }}%

                    </span>

                </div>


            </div>



            <!-- =========================
                 BEST TIME
            ========================= -->

            @if($destination->bestTime)


                <div class="best-time">


                    <div class="section-label">
                        BEST TIME TO VISIT
                    </div>


                    <h3>
                        Plan Your Visit
                    </h3>


                    <div class="best-time-grid">


                        <div class="best-item">

                            <small>
                                Best Month
                            </small>

                            <strong>
                                {{ $destination->bestTime->best_month }}
                            </strong>

                        </div>



                        <div class="best-item">

                            <small>
                                Best Time
                            </small>

                            <strong>
                                {{ $destination->bestTime->best_time }}
                            </strong>

                        </div>



                        <div class="best-item">

                            <small>
                                Weather
                            </small>

                            <strong>
                                {{ $destination->bestTime->weather }}
                            </strong>

                        </div>



                        <div class="best-item">

                            <small>
                                Temperature
                            </small>

                            <strong>
                                {{ $destination->bestTime->temperature }}
                            </strong>

                        </div>


                    </div>

                </div>


            @endif



            <!-- =========================
                 LOCATION
            ========================= -->

            <div class="map-card">


                <div class="section-label">
                    LOCATION
                </div>


                <h4>
                    Find Your Way
                </h4>


                <p>

                    {{
                        $destination->location
                        ?? $destination->regency->name
                    }}

                </p>


                @if($destination->maps_url)


                    <a
                        href="{{ $destination->maps_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="map-button"
                    >

                        View on Google Maps →

                    </a>


                @endif


            </div>


        </aside>


    </div>

</main>



<!-- UNIFIED FOOTER -->
@include('partials.footer')



<!-- =========================
     GALLERY SCRIPT
========================= -->

<script>

const gallery = document.getElementById('galleryTrack');


if (gallery) {


    let isDown = false;

    let startX = 0;

    let scrollLeft = 0;



    /* =========================
       DESKTOP DRAG
    ========================= */

    gallery.addEventListener('mousedown', (e) => {

        isDown = true;

        gallery.classList.add('dragging');

        startX =
            e.pageX -
            gallery.offsetLeft;

        scrollLeft =
            gallery.scrollLeft;

    });



    gallery.addEventListener('mouseleave', () => {

        isDown = false;

        gallery.classList.remove('dragging');

    });



    gallery.addEventListener('mouseup', () => {

        isDown = false;

        gallery.classList.remove('dragging');

    });



    gallery.addEventListener('mousemove', (e) => {

        if (!isDown) return;

        e.preventDefault();


        const x =
            e.pageX -
            gallery.offsetLeft;


        const walk =
            (x - startX) * 1.4;


        gallery.scrollLeft =
            scrollLeft - walk;

    });



    /* =========================
       MOBILE SWIPE
    ========================= */

    let touchStartX = 0;


    gallery.addEventListener(
        'touchstart',
        (e) => {

            touchStartX =
                e.touches[0].pageX;

        },
        {
            passive: true
        }
    );


    gallery.addEventListener(
        'touchmove',
        (e) => {

            const currentX =
                e.touches[0].pageX;


            const distance =
                touchStartX - currentX;


            gallery.scrollLeft +=
                distance;


            touchStartX =
                currentX;

        },
        {
            passive: true
        }
    );



    /* =========================
       AUTO SLIDE
    ========================= */

    let autoSlide =
        setInterval(() => {


            gallery.scrollBy({

                left: 272,

                behavior: 'smooth'

            });


            if (
                gallery.scrollLeft +
                gallery.clientWidth >=
                gallery.scrollWidth - 10
            ) {


                setTimeout(() => {

                    gallery.scrollTo({

                        left: 0,

                        behavior: 'smooth'

                    });

                }, 800);


            }


        }, 4000);



    /* =========================
       PAUSE ON HOVER
    ========================= */

    gallery.addEventListener(
        'mouseenter',
        () => {

            clearInterval(autoSlide);

        }
    );



    /* =========================
       PAUSE ON MOBILE TOUCH
    ========================= */

    gallery.addEventListener(
        'touchstart',
        () => {

            clearInterval(autoSlide);

        }
    );


}

</script>


</body>
</html>
