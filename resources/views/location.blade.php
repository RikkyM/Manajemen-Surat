@extends('app')
@section('title')
    Lokasi
@endsection
@section('pages')
    <header class="absolute top-0 z-50 flex h-24 w-full items-center justify-center">
        <nav class="relative flex h-16 w-[98%] items-center justify-between">
            <a href="{{ route('home') }}" class="relative inline-block flex h-16 items-center gap-3">
                <figure class="h-full">
                    <img src="{{ asset('data/img/logo.png') }}" alt="logo" class="h-full">
                </figure>
                <div>
                    <h2 class="text-xl font-semibold">Desa Tirto Sari</h2>
                    <p>Kabupaten Banyuasin</p>
                </div>
            </a>
            <div class="flex gap-14 text-lg">
                @if ($sejarah && $sejarah->sejarah != null)
                    <a href="{{ route('sejarah') }}"
                        class="relative before:absolute before:-bottom-1 before:left-1/2 before:h-0.5 before:w-0 before:-translate-x-1/2 before:bg-[#282A2B] before:transition-[width] before:content-[''] hover:before:w-full">Sejarah</a>
                @endif
                <a href="{{ route('kegiatan') }}"
                    class="relative before:absolute before:-bottom-1 before:left-1/2 before:h-0.5 before:w-0 before:-translate-x-1/2 before:bg-[#282A2B] before:transition-[width] before:content-[''] hover:before:w-full">Kegiatan</a>
                <a href="{{ route('location') }}"
                    class="relative before:absolute before:-bottom-1 before:left-1/2 before:h-0.5 before:w-0 before:-translate-x-1/2 before:bg-[#282A2B] before:transition-[width] before:content-[''] hover:before:w-full">Lokasi</a>
            </div>
            <div class="flex gap-3.5">
                <a href="{{ route('login') }}"
                    class="relative overflow-hidden bg-teal-500 px-5 py-2 font-semibold text-white shadow-md before:absolute before:-left-2 before:-top-2 before:h-5 before:w-5 before:scale-[0] before:rounded-full before:bg-white/20 before:transition-[transform] before:duration-[.4s] before:content-[''] hover:before:scale-[10]">Masuk</a>
                <a href="{{ route('register') }}"
                    class="relative overflow-hidden bg-blue-500 px-5 py-2 font-semibold text-white shadow-md before:absolute before:-left-2 before:-top-2 before:h-5 before:w-5 before:scale-[0] before:rounded-full before:bg-white/20 before:transition-[transform] before:duration-[.4s] before:content-[''] hover:before:scale-[10]">Daftar</a>
            </div>
        </nav>
    </header>
    <main class="mt-24 flex w-full flex-col items-center gap-5 overflow-y-auto">
        <h2 class="mt-10 text-3xl font-bold">Lokasi Kantor Desa Tirto Sari</h2>
        <div id="map" class="h-[500px] w-full max-w-[900px] rounded-lg border border-black"></div>
    </main>

    <style>
        .leaflet-control-attribution {
            display: none;
        }
    </style>

    <script>
        var map = L.map('map', {
            center: [-2.9550488910426664, 104.96862270076114],
            zoom: 12
        });

        var tiles = new L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        var marker = L.marker(
            [-2.9550488910426664, 104.96862270076114], {
                title: ""
            });

        marker.addTo(map).bindPopup(
            "<p><b>Kantor Desa Tirto Sari</b><br></p>"
        ).openPopup();
    </script>
@endsection
