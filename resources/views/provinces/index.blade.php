<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Explore Regions - Somewhere in...</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <style>

        body {
            background: #f7f9fc;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
        }

        .brand {
            font-weight: 800;
            color: #0d6efd;
            font-size: 1.4rem;
        }

        .hero {
            background: linear-gradient(135deg, #0d6efd, #2563eb);
            color: white;
            padding: 75px 0;
        }

        .hero h1 {
            font-weight: 800;
        }

        .province-card {
            background: white;
            border: none;
            border-radius: 18px;
            overflow: hidden;
            height: 100%;
            box-shadow: 0 5px 20px rgba(0,0,0,0.07);
            transition: 0.3s;
        }

        .province-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(0,0,0,0.12);
        }

        .province-icon {
            height: 150px;
            background: linear-gradient(135deg, #dbeafe, #eff6ff);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2563eb;
            font-size: 3.5rem;
        }

        .province-name {
            font-weight: 700;
            color: #111827;
        }

        .regency-count {
            color: #6b7280;
            font-size: 0.9rem;
        }

        .btn-explore {
            border-radius: 10px;
            font-weight: 600;
        }

    </style>

</head>


<body>


<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg sticky-top">

    <div class="container">

        <a
            class="navbar-brand brand"
            href="{{ route('home') }}"
        >
            <i class="fa-solid fa-compass me-2"></i>
            t
        </a>


        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
        >

            <span class="navbar-toggler-icon"></span>

        </button>


        <div
            class="collapse navbar-collapse"
            id="navbarNav"
        >

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('home') }}"
                    >
                        Home
                    </a>

                </li>


                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('destinations.index') }}"
                    >
                        Destinations
                    </a>

                </li>


                <li class="nav-item">

                    <a
                        class="nav-link active"
                        href="{{ route('provinces.index') }}"
                    >
                        Provinces
                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link" href="#">
                        Culinary
                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link" href="#">
                        Culture
                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link" href="#">
                        Travel Guide
                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>



<!-- HERO -->

<section class="hero">

    <div class="container text-center">

        <h1 class="display-5 mb-3">
            Explore Surabaya
        </h1>

        <p class="lead mb-0">
            Discover destinations, culture, and experiences
            across Surabaya's regions.
        </p>

    </div>

</section>



<!-- PROVINCES -->

<section class="container py-5">

    <div class="text-center mb-5">

        <h2 class="fw-bold">
            Explore 38 Provinces
        </h2>

        <p class="text-muted">
            Temukan berbagai destinasi menarik dari seluruh Surabaya.
        </p>

    </div>


    <div class="row g-4">

        @foreach($provinces as $province)

            <div class="col-xl-3 col-lg-4 col-md-6">

                <div class="province-card">


                    <!-- ICON -->

                    <div class="province-icon">

                        <i class="fa-solid fa-location-dot"></i>

                    </div>


                    <!-- CONTENT -->

                    <div class="p-4">

                        <h5 class="province-name mb-2">

                            {{ $province->name }}

                        </h5>


                        <p class="regency-count mb-3">

                            <i class="fa-solid fa-map me-1"></i>

                            {{ $province->regencies_count }}

                            Kabupaten/Kota

                        </p>


                        <a
                            href="{{ route(
                                'provinces.show',
                                $province->slug
                            ) }}"
                            class="btn btn-primary btn-explore w-100"
                        >

                            Explore Region

                            <i
                                class="fa-solid fa-arrow-right ms-1"
                            ></i>

                        </a>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</section>



<!-- FOOTER -->

<footer class="bg-dark text-white py-4 mt-5">

    <div class="container text-center">

        <h5 class="fw-bold">
            NusaExplore
        </h5>

        <p class="text-white-50 mb-0">
            Explore Surabaya Beyond the Destination
        </p>

    </div>

</footer>



<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


</body>

</html>
