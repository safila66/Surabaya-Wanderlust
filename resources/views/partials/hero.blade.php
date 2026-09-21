{{-- =========================================================
     HERO
========================================================== --}}

<section class="hero">

    <div class="hero-content">

        <h1>Explore <span class="highlight">Surabaya</span><br>Beyond the Destination.</h1>
        <p>
            Find the best time to visit Surabaya's destinations, and discover the hidden gems, cultural experiences, and culinary delights that await you in this vibrant city.
            Surabaya never sleeps, create memories with it.
        </p>


        <form
            class="search-box"
            action="{{ route('destinations.index') }}"
            method="GET"
        >

            <input
                type="text"
                name="search"
                placeholder="destination, region, or activity"
            >

            <button type="submit">
                Search
            </button>

        </form>

    </div>

</section>
