<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>

    <meta charset="UTF-8">
    <script>(function(){var t='dark';try{var s=localStorage.getItem('sw-theme');if(s==='system'||!s){t=window.matchMedia('(prefers-color-scheme: light)').matches?'light':'dark';}else{t=s;}}catch(e){}document.documentElement.setAttribute('data-theme',t);})()</script>
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $culinary->name }} | Surabaya Wanderlust</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        :root {
            --green: #29483b;
            --green-dark: #1f372d;
            --cream: #f6f1e8;
            --cream-light: #fbf9f4;
            --brown: #9a6b43;
            --text: #26322d;
            --muted: #77736c;
            --border: #e5dfd4;
        }

        * {
            box-sizing: border-box;
        }

        

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            background: var(--green);
            padding: 18px 0;
        }

        .brand {
            color: #fff;
            text-decoration: none;
            font-size: 21px;
            font-weight: 700;
        }

        .nav-link {
            color: rgba(255,255,255,.8) !important;
            margin-left: 18px;
            font-size: 14px;
            text-decoration: none;
        }

        .nav-link:hover {
            color: #fff !important;
        }

        /* =========================
           PAGE
        ========================= */

        .page {
            padding: 55px 0 90px;
        }

        .back-link {
            color: var(--gold);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .back-link:hover {
            color: var(--brown);
        }

        .location {
            color: var(--brown);
            text-transform: uppercase;
            letter-spacing: 1.3px;
            font-size: 12px;
            font-weight: 700;
            margin-top: 28px;
            margin-bottom: 12px;
        }

        h1 {
            font-family: Georgia, serif;
            font-size: clamp(42px, 6vw, 68px);
            line-height: 1;
            color: var(--green-dark);
            margin-bottom: 18px;
        }

        .intro {
            max-width: 800px;
            color: var(--muted);
            font-size: 17px;
            line-height: 1.8;
        }

        /* =========================
           MAIN IMAGE
        ========================= */

        .main-image {
            height: 520px;
            border-radius: 20px;
            overflow: hidden;
            margin-top: 40px;
            background: #e8e1d5;
        }

        .main-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--brown);
            font-size: 60px;
        }

        /* =========================
           GALLERY
        ========================= */

        .gallery {
            margin-top: 14px;
        }

        .gallery-item {
            height: 200px;
            border-radius: 12px;
            overflow: hidden;
            background: #e8e1d5;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* =========================
           CONTENT
        ========================= */

        .content-section {
            margin-top: 65px;
        }

        .section-label {
            color: var(--brown);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .section-title {
            font-family: Georgia, serif;
            font-size: 34px;
            color: var(--green-dark);
            margin-bottom: 18px;
        }

        .content-text {
            color: var(--muted);
            line-height: 1.9;
            font-size: 15px;
            white-space: pre-line;
        }

        /* =========================
           MORE LOCAL FLAVORS
        ========================= */

        .recommendation-section {
            margin-top: 70px;
            padding-top: 45px;
            border-top: 1px solid var(--border);
        }

        .recommendation-header {
            margin-bottom: 25px;
        }

        .recommendation-title {
            font-family: Georgia, serif;
            color: var(--green-dark);
            font-size: clamp(34px, 4vw, 48px);
            line-height: 1.1;
            margin: 0 0 10px;
        }

        .recommendation-subtitle {
            color: var(--muted);
            font-size: 15px;
            line-height: 1.7;
            margin: 0;
        }

        /* HORIZONTAL SCROLL */

        .culinary-scroll {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            overflow-y: hidden;
            padding: 5px 2px 18px;
            scroll-behavior: smooth;
            scroll-snap-type: x proximity;
        }

        .culinary-scroll::-webkit-scrollbar {
            height: 6px;
        }

        .culinary-scroll::-webkit-scrollbar-track {
            background: #ece7dd;
            border-radius: 20px;
        }

        .culinary-scroll::-webkit-scrollbar-thumb {
            background: #b8aa99;
            border-radius: 20px;
        }

        .culinary-scroll {
            scrollbar-color: #b8aa99 #ece7dd;
            scrollbar-width: thin;
        }

        /* =========================
           RECOMMENDATION CARD
           3 CARDS VISIBLE
        ========================= */

        .recommendation-card {
            flex: 0 0 calc((100% - 40px) / 3);
            min-width: 0;

            background: #fff;
            border: 1px solid var(--border);
            border-radius: 18px;
            overflow: hidden;

            text-decoration: none;
            color: var(--text);

            scroll-snap-align: start;

            transition:
                transform .25s ease,
                box-shadow .25s ease;
        }

        .recommendation-card:hover {
            color: var(--text);
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(42, 52, 46, .11);
        }

        /* =========================
           CARD IMAGE
        ========================= */

        .recommendation-image {
            height: 230px;
            background: #e8e1d5;
            overflow: hidden;
        }

        .recommendation-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .4s ease;
        }

        .recommendation-card:hover .recommendation-image img {
            transform: scale(1.04);
        }

        .recommendation-placeholder {
            width: 100%;
            height: 100%;

            display: flex;
            align-items: center;
            justify-content: center;

            color: var(--brown);
            font-size: 45px;
        }

        /* =========================
           CARD BODY
        ========================= */

        .recommendation-

        .recommendation-location {
            display: flex;
            align-items: center;
            gap: 7px;

            color: var(--brown);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 10px;
            font-weight: 700;

            margin-bottom: 8px;
        }

        .recommendation-location i {
            font-size: 11px;
        }

        .recommendation-body h3 {
            font-family: Georgia, serif;
            color: var(--green-dark);
            font-size: 25px;
            line-height: 1.2;

            margin: 0 0 10px;
        }

        .recommendation-description {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;

            margin-bottom: 18px;

            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* =========================
           CARD INFO
        ========================= */

        .recommendation-info {
            border-top: 1px solid var(--border);
            padding-top: 15px;

            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .recommendation-info-item {
            display: flex;
            align-items: flex-start;
            gap: 9px;
        }

        .recommendation-info-item i {
            color: var(--brown);
            font-size: 13px;
            margin-top: 3px;
            width: 15px;
            flex-shrink: 0;
        }

        .recommendation-info-label {
            color: #9a968f;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: .7px;
            font-weight: 700;
            margin-bottom: 3px;
        }

        .recommendation-info-value {
            color: var(--text);
            font-size: 12px;
            line-height: 1.5;
        }

        /* =========================
           CARD ARROW
        ========================= */

        .recommendation-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 16px;
        }

        .card-arrow {
            width: 38px;
            height: 38px;

            border-radius: 50%;
            background: var(--cream);

            display: flex;
            align-items: center;
            justify-content: center;

            color: var(--brown);
            font-size: 14px;

            transition: all .25s ease;
        }

        .recommendation-card:hover .card-arrow {
            background: var(--brown);
            color: #fff;
        }

        /* =========================
           REGION
        ========================= */

        .region-box {
            background: var(--cream);
            border-radius: 20px;
            padding: 40px;
            margin-top: 70px;
        }

        .region-box h2 {
            font-family: Georgia, serif;
            color: var(--green-dark);
            font-size: 32px;
            margin-bottom: 10px;
        }

        .region-box p {
            color: var(--muted);
            line-height: 1.7;
            max-width: 650px;
        }

        .btn-region {
            display: inline-block;

            background: var(--green);
            color: #fff;

            text-decoration: none;

            border-radius: 10px;
            padding: 12px 20px;

            font-size: 14px;
            font-weight: 600;

            margin-top: 8px;
        }

        .btn-region:hover {
            background: var(--green-dark);
            color: #fff;
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            background: var(--green-dark);
            color: rgba(255,255,255,.7);
            padding: 35px 0;
        }

        footer strong {
            color: #fff;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 992px) {

            .recommendation-card {
                flex-basis: calc((100% - 20px) / 2);
            }

        }

        @media (max-width: 768px) {

            .page {
                padding-top: 35px;
            }

            .main-image {
                height: 350px;
            }

            .gallery-item {
                height: 100px;
            }

            .recommendation-card {
                flex-basis: 82%;
            }

            .recommendation-image {
                height: 210px;
            }

            .recommendation-body h3 {
                font-size: 23px;
            }

            .recommendation-info {
                grid-template-columns: 1fr;
            }

            .region-box {
                padding: 28px;
            }

        }

    </style>

    <style>
        </style>
</head>


<body>

@include('partials.navbar')



<!-- =========================
     NAVBAR
========================= -->




<!-- =========================
     MAIN
========================= -->

<main class="page">

    <div class="container">


        <!-- BACK -->

        <a href="{{ route('culinary.index') }}"
           class="back-link">

            <i class="fa-solid fa-arrow-left me-2"></i>

            Back to Culinary

        </a>


        <!-- LOCATION -->

        <div class="location">

            {{ $culinary->regency->name ?? 'Surabaya' }}

            @if ($culinary->regency?->province)

                · {{ $culinary->regency->province->name }}

            @endif

        </div>


        <!-- TITLE -->

        <h1>
            {{ $culinary->name }}
        </h1>


        <!-- DESCRIPTION -->

        @if ($culinary->description)

            <div class="intro">

                {{ $culinary->description }}

            </div>

        @endif


        <!-- MAIN IMAGE -->

        <div class="main-image">

            @if ($culinary->image)

                <img
                    src="{{ asset('storage/' . $culinary->image) }}"
                    alt="{{ $culinary->name }}">

            @elseif ($culinary->images->count())

                <img
                    src="{{ asset('storage/' . $culinary->images->first()->image) }}"
                    alt="{{ $culinary->name }}">

            @else

                <div class="placeholder">

                    <i class="fa-solid fa-utensils"></i>

                </div>

            @endif

        </div>


        <!-- GALLERY -->

        @if ($culinary->images->count())

            <div class="gallery">

                <div class="row g-3">

                    @foreach ($culinary->images as $image)

                        <div class="col-6 col-md-3">

                            <div class="gallery-item">

                                <img
                                    src="{{ asset('storage/' . $image->image) }}"
                                    alt="{{ $image->caption ?? $culinary->name }}">

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        @endif


        <!-- =========================
             STORY / INGREDIENTS / TASTE
        ========================= -->

        <div class="content-section">


            @if ($culinary->history)

                <div class="mb-5">

                    <div class="section-label">
                        Story
                    </div>

                    <div class="section-title">
                        A taste with a story.
                    </div>

                    <div class="content-text">
                        {{ $culinary->history }}
                    </div>

                </div>

            @endif


            @if ($culinary->ingredients)

                <div class="mb-5">

                    <div class="section-label">
                        Ingredients
                    </div>

                    <div class="section-title">
                        What's inside?
                    </div>

                    <div class="content-text">
                        {{ $culinary->ingredients }}
                    </div>

                </div>

            @endif


            @if ($culinary->taste)

                <div class="mb-5">

                    <div class="section-label">
                        Taste
                    </div>

                    <div class="section-title">
                        What does it taste like?
                    </div>

                    <div class="content-text">
                        {{ $culinary->taste }}
                    </div>

                </div>

            @endif


        </div>


        <!-- =========================
             MORE LOCAL FLAVORS
        ========================= -->

        @if ($recommendedCulinaries->count())

            <section class="recommendation-section">


                <div class="recommendation-header">

                    <div class="section-label">
                        More Local Flavors
                    </div>

                    <h2 class="recommendation-title">
                        More from {{ $culinary->regency->name }}
                    </h2>

                    <p class="recommendation-subtitle">
                        Discover other local flavors from this region.
                    </p>

                </div>


                <!-- HORIZONTAL CAROUSEL -->

                <div class="culinary-scroll">


                    @foreach ($recommendedCulinaries as $item)


                        <a href="{{ route('culinary.show', $item->slug) }}"
                           class="recommendation-card">


                            <!-- IMAGE -->

                            <div class="recommendation-image">

                                @if ($item->image)

                                    <img
                                        src="{{ asset('storage/' . $item->image) }}"
                                        alt="{{ $item->name }}">

                                @elseif ($item->images?->count())

                                    <img
                                        src="{{ asset('storage/' . $item->images->first()->image) }}"
                                        alt="{{ $item->name }}">

                                @else

                                    <div class="recommendation-placeholder">

                                        <i class="fa-solid fa-utensils"></i>

                                    </div>

                                @endif

                            </div>


                            <!-- BODY -->

                            <div class="recommendation-body">


                                <!-- LOCATION -->

                                <div class="recommendation-location">

                                    <i class="fa-solid fa-location-dot"></i>

                                    {{ $item->regency->name ?? 'Surabaya' }}

                                </div>


                                <!-- NAME -->

                                <h3>
                                    {{ $item->name }}
                                </h3>


                                <!-- DESCRIPTION -->

                                @if ($item->description)

                                    <div class="recommendation-description">

                                        {{ $item->description }}

                                    </div>

                                @endif


                                <!-- INFORMATION -->

                                <div class="recommendation-info">


                                    @if ($item->price_range)

                                        <div class="recommendation-info-item">

                                            <i class="fa-solid fa-tag"></i>

                                            <div>

                                                <div class="recommendation-info-label">
                                                    Price
                                                </div>

                                                <div class="recommendation-info-value">
                                                    {{ $item->price_range }}
                                                </div>

                                            </div>

                                        </div>

                                    @endif


                                    @if ($item->where_to_buy)

                                        <div class="recommendation-info-item">

                                            <i class="fa-solid fa-store"></i>

                                            <div>

                                                <div class="recommendation-info-label">
                                                    Where to Buy
                                                </div>

                                                <div class="recommendation-info-value">
                                                    {{ $item->where_to_buy }}
                                                </div>

                                            </div>

                                        </div>

                                    @endif


                                    @if ($item->location)

                                        <div class="recommendation-info-item">

                                            <i class="fa-solid fa-map-pin"></i>

                                            <div>

                                                <div class="recommendation-info-label">
                                                    Location
                                                </div>

                                                <div class="recommendation-info-value">
                                                    {{ $item->location }}
                                                </div>

                                            </div>

                                        </div>

                                    @endif


                                    <div class="recommendation-info-item">

                                        <i class="fa-solid fa-gift"></i>

                                        <div>

                                            <div class="recommendation-info-label">
                                                Souvenir
                                            </div>

                                            <div class="recommendation-info-value">

                                                {{ $item->souvenir ? 'Suitable' : 'Not suitable' }}

                                            </div>

                                        </div>

                                    </div>


                                </div>


                                <!-- ARROW -->

                                <div class="recommendation-footer">

                                    <div class="card-arrow">

                                        <i class="fa-solid fa-arrow-right"></i>

                                    </div>

                                </div>


                            </div>


                        </a>


                    @endforeach


                </div>


            </section>

        @endif


        <!-- =========================
             EXPLORE REGION
        ========================= -->

        @if ($culinary->regency)

            <div class="region-box">

                <div class="section-label">
                    Continue Exploring
                </div>

                <h2>
                    Explore {{ $culinary->regency->name }}
                </h2>

                <p>
                    Discover destinations, culture, travel information,
                    and other experiences from this region.
                </p>

                <a href="{{ route('destinations.index') }}"
                   class="btn-region">

                    Explore Destinations

                    <i class="fa-solid fa-arrow-right ms-2"></i>

                </a>

            </div>

        @endif


    </div>


</main>


<!-- =========================
     FOOTER
========================= -->





@include('partials.footer')

</body>

</html>

