{{-- =========================================================
     FEATURES
========================================================== --}}

<section class="section features">

    <div class="section-title">

        <h2>
            Everything You Need to Travel
        </h2>

        <p>
            Informasi perjalanan yang membantu kamu dari mencari
            hingga merencanakan perjalanan.
        </p>

    </div>


    <div class="feature-grid">


        {{-- DESTINATIONS --}}

        <a
            href="{{ route('destinations.index') }}"
            class="feature"
        >

            <div class="feature-icon">
                📍
            </div>

            <h3>
                Destinations
            </h3>

            <p>
                Temukan berbagai destinasi wisata dan informasi lengkapnya.
            </p>

        </a>



        {{-- CULINARY --}}

        <a
            href="{{ route('culinary.index') }}"
            class="feature"
        >

            <div class="feature-icon">
                🍜
            </div>

            <h3>
                Culinary
            </h3>

            <p>
                Kenali kuliner khas dan rekomendasi makanan lokal.
            </p>

        </a>



        {{-- CULTURE --}}

        <a
            href="{{ route('culture.index') }}"
            class="feature"
        >

            <div class="feature-icon">
                🎭
            </div>

            <h3>
                Culture
            </h3>

            <p>
                Pelajari budaya, tradisi, dan warisan daerah Surabaya.
            </p>

        </a>



        {{-- TRAVEL GUIDE --}}

        <a
            href="{{ route('travel-guide.index') }}"
            class="feature"
        >

            <div class="feature-icon">
                🧭
            </div>

            <h3>
                Travel Guide
            </h3>

            <p>
                Dapatkan panduan perjalanan untuk membantu
                merencanakan kunjungan.
            </p>

        </a>


    </div>

</section>
