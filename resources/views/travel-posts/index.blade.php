<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Travel Experiences | NusaExplore</title>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: #F5F1E8;
            color: #29352E;
            font-family: "DM Sans", sans-serif;
        }

        a {
            color: inherit;
            text-decoration: none;
        }


        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            height: 76px;
            padding: 0 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #F5F1E8;
            border-bottom: 1px solid rgba(48, 74, 59, .08);
        }

        .brand {
            font-family: "Playfair Display", serif;
            font-size: 25px;
            font-weight: 700;
            color: #304A3B;
        }

        .brand span {
            color: #A56A4A;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 28px;
            font-size: 13px;
            font-weight: 600;
            color: #536057;
        }

        .nav-links a {
            transition: .25s ease;
        }

        .nav-links a:hover {
            color: #A56A4A;
        }

        .nav-active {
            color: #304A3B !important;
        }

        .nav-button {
            padding: 10px 17px;
            border-radius: 999px;
            background: #304A3B;
            color: white !important;
        }

        .nav-button:hover {
            background: #A56A4A;
        }


        /* =========================
           HERO
        ========================= */

        .page-hero {
            max-width: 1180px;
            margin: 0 auto;
            padding: 70px 25px 48px;
        }

        .eyebrow {
            font-size: 11px;
            letter-spacing: 3px;
            font-weight: 700;
            color: #A56A4A;
            margin-bottom: 14px;
        }

        .page-hero h1 {
            max-width: 720px;
            font-family: "Playfair Display", serif;
            font-size: clamp(42px, 6vw, 68px);
            line-height: 1.04;
            font-weight: 600;
            color: #304A3B;
            margin-bottom: 18px;
        }

        .page-hero p {
            max-width: 650px;
            font-size: 16px;
            line-height: 1.8;
            color: #667067;
        }

        .hero-action {
            margin-top: 27px;
        }

        .primary-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 13px 22px;
            border-radius: 999px;
            background: #304A3B;
            color: white;
            font-size: 13px;
            font-weight: 700;
            transition: .25s ease;
        }

        .primary-btn:hover {
            background: #A56A4A;
            transform: translateY(-2px);
        }


        /* =========================
           POST SECTION
        ========================= */

        .posts-section {
            max-width: 1180px;
            margin: 0 auto;
            padding: 0 25px 90px;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            margin-bottom: 25px;
        }

        .section-heading h2 {
            font-family: "Playfair Display", serif;
            font-size: 31px;
            font-weight: 600;
            color: #304A3B;
        }

        .section-heading span {
            font-size: 12px;
            color: #7A817A;
        }

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }


        /* =========================
           POST CARD
        ========================= */

        .post-card {
            background: #FBF9F3;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(48, 74, 59, .08);
            transition:
                transform .3s ease,
                box-shadow .3s ease;
        }

        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 45px rgba(48, 74, 59, .10);
        }


        /* =========================
           POST IMAGE
        ========================= */

        .post-image {
            height: 230px;
            position: relative;
            overflow: hidden;
            background: #DDD6C8;
        }

        .post-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform .5s ease;
        }

        .post-card:hover .post-image img {
            transform: scale(1.04);
        }

        .no-image {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #8B887E;
            font-size: 13px;
            background:
                linear-gradient(
                    135deg,
                    #E5DED0,
                    #D5C9B5
                );
        }

        .destination-tag {
            position: absolute;
            left: 15px;
            bottom: 14px;
            padding: 7px 11px;
            border-radius: 999px;
            background: rgba(48, 74, 59, .90);
            color: white;
            font-size: 10px;
            font-weight: 700;
            backdrop-filter: blur(8px);
        }


        /* =========================
           POST CONTENT
        ========================= */

        .post-content {
            padding: 21px;
        }

        .post-meta {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 11px;
            font-size: 11px;
            color: #8A8F88;
        }

        .post-title {
            display: block;
            font-family: "Playfair Display", serif;
            font-size: 22px;
            line-height: 1.25;
            color: #304A3B;
            margin-bottom: 10px;
        }

        .post-excerpt {
            color: #6B736C;
            font-size: 13px;
            line-height: 1.7;

            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .post-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 19px;
            padding-top: 15px;
            border-top: 1px solid rgba(48, 74, 59, .08);
        }

        .author {
            font-size: 12px;
            font-weight: 700;
            color: #536057;
        }

        .read-more {
            font-size: 12px;
            font-weight: 700;
            color: #A56A4A;
        }


        /* =========================
           EMPTY STATE
        ========================= */

        .empty-state {
            background: #FBF9F3;
            border: 1px solid rgba(48, 74, 59, .08);
            border-radius: 22px;
            padding: 65px 25px;
            text-align: center;
        }

        .empty-icon {
            font-size: 34px;
            margin-bottom: 15px;
        }

        .empty-state h3 {
            font-family: "Playfair Display", serif;
            font-size: 28px;
            color: #304A3B;
            margin-bottom: 9px;
        }

        .empty-state p {
            color: #747B74;
            font-size: 13px;
            margin-bottom: 22px;
        }


        /* =========================
           FOOTER
        ========================= */

        footer {
            background: #304A3B;
            color: #EAE6DA;
            padding: 55px 6% 30px;
        }

        .footer-inner {
            max-width: 1180px;
            margin: auto;
        }

        .footer-brand {
            font-family: "Playfair Display", serif;
            font-size: 27px;
            margin-bottom: 10px;
        }

        .footer-text {
            max-width: 470px;
            color: #C9CEC6;
            font-size: 13px;
            line-height: 1.8;
        }

        .footer-bottom {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,.12);
            color: #BFC6BD;
            font-size: 11px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .nav-links {
                gap: 15px;
            }

            .posts-grid {
                grid-template-columns: repeat(2, 1fr);
            }

        }


        @media (max-width: 650px) {

            .navbar {
                height: auto;
                padding: 18px 5%;
                align-items: flex-start;
                gap: 15px;
            }

            .nav-links {
                display: none;
            }

            .page-hero {
                padding-top: 48px;
            }

            .page-hero h1 {
                font-size: 43px;
            }

            .posts-grid {
                grid-template-columns: 1fr;
            }

            .post-image {
                height: 240px;
            }

            .section-heading {
                display: block;
            }

            .section-heading span {
                display: block;
                margin-top: 6px;
            }

        }

    </style>

</head>


<body>


    <!-- =========================
         NAVBAR
    ========================= -->

    <nav class="navbar">

        <a
            href="{{ route('home') }}"
            class="brand"
        >
            Nusa<span>Explore</span>
        </a>


        <div class="nav-links">

            <a href="{{ route('home') }}">
                HOME
            </a>

            <a href="{{ route('destinations.index') }}">
                DESTINATIONS
            </a>

            <a href="#">
                CULINARY
            </a>

            <a href="#">
                CULTURE
            </a>

            <a
                href="{{ route('travel-posts.index') }}"
                class="nav-active"
            >
                EXPERIENCES
            </a>

            <a
                href="{{ route('travel-posts.create') }}"
                class="nav-button"
            >
                + SHARE STORY
            </a>

        </div>

    </nav>


    <!-- =========================
         HERO
    ========================= -->

    <section class="page-hero">

        <div class="eyebrow">
            NUSAEXPLORE COMMUNITY
        </div>


        <h1>
            Stories from the road.
        </h1>


        <p>
            Discover Surabaya through the experiences of fellow travelers.
            Read their stories, find new inspiration, and share your own
            journey with the NusaExplore community.
        </p>


        <div class="hero-action">

            <a
                href="{{ route('travel-posts.create') }}"
                class="primary-btn"
            >
                Share Your Experience
            </a>

        </div>

    </section>


    <!-- =========================
         POSTS
    ========================= -->

    <section class="posts-section">


        <div class="section-heading">

            <h2>
                Latest Experiences
            </h2>

            <span>

                {{ $posts->count() }}

                {{ $posts->count() == 1 ? 'story' : 'stories' }}

            </span>

        </div>


        @if($posts->count() > 0)


            <div class="posts-grid">


                @foreach($posts as $post)


                    <article class="post-card">


                        <!-- =========================
                             IMAGE
                        ========================= -->

                        <a
                            href="{{ route(
                                'travel-posts.show',
                                $post->id
                            ) }}"
                        >

                            <div class="post-image">


                                {{-- 
                                    PRIORITY:
                                    1. cover_image
                                    2. first image from travel_post_images
                                    3. placeholder
                                --}}

                                @if($post->cover_image)

                                    <img
                                        src="{{ asset(
                                            'storage/' . $post->cover_image
                                        ) }}"
                                        alt="{{ $post->title }}"
                                    >

                                @elseif(
                                    $post->images &&
                                    $post->images->count() > 0
                                )

                                    <img
                                        src="{{ asset(
                                            'storage/' .
                                            $post->images->first()->image
                                        ) }}"
                                        alt="{{ $post->title }}"
                                    >

                                @else

                                    <div class="no-image">

                                        NusaExplore Experience

                                    </div>

                                @endif


                                {{-- DESTINATION TAG --}}

                                @if($post->destination)

                                    <div class="destination-tag">

                                        {{ $post->destination->name }}

                                    </div>

                                @endif


                            </div>

                        </a>


                        <!-- =========================
                             CONTENT
                        ========================= -->

                        <div class="post-content">


                            <div class="post-meta">

                                <span>

                                    {{ $post->created_at->diffForHumans() }}

                                </span>


                                @if($post->destination?->regency)

                                    <span>

                                        {{ $post->destination->regency->name }}

                                    </span>

                                @endif

                            </div>


                            <a
                                href="{{ route(
                                    'travel-posts.show',
                                    $post->id
                                ) }}"
                                class="post-title"
                            >

                                {{ $post->title }}

                            </a>


                            <p class="post-excerpt">

                                {{ $post->content }}

                            </p>


                            <div class="post-footer">


                                <span class="author">

                                    {{ $post->user?->name
                                        ?? $post->name
                                        ?? 'NusaExplorer'
                                    }}

                                </span>


                                <a
                                    href="{{ route(
                                        'travel-posts.show',
                                        $post->id
                                    ) }}"
                                    class="read-more"
                                >

                                    Read story →

                                </a>


                            </div>


                        </div>


                    </article>


                @endforeach


            </div>


        @else


            <!-- EMPTY STATE -->

            <div class="empty-state">


                <div class="empty-icon">
                    🌿
                </div>


                <h3>
                    No stories yet.
                </h3>


                <p>
                    Be the first traveler to share an experience
                    with the NusaExplore community.
                </p>


                <a
                    href="{{ route('travel-posts.create') }}"
                    class="primary-btn"
                >
                    Share Your Experience
                </a>


            </div>


        @endif


    </section>


    <!-- =========================
         FOOTER
    ========================= -->

    <footer>


        <div class="footer-inner">


            <div class="footer-brand">
                NusaExplore
            </div>


            <p class="footer-text">

                Explore Surabaya beyond the destination.
                Discover places, understand local culture,
                plan your journey, and experience Surabaya
                through stories from fellow travelers.

            </p>


            <div class="footer-bottom">

                © {{ date('Y') }} NusaExplore.
                Explore Surabaya Beyond the Destination.

            </div>


        </div>


    </footer>


</body>

</html>
