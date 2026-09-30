{{-- =========================================================
     UNIFIED FOOTER — Surabaya Wanderlust
========================================================== --}}

<footer class="uni-footer">

    <div class="uni-footer-brand">Surabaya Wanderlust</div>
    <div class="uni-footer-tagline">Explore Surabaya Beyond the Destination</div>

    <div class="uni-footer-links">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('destinations.index') }}">Destinations</a>
        <a href="{{ route('culinary.index') }}">Culinary</a>
        <a href="{{ route('culture.index') }}">Culture</a>
        <a href="{{ route('travel-guide.index') }}">Travel Guide</a>
        <a href="{{ route('best-time.index') }}">Best Time</a>
        <a href="{{ route('plan-your-trip.index') }}">Plan Your Trip</a>
        <a href="{{ route('about.index') }}">About</a>
    </div>

    <p class="uni-footer-copy">
        &copy; {{ date('Y') }} Surabaya Wanderlust. All rights reserved.
    </p>

</footer>

{{-- Scroll to Top --}}
<button class="scroll-top" id="scrollTop" onclick="window.scrollTo({top:0,behavior:'smooth'})" aria-label="Scroll to top">
    ↑
</button>

<script>
window.addEventListener('scroll', function () {
    const btn = document.getElementById('scrollTop');
    if (btn) btn.classList.toggle('visible', window.scrollY > 400);
});
</script>
