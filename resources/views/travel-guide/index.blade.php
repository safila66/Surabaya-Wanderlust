<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Travel Guide — NusaExplore</title>

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

        .guides {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
            padding-bottom: 80px;
        }

        .guide {
            background: #fff;
            border: 1px solid #e6dfd4;
            border-radius: 18px;
            padding: 28px;
            min-height: 230px;
        }

        .icon {
            font-size: 32px;
            margin-bottom: 18px;
        }

        .guide h2 {
            margin: 0 0 10px;
            font-family: Georgia, serif;
        }

        .guide p {
            margin: 0;
            color: #706c65;
            line-height: 1.7;
        }

        @media(max-width: 800px) {
            .nav-inner {
                align-items: flex-start;
                flex-direction: column;
            }

            .guides {
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
                Travel Smarter
            </div>

            <h1>
                Your guide to travelling Surabaya.
            </h1>

            <p class="intro">
                Practical information to help you understand destinations,
                prepare your journey, and travel more comfortably across Surabaya.
            </p>

        </div>
    </section>

    <section class="container guides">

        <div class="guide">
            <div class="icon">🗺️</div>

            <h2>Getting Around</h2>

            <p>
                Find useful information about transportation,
                estimated travel time, and ways to move around your destination.
            </p>
        </div>

        <div class="guide">
            <div class="icon">🎒</div>

            <h2>Travel Tips</h2>

            <p>
                Prepare your trip with practical tips about what to bring,
                local conditions, and things worth knowing before you go.
            </p>
        </div>

        <div class="guide">
            <div class="icon">📋</div>

            <h2>Before You Go</h2>

            <p>
                Check important information, local etiquette,
                destination conditions, and other travel considerations.
            </p>
        </div>

    </section>

</main>

</body>
</html>
