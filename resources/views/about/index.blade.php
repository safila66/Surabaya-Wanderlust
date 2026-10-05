<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <script>(function(){var t=localStorage.getItem('sw-theme')||'dark';document.documentElement.setAttribute('data-theme',t);})()</script>
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About — Surabaya Wanderlust</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .navbar { display: none; }

        /* Hero selalu punya overlay gelap, jadi teksnya harus selalu terang
           (tidak ikut variable tema, karena di light mode variable-nya gelap) */
        .hero {
            min-height: 380px;
            display: flex;
            align-items: center;
            background:
                linear-gradient(rgba(42,34,27,.55), rgba(42,34,27,.55)),
                url('https://upload.wikimedia.org/wikipedia/commons/b/ba/Patung_suroboyo.jpg')
                center/cover;
            color: #ffffff;
        }

        .hero-content {
            width: min(1000px, 88%);
            margin: auto;
        }

        .hero small {
            display: block;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 9px;
            margin-bottom: 18px;
            color: #ffffff;
            opacity: .9;
        }

        .hero h1 {
            font-family: Georgia, serif;
            font-size: clamp(36px, 5.5vw, 62px);
            line-height: .95;
            max-width: 680px;
            margin-bottom: 24px;
            color: #ffffff;
            text-shadow: 0 2px 14px rgba(0,0,0,.35);
        }

        .hero p {
            max-width: 620px;
            font-size: 13px;
            line-height: 1.8;
            color: #f5f1eb;
            text-shadow: 0 1px 8px rgba(0,0,0,.35);
        }

        .container {
            width: min(1000px, 88%);
            margin: auto;
        }

        .section {
            padding: 56px 0;
        }

        .intro {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 48px;
            align-items: center;
        }

        .eyebrow {
            display: block;
            color: var(--gold);
            text-transform: uppercase;
            letter-spacing: 1.6px;
            font-size: 11px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        h2 {
            font-family: Georgia, serif;
            font-size: 32px;
            line-height: 1.1;
            margin-bottom: 22px;
        }

        .intro p {
            color: var(--text-muted);
            line-height: 1.9;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .intro-image {
            height: 340px;
            border-radius: 22px;
            overflow: hidden;
        }

        .intro-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .mission {
            background: var(--bg-primary);
        }

        .mission-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .mission-card {
            background: var(--bg-card);
            padding: 22px;
            border-radius: 18px;
            border: 1px solid var(--border);
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
            background: var(--bg-surface);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 20px;
        }

        .mission-card h3 {
            font-family: Georgia, serif;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .mission-card p {
            color: var(--text-muted);
            font-size: 12px;
            line-height: 1.8;
        }

        .journey {
            text-align: center;
        }

        .journey > p {
            max-width: 650px;
            margin: 0 auto 40px;
            color: var(--text-muted);
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
            border-top: 1px solid var(--border);
            padding-top: 20px;
        }

        .journey-number {
            font-family: Georgia, serif;
            color: var(--gold);
            font-size: 26px;
            margin-bottom: 10px;
        }

        .journey-step h3 {
            font-size: 14px;
            margin-bottom: 8px;
        }

        .journey-step p {
            color: var(--text-muted);
            font-size: 11px;
            line-height: 1.7;
        }

        .values {
            background: var(--bg-surface);
            color: var(--text-heading);
        }

        .values-grid {
            display: grid;
            grid-template-columns: 1.1fr 1fr;
            gap: 70px;
            align-items: center;
        }

        .values h2 {
            color: var(--text-heading);
        }

        .values-intro {
            color: var(--text-muted);
            line-height: 1.8;
            font-size: 14px;
        }

        .value-list {
            display: grid;
            gap: 16px;
        }

        .value {
            padding: 20px;
            border: 1px solid var(--border);
            border-radius: 14px;
        }

        .value h3 {
            font-family: Georgia, serif;
            font-size: 20px;
            margin-bottom: 6px;
        }

        .value p {
            color: var(--text-muted);
            font-size: 13px;
            line-height: 1.7;
        }

        .source-note {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
            color: var(--text-muted);
            font-size: 12px;
            line-height: 1.7;
        }

        /* Footer background-nya selalu gelap, jadi teksnya harus selalu terang */
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
            color: #eee7de;
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

@include('partials.navbar')





<section class="hero">

    <div class="hero-content">

        <small>About Surabaya Wanderlust</small>

        <h1>
            Surabaya is more than a destination.
        </h1>

        <p>
            Surabaya Wanderlust is a digital travel information portal designed
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
                    Surabaya Wanderlust brings this information together in one place.
                </p>

                <p>
                    Instead of only showing travelers where to go,
                    Surabaya Wanderlust helps them understand the character of a place,
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
                    src="https://upload.wikimedia.org/wikipedia/commons/b/ba/Patung_suroboyo.jpg"
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
                What Surabaya Wanderlust brings together.
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

        <span class="eyebrow">The Surabaya Wanderlust Journey</span>

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
                    Surabaya Wanderlust is designed around useful, practical and
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
            Surabaya Wanderlust is an information portal. Prices, opening hours,
            transportation schedules, weather conditions and other travel
            information may change over time. Travelers should verify
            important information with the relevant official provider
            before traveling.
        </div>

    </div>

</section>





@include('partials.footer')

</body>
</html>