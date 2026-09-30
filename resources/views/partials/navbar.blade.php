<style>
/* NAVBAR FIXES TO PREVENT OVERLAP (GLOBAL) */
.uni-navbar {
    padding: 12px 3% !important; 
    display: flex !important;
    flex-wrap: nowrap !important;
    align-items: center !important;
    justify-content: space-between !important;
    gap: 40px !important;
}
.uni-brand {
    flex-shrink: 0;
}
.uni-nav-menu {
    display: flex !important;
    gap: 14px !important;
    margin: 0 auto !important;
    padding: 0 !important;
    flex-wrap: nowrap !important;
    align-items: center !important;
    justify-content: center !important;
    flex: 1; 
}
.uni-nav-menu li {
    white-space: nowrap !important;
    display: inline-block;
}
.uni-nav-menu a {
    font-size: 11px !important;
    letter-spacing: 0.5px !important;
    white-space: nowrap !important;
    text-align: center;
}
.uni-nav-right {
    display: flex !important;
    gap: 12px !important;
    flex-shrink: 0; 
    align-items: center !important;
}
.uni-nav-right a, .uni-nav-right form button, .uni-nav-right span {
    white-space: nowrap !important;
}
.uni-brand-name {
    font-size: 18px !important;
}
</style>
{{-- =========================================================
     UNIFIED NAVBAR — Surabaya Wanderlust v2
     Include: @include('partials.navbar')
========================================================== --}}

<nav class="uni-navbar solid" id="uniNavbar">

    {{-- LOGO / BRAND --}}
    <a href="{{ route('home') }}" class="uni-brand">
        <span class="uni-brand-name">Surabaya Wanderlust</span>
        <span class="uni-brand-tagline">Somewhere in Surabaya</span>
    </a>

    {{-- MENU --}}
    <ul class="uni-nav-menu" id="uniNavMenu">
        <li><a href="{{ route('home') }}"                 class="{{ request()->routeIs('home') ? 'active' : '' }}">HOME</a></li>
        <li><a href="{{ route('destinations.index') }}"   class="{{ request()->routeIs('destinations.*') ? 'active' : '' }}">DESTINATIONS</a></li>
        <li><a href="{{ route('culinary.index') }}"       class="{{ request()->routeIs('culinary.*') ? 'active' : '' }}">CULINARY</a></li>
        <li><a href="{{ route('accommodations.index') }}">ACCOMMODATIONS</a></li>
        <li><a href="{{ route('travel-guide.index') }}" class="{{ request()->routeIs('travel-guide.*') ? 'active' : '' }}">TRAVEL GUIDE</a></li>
        <li><a href="{{ route('best-time.index') }}"      class="{{ request()->routeIs('best-time.*') ? 'active' : '' }}">BEST TIME</a></li>
        <li><a href="{{ route('plan-your-trip.index') }}" class="{{ request()->routeIs('plan-your-trip.*') ? 'active' : '' }}">PLAN YOUR TRIP</a></li>
        <li><a href="{{ route('about.index') }}"          class="{{ request()->routeIs('about.*') ? 'active' : '' }}">ABOUT</a></li>
    </ul>

        {{-- RIGHT SIDE: THEME TOGGLE + HAMBURGER + AUTH --}}
    <div class="uni-nav-right" style="display: flex; align-items: center; gap: 12px;">
        @auth
            @if(Auth::user()->role === 'admin')
                <a href="/admin" class="btn-primary" style="padding: 6px 14px; font-size: 11px; text-decoration: none; border-radius: 999px;">Admin Panel</a>
            @else
                <span style="font-size: 12px; font-weight: 600;">Hello, {{ explode(' ', Auth::user()->name)[0] }}</span>
            @endif
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" style="background: transparent; border: 1px solid rgba(255,255,255,0.3); color: inherit; padding: 6px 12px; font-size: 11px; border-radius: 999px; cursor: pointer; transition: 0.2s;">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" style="background: transparent; border: 1px solid rgba(255,255,255,0.3); color: inherit; padding: 6px 14px; font-size: 11px; border-radius: 999px; cursor: pointer; text-decoration: none; font-weight: bold; transition: 0.2s;">Sign In</a>
        @endauth

        <button class="theme-toggle" id="themeToggleBtn" onclick="toggleTheme()" aria-label="Toggle dark/light mode" title="Toggle dark/light mode">
            🌙
        </button>
        <button class="uni-hamburger" id="uniHamburger" onclick="toggleUniNav()" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</nav>

{{-- Mobile Overlay --}}
<div class="uni-mobile-overlay" id="uniMobileOverlay" onclick="toggleUniNav()"></div>

{{-- Mobile Menu --}}
<div class="uni-mobile-menu" id="uniMobileMenu">
    <button class="uni-mobile-close" onclick="toggleUniNav()">✕</button>

    {{-- Mobile theme toggle --}}
    <div style="display:flex; align-items:center; gap:10px; padding:10px 0 20px; border-bottom:1px solid rgba(255,255,255,0.08); margin-bottom:10px;">
        <button class="theme-toggle" onclick="toggleTheme()" style="width:36px; height:36px; font-size:14px;">🌙</button>
        <span style="font-size:12px; color:rgba(255,255,255,0.5); font-family:'Plus Jakarta Sans',sans-serif;">Toggle Theme</span>
    </div>

    <a href="{{ route('home') }}"                 class="{{ request()->routeIs('home') ? 'active' : '' }}">HOME</a>
    <a href="{{ route('destinations.index') }}"   class="{{ request()->routeIs('destinations.*') ? 'active' : '' }}">DESTINATIONS</a>
    <a href="{{ route('culinary.index') }}"       class="{{ request()->routeIs('culinary.*') ? 'active' : '' }}">CULINARY</a>
    <a href="{{ route('accommodations.index') }}">ACCOMMODATIONS</a>
    <a href="{{ route('travel-guide.index') }}" class="{{ request()->routeIs('travel-guide.*') ? 'active' : '' }}">TRAVEL GUIDE</a>
    <a href="{{ route('best-time.index') }}"      class="{{ request()->routeIs('best-time.*') ? 'active' : '' }}">BEST TIME</a>
    <a href="{{ route('plan-your-trip.index') }}" class="{{ request()->routeIs('plan-your-trip.*') ? 'active' : '' }}">PLAN YOUR TRIP</a>
    <a href="{{ route('about.index') }}"          class="{{ request()->routeIs('about.*') ? 'active' : '' }}">ABOUT</a>
</div>

<script>
/* ── MOBILE NAV ──────────────────────────────── */
function toggleUniNav() {
    const overlay = document.getElementById('uniMobileOverlay');
    const menu    = document.getElementById('uniMobileMenu');
    const isOpen  = menu.classList.contains('open');
    overlay.classList.toggle('open', !isOpen);
    menu.classList.toggle('open', !isOpen);
    document.body.style.overflow = isOpen ? '' : 'hidden';
}

/* ── STICKY NAVBAR ───────────────────────────── */
(function () {
    const nav = document.getElementById('uniNavbar');
    if (!nav) return;
    function onScroll() {
        
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
})();

/* ── DARK / LIGHT THEME ──────────────────────── */
(function () {
    const savedTheme = localStorage.getItem('sw-theme') || 'dark';
    applyTheme(savedTheme);
})();

function applyTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('sw-theme', theme);
    // Update all toggle button icons
    document.querySelectorAll('.theme-toggle, #themeToggleBtn').forEach(btn => {
        btn.textContent = theme === 'dark' ? '☀️' : '🌙';
        btn.title = theme === 'dark' ? 'Switch to Light Mode' : 'Switch to Dark Mode';
    });
}

function toggleTheme() {
    const current = document.documentElement.getAttribute('data-theme') || 'dark';
    applyTheme(current === 'dark' ? 'light' : 'dark');
}
</script>
