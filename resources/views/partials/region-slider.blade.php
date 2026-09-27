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
        $surabayaRegions = collect([
            (object) [
                'name' => 'East Surabaya',
                'slug' => 'east-surabaya',
                'subtitle' => 'Kawasan Pendidikan & Alam'
            ],
            (object) [
                'name' => 'West Surabaya',
                'slug' => 'west-surabaya',
                'subtitle' => 'Kawasan Elite & Hiburan'
            ],
            (object) [
                'name' => 'Central Surabaya',
                'slug' => 'central-surabaya',
                'subtitle' => 'Pusat Pemerintahan & Kota'
            ],
            (object) [
                'name' => 'North Surabaya',
                'slug' => 'north-surabaya',
                'subtitle' => 'Kawasan Sejarah & Pelabuhan'
            ],
            (object) [
                'name' => 'South Surabaya',
                'slug' => 'south-surabaya',
                'subtitle' => 'Kawasan Bisnis & Modern'
            ],
        ]);
        $provincePages = $surabayaRegions->chunk(6);
    @endphp


    @if ($provincePages->count() > 0)

        <div class="region-slider-container">

            <div
                class="region-track"
                id="regionTrack"
            >

                @foreach ($provincePages as $page)

                    <div class="region-page">

                        @foreach ($page as $region)

                            <a
                                href="{{ route('regions.show', $region->slug) }}"
                                class="region-card"
                            >

                                @php

                                    $regionImages = [
                                        'north-surabaya'            => 'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85',
                                        'south-surabaya'            => 'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85',
                                        'east-surabaya'             => 'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85',
                                        'west-surabaya'             => 'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85',
                                        'central-surabaya'          => 'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85',
                                    ];

                                    $regionImage =
                                        $regionImages[$region->slug]
                                        ?? 'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85';

                                @endphp


                                <img
                                    src="{{ $regionImage }}"
                                    alt="{{ $region->name }}"
                                    class="region-image"
                                >


                                <div class="region-overlay"></div>


                                <div class="region-content">

                                    <h3>
                                        {{ $region->name }}
                                    </h3>

                                    <p>
                                        {{ $region->subtitle }}
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
