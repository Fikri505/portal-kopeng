<footer class="bg-gray-900 text-gray-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Brand --}}
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <div
                        class="w-9 h-9 bg-gradient-to-br from-primary-500 to-primary-700 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <span class="text-lg font-bold text-white">Portal Kopeng</span>
                </div>
                <p class="text-sm text-gray-400 leading-relaxed">
                    Portal informasi UMKM dan destinasi wisata Desa Kopeng, Kecamatan Getasan, Kabupaten Semarang, Jawa
                    Tengah.
                </p>
            </div>

            {{-- Links --}}
            <div>
                <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Navigasi</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}"
                            class="text-sm text-gray-400 hover:text-primary-400 transition-colors">Beranda</a></li>
                    <li><a href="{{ route('umkm.index') }}"
                            class="text-sm text-gray-400 hover:text-primary-400 transition-colors">UMKM</a></li>
                    <li><a href="{{ route('wisata.index') }}"
                            class="text-sm text-gray-400 hover:text-primary-400 transition-colors">Wisata</a></li>
                    <li><a href="{{ route('peta') }}"
                            class="text-sm text-gray-400 hover:text-primary-400 transition-colors">Peta</a></li>
                    <li><a href="/admin"
                            class="text-sm text-gray-500 hover:text-primary-400 transition-colors inline-flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            Login Pengelola</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Kontak Desa</h3>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Desa Kopeng, Kec. Getasan, Kab. Semarang, Jawa Tengah
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-10 pt-6 text-center">
            <p class="text-xs text-gray-500">
                &copy; {{ date('Y') }} Portal UMKM & Wisata Desa Kopeng. Dibuat untuk program KKN.
            </p>
        </div>
    </div>
</footer>