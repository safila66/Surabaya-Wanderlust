@extends('layouts.app')
@section('title', 'Interactive Map - Surabaya Wanderlust')
@section('content')
<div style="display: flex; flex-direction: column; height: 100vh; overflow: hidden;">
    @include('partials.navbar')
    <div style="flex: 1; position: relative; width: 100%;">
        <div id="surabaya-map" style="width: 100%; height: 100%; z-index: 1;"></div>
    </div>
</div>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin=""/>
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

<style>
.uni-navbar { position: relative !important; z-index: 1000 !important; }
/* Override default layout styles for fullscreen map */
body, html { margin: 0; padding: 0; overflow: hidden; }
main.container-main { max-width: 100% !important; padding: 0 !important; margin: 0 !important; }
footer { display: none !important; }
.leaflet-popup-content-wrapper { background: var(--bg-surface); color: var(--text-primary); }
.leaflet-popup-tip { background: var(--bg-surface); }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    L.Icon.Default.imagePath = 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/';
    var map = L.map('surabaya-map').setView([-7.250445, 112.768845], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    var markers = L.markerClusterGroup({
        spiderfyOnMaxZoom: true,
        showCoverageOnHover: false,
        zoomToBoundsOnClick: true
    });
    
    var destinations = @json($destinations);
    
    destinations.forEach(function(d) {
        if (d.latitude && d.longitude) {
            var marker = L.marker([d.latitude, d.longitude]);
            
            var imageUrl = d.image ? '/storage/' + d.image : '/' + d.default_image;
            
            var popupContent = `
                <div style="width: 220px; font-family: 'Plus Jakarta Sans', sans-serif;">
                    <img src="${imageUrl}" style="width: 100%; height: 120px; object-fit: cover; border-radius: 8px; margin-bottom: 10px;" onerror="this.src='/${d.default_image}'">
                    <h6 style="margin: 0 0 4px; font-weight: 800; font-size: 16px; color: var(--gold);">${d.name}</h6>
                    <p style="font-size: 12px; margin: 0 0 12px; opacity: 0.8;">
                        ${d.category ? d.category.charAt(0).toUpperCase() + d.category.slice(1) : 'Destinasi'}
                    </p>
                    <a href="${d.url}" style="display: block; width: 100%; text-align: center; background: var(--gold); color: #fff; padding: 8px; border-radius: 8px; text-decoration: none; font-size: 13px; font-weight: 700;">Lihat Detail</a>
                </div>
            `;
            
            marker.bindPopup(popupContent);
            markers.addLayer(marker);
        }
    });

    map.addLayer(markers);
});
</script>
@endsection
