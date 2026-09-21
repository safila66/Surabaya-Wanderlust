<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Culinary | NusaExplore</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

        body {
            margin: 0;
            background: var(--cream-light);
            color: var(--text);
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: var(--green);
            padding: 18px 0;
        }

        .brand {
            color: #fff;
            text-decoration: none;
            font-size: 21px;
            font-weight: 700;
            letter-spacing: .3px;
        }

        .nav-link {
            color: rgba(255,255,255,.8) !important;
            margin-left: 18px;
            font-size: 14px;
        }

        .nav-link:hover {
            color: #fff !important;
        }

        .hero {
            background: var(--cream);
            padding: 75px 0 65px;
        }

        .eyebrow {
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 12px;
            color: var(--brown);
            font-weight: 700;
            margin-bottom: 14px;
        }

        .hero h1 {
            font-family: Georgia, serif;
            font-size: clamp(40px, 6vw, 70px);
            line-height: 1;
            color: var(--green-dark);
            margin-bottom: 22px;
        }

        .hero p {
            max-width: 650px;
            color: var(--muted);
            font-size: 17px;
            line-height: 1.8;
        }

        .filter-box {
            margin-top: -28px;
            position: relative;
            z-index: 5;
        }

        .filter-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(40, 50, 45, .07);
        }

        .filter-title {
            font-family: Georgia, serif;
            font-size: 21px;
            margin-bottom: 18px;
            color: var(--green-dark);
        }

        .form-label {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .8px;
            color: var(--muted);
        }

        .form-select {
            border-color: var(--border);
            border-radius: 10px;
            padding: 12px 14px;
        }

        .btn-explore {
            background: var(--green);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 12px 24px;
            font-weight: 600;
        }

        .btn-explore:hover {
            background: var(--green-dark);
            color: #fff;
        }

        .section {
            padding: 70px 0;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            margin-bottom: 30px;
        }

        .section-heading h2 {
            font-family: Georgia, serif;
            font-size: 38px;
            color: var(--green-dark);
            margin: 0;
        }

        .result-count {
            color: var(--muted);
            font-size: 14px;
        }

        .culinary-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            height: 100%;
            transition: .25s ease;
        }

        .culinary-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 30px rgba(40, 50, 45, .08);
        }

        .card-image {
            height: 230px;
            background: #ddd;
            overflow: hidden;
        }

        .card-image img {
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
            background: #e9e3d8;
            color: var(--brown);
            font-size: 38px;
        }

        .card-body {
            padding: 22px;
        }

        .location {
            color: var(--brown);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .8px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .card-title {
            font-family: Georgia, serif;
            font-size: 25px;
            color: var(--green-dark);
            margin-bottom: 10px;
        }

        .description {
            color: var(--muted);
            line-height: 1.7;
            font-size: 14px;
            min-height: 48px;
        }

        .price {
            color: var(--text);
            font-size: 13px;
            font-weight: 600;
        }

        .explore-link {
            color: var(--green);
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
        }

        .explore-link:hover {
            color: var(--brown);
        }

        .empty {
            background: var(--cream);
            border: 1px dashed #cfc7b8;
            border-radius: 16px;
            padding: 60px 20px;
            text-align: center;
            color: var(--muted);
        }

        footer {
            background: var(--green-dark);
            color: rgba(255,255,255,.7);
            padding: 35px 0;
            margin-top: 30px;
        }

        footer strong {
            color: #fff;
        }

        @media (max-width: 768px) {
            .nav-link {
                margin-left: 0;
            }

            .section-heading {
                display: block;
            }

            .result-count {
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">

        <a href="{{ route('home') }}" class="brand">
            NusaExplore
        </a>

        <button class="navbar-toggler bg-light"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            <div class="navbar-nav ms-auto">

                <a class="nav-link" href="{{ route('home') }}">
                    Home
                </a>

                <a class="nav-link" href="{{ route('destinations.index') }}">
                    Destinations
                </a>

                <a class="nav-link" href="{{ route('culinary.index') }}">
                    Culinary
                </a>

                <a class="nav-link" href="{{ route('travel-posts.index') }}">
                    Travel Stories
                </a>

            </div>

        </div>

    </div>
</nav>


<section class="hero">

    <div class="container">

        <div class="eyebrow">
            Taste Surabaya
        </div>

        <h1>
            Discover the<br>
            flavors of Surabaya.
        </h1>

        <p>
            Explore local dishes, traditional flavors, and culinary stories
            from cities and regions across Surabaya.
        </p>

    </div>

</section>


<section class="filter-box">

    <div class="container">

        <div class="filter-card">

            <div class="filter-title">
                Explore Culinary by Region
            </div>

            <form action="{{ route('culinary.index') }}" method="GET">

                <div class="row g-3 align-items-end">

                    <div class="col-md-5">

                        <label class="form-label">
                            Province
                        </label>

                        <select
                            name="province"
                            id="province"
                            class="form-select"
                            onchange="this.form.submit()">

                            <option value="">
                                All Provinces
                            </option>

                            @foreach ($provinces as $province)

                                <option
                                    value="{{ $province->slug }}"
                                    {{ $selectedProvince == $province->slug ? 'selected' : '' }}>

                                    {{ $province->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="col-md-5">

                        <label class="form-label">
                            City / Regency
                        </label>

                        <select
                            name="regency"
                            class="form-select">

                            <option value="">
                                All Cities / Regencies
                            </option>

                            @foreach ($regencies as $regency)

                                <option
                                    value="{{ $regency->slug }}"
                                    {{ $selectedRegency == $regency->slug ? 'selected' : '' }}>

                                    {{ $regency->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="col-md-2">

                        <button type="submit"
                                class="btn btn-explore w-100">

                            Explore

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</section>


<section class="section">

    <div class="container">

        <div class="section-heading">

            <div>

                <div class="eyebrow">
                    Local Flavours
                </div>

                <h2>
                    Culinary from every corner.
                </h2>

            </div>

            <div class="result-count">
                {{ $culinaries->count() }} culinary found
            </div>

        </div>


        @if ($culinaries->count())

            <div class="row g-4">

                @foreach ($culinaries as $culinary)

                    <div class="col-md-6 col-lg-4">

                        <div class="culinary-card">

                            <div class="card-image">

                                @if ($culinary->image)

                                    <img
                                        src="{{ asset('storage/' . $culinary->image) }}"
                                        alt="{{ $culinary->name }}">

                                @else

                                    <div class="placeholder">
                                        <i class="fa-solid fa-utensils"></i>
                                    </div>

                                @endif

                            </div>


                            <div class="card-body">

                                <div class="location">

                                    {{ $culinary->regency->name ?? 'Surabaya' }}

                                    @if ($culinary->regency?->province)

                                        · {{ $culinary->regency->province->name }}

                                    @endif

                                </div>


                                <div class="card-title">
                                    {{ $culinary->name }}
                                </div>


                                <div class="description">

                                    {{ \Illuminate\Support\Str::limit(
                                        $culinary->description,
                                        115
                                    ) }}

                                </div>


                                <div class="d-flex justify-content-between align-items-center mt-4">

                                    <div class="price">

                                        @if ($culinary->price_range)

                                            <i class="fa-solid fa-tag me-1"></i>
                                            {{ $culinary->price_range }}

                                        @else

                                            Local dish

                                        @endif

                                    </div>


                                    <a
                                        href="{{ route('culinary.show', $culinary->slug) }}"
                                        class="explore-link">

                                        Explore
                                        <i class="fa-solid fa-arrow-right ms-1"></i>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty">

                <i class="fa-solid fa-utensils fa-2x mb-3"></i>

                <h4>
                    No culinary found
                </h4>

                <p>
                    Try exploring another province or city.
                </p>

            </div>

        @endif

    </div>

</section>


<footer>

    <div class="container">

        <strong>NusaExplore</strong>

        <span class="ms-2">
            Explore Surabaya Beyond the Destination.
        </span>

    </div>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
