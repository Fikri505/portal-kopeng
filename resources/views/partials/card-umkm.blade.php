<a href="{{ route('umkm.show', $item->slug) }}" class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg hover:border-primary-200 transition-all duration-300" id="umkm-card-{{ $item->id }}">
    <div class="aspect-[4/3] bg-gray-100 overflow-hidden">
        @if($item->image)
            <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        @else
            <div class="w-full h-full flex flex-col items-center justify-center text-gray-300 bg-gradient-to-br from-gray-50 to-gray-100">
                <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                <span class="text-xs">Belum ada gambar</span>
            </div>
        @endif
    </div>
    <div class="p-4">
        @if($item->categories && $item->categories->count() > 0)
            <div class="flex flex-wrap gap-1.5 mb-2">
                @foreach($item->categories as $cat)
                    <span class="inline-block text-xs font-medium text-primary-600 bg-primary-50 px-2.5 py-0.5 rounded-full">
                        {{ $cat->name }}
                    </span>
                @endforeach
            </div>
        @endif
        <h3 class="font-semibold text-gray-900 group-hover:text-primary-600 transition-colors line-clamp-1 mb-1">
            {{ $item->name }}
        </h3>
        @if($item->address)
            <p class="text-sm text-gray-400 line-clamp-1 flex items-center gap-1">
                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                </svg>
                {{ $item->address }}
            </p>
        @endif
    </div>
</a>
