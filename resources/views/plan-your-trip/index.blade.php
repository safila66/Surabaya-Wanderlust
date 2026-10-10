<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <script>(function(){var t='dark';try{var s=localStorage.getItem('sw-theme');if(s==='system'||!s){t=window.matchMedia('(prefers-color-scheme: light)').matches?'light':'dark';}else{t=s;}}catch(e){}document.documentElement.setAttribute('data-theme',t);})()</script>
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Plan Your Trip — Surabaya Wanderlust</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            color: var(--text-primary);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .navbar {
            height: 76px;
            background: var(--bg-card);
            border-bottom: 1px solid var(--border);
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
            color: var(--text-muted);
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
                url('https://upload.wikimedia.org/wikipedia/commons/3/3e/Tugu_Pahlawan_Surabaya.jpg')
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
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 56px 30px 30px;
            box-shadow: 0 18px 45px rgba(55,43,31,.10);
        }

        .planner-title {
            margin-bottom: 22px;
        }

        .planner-title h2 {
            font-family: Georgia, serif;
            font-size: 30px;
            margin-bottom: 7px;
            color: var(--text-primary);
        }

        .planner-title p {
            color: var(--text-muted);
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
            color: var(--text-muted);
        }

        .field select {
            width: 100%;
            height: 48px;
            padding: 0 13px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: var(--bg-card);
            color: var(--text-primary);
            outline: none;
        }

        /* Daftar dropdown pakai warna solid (var tema bisa transparan di popup bawaan browser) */
        [data-theme="dark"] .field select {
            color-scheme: dark;
        }

        [data-theme="dark"] .field select option {
            background-color: #1b2a4e;
            color: #ffffff;
        }

        [data-theme="light"] .field select {
            color-scheme: light;
        }

        [data-theme="light"] .field select option {
            background-color: #ffffff;
            color: #403a34;
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
            padding: 55px 0;
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
            color: var(--text-primary);
        }

        .section-heading p {
            max-width: 420px;
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.7;
        }

        .ideas {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .idea {
            background: var(--bg-card);
            border: 1px solid var(--border);
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
            background: var(--bg-surface);
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
            color: var(--text-primary);
        }

        .idea p {
            color: var(--text-muted);
            line-height: 1.7;
            font-size: 14px;
        }

        .steps {
            background: var(--bg-surface);
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
            color: var(--text-primary);
        }

        .step p {
            color: var(--text-muted);
            font-size: 13px;
            line-height: 1.7;
        }

        .note {
            margin-top: 30px;
            padding: 18px 20px;
            background: var(--bg-card);
            border-left: 3px solid #a5673f;
            color: var(--text-muted);
            font-size: 13px;
            line-height: 1.7;
        }

        .note strong {
            color: var(--text-primary);
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
            gap: 16px;
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
                padding: 52px 22px 22px;
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

@include('partials.navbar')




<section class="hero">
    <small>Surabaya Wanderlust Travel Planner</small>

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

        <form action="{{ route('plan-your-trip.build') }}" method="GET" id="trip-form">
            <div class="form-grid">

                <div class="field">
                    <label>Destination Area</label>
                    <select name="area">
                        <option value="all" {{ request('area','all')==='all'?'selected':'' }}>Seluruh Surabaya</option>
                        <option value="north" {{ request('area')==='north'?'selected':'' }}>Surabaya Utara</option>
                        <option value="east" {{ request('area')==='east'?'selected':'' }}>Surabaya Timur</option>
                        <option value="south" {{ request('area')==='south'?'selected':'' }}>Surabaya Selatan</option>
                        <option value="west" {{ request('area')==='west'?'selected':'' }}>Surabaya Barat</option>
                        <option value="central" {{ request('area')==='central'?'selected':'' }}>Surabaya Pusat</option>
                    </select>
                </div>

                <div class="field">
                    <label>Duration</label>

                    <select name="duration">
                        <option value="1" {{ request('duration')==='1'?'selected':'' }}>1-2 Hari</option>
                        <option value="3" {{ request('duration','3')==='3'?'selected':'' }}>3-4 Hari</option>
                        <option value="5" {{ request('duration')==='5'?'selected':'' }}>5-7 Hari</option>
                    </select>
                </div>

                <div class="field">
                    <label>Travel Style</label>

                    <select name="style">
                        <option value="relaxed" {{ request('style','relaxed')==='relaxed'?'selected':'' }}>Relaxed</option>
                        <option value="adventure" {{ request('style')==='adventure'?'selected':'' }}>Adventure</option>
                        <option value="culture" {{ request('style')==='culture'?'selected':'' }}>Culture &amp; Heritage</option>
                        <option value="culinary" {{ request('style')==='culinary'?'selected':'' }}>Culinary</option>
                    </select>
                </div>

                <div class="field">
                    <label>Budget</label>

                    <select name="budget">
                        <option value="budget" {{ request('budget')==='budget'?'selected':'' }}>Budget-friendly</option>
                        <option value="mid" {{ request('budget','mid')==='mid'?'selected':'' }}>Mid-range</option>
                        <option value="comfort" {{ request('budget')==='comfort'?'selected':'' }}>Comfort</option>
                    </select>
                </div>

            </div>

            <button type="submit" class="btn">Build My Trip →</button>
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

            <a href="{{ route('plan-your-trip.nature') }}" class="idea" style="text-decoration:none; color:inherit; display:block;">
                <div class="idea-icon">🌿</div>

                <h3>Nature Escape</h3>

                <p>
                    Mountains, beaches, waterfalls and natural landscapes
                    for travelers who want to slow down and reconnect with nature.
                </p></a>

            <a href="{{ route('plan-your-trip.culture') }}" class="idea" style="text-decoration:none; color:inherit; display:block;">
                <div class="idea-icon">🏛️</div>

                <h3>Culture & Heritage</h3>

                <p>
                    Discover local traditions, historical places, architecture,
                    arts and stories that make each region different.
                </p></a>

            <a href="{{ route('plan-your-trip.culinary') }}" class="idea" style="text-decoration:none; color:inherit; display:block;">
                <div class="idea-icon">🍜</div>

                <h3>Culinary Journey</h3>

                <p>
                    Explore Surabayan flavors through local dishes,
                    traditional food, street food and regional specialties.
                </p></a>

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
                    Use the information from Surabaya Wanderlust to prepare for your journey.
                </p>
            </div>

        </div>

        <div class="note">
            <strong>Note:</strong>
            Estimated costs, travel times and recommendations on Surabaya Wanderlust
            are provided as travel information and may change depending on
            season, provider and local conditions.
        </div>

    </div>

</section>





{{-- ═══ ITINERARY RESULT (shown after Build My Trip) ═══ --}}
@if(request()->has('area') && isset($itinerary))
<div class="container" id="trip-result" style="margin-top:40px; margin-bottom:60px;">
    <div style="background:var(--bg-card);border:1px solid var(--border);border-radius:22px;padding:32px;">
        <div style="margin-bottom:24px;">
            <small style="color:#a5673f;font-size:11px;font-weight:800;letter-spacing:1.5px;text-transform:uppercase;">Your Curated Itinerary</small>
            <h2 style="font-family:Georgia,serif;font-size:26px;margin-top:8px;color:var(--text-primary);">{{ $itinerary['title'] }}</h2>
            <p style="color:var(--text-muted);font-size:13px;margin-top:4px;">{{ $itinerary['subtitle'] }}</p>
        </div>

        @foreach($itinerary['days'] as $dayIndex => $day)
        <div style="margin-bottom:28px;">
            <div style="font-weight:800;font-size:12px;text-transform:uppercase;letter-spacing:1px;color:#a5673f;margin-bottom:14px;padding-bottom:8px;border-bottom:2px solid var(--border);">
                Day {{ $dayIndex + 1 }}
            </div>
            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:14px;">
                @foreach($day as $dest)
                <a href="{{ route('destinations.show', $dest->slug) }}"
                   style="display:flex;align-items:center;gap:14px;background:var(--bg-surface);border:1px solid var(--border);border-radius:12px;padding:14px;text-decoration:none;transition:transform .2s;"
                   onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform=''">
                    <div style="width:44px;height:44px;border-radius:10px;background:linear-gradient(135deg,#a5673f,#c8960a);display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#fff;font-size:1.1rem;">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div>
                        <div style="font-weight:700;font-size:.87rem;color:var(--text-primary);">{{ $dest->name }}</div>
                        @if($dest->location)<div style="font-size:.75rem;color:var(--text-muted);margin-top:2px;">{{ Str::limit($dest->location, 40) }}</div>@endif
                        @if($dest->ticket_price)<div style="font-size:.73rem;color:#a5673f;margin-top:2px;font-weight:600;">{{ $dest->ticket_price }}</div>@endif
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endforeach

        @if(isset($itinerary['tips']))
        <div style="background:var(--bg-surface);border-left:4px solid var(--gold);border-radius:0 12px 12px 0;padding:15px 20px;margin-top:8px;">
            <strong style="font-size:13px;color:var(--text-primary);">&#128161; Travel Tips:</strong>
            <p style="color:var(--text-muted);font-size:13px;margin-top:5px;line-height:1.6;">{{ $itinerary['tips'] }}</p>
        </div>
        @endif
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var el = document.getElementById('trip-result');
    if (el) setTimeout(function () { el.scrollIntoView({ behavior: 'smooth', block: 'start' }); }, 250);
});
</script>
@endif
@include('partials.footer')

</body>
</html>