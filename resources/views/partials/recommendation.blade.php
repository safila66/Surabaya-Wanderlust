{{-- =========================================================
     REKOMENDASI WISATA BULAN INI
========================================================== --}}

<section class="section best-time-section">

    <div class="section-title">

        <h2>
            Monthly Recommendations
        </h2>

        <p>
            Curated recommendations for this month, based on the best time to visit each destination. Discover the perfect spots to explore and make the most of your travel experience.
        </p>

    </div>


    <div class="recommendation-grid">

        @forelse ($popularThisMonth as $bestTime)

            @if ($bestTime->destination)

                <a
                    href="{{ route('destinations.show', $bestTime->destination->slug) }}"
                    class="recommendation-card"
                >

                    @if ($bestTime->destination->image)

                        <img
                            src="{{ $bestTime->destination->image }}"
                            alt="{{ $bestTime->destination->name }}"
                            class="recommendation-image"
                        >

                    @else

                        <img
                            src="https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85"
                            alt="{{ $bestTime->destination->name }}"
                            class="recommendation-image"
                        >

                    @endif


                    <div class="recommendation-content">

                        <span class="month-badge">
                            {{ now()->locale('id')->translatedFormat('F') }}
                        </span>


                        <h3>
                            {{ $bestTime->destination->name }}
                        </h3>


                        @if (
                            $bestTime->destination->regency &&
                            $bestTime->destination->regency->province
                        )

                            <p class="destination-location">

                                📍
                                {{ $bestTime->destination->regency->name }},
                                {{ $bestTime->destination->regency->province->name }}

                            </p>

                        @endif


                        <p class="recommendation-description">
                            {{ $bestTime->reason }}
                        </p>


                        <div class="best-time-info">

                            <div>
                                🌤️
                                <strong>Cuaca:</strong>
                                {{ $bestTime->weather }}
                            </div>

                            <div>
                                🌡️
                                <strong>Suhu:</strong>
                                {{ $bestTime->temperature }}
                            </div>

                            <div>
                                🕐
                                <strong>Waktu terbaik:</strong>
                                {{ $bestTime->best_time }}
                            </div>

                            <div>
                                👥
                                <strong>Keramaian:</strong>
                                {{ $bestTime->crowd_level }}
                            </div>

                        </div>


                        <span class="recommendation-link">
                            Explore Destination →
                        </span>

                    </div>

                </a>

            @endif

        @empty

            <div class="empty-message">

                <h3>
                    No recommendations for this month yet
                </h3>

                <p>
                    Travel recommendations will be displayed based on Best Time data.
                </p>

            </div>

        @endforelse

    </div>

</section>
