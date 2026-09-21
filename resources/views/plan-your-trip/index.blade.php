<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Plan Your Trip — NusaExplore</title>

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
            letter-spacing: -0.5px;
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

        .nav-links a:hover {
            color: #a5673f;
        }

        .hero {
            padding: 85px 7% 70px;
            text-align: center;
            background:
                linear-gradient(rgba(45,38,29,.45), rgba(45,38,29,.45)),
                url('https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1800&q=85')
                center/cover;
            color: white;
        }

        .hero small {
            display: block;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 16px;
            opacity: .9;
        }

        .hero h1 {
            font-family: Georgia, serif;
            font-size: clamp(42px, 6vw, 72px);
            line-height: 1;
            margin-bottom: 20px;
        }

        .hero p {
            max-width: 650px;
            margin: auto;
            font-size: 16px;
            line-height: 1.8;
            color: #f5f1eb;
        }

        .container {
            width: min(1120px, 88%);
            margin: 0 auto;
        }

        .planner {
            margin-top: -38px;
            position: relative;
            z-index: 5;
            background: #fff;
            border: 1px solid #e7ded4;
            border-radius: 22px;
            padding: 30px;
            box-shadow: 0 18px 45px rgba(55,43,31,.10);
        }

        .planner-title {
            margin-bottom: 22px;
        }

        .planner-title h2 {
            font-family: Georgia, serif;
            font-size: 30px;
            margin-bottom: 7px;
        }

        .planner-title p {
            color: #777066;
            font-size: 14px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1fr;
            gap: 15px;
        }

        .field label {
            display: block;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .8px;
            text-transform: uppercase;
            margin-bottom: 8px;
            color: #655e56;
        }

        .field select {
            width: 100%;
            height: 48px;
            padding: 0 13px;
            border: 1px solid #ddd4ca;
            border-radius: 10px;
            background: #fff;
            color: #403a34;
            outline: none;
        }

        .field select:focus {
            border-color: #a5673f;
        }

        .btn {
            margin-top: 23px;
            height: 48px;
            border: 0;
            border-radius: 10px;
            background: #a5673f;
            color: white;
            font-weight: 700;
            cursor: pointer;
            padding: 0 24px;
        }

        .btn:hover {
            background: #875331;
        }

        .section {
            padding: 75px 0;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            margin-bottom: 30px;
        }

        .section-heading small {
            color: #a5673f;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .section-heading h2 {
            font-family: Georgia, serif;
            font-size: 38px;
            margin-top: 7px;
        }

        .section-heading p {
            max-width: 420px;
            color: #777066;
            font-size: 14px;
            line-height: 1.7;
        }

        .ideas {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .idea {
            background: white;
            border: 1px solid #e7ded4;
            border-radius: 18px;
            padding: 28px;
            transition: .25s;
        }

        .idea:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(55,43,31,.08);
        }

        .idea-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #f1e6da;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            margin-bottom: 20px;
        }

        .idea h3 {
            font-family: Georgia, serif;
            font-size: 23px;
            margin-bottom: 10px;
        }

        .idea p {
            color: #777066;
            line-height: 1.7;
            font-size: 14px;
        }

        .steps {
            background: #ebe3d9;
            padding: 65px 0;
        }

        .step-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }

        .step {
            position: relative;
        }

        .number {
            font-family: Georgia, serif;
            font-size: 46px;
            color: #a5673f;
            margin-bottom: 10px;
        }

        .step h3 {
            font-size: 18px;
            margin-bottom: 8px;
        }

        .step p {
            color: #6e675f;
            font-size: 13px;
            line-height: 1.7;
        }

        .note {
            margin-top: 30px;
            padding: 18px 20px;
            background: #fff;
            border-left: 3px solid #a5673f;
            color: #6e675f;
            font-size: 13px;
            line-height: 1.7;
        }

        footer {
            background: #29251f;
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
            line-height: 1.7;
        }

        .footer-links {
            display: flex;
            gap: 22px;
            align-items: center;
        }

        .footer-links a {
            font-size: 12px;
            color: #cfc7bd;
        }

        @media (max-width: 900px) {
            .nav-links {
                display: none;
            }

            .form-grid {
                grid-template-columns: 1fr 1fr;
            }

            .ideas {
                grid-template-columns: 1fr;
            }

            .step-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 600px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .step-grid {
                grid-template-columns: 1fr;
            }

            .hero {
                padding: 65px 6%;
            }

            .planner {
                padding: 22px;
            }

            .section-heading {
                display: block;
            }

            .section-heading p {
                margin-top: 15px;
            }

            .footer-inner {
                display: block;
            }

            .footer-links {
                margin-top: 20px;
                flex-wrap: wrap;
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
        <a href="{{ route('about.index') }}">ABOUT</a>
    </div>
</nav>

<section class="hero">
    <small>NusaExplore Travel Planner</small>

    <h1>Plan Your Trip.</h1>

    <p>
        Build your Surabayan travel plan based on where you want to go,
        how long you want to stay, what you love to do, and your travel style.
    </p>
</section>

<div class="container">

    <section class="planner">

        <div class="planner-title">
            <h2>Start planning your journey</h2>
            <p>Choose your preferences and use them as a starting point for your trip.</p>
        </div>

        <form>
            <div class="form-grid">

                <div class="field">
                    <label>Destination</label>

                    <select>
                        <option selected>Choose destination</option>
                        <option>Bali</option>
                        <option>Yogyakarta</option>
                        <option>Malang</option>
                        <option>Surabaya</option>
                        <option>Bandung</option>
                        <option>Lombok</option>
                    </select>
                </div>

                <div class="field">
                    <label>Duration</label>

                    <select>
                        <option>1–2 Days</option>
                        <option selected>3–4 Days</option>
                        <option>5–7 Days</option>
                        <option>More than 7 Days</option>
                    </select>
                </div>

                <div class="field">
                    <label>Travel Style</label>

                    <select>
                        <option>Relaxed</option>
                        <option>Adventure</option>
                        <option>Culture</option>
                        <option>Culinary</option>
                        <option>Nature</option>
                    </select>
                </div>

                <div class="field">
                    <label>Budget</label>

                    <select>
                        <option>Budget</option>
                        <option selected>Mid-range</option>
                        <option>Comfort</option>
                        <option>Flexible</option>
                    </select>
                </div>

            </div>

            <button type="button" class="btn">
                Build My Trip →
            </button>
        </form>

    </section>

</div>

<section class="section">

    <div class="container">

        <div class="section-heading">
            <div>
                <small>Travel Inspiration</small>
                <h2>Choose your way to explore.</h2>
            </div>

            <p>
                Every traveler has a different way of experiencing Surabaya.
                Start with the kind of journey that feels right for you.
            </p>
        </div>

        <div class="ideas">

            <div class="idea">
                <div class="idea-icon">🌿</div>

                <h3>Nature Escape</h3>

                <p>
                    Mountains, beaches, waterfalls and natural landscapes
                    for travelers who want to slow down and reconnect with nature.
                </p>
            </div>

            <div class="idea">
                <div class="idea-icon">🏛️</div>

                <h3>Culture & Heritage</h3>

                <p>
                    Discover local traditions, historical places, architecture,
                    arts and stories that make each region different.
                </p>
            </div>

            <div class="idea">
                <div class="idea-icon">🍜</div>

                <h3>Culinary Journey</h3>

                <p>
                    Explore Surabayan flavors through local dishes,
                    traditional food, street food and regional specialties.
                </p>
            </div>

        </div>

    </div>

</section>

<section class="steps">

    <div class="container">

        <div class="section-heading">
            <div>
                <small>How It Works</small>
                <h2>From inspiration to itinerary.</h2>
            </div>
        </div>

        <div class="step-grid">

            <div class="step">
                <div class="number">01</div>
                <h3>Choose a destination</h3>
                <p>
                    Find a province, city or destination that matches your interests.
                </p>
            </div>

            <div class="step">
                <div class="number">02</div>
                <h3>Know the place</h3>
                <p>
                    Explore attractions, food, culture, transportation and local tips.
                </p>
            </div>

            <div class="step">
                <div class="number">03</div>
                <h3>Build your plan</h3>
                <p>
                    Adjust your trip according to duration, travel style and budget.
                </p>
            </div>

            <div class="step">
                <div class="number">04</div>
                <h3>Start exploring</h3>
                <p>
                    Use the information from NusaExplore to prepare for your journey.
                </p>
            </div>

        </div>

        <div class="note">
            <strong>Note:</strong>
            Estimated costs, travel times and recommendations on NusaExplore
            are provided as travel information and may change depending on
            season, provider and local conditions.
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
            <a href="{{ route('destinations.index') }}">Destinations</a>
            <a href="{{ route('culinary.index') }}">Culinary</a>
            <a href="{{ route('culture.index') }}">Culture</a>
            <a href="{{ route('travel-guide.index') }}">Travel Guide</a>
        </div>

    </div>

</footer>

</body>
</html>
