{{--
    Peta interaktif (Leaflet + OpenStreetMap, gratis, tanpa API key).
    Parameter:
      $id     : id unik peta di halaman ini (contoh: 'index', 'detail')
      $points : array berisi ['name' => ..., 'lat' => ..., 'lng' => ..., 'url' => ... atau null]
      $height : (opsional) tinggi peta dalam px, default 320
--}}
@php
    $mapDomId = 'dw-map-' . ($id ?? 'main');
@endphp

<style>
    .dw-map {
        position: relative; z-index: 0; isolation: isolate;
        border: 1px solid var(--border); border-radius: 14px; overflow: hidden;
    }
</style>

<div id="{{ $mapDomId }}" class="dw-map" style="height: {{ (int) ($height ?? 320) }}px;"></div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
<script>
(function () {
    const points = @json($points ?? []);
    const el = document.getElementById(@json($mapDomId));
    if (!el || !window.L || !points.length) return;

    L.Icon.Default.imagePath = 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/';

    const map = L.map(el, { scrollWheelZoom: false });
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    const bounds = [];
    points.forEach(function (p) {
        const marker = L.marker([p.lat, p.lng]).addTo(map);

        // Popup dibuat lewat DOM supaya nama destinasi aman dari XSS
        const box = document.createElement('div');
        const title = document.createElement('strong');
        title.textContent = p.name;
        box.appendChild(title);

        if (p.url) {
            box.appendChild(document.createElement('br'));
            const link = document.createElement('a');
            link.href = p.url;
            link.textContent = 'Lihat detail';
            box.appendChild(link);
        }
        marker.bindPopup(box);
        bounds.push([p.lat, p.lng]);
    });

    if (bounds.length === 1) {
        map.setView(bounds[0], 15);
    } else {
        map.fitBounds(bounds, { padding: [30, 30] });
    }
})();
</script>