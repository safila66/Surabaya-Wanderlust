<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Destinations - NusaExplore</title>

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
            background: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
        }

        .brand {
            font-weight: 800;
            color: #0d6efd;
            font-size: 1.4rem;
        }

        .page-header {
            background: linear-gradient(135deg, #0d6efd, #2563eb);
            color: white;
            padding: 70px 0;
            margin-bottom: 45px;
        }

        .destination-card {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            background: white;
            box-shadow: 0 5px 20px rgba(0,0,0,0.07);
            height: 100%;
            transition: 0.3s;
        }

        .destination-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(0,0,0,0.12);
        }

        .destination-image {
            height: 220px;
            background: linear-gradient(135deg, #dbeafe, #eff6ff);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2563eb;
            font-size: 3rem;
        }

        .destination-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .location {
            color: #6b7280;
            font-size: 0.9rem;
        }

        .location i {
            color: #ef4444;
        }

        .btn-detail {
            border-radius: 10px;
            font-weight: 600;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">

        <a class="navbar-brand brand" href="{{ route('home') }}">
            <i class="fa-solid fa-compass me-2"></i>
            NusaExplore
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('destinations.index') }}">
                        Destinations
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


<!-- HEADER -->
<section class="page-header">
    <div class="container text-center">

        <h1 class="fw-bold mb-3">
            Explore Surabaya
        </h1>

        <p class="lead mb-0">
            Temukan destinasi menarik dari berbagai penjuru Surabaya.
        </p>

    </div>
</section>


<!-- DESTINATIONS -->
<div class="container pb-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Destinations
            </h2>

            <p class="text-muted mb-0">
                Pilih destinasi dan temukan pengalaman perjalananmu.
            </p>
        </div>

        <span class="badge bg-primary px-3 py-2">
            {{ $destinations->count() }} Destinations
        </span>

    </div>


    @if($destinations->count() > 0)

        <div class="row g-4">

            @foreach($destinations as $destination)

                <div class="col-lg-4 col-md-6">

                    <div class="destination-card">

                        <!-- IMAGE -->
                        <div class="destination-image">

                            @if($destination->image)

                                <img
                                    src="{{ asset('storage/' . $destination->image) }}"
                                    alt="{{ $destination->name }}"
                                >

                            @else

                                <i class="fa-solid fa-mountain-sun"></i>

                            @endif

                        </div>


                        <!-- CONTENT -->
                        <div class="p-4">

                            <h4 class="fw-bold mb-2">
                                {{ $destination->name }}
                            </h4>


                            @if($destination->regency)

                                <div class="location mb-3">

                                    <i class="fa-solid fa-location-dot me-1"></i>

                                    {{ $destination->regency->name }}

                                    @if($destination->regency->province)
                                        , {{ $destination->regency->province->name }}
                                    @endif

                                </div>

                            @endif


                            <p class="text-muted">

                                {{ \Illuminate\Support\Str::limit(
                                    $destination->description,
                                    120
                                ) }}

                            </p>


                            @if($destination->ticket_price)

                                <div class="mb-3">

                                    <small class="text-muted">
                                        <i class="fa-solid fa-ticket me-1"></i>
                                        Tiket
                                    </small>

                                    <div class="fw-semibold">
                                        {{ $destination->ticket_price }}
                                    </div>

                                </div>

                            @endif


                            <a
                                href="{{ route(
                                    'destinations.show',
                                    $destination->slug
                                ) }}"
                                class="btn btn-primary btn-detail w-100"
                            >
                                Lihat Detail
                                <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="text-center py-5">

            <i class="fa-solid fa-map-location-dot fa-3x text-muted mb-3"></i>

            <h4>Belum ada destinasi</h4>

            <p class="text-muted">
                Data destinasi belum tersedia.
            </p>

        </div>

    @endif

</div>


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
