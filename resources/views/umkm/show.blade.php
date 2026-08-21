@extends('layouts.app')

@section('title', $umkm->name)
@section('meta_description', Str::limit(strip_tags($umkm->description), 160))

@section('content')
    {{-- Breadcrumb --}}
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <nav class="flex items-center gap-2 text-sm text-gray-500">
                <a href="{{ route('home') }}" class="hover:text-primary-600">Beranda</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <a href="{{ route('umkm.index') }}" class="hover:text-primary-600">UMKM</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="text-gray-800 font-medium truncate">{{ $umkm->name }}</span>
            </nav>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Main Content --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Image --}}
                <div class="aspect-[16/9] rounded-2xl overflow-hidden bg-gray-100 shadow-sm">
                    @if($umkm->image)
                        <img src="{{ $umkm->image_url }}" alt="{{ $umkm->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-gray-300">
                            <svg class="w-16 h-16 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            <span class="text-sm">Belum ada gambar</span>
                        </div>
                    @endif
                </div>

                {{-- Info --}}
                <div>
                    @if($umkm->category)
                        <span class="inline-block text-xs font-medium text-primary-600 bg-primary-50 px-3 py-1 rounded-full mb-3">{{ $umkm->category->name }}</span>
                    @endif
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">{{ $umkm->name }}</h1>

                    @if($umkm->description)
                        <div class="prose prose-gray max-w-none text-gray-600 leading-relaxed">
                            {!! nl2br(e($umkm->description)) !!}
                        </div>
                    @endif
                </div>

                {{-- Map --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div id="detail-map" class="w-full h-[300px]"></div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-5">
                {{-- Info Card --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 space-y-4">
                    <h3 class="font-semibold text-gray-900">Informasi</h3>

                    @if($umkm->address)
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-gray-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                        <div>
                            <p class="text-xs text-gray-400 mb-0.5">Alamat</p>
                            <p class="text-sm text-gray-700">{{ $umkm->address }}</p>
                        </div>
                    </div>
                    @endif

                    @if($umkm->opening_hours)
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-gray-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <p class="text-xs text-gray-400 mb-0.5">Jam Buka</p>
                            <p class="text-sm text-gray-700">{{ $umkm->opening_hours }}</p>
                        </div>
                    </div>
                    @endif

                    @if($umkm->instagram)
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-gray-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <rect x="2" y="2" width="20" height="20" rx="5" stroke-width="2"/>
                            <circle cx="12" cy="12" r="5" stroke-width="2"/>
                            <circle cx="17.5" cy="6.5" r="1.5" fill="currentColor"/>
                        </svg>
                        <div>
                            <p class="text-xs text-gray-400 mb-0.5">Instagram</p>
                            <p class="text-sm text-gray-700">{{ $umkm->instagram }}</p>
                        </div>
                    </div>
                    @endif
                </div>

                {{-- Action Buttons --}}
                <div class="space-y-3">
                    @if($umkm->whatsapp_url)
                    <a href="{{ $umkm->whatsapp_url }}" target="_blank" class="flex items-center justify-center gap-2 w-full py-3 bg-green-500 text-white rounded-xl font-semibold hover:bg-green-600 transition-colors" id="whatsapp-btn">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        Hubungi via WhatsApp
                    </a>
                    @endif

                    <a href="{{ $umkm->google_maps_url }}" target="_blank" class="flex items-center justify-center gap-2 w-full py-3 bg-blue-500 text-white rounded-xl font-semibold hover:bg-blue-600 transition-colors" id="gmaps-btn">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                        </svg>
                        Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>

        {{-- Related --}}
        @if($related->count() > 0)
        <div class="mt-12 md:mt-16">
            <h2 class="text-xl font-bold text-gray-900 mb-6">UMKM Lainnya</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($related as $item)
                    @include('partials.card-umkm', ['item' => $item])
                @endforeach
            </div>
        </div>
        @endif
    </div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lat = {{ $umkm->latitude }};
        const lng = {{ $umkm->longitude }};
        const map = L.map('detail-map').setView([lat, lng], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            maxZoom: 19,
        }).addTo(map);

        L.marker([lat, lng]).addTo(map)
            .bindPopup('<strong>{{ $umkm->name }}</strong><br>{{ $umkm->address }}')
            .openPopup();
    });
</script>
@endpush
