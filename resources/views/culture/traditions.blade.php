<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <script>(function(){var t='dark';try{var s=localStorage.getItem('sw-theme');if(s==='system'||!s){t=window.matchMedia('(prefers-color-scheme: light)').matches?'light':'dark';}else{t=s;}}catch(e){}document.documentElement.setAttribute('data-theme',t);})()</script>
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traditions - Surabaya Wanderlust</title>
    <style>
        .trad-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 28px;
            margin-top: 40px;
        }
        .trad-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform .3s, box-shadow .3s;
        }
        .trad-card:hover { transform: translateY(-5px); box-shadow: 0 12px 30px rgba(0,0,0,.1); }
        .trad-icon-wrap {
            height: 160px;
            background: linear-gradient(135deg, var(--bg-surface), var(--border));
            display: flex; align-items: center; justify-content: center;
            color: var(--gold); font-size: 3.5rem;
        }
        .trad-body { padding: 22px 24px; flex-grow:1; display:flex; flex-direction:column; }
        .trad-badge {
            display: inline-block;
            padding: 3px 11px;
            background: var(--gold); color: #1a0a00;
            border-radius: 20px; font-size: 0.7rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: .06em;
            margin-bottom: 10px; width: fit-content;
        }
        .trad-title {
            font-family: Georgia, serif; font-size: 1.1rem;
            color: var(--text-primary); font-weight: bold;
            margin-bottom: 10px; line-height: 1.35;
        }
        .trad-desc {
            color: var(--text-secondary); font-size: .875rem;
            line-height: 1.65; margin-bottom: 18px; flex-grow:1;
        }
        .trad-meta {
            border-top: 1px solid var(--border);
            padding-top: 14px; margin-bottom: 14px;
            display: flex; flex-direction: column; gap: 7px;
        }
        .trad-meta-row { display:flex; align-items:flex-start; gap:10px; font-size:.82rem; color:var(--text-muted); }
        .trad-meta-row i { color: var(--gold); margin-top:2px; flex-shrink:0; }
        .plan-btn {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 9px 18px;
            background: var(--gold); color: #1a0a00;
            border-radius: 9px; font-size: .82rem; font-weight: 700;
            text-decoration: none; width: fit-content;
            transition: opacity .2s;
        }
        .plan-btn:hover { opacity: .82; }
    </style>
</head>
<body>
@include('partials.navbar')

<header class="page-hero" style="background-image: linear-gradient(rgba(7,17,42,.55), rgba(7,17,42,.78)), url('https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Suro_and_Boyo_statue%2C_Surabaya.jpg/1280px-Suro_and_Boyo_statue%2C_Surabaya.jpg');">
    <div class="container-main text-center">
        <span style="color:var(--gold); display:block; margin-bottom:12px; font-size:.82rem; text-transform:uppercase; letter-spacing:.1em;">Surabaya Culture</span>
        <h1 class="page-hero-title">Traditions</h1>
        <p class="page-hero-desc" style="margin:0 auto; max-width:580px;">Narasi event tahunan &amp; tradisi Surabaya, diurutkan sesuai kalender. Tanggal berubah tiap tahun — cek menjelang acara di <strong>@wisatasurabaya</strong>.</p>
    </div>
</header>

<main class="section container-main" style="min-height:400px;">
    <div class="trad-grid">

        {{-- 1 --}}
        <div class="trad-card">
            <div class="trad-icon-wrap"><i class="fa-solid fa-dragon"></i></div>
            <div class="trad-body">
                <span class="trad-badge">Februari – Maret</span>
                <div class="trad-title">Imlek & Kya-Kya Chunjie Fest, Kembang Jepun</div>
                <div class="trad-desc">Saat Imlek, kawasan Pecinan Kembang Jepun berubah menjadi panggung budaya: lampion merah, pertunjukan seni Tionghoa, dan kuliner pecinan memenuhi udara. Kya-Kya Chunjie Fest 2026 digelar 14–16 Februari, 18.00–22.00 WIB, dilengkapi walking tour sejarah. Ditutup Cap Go Meh, dengan lontong Cap Go Meh sebagai hidangan khasnya.</div>
                <div class="trad-meta">
                    <div class="trad-meta-row"><i class="fa-regular fa-calendar"></i><span>Februari–Maret, mengikuti kalender Imlek</span></div>
                    <div class="trad-meta-row"><i class="fa-solid fa-location-dot"></i><span>Kembang Jepun</span></div>
                </div>
                <a href="{{ route('plan-your-trip.index') }}?style=culture" class="plan-btn">
                    <i class="fa-solid fa-map-location-dot"></i> Plan Your Trip
                </a>
            </div>
        </div>

        {{-- 2 --}}
        <div class="trad-card">
            <div class="trad-icon-wrap"><i class="fa-solid fa-mosque"></i></div>
            <div class="trad-body">
                <span class="trad-badge">Kalender Hijriah</span>
                <div class="trad-title">Haul Agung Sunan Ampel</div>
                <div class="trad-desc">Haul adalah peringatan wafatnya Sunan Ampel, salah satu Wali Songo yang makamnya ada di kompleks Masjid Ampel — masjid tertua di Jawa Timur, dibangun 1421. Peziarah dari berbagai daerah memenuhi kawasan, bersama pedagang musiman. Haul ke-549 digelar 6–8 Februari 2026.</div>
                <div class="trad-meta">
                    <div class="trad-meta-row"><i class="fa-regular fa-calendar"></i><span>Mengikuti kalender Hijriah (~10 hari lebih awal tiap tahun)</span></div>
                    <div class="trad-meta-row"><i class="fa-solid fa-location-dot"></i><span>Masjid Agung Sunan Ampel, Semampir</span></div>
                </div>
                <a href="{{ route('plan-your-trip.index') }}?style=culture" class="plan-btn">
                    <i class="fa-solid fa-map-location-dot"></i> Plan Your Trip
                </a>
            </div>
        </div>

        {{-- 3 --}}
        <div class="trad-card">
            <div class="trad-icon-wrap"><i class="fa-solid fa-city"></i></div>
            <div class="trad-body">
                <span class="trad-badge">April – Juni</span>
                <div class="trad-title">Hari Jadi Kota Surabaya (HJKS)</div>
                <div class="trad-desc">Setiap 31 Mei Surabaya berulang tahun. Tahun 2026 adalah HJKS ke-733. Perayaannya berlangsung sepanjang April–Juni: festival budaya, sport tourism, wisata malam, dan ekonomi kreatif. Puncaknya di Balai Kota 31 Mei. Dua acara unggulan: Festival Rujak Uleg dan Surabaya Vaganza.</div>
                <div class="trad-meta">
                    <div class="trad-meta-row"><i class="fa-regular fa-calendar"></i><span>April–Juni, puncak 31 Mei</span></div>
                    <div class="trad-meta-row"><i class="fa-solid fa-location-dot"></i><span>Balai Kota dan berbagai titik di kota</span></div>
                </div>
                <a href="{{ route('plan-your-trip.index') }}?style=culture" class="plan-btn">
                    <i class="fa-solid fa-map-location-dot"></i> Plan Your Trip
                </a>
            </div>
        </div>

        {{-- 4 --}}
        <div class="trad-card">
            <div class="trad-icon-wrap"><i class="fa-solid fa-bowl-food"></i></div>
            <div class="trad-body">
                <span class="trad-badge">Mei</span>
                <div class="trad-title">Festival Rujak Uleg</div>
                <div class="trad-desc">Rujak cingur adalah ikon kuliner Surabaya, diakui sebagai warisan budaya takbenda Indonesia. Festival ini mengajak warga mengulek rujak bersama dengan kostum kreatif. Edisi 2026 adalah ke-21, bertema "Rujak Phoria" ala Piala Dunia, dengan 136 kelompok peserta dan 132 peserta lomba busana tematik.</div>
                <div class="trad-meta">
                    <div class="trad-meta-row"><i class="fa-regular fa-calendar"></i><span>Biasanya Mei. Di 2026: Sabtu malam, 9 Mei</span></div>
                    <div class="trad-meta-row"><i class="fa-solid fa-location-dot"></i><span>Surabaya Expo Center (bekas THR) pada 2026</span></div>
                </div>
                <a href="{{ route('plan-your-trip.culinary') }}" class="plan-btn">
                    <i class="fa-solid fa-map-location-dot"></i> Plan Your Trip
                </a>
            </div>
        </div>

        {{-- 5 --}}
        <div class="trad-card">
            <div class="trad-icon-wrap"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
            <div class="trad-body">
                <span class="trad-badge">Mei</span>
                <div class="trad-title">Surabaya Vaganza (Parade Bunga & Festival of Lights)</div>
                <div class="trad-desc">Parade bunga tahunan yang paling ditunggu warga. Mobil hias berbunga, kostum bercahaya, dan light show menyusuri jantung kota. Edisi 2026 bertema "Festival of Lights: Garden of Hope" — rute 3,1 km dari Tugu Pahlawan via Jl. Tembaan, Tunjungan, Gubernur Suryo hingga Monumen Bambu Runcing.</div>
                <div class="trad-meta">
                    <div class="trad-meta-row"><i class="fa-regular fa-calendar"></i><span>Biasanya pertengahan Mei. Di 2026: Sabtu 16 Mei, 18.00 WIB</span></div>
                    <div class="trad-meta-row"><i class="fa-solid fa-location-dot"></i><span>Tugu Pahlawan – Monumen Bambu Runcing</span></div>
                </div>
                <a href="{{ route('plan-your-trip.index') }}?style=culture" class="plan-btn">
                    <i class="fa-solid fa-map-location-dot"></i> Plan Your Trip
                </a>
            </div>
        </div>

        {{-- 6 --}}
        <div class="trad-card">
            <div class="trad-icon-wrap"><i class="fa-solid fa-flag"></i></div>
            <div class="trad-body">
                <span class="trad-badge">September</span>
                <div class="trad-title">Teatrikal Perobekan Bendera, Hotel Majapahit</div>
                <div class="trad-desc">Pada 19 September 1945, arek-arek Suroboyo merobek warna biru bendera Belanda di Hotel Yamato (kini Hotel Majapahit, Jl. Tunjungan). Peristiwa pemantik semangat 10 November itu direka ulang tiap tahun. Edisi 2026: opera kolosal "Merah Putih Bertanya" dengan 750 pemain, dipimpin Wali Kota Eri Cahyadi.</div>
                <div class="trad-meta">
                    <div class="trad-meta-row"><i class="fa-regular fa-calendar"></i><span>Sekitar 19 September</span></div>
                    <div class="trad-meta-row"><i class="fa-solid fa-location-dot"></i><span>Depan Hotel Majapahit, Jl. Tunjungan</span></div>
                </div>
                <a href="{{ route('plan-your-trip.culture') }}" class="plan-btn">
                    <i class="fa-solid fa-map-location-dot"></i> Plan Your Trip
                </a>
            </div>
        </div>

        {{-- 7 --}}
        <div class="trad-card">
            <div class="trad-icon-wrap"><i class="fa-solid fa-person-military-pointing"></i></div>
            <div class="trad-body">
                <span class="trad-badge">November</span>
                <div class="trad-title">Hari Pahlawan & Parade Surabaya Juang</div>
                <div class="trad-desc">Setiap 10 November Surabaya mengenang pertempuran 1945. Parade Surabaya Juang diikuti ~3.000 peserta TNI, Polri, seniman, dan komunitas sejarah. Teatrikal kolosal tampil di tiga titik: Tugu Pahlawan, perempatan Siola, dan Balai Pemuda. Bagian dari Surabaya Heroic Days yang berisi pameran dan konser.</div>
                <div class="trad-meta">
                    <div class="trad-meta-row"><i class="fa-regular fa-calendar"></i><span>Awal November (2026 rencana: 7 November)</span></div>
                    <div class="trad-meta-row"><i class="fa-solid fa-location-dot"></i><span>Tugu Pahlawan – pusat kota</span></div>
                </div>
                <a href="{{ route('plan-your-trip.culture') }}" class="plan-btn">
                    <i class="fa-solid fa-map-location-dot"></i> Plan Your Trip
                </a>
            </div>
        </div>

        {{-- 8 --}}
        <div class="trad-card">
            <div class="trad-icon-wrap"><i class="fa-solid fa-masks-theater"></i></div>
            <div class="trad-body">
                <span class="trad-badge">Sepanjang Tahun</span>
                <div class="trad-title">Tari Remo</div>
                <div class="trad-desc">Tarian khas Jawa Timur yang gerakannya tegas, lincah, penuh semangat, dengan hentakan kaki berlonceng. Semula membuka pertunjukan ludruk, kini menjadi tarian penyambut tamu. Nama Cak Durasim lekat dengan sejarahnya. Gaya Surabayaan dikenali dari ikat kepala merah dan batik corak Surabaya atau Madura.</div>
                <div class="trad-meta">
                    <div class="trad-meta-row"><i class="fa-regular fa-calendar"></i><span>Sepanjang tahun, sering tampil saat perayaan kota</span></div>
                    <div class="trad-meta-row"><i class="fa-solid fa-location-dot"></i><span>Gedung Cak Durasim, Jl. Genteng Kali 85 &amp; berbagai panggung kota</span></div>
                </div>
                <a href="{{ route('plan-your-trip.culture') }}" class="plan-btn">
                    <i class="fa-solid fa-map-location-dot"></i> Plan Your Trip
                </a>
            </div>
        </div>

    </div>
</main>
@include('partials.footer')
</body>
</html>
