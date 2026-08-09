<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Portal informasi UMKM dan Wisata Desa Kopeng, Kecamatan Getasan, Kabupaten Semarang. Temukan kuliner, kerajinan, dan destinasi wisata menarik.')">
    <title>@yield('title', 'Portal UMKM & Wisata') — Desa Kopeng</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Leaflet CSS --}}
    @stack('styles')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-gray-50 text-gray-800 antialiased">
    {{-- Navigation --}}
    @include('partials.navbar')

    {{-- Main Content --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    @stack('scripts')
</body>
</html>
