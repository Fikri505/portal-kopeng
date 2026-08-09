@extends('layouts.app')

@section('title', 'Wisata Desa Kopeng')
@section('meta_description', 'Daftar destinasi wisata di Desa Kopeng. Temukan wisata alam, agrowisata, dan destinasi menarik lainnya.')

@section('content')
    {{-- Header --}}
    <section class="bg-gradient-to-r from-blue-700 to-blue-900 text-white py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl md:text-4xl font-bold mb-2">Wisata Desa Kopeng</h1>
            <p class="text-blue-200 text-lg">Jelajahi keindahan alam dan destinasi wisata Desa Kopeng</p>
        </div>
    </section>

    {{-- Search & Filter --}}
    <section class="bg-white border-b border-gray-100 sticky top-16 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <form method="GET" action="{{ route('wisata.index') }}" class="flex flex-col sm:flex-row gap-3" id="wisata-filter-form">
                <div class="flex-1 relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari wisata..." class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm" id="wisata-search-input">
                </div>
                <select name="category" class="px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white" id="wisata-category-filter" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="px-6 py-2.5 bg-blue-600 text-white rounded-xl text-sm font-semibold hover:bg-blue-700 transition-colors" id="wisata-search-btn">
                    Cari
                </button>
            </form>
        </div>
    </section>

    {{-- Results --}}
    <section class="py-10 md:py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($tourisms->count() > 0)
                <p class="text-sm text-gray-500 mb-6">Menampilkan {{ $tourisms->total() }} destinasi wisata</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($tourisms as $tourism)
                        @include('partials.card-wisata', ['item' => $tourism])
                    @endforeach
                </div>
                <div class="mt-10">
                    {{ $tourisms->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-500 mb-1">Tidak ada hasil</h3>
                    <p class="text-gray-400">Coba ubah kata kunci atau filter pencarian Anda.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
