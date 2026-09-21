<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Best Time — NusaExplore</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f7f4ee;
            color: #252525;
        }

        .container {
            width: min(1180px, 92%);
            margin: auto;
        }

        nav {
            background: #fff;
            border-bottom: 1px solid #e7e1d7;
            padding: 20px 0;
        }

        .nav-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        .logo {
            color: #252525;
            text-decoration: none;
            font-size: 24px;
            font-weight: 800;
        }

        .nav-links {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .nav-links a {
            color: #333;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .hero {
            padding: 80px 0 55px;
        }

        .eyebrow {
            color: #8b7254;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        h1 {
            max-width: 850px;
            margin: 15px 0 20px;
            font-family: Georgia, serif;
            font-size: clamp(44px, 6vw, 72px);
            line-height: 1;
        }

        .intro {
            max-width: 720px;
            color: #6d6a64;
            font-size: 17px;
            line-height: 1.8;
        }

        .destination-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
            padding-bottom: 80px;
        }

        .card {
            background: #fff;
            border: 1px solid #e6dfd4;
            border-radius: 18px;
            padding: 26px;
        }

        .location {
            color: #8b7254;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .card h2 {
            margin: 0 0 18px;
            font-family: Georgia, serif;
            font-size: 27px;
        }

        .info {
            display: grid;
            gap: 12px;
        }

        .info-item {
            padding-bottom: 12px;
            border-bottom: 1px solid #eee8de;
        }

        .info-item:last-child {
            border-bottom: 0;
            padding-bottom: 0;
        }

        .label {
            display: block;
            color: #8a867f;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }

        .value {
            color: #393733;
            line-height: 1.5;
        }

        .empty {
            grid-column: 1 / -1;
            background: #fff;
            border: 1px solid #e6dfd4;
            border-radius: 18px;
            padding: 50px;
            text-align: center;
            color: #777;
        }

        @media(max-width: 850px) {
            .nav-inner {
                align-items: flex-start;
                flex-direction: column;
            }

            .destination-list {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<nav>
    <div class="container nav-inner">

        <a href="{{ route('home') }}" class="logo">
            NusaExplore
        </a>

        <div class="nav-links">

            <a href="{{ route('home') }}">HOME</a>

            <a href="{{ route('destinations.index') }}">
                DESTINATIONS
            </a>

            <a href="{{ route('culinary.index') }}">
                CULINARY
            </a>

            <a href="{{ route('culture.index') }}">
                CULTURE
            </a>

            <a href="{{ route('travel-guide.index') }}">
                TRAVEL GUIDE
            </a>

            <a href="{{ route('best-time.index') }}">
                BEST TIME
            </a>

            <a href="{{ route('plan-your-trip.index') }}">
                PLAN YOUR TRIP
            </a>

            <a href="{{ route('about.index') }}">
                ABOUT
            </a>

        </div>

    </div>
</nav>

<main>

    <section class="hero">
        <div class="container">

            <div class="eyebrow">
                Plan Your Visit
            </div>

            <h1>
                Find the best time to go.
            </h1>

            <p class="intro">
                Understand the weather, scenery, crowd levels, and activities
                before choosing when to visit destinations across Surabaya.
            </p>

        </div>
    </section>

    <section class="container destination-list">

        @forelse($bestTimes as $item)

            <article class="card">

                <div class="location">
                    {{ $item->destination->regency->name ?? 'Surabaya' }}
                </div>

                <h2>
                    {{ $item->destination->name }}
                </h2>

                <div class="info">

                    @if($item->best_month)
                        <div class="info-item">
                            <span class="label">Best Month</span>
                            <span class="value">
                                {{ $item->best_month }}
                            </span>
                        </div>
                    @endif

                    @if($item->best_time)
                        <div class="info-item">
                            <span class="label">Best Time</span>
                            <span class="value">
                                {{ $item->best_time }}
                            </span>
                        </div>
                    @endif

                    @if($item->weather)
                        <div class="info-item">
                            <span class="label">Weather</span>
                            <span class="value">
                                {{ $item->weather }}
                            </span>
                        </div>
                    @endif

                    @if($item->temperature)
                        <div class="info-item">
                            <span class="label">Temperature</span>
                            <span class="value">
                                {{ $item->temperature }}
                            </span>
                        </div>
                    @endif

                    @if($item->crowd_level)
                        <div class="info-item">
                            <span class="label">Crowd Level</span>
                            <span class="value">
                                {{ $item->crowd_level }}
                            </span>
                        </div>
                    @endif

                    @if($item->recommended_activities)
                        <div class="info-item">
                            <span class="label">Recommended Activities</span>
                            <span class="value">
                                {{ $item->recommended_activities }}
                            </span>
                        </div>
                    @endif

                </div>

            </article>

        @empty

            <div class="empty">
                Belum ada informasi Best Time yang tersedia.
            </div>

        @endforelse

    </section>

</main>

</body>
</html>
