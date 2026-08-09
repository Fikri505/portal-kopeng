@extends('layouts.app')

@section('title', $tourism->name)
@section('meta_description', Str::limit(strip_tags($tourism->description), 160))

@section('content')
    {{-- Breadcrumb --}}
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <nav class="flex items-center gap-2 text-sm text-gray-500">
                <a href="{{ route('home') }}" class="hover:text-blue-600">Beranda</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <a href="{{ route('wisata.index') }}" class="hover:text-blue-600">Wisata</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="text-gray-800 font-medium truncate">{{ $tourism->name }}</span>
            </nav>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Main Content --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Image --}}
                <div class="aspect-[16/9] rounded-2xl overflow-hidden bg-gray-100 shadow-sm">
                    @if($tourism->image)
                        <img src="{{ asset('storage/' . $tourism->image) }}" alt="{{ $tourism->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-gray-300">
                            <svg class="w-16 h-16 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                            </svg>
                            <span class="text-sm">Belum ada gambar</span>
                        </div>
                    @endif
                </div>

                {{-- Info --}}
                <div>
                    @if($tourism->category)
                        <span class="inline-block text-xs font-medium text-blue-600 bg-blue-50 px-3 py-1 rounded-full mb-3">{{ $tourism->category->name }}</span>
                    @endif
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">{{ $tourism->name }}</h1>

                    @if($tourism->description)
                        <div class="prose prose-gray max-w-none text-gray-600 leading-relaxed">
                            {!! nl2br(e($tourism->description)) !!}
                        </div>
                    @endif
                </div>

                {{-- Facilities --}}
                @if($tourism->facilities)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                    <h3 class="font-semibold text-gray-900 mb-3">Fasilitas</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach(explode(',', $tourism->facilities) as $facility)
                            <span class="inline-block text-sm bg-gray-100 text-gray-700 px-3 py-1.5 rounded-lg">{{ trim($facility) }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

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

                    @if($tourism->ticket_price)
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-gray-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                        </svg>
                        <div>
                            <p class="text-xs text-gray-400 mb-0.5">Harga Tiket</p>
                            <p class="text-sm font-semibold text-blue-600">{{ $tourism->ticket_price }}</p>
                        </div>
                    </div>
                    @endif

                    @if($tourism->address)
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-gray-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                        <div>
                            <p class="text-xs text-gray-400 mb-0.5">Alamat</p>
                            <p class="text-sm text-gray-700">{{ $tourism->address }}</p>
                        </div>
                    </div>
                    @endif

                    @if($tourism->opening_hours)
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-gray-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <p class="text-xs text-gray-400 mb-0.5">Jam Buka</p>
                            <p class="text-sm text-gray-700">{{ $tourism->opening_hours }}</p>
                        </div>
                    </div>
                    @endif

                    @if($tourism->phone)
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-gray-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <div>
                            <p class="text-xs text-gray-400 mb-0.5">Telepon</p>
                            <p class="text-sm text-gray-700">{{ $tourism->phone }}</p>
                        </div>
                    </div>
                    @endif

                    @if($tourism->instagram)
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-gray-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <rect x="2" y="2" width="20" height="20" rx="5" stroke-width="2"/>
                            <circle cx="12" cy="12" r="5" stroke-width="2"/>
                            <circle cx="17.5" cy="6.5" r="1.5" fill="currentColor"/>
                        </svg>
                        <div>
                            <p class="text-xs text-gray-400 mb-0.5">Instagram</p>
                            <p class="text-sm text-gray-700">{{ $tourism->instagram }}</p>
                        </div>
                    </div>
                    @endif
                </div>

                {{-- Action Button --}}
                <a href="{{ $tourism->google_maps_url }}" target="_blank" class="flex items-center justify-center gap-2 w-full py-3 bg-blue-500 text-white rounded-xl font-semibold hover:bg-blue-600 transition-colors" id="gmaps-btn">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                    Buka di Google Maps
                </a>
            </div>
        </div>

        {{-- Related --}}
        @if($related->count() > 0)
        <div class="mt-12 md:mt-16">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Wisata Lainnya</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($related as $item)
                    @include('partials.card-wisata', ['item' => $item])
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
        const lat = {{ $tourism->latitude }};
        const lng = {{ $tourism->longitude }};
        const map = L.map('detail-map').setView([lat, lng], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            maxZoom: 19,
        }).addTo(map);

        L.marker([lat, lng]).addTo(map)
            .bindPopup('<strong>{{ $tourism->name }}</strong><br>{{ $tourism->address }}')
            .openPopup();
    });
</script>
@endpush
