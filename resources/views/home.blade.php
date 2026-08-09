@extends('layouts.app')

@section('title', 'Beranda')
@section('meta_description', 'Jelajahi UMKM dan destinasi wisata terbaik di Desa Kopeng, Kecamatan Getasan, Kabupaten Semarang, Jawa Tengah.')

@section('content')
    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-primary-900 via-primary-800 to-primary-950 text-white">
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 1440 600" fill="none">
                <circle cx="200" cy="300" r="300" fill="currentColor" opacity="0.1"/>
                <circle cx="1200" cy="100" r="250" fill="currentColor" opacity="0.08"/>
                <circle cx="800" cy="500" r="200" fill="currentColor" opacity="0.06"/>
            </svg>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28 lg:py-36">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm rounded-full px-4 py-1.5 text-sm text-primary-200 mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    </svg>
                    Kecamatan Getasan, Kabupaten Semarang
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight mb-6">
                    Jelajahi Keindahan<br>
                    <span class="text-primary-300">Desa Kopeng</span>
                </h1>
                <p class="text-lg md:text-xl text-primary-100/90 leading-relaxed mb-8 max-w-2xl">
                    Temukan pesona wisata alam, kuliner khas, dan UMKM lokal di Desa Kopeng. Nikmati udara sejuk lereng Gunung Merbabu dan dukung ekonomi desa.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('wisata.index') }}" class="inline-flex items-center justify-center gap-2 bg-white text-primary-700 font-semibold px-6 py-3 rounded-xl hover:bg-primary-50 transition-all shadow-lg hover:shadow-xl" id="hero-cta-wisata">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                        </svg>
                        Jelajahi Wisata
                    </a>
                    <a href="{{ route('umkm.index') }}" class="inline-flex items-center justify-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 text-white font-semibold px-6 py-3 rounded-xl hover:bg-white/20 transition-all" id="hero-cta-umkm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        Jelajahi UMKM
                    </a>
                </div>
            </div>
        </div>
        {{-- Decorative wave --}}
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 80" fill="none" class="w-full">
                <path d="M0 80V40C360 0 720 60 1080 30C1260 15 1380 25 1440 40V80H0Z" fill="#f9fafb"/>
            </svg>
        </div>
    </section>

    {{-- Featured UMKM --}}
    <section class="py-16 md:py-20" id="featured-umkm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between mb-10">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">UMKM Unggulan</h2>
                    <p class="text-gray-500">Dukung ekonomi lokal dengan mengunjungi UMKM Desa Kopeng</p>
                </div>
                <a href="{{ route('umkm.index') }}" class="mt-4 sm:mt-0 text-sm font-semibold text-primary-600 hover:text-primary-700 inline-flex items-center gap-1">
                    Lihat Semua
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
            @if($featuredUmkm->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($featuredUmkm as $umkm)
                    @include('partials.card-umkm', ['item' => $umkm])
                @endforeach
            </div>
            @else
            <p class="text-gray-400 text-center py-10">Belum ada UMKM yang ditampilkan.</p>
            @endif
        </div>
    </section>

    {{-- Featured Tourism --}}
    <section class="py-16 md:py-20 bg-white" id="featured-wisata">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between mb-10">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Destinasi Wisata</h2>
                    <p class="text-gray-500">Temukan destinasi wisata menarik di sekitar Desa Kopeng</p>
                </div>
                <a href="{{ route('wisata.index') }}" class="mt-4 sm:mt-0 text-sm font-semibold text-primary-600 hover:text-primary-700 inline-flex items-center gap-1">
                    Lihat Semua
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
            @if($featuredTourism->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($featuredTourism as $tourism)
                    @include('partials.card-wisata', ['item' => $tourism])
                @endforeach
            </div>
            @else
            <p class="text-gray-400 text-center py-10">Belum ada wisata yang ditampilkan.</p>
            @endif
        </div>
    </section>

    {{-- Map Preview --}}
    <section class="py-16 md:py-20" id="map-preview">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Peta Lokasi</h2>
                <p class="text-gray-500">Lihat sebaran UMKM dan wisata di sekitar Desa Kopeng</p>
            </div>
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                <div id="home-map" class="w-full h-[400px] md:h-[500px]"></div>
                <div class="p-4 flex flex-col sm:flex-row items-center justify-between gap-3 bg-gray-50">
                    <div class="flex items-center gap-4 text-sm text-gray-500">
                        <span class="inline-flex items-center gap-1.5">
                            <span class="w-3 h-3 rounded-full bg-emerald-500"></span> UMKM
                        </span>
                        <span class="inline-flex items-center gap-1.5">
                            <span class="w-3 h-3 rounded-full bg-blue-500"></span> Wisata
                        </span>
                    </div>
                    <a href="{{ route('peta') }}" class="text-sm font-semibold text-primary-600 hover:text-primary-700 inline-flex items-center gap-1">
                        Buka Peta Lengkap
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-16 md:py-20 bg-gradient-to-r from-primary-600 to-primary-800 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl md:text-3xl font-bold mb-4">Kunjungi Desa Kopeng Sekarang</h2>
            <p class="text-primary-100 text-lg mb-8 max-w-2xl mx-auto">
                Nikmati udara sejuk, kuliner khas, dan keindahan alam lereng Gunung Merbabu. Desa Kopeng menanti kedatangan Anda.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('peta') }}" class="inline-flex items-center justify-center gap-2 bg-white text-primary-700 font-semibold px-6 py-3 rounded-xl hover:bg-primary-50 transition-all shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                    Lihat Peta
                </a>
                <a href="{{ route('wisata.index') }}" class="inline-flex items-center justify-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 font-semibold px-6 py-3 rounded-xl hover:bg-white/20 transition-all">
                    Jelajahi Wisata
                </a>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const locations = @json($mapLocations);
        const map = L.map('home-map').setView([-7.3720, 110.4210], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            maxZoom: 19,
        }).addTo(map);

        const bounds = [];

        locations.forEach(function(loc) {
            const color = loc.type === 'umkm' ? '#10b981' : '#3b82f6';
            const label = loc.type === 'umkm' ? 'UMKM' : 'Wisata';

            const icon = L.divIcon({
                className: 'custom-marker',
                html: `<div style="background:${color};width:28px;height:28px;border-radius:50%;border:3px solid white;box-shadow:0 2px 8px rgba(0,0,0,0.3);display:flex;align-items:center;justify-content:center;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="white" stroke="white" stroke-width="1">
                        <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" fill="${color}"/>
                    </svg>
                </div>`,
                iconSize: [28, 28],
                iconAnchor: [14, 14],
            });

            const imgHtml = loc.image
                ? `<img src="${loc.image}" class="w-full h-32 object-cover rounded-t-lg mb-2" alt="${loc.name}">`
                : '';

            const popup = L.popup({ maxWidth: 260, className: 'custom-popup' }).setContent(`
                <div style="min-width:200px;">
                    ${imgHtml}
                    <div style="padding:4px;">
                        <p style="font-size:13px;color:#6b7280;margin:0 0 2px;">${label} · ${loc.category}</p>
                        <h3 style="font-size:15px;font-weight:700;margin:0 0 4px;color:#111827;">${loc.name}</h3>
                        <p style="font-size:12px;color:#9ca3af;margin:0 0 8px;">${loc.address || ''}</p>
                        <div style="display:flex;gap:6px;">
                            <a href="${loc.url}" style="flex:1;text-align:center;padding:6px 10px;background:#10b981;color:white;border-radius:8px;text-decoration:none;font-size:12px;font-weight:600;">Detail</a>
                            <a href="${loc.google_maps_url}" target="_blank" style="flex:1;text-align:center;padding:6px 10px;background:#3b82f6;color:white;border-radius:8px;text-decoration:none;font-size:12px;font-weight:600;">Navigasi</a>
                        </div>
                    </div>
                </div>
            `);

            const marker = L.marker([loc.latitude, loc.longitude], { icon: icon }).addTo(map);
            marker.bindPopup(popup);
            bounds.push([loc.latitude, loc.longitude]);
        });

        if (bounds.length > 0) {
            map.fitBounds(bounds, { padding: [30, 30] });
        }
    });
</script>
@endpush
