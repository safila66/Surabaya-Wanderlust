<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About — NusaExplore</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f7f3ed;
            color: #29251f;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .navbar {
            height: 76px;
            background: #fff;
            border-bottom: 1px solid #e8e1d8;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 6%;
            position: sticky;
            top: 0;
            z-index: 20;
        }

        .logo {
            font-size: 22px;
            font-weight: 800;
        }

        .logo span {
            color: #a5673f;
        }

        .nav-links {
            display: flex;
            gap: 26px;
            align-items: center;
        }

        .nav-links a {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .7px;
            color: #4b453e;
            transition: .2s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: #a5673f;
        }

        .hero {
            min-height: 480px;
            display: flex;
            align-items: center;
            background:
                linear-gradient(rgba(42,34,27,.48), rgba(42,34,27,.48)),
                url('https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1800&q=85')
                center/cover;
            color: white;
        }

        .hero-content {
            width: min(1120px, 88%);
            margin: auto;
        }

        .hero small {
            display: block;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 11px;
            margin-bottom: 18px;
        }

        .hero h1 {
            font-family: Georgia, serif;
            font-size: clamp(48px, 7vw, 82px);
            line-height: .95;
            max-width: 800px;
            margin-bottom: 24px;
        }

        .hero p {
            max-width: 620px;
            font-size: 16px;
            line-height: 1.8;
            color: #eee7de;
        }

        .container {
            width: min(1120px, 88%);
            margin: auto;
        }

        .section {
            padding: 80px 0;
        }

        .intro {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 70px;
            align-items: center;
        }

        .eyebrow {
            display: block;
            color: #a5673f;
            text-transform: uppercase;
            letter-spacing: 1.6px;
            font-size: 11px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        h2 {
            font-family: Georgia, serif;
            font-size: 42px;
            line-height: 1.1;
            margin-bottom: 22px;
        }

        .intro p {
            color: #716960;
            line-height: 1.9;
            font-size: 15px;
            margin-bottom: 15px;
        }

        .intro-image {
            height: 440px;
            border-radius: 22px;
            overflow: hidden;
        }

        .intro-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .mission {
            background: #ebe3d9;
        }

        .mission-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .mission-card {
            background: white;
            padding: 30px;
            border-radius: 18px;
            border: 1px solid #e3d9ce;
            transition: .25s;
        }

        .mission-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(50,40,30,.08);
        }

        .icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #f1e6da;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 20px;
        }

        .mission-card h3 {
            font-family: Georgia, serif;
            font-size: 23px;
            margin-bottom: 10px;
        }

        .mission-card p {
            color: #716960;
            font-size: 14px;
            line-height: 1.8;
        }

        .journey {
            text-align: center;
        }

        .journey > p {
            max-width: 650px;
            margin: 0 auto 40px;
            color: #716960;
            line-height: 1.8;
            font-size: 15px;
        }

        .journey-line {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            text-align: left;
        }

        .journey-step {
            border-top: 2px solid #c5b4a4;
            padding-top: 20px;
        }

        .journey-number {
            font-family: Georgia, serif;
            color: #a5673f;
            font-size: 34px;
            margin-bottom: 10px;
        }

        .journey-step h3 {
            font-size: 17px;
            margin-bottom: 8px;
        }

        .journey-step p {
            color: #716960;
            font-size: 13px;
            line-height: 1.7;
        }

        .values {
            background: #29251f;
            color: white;
        }

        .values-grid {
            display: grid;
            grid-template-columns: 1.1fr 1fr;
            gap: 70px;
            align-items: center;
        }

        .values h2 {
            color: white;
        }

        .values-intro {
            color: #bcb3aa;
            line-height: 1.8;
            font-size: 14px;
        }

        .value-list {
            display: grid;
            gap: 16px;
        }

        .value {
            padding: 20px;
            border: 1px solid #514a43;
            border-radius: 14px;
        }

        .value h3 {
            font-family: Georgia, serif;
            font-size: 20px;
            margin-bottom: 6px;
        }

        .value p {
            color: #bcb3aa;
            font-size: 13px;
            line-height: 1.7;
        }

        .source-note {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #514a43;
            color: #999087;
            font-size: 12px;
            line-height: 1.7;
        }

        footer {
            background: #1e1b18;
            color: #eee7de;
            padding: 45px 7%;
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            gap: 30px;
        }

        footer h3 {
            font-family: Georgia, serif;
            font-size: 25px;
            margin-bottom: 8px;
        }

        footer p {
            color: #aaa198;
            font-size: 13px;
        }

        .footer-links {
            display: flex;
            gap: 22px;
            align-items: center;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: #cfc7bd;
            font-size: 12px;
        }

        @media (max-width: 900px) {
            .nav-links {
                display: none;
            }

            .intro,
            .values-grid {
                grid-template-columns: 1fr;
            }

            .mission-grid {
                grid-template-columns: 1fr;
            }

            .journey-line {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 600px) {
            .hero {
                min-height: 420px;
            }

            .section {
                padding: 60px 0;
            }

            h2 {
                font-size: 34px;
            }

            .intro-image {
                height: 320px;
            }

            .journey-line {
                grid-template-columns: 1fr;
            }

            .footer-inner {
                display: block;
            }

            .footer-links {
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">

    <a href="{{ route('home') }}" class="logo">
        Nusa<span>Explore</span>
    </a>

    <div class="nav-links">
        <a href="{{ route('home') }}">HOME</a>
        <a href="{{ route('destinations.index') }}">DESTINATIONS</a>
        <a href="{{ route('culinary.index') }}">CULINARY</a>
        <a href="{{ route('culture.index') }}">CULTURE</a>
        <a href="{{ route('travel-guide.index') }}">TRAVEL GUIDE</a>
        <a href="{{ route('best-time.index') }}">BEST TIME</a>
        <a href="{{ route('plan-your-trip.index') }}">PLAN YOUR TRIP</a>
        <a href="{{ route('about.index') }}" class="active">ABOUT</a>
    </div>

</nav>


<section class="hero">

    <div class="hero-content">

        <small>About NusaExplore</small>

        <h1>
            Surabaya is more than a destination.
        </h1>

        <p>
            NusaExplore is a digital travel information portal designed
            to help travelers discover, understand and plan their journey
            across Surabaya.
        </p>

    </div>

</section>


<section class="section">

    <div class="container">

        <div class="intro">

            <div>

                <span class="eyebrow">Who We Are</span>

                <h2>
                    Explore Surabaya beyond the destination.
                </h2>

                <p>
                    Surabaya has thousands of islands, hundreds of cultures,
                    unique culinary traditions and countless places worth exploring.
                    NusaExplore brings this information together in one place.
                </p>

                <p>
                    Instead of only showing travelers where to go,
                    NusaExplore helps them understand the character of a place,
                    what they can experience, when to visit and what they should
                    prepare before traveling.
                </p>

                <p>
                    The platform is designed as an information and travel guide,
                    not as a booking or transaction platform.
                </p>

            </div>

            <div class="intro-image">

                <img
                    src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1000&q=85"
                    alt="Surabaya"
                >

            </div>

        </div>

    </div>

</section>


<section class="section mission">

    <div class="container">

        <div style="text-align:center; margin-bottom:40px;">

            <span class="eyebrow">Our Purpose</span>

            <h2>
                What NusaExplore brings together.
            </h2>

        </div>


        <div class="mission-grid">

            <div class="mission-card">

                <div class="icon">📍</div>

                <h3>Discover</h3>

                <p>
                    Find destinations, cities, regions and experiences
                    from different parts of Surabaya.
                </p>

            </div>


            <div class="mission-card">

                <div class="icon">🧭</div>

                <h3>Understand</h3>

                <p>
                    Learn about local culture, culinary traditions,
                    travel conditions, etiquette and useful information.
                </p>

            </div>


            <div class="mission-card">

                <div class="icon">🗺️</div>

                <h3>Plan</h3>

                <p>
                    Prepare a trip based on travel duration, interests,
                    travel style, budget and the best time to visit.
                </p>

            </div>

        </div>

    </div>

</section>


<section class="section journey">

    <div class="container">

        <span class="eyebrow">The NusaExplore Journey</span>

        <h2>
            From inspiration to experience.
        </h2>

        <p>
            Our information is organized around a simple journey so travelers
            can move naturally from discovering an idea to preparing for a trip.
        </p>


        <div class="journey-line">

            <div class="journey-step">

                <div class="journey-number">01</div>

                <h3>Explore</h3>

                <p>
                    Discover places, food, culture and experiences
                    that make Surabaya unique.
                </p>

            </div>


            <div class="journey-step">

                <div class="journey-number">02</div>

                <h3>Understand</h3>

                <p>
                    Learn what makes each destination different
                    before deciding where to go.
                </p>

            </div>


            <div class="journey-step">

                <div class="journey-number">03</div>

                <h3>Plan</h3>

                <p>
                    Check the best time, transportation, accommodation,
                    budget and useful travel information.
                </p>

            </div>


            <div class="journey-step">

                <div class="journey-number">04</div>

                <h3>Visit</h3>

                <p>
                    Turn information into a better-prepared and
                    more meaningful travel experience.
                </p>

            </div>

        </div>

    </div>

</section>


<section class="section values">

    <div class="container">

        <div class="values-grid">

            <div>

                <span class="eyebrow">Our Principles</span>

                <h2>
                    Information travelers can trust.
                </h2>

                <p class="values-intro">
                    NusaExplore is designed around useful, practical and
                    transparent travel information. Recommendations and
                    estimated information are presented as guidance rather
                    than guarantees.
                </p>

            </div>


            <div class="value-list">

                <div class="value">

                    <h3>Useful</h3>

                    <p>
                        Information is selected to help travelers actually
                        prepare for their journey.
                    </p>

                </div>


                <div class="value">

                    <h3>Local</h3>

                    <p>
                        Destinations are presented together with their
                        local culture, food and characteristics.
                    </p>

                </div>


                <div class="value">

                    <h3>Transparent</h3>

                    <p>
                        Important information can be accompanied by sources
                        and update dates where appropriate.
                    </p>

                </div>

            </div>

        </div>


        <div class="source-note">
            NusaExplore is an information portal. Prices, opening hours,
            transportation schedules, weather conditions and other travel
            information may change over time. Travelers should verify
            important information with the relevant official provider
            before traveling.
        </div>

    </div>

</section>


<footer>

    <div class="footer-inner">

        <div>

            <h3>NusaExplore</h3>

            <p>
                Explore Surabaya Beyond the Destination.
            </p>

        </div>


        <div class="footer-links">

            <a href="{{ route('destinations.index') }}">
                Destinations
            </a>

            <a href="{{ route('culinary.index') }}">
                Culinary
            </a>

            <a href="{{ route('culture.index') }}">
                Culture
            </a>

            <a href="{{ route('travel-guide.index') }}">
                Travel Guide
            </a>

            <a href="{{ route('plan-your-trip.index') }}">
                Plan Your Trip
            </a>

        </div>

    </div>

</footer>

</body>
</html>
