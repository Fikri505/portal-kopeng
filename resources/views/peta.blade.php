@extends('layouts.app')

@section('title', 'Peta Lokasi')
@section('meta_description', 'Peta interaktif UMKM dan destinasi wisata di Desa Kopeng.')

@section('content')
    <div class="flex flex-col h-[calc(100vh-4rem)]">
        {{-- Header --}}
        <div class="bg-white border-b border-gray-100 px-4 sm:px-6 lg:px-8 py-3 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <div>
                <h1 class="text-lg font-bold text-gray-900">Peta Lokasi</h1>
                <p class="text-sm text-gray-500">UMKM & Wisata Desa Kopeng</p>
            </div>
            <div class="flex items-center gap-4 text-sm">
                <label class="inline-flex items-center gap-1.5 cursor-pointer">
                    <input type="checkbox" id="filter-umkm" checked class="rounded text-emerald-500 focus:ring-emerald-500">
                    <span class="w-3 h-3 rounded-full bg-emerald-500"></span> UMKM
                </label>
                <label class="inline-flex items-center gap-1.5 cursor-pointer">
                    <input type="checkbox" id="filter-wisata" checked class="rounded text-blue-500 focus:ring-blue-500">
                    <span class="w-3 h-3 rounded-full bg-blue-500"></span> Wisata
                </label>
            </div>
        </div>

        {{-- Map --}}
        <div class="flex-1" id="full-map"></div>
    </div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />
<style>
    .custom-popup .leaflet-popup-content-wrapper {
        border-radius: 12px;
        padding: 0;
        overflow: hidden;
    }
    .custom-popup .leaflet-popup-content {
        margin: 0;
    }
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const map = L.map('full-map').setView([-7.3720, 110.4210], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            maxZoom: 19,
        }).addTo(map);

        let allMarkers = [];
        let umkmLayer = L.layerGroup().addTo(map);
        let wisataLayer = L.layerGroup().addTo(map);

        function createMarker(loc) {
            const color = loc.type === 'umkm' ? '#10b981' : '#3b82f6';
            const label = loc.type === 'umkm' ? 'UMKM' : 'Wisata';

            const icon = L.divIcon({
                className: 'custom-marker',
                html: `<div style="background:${color};width:32px;height:32px;border-radius:50%;border:3px solid white;box-shadow:0 2px 8px rgba(0,0,0,0.3);display:flex;align-items:center;justify-content:center;cursor:pointer;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="white" stroke="white" stroke-width="1">
                        <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" fill="${color}"/>
                    </svg>
                </div>`,
                iconSize: [32, 32],
                iconAnchor: [16, 16],
            });

            const imgHtml = loc.image
                ? `<img src="${loc.image}" style="width:100%;height:140px;object-fit:cover;" alt="${loc.name}">`
                : '';

            const popup = L.popup({ maxWidth: 280, className: 'custom-popup' }).setContent(`
                <div style="min-width:220px;">
                    ${imgHtml}
                    <div style="padding:12px;">
                        <p style="font-size:12px;color:#6b7280;margin:0 0 4px;">${label} · ${loc.category}</p>
                        <h3 style="font-size:15px;font-weight:700;margin:0 0 4px;color:#111827;">${loc.name}</h3>
                        <p style="font-size:12px;color:#9ca3af;margin:0 0 10px;">${loc.address || ''}</p>
                        <div style="display:flex;gap:8px;">
                            <a href="${loc.url}" style="flex:1;text-align:center;padding:8px 12px;background:#10b981;color:white;border-radius:10px;text-decoration:none;font-size:13px;font-weight:600;">Detail</a>
                            <a href="${loc.google_maps_url}" target="_blank" style="flex:1;text-align:center;padding:8px 12px;background:#3b82f6;color:white;border-radius:10px;text-decoration:none;font-size:13px;font-weight:600;">Navigasi</a>
                        </div>
                    </div>
                </div>
            `);

            const marker = L.marker([loc.latitude, loc.longitude], { icon: icon });
            marker.bindPopup(popup);
            marker._locationType = loc.type;

            return marker;
        }

        // Fetch locations from API
        fetch('{{ route("api.locations") }}')
            .then(res => res.json())
            .then(data => {
                const bounds = [];

                data.forEach(function(loc) {
                    const marker = createMarker(loc);
                    allMarkers.push(marker);

                    if (loc.type === 'umkm') {
                        umkmLayer.addLayer(marker);
                    } else {
                        wisataLayer.addLayer(marker);
                    }

                    bounds.push([loc.latitude, loc.longitude]);
                });

                if (bounds.length > 0) {
                    map.fitBounds(bounds, { padding: [40, 40] });
                }
            });

        // Filter checkboxes
        document.getElementById('filter-umkm').addEventListener('change', function() {
            if (this.checked) {
                map.addLayer(umkmLayer);
            } else {
                map.removeLayer(umkmLayer);
            }
        });

        document.getElementById('filter-wisata').addEventListener('change', function() {
            if (this.checked) {
                map.addLayer(wisataLayer);
            } else {
                map.removeLayer(wisataLayer);
            }
        });
    });
</script>
@endpush
