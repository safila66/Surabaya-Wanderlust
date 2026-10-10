<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <script>(function(){var t='dark';try{var s=localStorage.getItem('sw-theme');if(s==='system'||!s){t=window.matchMedia('(prefers-color-scheme: light)').matches?'light':'dark';}else{t=s;}}catch(e){}document.documentElement.setAttribute('data-theme',t);})()</script>
    <link rel="stylesheet" href="{{ asset('css/unified.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Time - Surabaya Wanderlust</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

@include('partials.navbar')

<header class="page-hero" style="background-image: linear-gradient(rgba(7, 17, 42, 0.6), rgba(7, 17, 42, 0.8)), url('https://images.unsplash.com/photo-1549473889-14f410d83298?w=1600&q=80'); padding-bottom: 90px;">
    <div class="container-main text-center">
        <span class="uni-card-label" style="color:var(--gold); display:block; margin-bottom:12px;">Plan Your Visit</span>
        <h1 class="page-hero-title">Find the best time to go.</h1>
        <p class="page-hero-desc" style="margin: 0 auto;">Discover the perfect moments to visit Surabaya. Plan your trip around weather, festivals, and seasonal highlights.</p>
    </div>
</header>

<section class="filter-section">
    <div class="filter-card">
        <div class="filter-card-title">Search Event by Date</div>
        <form action="#" method="GET">
            <div style="display:grid; grid-template-columns: 1fr 1fr 1fr auto; gap:16px; align-items:flex-end;">
                <div>
                    <label class="filter-label">Tanggal</label>
                    <select name="date" class="filter-select">
                        <option value="">Semua Tanggal</option>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                        <option value='6'>6</option>
                        <option value='7'>7</option>
                        <option value='8'>8</option>
                        <option value='9'>9</option>
                        <option value='10'>10</option>
                        <option value='11'>11</option>
                        <option value='12'>12</option>
                        <option value='13'>13</option>
                        <option value='14'>14</option>
                        <option value='15'>15</option>
                        <option value='16'>16</option>
                        <option value='17'>17</option>
                        <option value='18'>18</option>
                        <option value='19'>19</option>
                        <option value='20'>20</option>
                        <option value='21'>21</option>
                        <option value='22'>22</option>
                        <option value='23'>23</option>
                        <option value='24'>24</option>
                        <option value='25'>25</option>
                        <option value='26'>26</option>
                        <option value='27'>27</option>
                        <option value='28'>28</option>
                        <option value='29'>29</option>
                        <option value='30'>30</option>
                        <option value='31'>31</option>
                    </select>
                </div>
                <div>
                    <label class="filter-label">Bulan</label>
                    <select name="month" class="filter-select">
                        <option value="">Semua Bulan</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div>
                    <label class="filter-label">Tahun</label>
                    <select name="year" class="filter-select">
                        <option value="">Semua Tahun</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn-primary" style="width:100%; justify-content:center;">
                        Search
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

<main class="section container-main" style="min-height: 400px; display: flex; align-items: center; justify-content: center;">
    <div style="text-align:center; color: var(--text-muted);">
        <i class="fa-regular fa-calendar-check" style="font-size: 48px; margin-bottom: 16px; color: var(--gold);"></i>
        <h3>Select a date to explore</h3>
        <p>Information about events will appear here.</p>
    </div>
</main>

@include('partials.footer')
</body>
</html>