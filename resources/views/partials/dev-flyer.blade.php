{{-- Popup flyer: website dalam tahap pengembangan. Tampil sekali per sesi tab. --}}
<div id="devFlyer" role="dialog" aria-modal="true" aria-labelledby="devFlyerTitle" style="display:none; position:fixed; inset:0; z-index:99999; background:rgba(7,17,42,.72); backdrop-filter:blur(4px); align-items:center; justify-content:center; padding:20px;">
    <div style="position:relative; max-width:440px; width:100%; background:linear-gradient(160deg,#0d1b3e,#07112a); color:#fff; border:1px solid rgba(212,160,23,.5); border-radius:20px; padding:36px 30px 28px; text-align:center; box-shadow:0 24px 60px rgba(0,0,0,.5); font-family:'Plus Jakarta Sans',sans-serif;">
        <button type="button" onclick="closeDevFlyer()" aria-label="Close" style="position:absolute; top:12px; right:14px; background:transparent; border:0; color:#fff; font-size:20px; cursor:pointer;">✕</button>
        <div style="font-size:46px; margin-bottom:10px;">🚧</div>
        <div style="display:inline-block; background:#d4a017; color:#07112a; font-weight:800; font-size:11px; letter-spacing:1.5px; padding:4px 12px; border-radius:999px; margin-bottom:14px;">UNDER DEVELOPMENT</div>
        <h2 id="devFlyerTitle" style="font-family:'Playfair Display',serif; font-size:26px; margin:0 0 10px; color:#d4a017;">Surabaya Wanderlust</h2>
        <p style="font-size:14px; line-height:1.7; margin:0 0 20px; color:rgba(255,255,255,.85);">
            Website ini masih dalam <strong>tahap pengembangan</strong>. Beberapa fitur, data, dan tampilan mungkin belum sempurna dan akan terus diperbarui.
            Mohon maaf atas ketidaknyamanannya! Terima kasih atas pengertiannya! 💙
        </p>
        <button type="button" onclick="closeDevFlyer()" style="background:#d4a017; color:#07112a; border:0; font-weight:700; padding:11px 28px; border-radius:999px; cursor:pointer; font-size:13px;">Mengerti, lanjutkan</button>
    </div>
</div>
<script>
(function () {
    var el = document.getElementById('devFlyer');
    if (!el) return;
    try { if (sessionStorage.getItem('sw-dev-flyer') === '1') return; } catch (e) {}
    el.style.display = 'flex';
    window.closeDevFlyer = function () {
        el.style.display = 'none';
        try { sessionStorage.setItem('sw-dev-flyer', '1'); } catch (e) {}
    };
    el.addEventListener('click', function (e) { if (e.target === el) closeDevFlyer(); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeDevFlyer(); });
})();
</script>
