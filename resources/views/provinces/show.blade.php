<!DOCTYPE html>
<html lang="id" data-theme="dark">

<head>

    <meta charset="UTF-8">
    <script>(function(){var t=localStorage.getItem('sw-theme')||'dark';document.documentElement.setAttribute('data-theme',t);})()</script>
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $province->name }} — Surabaya Wanderlust
    </title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        

        a {
            text-decoration: none;
        }


        /* =====================================================
           NAVBAR
        ====================================================== */

        .navbar { display: none; }

        .brand {
            color: #24584a;
            font-size: 24px;
            font-weight: 800;
        }

        .brand-sub {
            margin-top: 3px;
            color: #8a8d86;
            font-size: 10px;
        }

        .nav-links {
            display: flex;
            gap: 25px;
        }

        .nav-links a {
            color: #505a54;
            font-size: 12px;
            font-weight: 600;
        }

        .nav-links a:hover {
            color: #24584a;
        }


        /* =====================================================
           HERO
        ====================================================== */

        .province-hero {
            min-height: 360px;

            position: relative;

            display: flex;
            align-items: flex-end;

            padding: 60px 6%;

            background:
                linear-gradient(
                    to top,
                    rgba(20, 35, 29, .82),
                    rgba(20, 35, 29, .08)
                ),
                url("https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?auto=format&fit=crop&w=2000&q=90");

            background-size: cover;
            background-position: center;
        }

        .hero-inner {
            max-width: 850px;
            color: white;
        }

        .hero-kicker {
            font-size: 12px;
            letter-spacing: 4px;
            text-transform: uppercase;

            margin-bottom: 13px;

            color: #e5d4a5;
        }

        .hero-inner h1 {
            font-size: 62px;
            line-height: 1;

            margin-bottom: 20px;
        }

        .hero-inner p {
            max-width: 720px;

            font-size: 16px;
            line-height: 1.7;

            color: rgba(255,255,255,.9);
        }


        /* =====================================================
           CONTENT
        ====================================================== */

        .container {
            width: 86%;
            max-width: 1250px;
            margin: auto;
        }

        .intro {
            padding: 55px 0 35px;
        }

        .intro-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 30px;
        }

        .intro-card {
            background: white;
            padding: 30px;

            border-radius: 18px;

            border: 1px solid #e8e5dc;

            box-shadow: 0 8px 25px rgba(45, 55, 48, .05);
        }

        .intro-card h2 {
            color: #24584a;
            font-size: 25px;
            margin-bottom: 13px;
        }

        .intro-card p {
            color: #69716c;
            font-size: 14px;
            line-height: 1.8;
        }


        /* =====================================================
           STAT
        ====================================================== */

        .stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .stat {
            padding: 25px;
            background: #eef1e8;
            border-radius: 16px;
        }

        .stat-number {
            color: #24584a;
            font-size: 29px;
            font-weight: 800;
        }

        .stat-label {
            margin-top: 7px;
            color: #6c756e;
            font-size: 12px;
        }


        /* =====================================================
           SECTION
        ====================================================== */

        .section {
            padding: 40px 0 70px;
        }

        .section-heading {
            margin-bottom: 25px;
        }

        .section-heading h2 {
            color: #263b33;
            font-size: 29px;
        }

        .section-heading p {
            margin-top: 8px;
            color: #7b817d;
            font-size: 14px;
        }


        /* =====================================================
           REGENCY GRID
        ====================================================== */

        .regency-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .regency-card {
            background: white;

            padding: 22px;

            border-radius: 17px;

            border: 1px solid #e8e5dc;

            transition: .25s ease;
        }

        .regency-card:hover {
            transform: translateY(-4px);
            border-color: #b8c7b7;

            box-shadow:
                0 12px 28px rgba(30, 60, 45, .08);
        }

        .regency-card h3 {
            color: #2b463b;
            font-size: 17px;
            margin-bottom: 8px;
        }

        .regency-card p {
            color: #7c827d;
            font-size: 12px;
        }

        .destination-list {
            margin-top: 17px;

            display: flex;
            flex-wrap: wrap;

            gap: 7px;
        }

        .destination-pill {
            padding: 6px 10px;

            border-radius: 20px;

            background: #f0eee6;

            color: #53645b;

            font-size: 11px;
        }


        /* =====================================================
           EMPTY
        ====================================================== */

        .empty {
            background: white;

            padding: 35px;

            border-radius: 18px;

            text-align: center;

            color: #7b817d;
        }


        /* =====================================================
           FOOTER
        ====================================================== */

        footer {
            padding: 45px 7%;

            background: #203c32;

            color: white;

            text-align: center;
        }

        footer h3 {
            font-size: 22px;
        }

        footer p {
            margin-top: 8px;
            color: #c8d2cc;
            font-size: 13px;
        }


        /* =====================================================
           RESPONSIVE
        ====================================================== */

        @media (max-width: 900px) {

            .nav-links {
                display: none;
            }

            .hero-inner h1 {
                font-size: 48px;
            }

            .intro-grid {
                grid-template-columns: 1fr;
            }

            .regency-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }


        @media (max-width: 600px) {

            .navbar { display: none; }

            .container {
                width: 90%;
            }

            .province-hero {
                min-height: 420px;
                padding: 55px 7%;
            }

            .hero-inner h1 {
                font-size: 39px;
            }

            .hero-inner p {
                font-size: 14px;
            }

            .regency-grid {
                grid-template-columns: 1fr;
            }

        }

    </style>

    <style>
        </style>
</head>


<body>

@include('partials.navbar')



    <!-- =====================================================
         NAVBAR
    ====================================================== -->

    



    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="province-hero">

        <div class="hero-inner">

            <div class="hero-kicker">
                Explore Region
            </div>

            <h1>
                {{ $province->name }}
            </h1>

            <p>

                {{ $province->description
                    ?? 'Discover destinations, culture, culinary experiences, and local stories from this region of Surabaya.'
                }}

            </p>

        </div>

    </section>



    <!-- =====================================================
         INTRO
    ====================================================== -->

    <section class="intro">

        <div class="container">

            <div class="intro-grid">


                <div class="intro-card">

                    <h2>
                        About {{ $province->name }}
                    </h2>

                    <p>

                        {{ $province->description
                            ?? 'Jelajahi berbagai wilayah dan pengalaman perjalanan yang tersedia di provinsi ini melalui Surabaya Wanderlust.'
                        }}

                    </p>

                </div>



                <div class="stats">

                    <div class="stat">

                        <div class="stat-number">
                            {{ $province->regencies->count() }}
                        </div>

                        <div class="stat-label">
                            Kabupaten / Kota
                        </div>

                    </div>


                    <div class="stat">

                        <div class="stat-number">

                            {{ $province->regencies->sum(function ($regency) {
                                return $regency->destinations->count();
                            }) }}

                        </div>

                        <div class="stat-label">
                            Destinasi Tersedia
                        </div>

                    </div>

                </div>


            </div>

        </div>

    </section>



    <!-- =====================================================
         KABUPATEN / KOTA
    ====================================================== -->

    <section class="section">

        <div class="container">

            <div class="section-heading">

                <h2>
                    Kabupaten & Kota
                </h2>

                <p>
                    Jelajahi wilayah yang berada di {{ $province->name }}.
                </p>

            </div>


            @if ($province->regencies->count())

                <div class="regency-grid">

                    @foreach ($province->regencies as $regency)

                        <div class="regency-card">

                            <h3>
                                {{ $regency->name }}
                            </h3>

                            <p>

                                {{ $regency->destinations->count() }}

                                destinasi tersedia

                            </p>


                            @if ($regency->destinations->count())

                                <div class="destination-list">

                                    @foreach ($regency->destinations as $destination)

                                        <a
                                            href="{{ route('destinations.show', $destination->slug) }}"
                                            class="destination-pill"
                                        >

                                            {{ $destination->name }}

                                        </a>

                                    @endforeach

                                </div>

                            @endif

                        </div>

                    @endforeach

                </div>

            @else

                <div class="empty">

                    Belum ada data kabupaten atau kota.

                </div>

            @endif

        </div>

    </section>



    <!-- =====================================================
         FOOTER
    ====================================================== -->

    



@include('partials.footer')

</body>

</html>
