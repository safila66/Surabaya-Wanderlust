{{-- =========================================================
     REKOMENDASI WISATA BULAN INI
========================================================== --}}

{{-- [FIX] Supaya teks di dalam kartu selalu terbaca (dark & light mode).
     Selector diawali .best-time-section agar menang dari CSS lama. --}}
<style>
    .best-time-section .recommendation-grid {
        align-items: stretch;
    }

    .best-time-section .recommendation-card {
        display: flex;
        flex-direction: column;
        height: auto !important;
        min-height: 0;
        overflow: hidden;
        background: rgba(8, 18, 48, .84) !important;
        -webkit-backdrop-filter: blur(10px);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, .22);
        color: #ffffff;
    }

    .best-time-section .recommendation-card img {
        display: block;
        width: 100%;
        height: 240px;
        object-fit: cover;
        flex-shrink: 0;
        background: rgba(255, 255, 255, .08);
    }

    .best-time-section .recommendation-content {
        display: flex;
        flex-direction: column;
        gap: 8px;
        flex: 1;
        padding: 20px 24px 24px;
    }

    .best-time-section .recommendation-content h3 {
        color: #ffffff !important;
        opacity: 1 !important;
    }

    .best-time-section .destination-location {
        color: #cfe0ff !important;
        opacity: 1 !important;
    }

    .best-time-section .recommendation-description {
        color: #e8eefc !important;
        opacity: 1 !important;
        line-height: 1.7;
    }

    .best-time-section .best-time-info {
        display: grid;
        gap: 6px;
        margin-top: 6px;
        font-size: 13px;
        color: #e8eefc !important;
        opacity: 1 !important;
    }

    .best-time-section .best-time-info strong {
        color: #f4c430;
    }

    .best-time-section .recommendation-link {
        margin-top: auto;
        padding-top: 10px;
        color: #f4c430 !important;
        font-weight: 700;
        opacity: 1 !important;
    }

    /* ----- Light mode ----- */
    html[data-theme="light"] .best-time-section .recommendation-card {
        background: rgba(255, 255, 255, .90) !important;
        border-color: rgba(0, 100, 200, .18);
        color: #0d2340;
    }

    html[data-theme="light"] .best-time-section .recommendation-content h3 {
        color: #0d2340 !important;
    }

    html[data-theme="light"] .best-time-section .destination-location {
        color: #35557f !important;
    }

    html[data-theme="light"] .best-time-section .recommendation-description,
    html[data-theme="light"] .best-time-section .best-time-info {
        color: #1d3557 !important;
    }

    html[data-theme="light"] .best-time-section .best-time-info strong {
        color: #8a6408;
    }

    html[data-theme="light"] .best-time-section .recommendation-link {
        color: #0d2340 !important;
    }
</style>


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

                @php
                    // [FIX] Sebelumnya: asset($img) -> hasilnya /destinations/xxx.jpg (tanpa "storage/")
                    // sehingga 404. Sekarang semua logika URL ditangani Media::url() lewat cover_url:
                    // URL penuh, file upload Filament, file di public/images, atau gambar default.
                    $imgSrc = $bestTime->destination->cover_url;
                @endphp

                <a
                    href="{{ route('destinations.show', $bestTime->destination->slug) }}"
                    class="recommendation-card"
                >

                    {{-- [FIX] Sebelumnya memakai $destination (tidak ada di loop ini) --}}
                    <img
                        src="{{ $imgSrc }}"
                        alt="{{ $bestTime->destination->name }}"
                        loading="lazy"
                        onerror="this.onerror=null;this.src='{{ \App\Support\Media::fallback() }}';"
                    >


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