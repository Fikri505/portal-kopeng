<a href="{{ route('wisata.show', $item->slug) }}" class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg hover:border-blue-200 transition-all duration-300" id="wisata-card-{{ $item->id }}">
    <div class="aspect-[4/3] bg-gray-100 overflow-hidden">
        @if($item->image)
            <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        @else
            <div class="w-full h-full flex flex-col items-center justify-center text-gray-300 bg-gradient-to-br from-blue-50 to-gray-100">
                <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                </svg>
                <span class="text-xs">Belum ada gambar</span>
            </div>
        @endif
    </div>
    <div class="p-4">
        @if($item->category)
            <span class="inline-block text-xs font-medium text-blue-600 bg-blue-50 px-2.5 py-1 rounded-full mb-2">
                {{ $item->category->name }}
            </span>
        @endif
        <h3 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors line-clamp-1 mb-1">
            {{ $item->name }}
        </h3>
        @if($item->ticket_price)
            <p class="text-sm font-medium text-blue-600 mb-1">{{ $item->ticket_price }}</p>
        @endif
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
