{{-- =========================================================
     FEATURED REGION SLIDER
========================================================== --}}

<section class="featured-region">

    <div class="featured-wrapper">

        <div class="featured-slider">


            {{-- SLIDE 1 --}}

            <div class="featured-slide active">

                <img
                    src="{{ asset('images/kembangjepun-surabaya.jpg') }}"
                    alt="Kampung Kembang Jepun"
                    class="featured-image"
                >

                <div class="featured-content">

                    <span class="featured-label">
                        Discover
                    </span>

                    <h2>
                        Kampung<br>Kembang Jepun
                    </h2>

                    <p>
                        Discover heritage, culture, food, and unforgettable
                        local experiences on the Surabaya China Town.
                    </p>

                </div>

            </div>



            {{-- SLIDE 2 --}}

            <div class="featured-slide">

                <img
                    src="{{ asset('images/sunanampel-surabaya.jpg') }}"
                    alt="Sunan Ampel"
                    class="featured-image"
                >

                <div class="featured-content">

                    <span class="featured-label">
                        Experience
                    </span>

                    <h2>
                        Tomb of <br>Sunan Ampel
                    </h2>

                    <p>
                        A man will die, but not his idea. Sunan Ampel's legacy lives on in Surabaya, where his teachings and influence continue to shape the city's culture and identity.
                    </p>

                </div>

            </div>



            {{-- SLIDE 3 --}}

            <div class="featured-slide">

                <img
                    src="{{ asset('images/northquay-surabaya.jpg') }}"
                    alt="The North Quay"
                    class="featured-image"
                >

                <div class="featured-content">

                    <span class="featured-label">
                        Journey To
                    </span>

                    <h2>
                        The <br> North Quay
                    </h2>

                    <p>
                        Sunsetz, sea breeze, and the vibrant atmosphere of Surabaya's North Quay. A perfect place to unwind, enjoy the view, and create unforgettable memories.
                    </p>

                </div>

            </div>



            {{-- SLIDE 4 --}}

            <div class="featured-slide">

                <img
                    src="https://images.unsplash.com/photo-1596402184320-417e7178b2cd?auto=format&fit=crop&w=2000&q=85"
                    alt="Yogyakarta"
                    class="featured-image"
                >

                <div class="featured-content">

                    <span class="featured-label">
                        Explore
                    </span>

                    <h2>
                        Yogyakarta
                    </h2>

                    <p>
                        Experience heritage, art, traditions, culinary delights,
                        and the unique atmosphere of Java.
                    </p>

                </div>

            </div>



            {{-- SLIDE 5 --}}

            <div class="featured-slide">

                <img
                    src="https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?auto=format&fit=crop&w=2000&q=85"
                    alt="Papua"
                    class="featured-image"
                >

                <div class="featured-content">

                    <span class="featured-label">
                        Beyond The Ordinary
                    </span>

                    <h2>
                        Papua
                    </h2>

                    <p>
                        Journey through extraordinary landscapes and discover
                        the diversity of nature and culture in eastern Surabaya.
                    </p>

                </div>

            </div>


        </div>



        {{-- FEATURED PREVIOUS --}}

        <button
            type="button"
            class="featured-arrow featured-prev"
            onclick="changeFeaturedSlide(-1)"
            aria-label="Previous featured region"
        >
            &#10094;
        </button>



        {{-- FEATURED NEXT --}}

        <button
            type="button"
            class="featured-arrow featured-next"
            onclick="changeFeaturedSlide(1)"
            aria-label="Next featured region"
        >
            &#10095;
        </button>



        {{-- FEATURED DOTS --}}

        <div class="featured-dots">

            <button
                type="button"
                class="featured-dot active"
                onclick="goToFeaturedSlide(0)"
            ></button>

            <button
                type="button"
                class="featured-dot"
                onclick="goToFeaturedSlide(1)"
            ></button>

            <button
                type="button"
                class="featured-dot"
                onclick="goToFeaturedSlide(2)"
            ></button>

            <button
                type="button"
                class="featured-dot"
                onclick="goToFeaturedSlide(3)"
            ></button>

            <button
                type="button"
                class="featured-dot"
                onclick="goToFeaturedSlide(4)"
            ></button>

        </div>

    </div>

</section>
