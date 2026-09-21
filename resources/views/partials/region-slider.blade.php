{{-- =========================================================
     EXPLORE BY REGION — 3 x 2 PER SLIDE
========================================================== --}}

<section class="section region-section">

    <div class="section-title">

        <h2>
            🗺️ Explore by Region
        </h2>

        <p>
            Explore Surabaya, from east to west, north to south. Let's discover the hidden gems and unique experiences that each region has to offer.
        </p>

    </div>


    @php
        $provincePages = $provinces->values()->chunk(6);
    @endphp


    @if ($provincePages->count() > 0)

        <div class="region-slider-container">

            <div
                class="region-track"
                id="regionTrack"
            >

                @foreach ($provincePages as $page)

                    <div class="region-page">

                        @foreach ($page as $province)

                            <a
                                href="{{ route('provinces.show', $province->slug) }}"
                                class="region-card"
                            >

                                @php

                                    $regionImages = [
                                        'North Surabaya'            => 'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85',
                                        'South Surabaya'            => 'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85',
                                        'East Surabaya'             => 'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85',
                                        'West Surabaya'             => 'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85',
                                        'Central Surabaya'          => 'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85',
                                    ];

                                    $regionImage =
                                        $regionImages[$province->slug]
                                        ?? 'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85';

                                @endphp


                                <img
                                    src="{{ $regionImage }}"
                                    alt="{{ $province->name }}"
                                    class="region-image"
                                >


                                <div class="region-overlay"></div>


                                <div class="region-content">

                                    <h3>
                                        {{ $province->name }}
                                    </h3>

                                    <p>
                                        {{ $province->regencies_count ?? $province->regencies->count() }}
                                        Kabupaten/Kota
                                    </p>

                                    <span class="region-explore">
                                        Explore Region →
                                    </span>

                                </div>

                            </a>

                        @endforeach

                    </div>

                @endforeach

            </div>



            {{-- REGION PREVIOUS --}}

            @if ($provincePages->count() > 1)

                <button
                    type="button"
                    class="region-arrow region-prev"
                    onclick="changeRegionPage(-1)"
                    aria-label="Previous region page"
                >
                    &#10094;
                </button>


                {{-- REGION NEXT --}}

                <button
                    type="button"
                    class="region-arrow region-next"
                    onclick="changeRegionPage(1)"
                    aria-label="Next region page"
                >
                    &#10095;
                </button>

            @endif

        </div>



        {{-- REGION DOTS --}}

        @if ($provincePages->count() > 1)

            <div class="region-dots">

                @foreach ($provincePages as $index => $page)

                    <button
                        type="button"
                        class="region-dot {{ $index === 0 ? 'active' : '' }}"
                        onclick="goToRegionPage({{ $index }})"
                        aria-label="Region page {{ $index + 1 }}"
                    ></button>

                @endforeach

            </div>

        @endif


    @else

        <div class="empty-message">

            <h3>
                Belum ada wilayah
            </h3>

            <p>
                Data provinsi akan ditampilkan di sini.
            </p>

        </div>

    @endif

</section>
