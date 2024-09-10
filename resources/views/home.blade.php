@extends('app')
@section('title')
    Kantor Desa Tirto Sari
@endsection
@section('pages')
    <header class="absolute top-0 z-50 flex h-24 w-full items-center justify-center">
        {{-- animate-[opacity_1.5s_2.9s_forwards] --}}
        <nav class="opacity-1 relative grid h-16 w-[98%] grid-cols-3 grid-rows-1 items-center gap-28">
            <div class="relative flex h-16 w-[98%] animate-[opacity_1.5s_2.9s_forwards] items-center gap-3 opacity-0">
                <figure class="h-full">
                    <img src="{{ asset('data/img/logo.png') }}" alt="logo" class="h-full">
                </figure>
                <div>
                    <h2 class="text-xl font-semibold">Desa Tirto Sari</h2>
                    <p>Kabupaten Banyuasin</p>
                </div>
            </div>
            <div class="flex animate-[opacity_1.5s_2.9s_forwards] gap-14 text-lg opacity-0">
                @if ($sejarah && $sejarah->sejarah != null)
                    <a href="{{ route('sejarah') }}"
                        class="relative before:absolute before:-bottom-1 before:left-1/2 before:h-0.5 before:w-0 before:-translate-x-1/2 before:bg-[#282A2B] before:transition-[width] before:content-[''] hover:before:w-full">Sejarah</a>
                @endif
                <a href="{{ route('kegiatan') }}"
                    class="relative before:absolute before:-bottom-1 before:left-1/2 before:h-0.5 before:w-0 before:-translate-x-1/2 before:bg-[#282A2B] before:transition-[width] before:content-[''] hover:before:w-full">Kegiatan</a>
                <a href="{{ route('location') }}"
                    class="relative before:absolute before:-bottom-1 before:left-1/2 before:h-0.5 before:w-0 before:-translate-x-1/2 before:bg-[#282A2B] before:transition-[width] before:content-[''] hover:before:w-full">Lokasi</a>
            </div>
        </nav>
    </header>
    <main class="w-full bg-[#FEFAF6]">
        <div class="flex h-screen w-full">
            <section class="flex w-full items-center justify-center">
                <div class="flex flex-col gap-4">
                    <div class="flex max-w-[700px] flex-col gap-1.5">
                        <h2 class="animate-[opacity_1.5s_.8s_forwards] text-2xl font-bold opacity-0">Selamat Datang di
                            Website Desa Tirto Sari</h2>
                        <p class="animate-[opacity_1.5s_1.5s_forwards] opacity-0">Temukan informasi terbaru, kegiatan
                            komunitas, layanan publik,</p>
                        <p class="animate-[opacity_1.5s_1.5s_forwards] opacity-0"> dan keindahan desa kami di sini.</p>
                    </div>
                    <div class="flex gap-3.5">
                        <a href="{{ route('login') }}"
                            class="pointer-events-none relative animate-[opacity_1.5s_2.2s_forwards] overflow-hidden bg-teal-500 px-5 py-2 font-semibold text-white opacity-0 shadow-md before:absolute before:-left-2 before:-top-2 before:h-5 before:w-5 before:scale-[0] before:rounded-full before:bg-white/20 before:transition-[transform] before:duration-[.4s] before:content-[''] hover:before:scale-[10]">Masuk</a>
                        <a href="{{ route('register') }}"
                            class="pointer-events-none relative animate-[opacity_1.5s_2.2s_forwards] overflow-hidden bg-blue-500 px-5 py-2 font-semibold text-white opacity-0 shadow-md before:absolute before:-left-2 before:-top-2 before:h-5 before:w-5 before:scale-[0] before:rounded-full before:bg-white/20 before:transition-[transform] before:duration-[.4s] before:content-[''] hover:before:scale-[10]">Daftar</a>
                    </div>
                </div>
            </section>
            <aside class="relative h-full w-full max-w-[640px] overflow-hidden">
                <figure class="absolute flex h-full w-full animate-[opacity_1.5s_2.9s_forwards] justify-center opacity-0">
                    <img src="{{ asset('data/img/gambar.jpg') }}" alt="gambar"
                        class="absolute h-full h-full object-cover">
                </figure>
            </aside>

        </div>
    </main>
@endsection
