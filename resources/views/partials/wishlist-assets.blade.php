{{-- CSS + JS untuk tombol wishlist. Sertakan SEKALI per halaman, sebelum </body>. --}}
<style>
    .dest-wrap { position: relative; display: flex; flex-direction: column; }
    .dest-wrap > .uni-card { flex: 1; }

    .wish-form { margin: 0; }
    .wish-form.is-floating { position: absolute; top: 12px; right: 12px; z-index: 5; }

    .wish-btn {
        width: 40px; height: 40px; border: 0; border-radius: 50%;
        display: inline-flex; align-items: center; justify-content: center;
        background: rgba(7, 17, 42, .62); color: #fff; cursor: pointer;
        backdrop-filter: blur(4px);
        transition: transform .15s, background .15s;
    }
    .wish-btn:hover { background: rgba(7, 17, 42, .85); transform: scale(1.06); }
    .wish-btn:focus-visible { outline: 2px solid #fff; outline-offset: 2px; }
    .wish-btn svg { width: 20px; height: 20px; }
    .wish-btn svg path { fill: transparent; stroke: currentColor; stroke-width: 2; stroke-linejoin: round; transition: fill .15s; }
    .wish-btn.is-on svg path { fill: #ff5c8a; stroke: #ff5c8a; }
</style>

<script>
(function () {
    // Toggle tanpa memuat ulang halaman. Kalau fetch gagal, kirim form biasa.
    document.querySelectorAll('.wish-form').forEach(function (form) {
        form.addEventListener('submit', async function (e) {
            e.preventDefault();
            const btn = form.querySelector('.wish-btn');
            const token = form.querySelector('input[name="_token"]').value;

            try {
                const res = await fetch(form.action, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': token, 'Accept': 'application/json' },
                    credentials: 'same-origin',
                });
                if (!res.ok) throw new Error('Request gagal');

                const data = await res.json();
                btn.classList.toggle('is-on', data.wishlisted);
                btn.setAttribute('aria-pressed', data.wishlisted ? 'true' : 'false');
            } catch (err) {
                form.submit();
            }
        });
    });
})();
</script>