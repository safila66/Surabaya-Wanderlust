{{-- =========================================================
     NAVBAR
========================================================== --}}

<nav class="navbar">

    {{-- LOGO --}}
    <a
        href="{{ route('home') }}"
        class="logo-link"
    >

        <div class="logo">
            Surabaya Wanderlust
        </div>

        <div class="tagline">
            Explore Surabaya Beyond the Destination
        </div>

    </a>


    {{-- MENU --}}

    <div class="nav-menu">

        <a href="{{ route('home') }}">
            HOME
        </a>

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

</nav>
