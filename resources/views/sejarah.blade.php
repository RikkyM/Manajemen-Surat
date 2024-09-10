@extends('app')
@section('title')
    Sejarah
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
                <a href="{{ route('sejarah') }}"
                    class="relative before:absolute before:-bottom-1 before:left-1/2 before:h-0.5 before:w-0 before:-translate-x-1/2 before:bg-[#282A2B] before:transition-[width] before:content-[''] hover:before:w-full">Sejarah</a>
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

    <main class="mt-24 flex w-full flex-col items-center gap-5 overflow-y-auto pb-24">
        <div class="mt-10 flex w-full max-w-[1300px] justify-center gap-4">
            <img src="{{ asset('sejarah/' . $sejarah->gambar) }}" alt="gambar" class="w-full max-w-[700px] max-h-[500px]">
            <div class="flex w-full max-w-[1000px] max-h-[500px]  flex-col items-center gap-5 text-ellipsis">
                <h2 class="text-3xl font-bold">Sejarah Desa Tirto Sari</h2>
                <div class="h-full pt-5 max-w-[600px] overflow-hidden">
                    <p class="text-justify leading-9 break-words">{{ $sejarah->sejarah }}</p>
                </div>
            </div>
        </div>
        <div class="mt-10 flex w-full max-w-[1300px] justify-center gap-4">
            <div class="mt-5 flex flex-col w-full max-w-[1300px] justify-center gap-4">
                <h2 class="text-2xl font-bold">Visi</h2>
                @foreach (json_decode($sejarah->visi) as $item)
                    <p class="break-words">{{ $item }}</p>
                @endforeach
            </div>
        </div>
        <div class="flex w-full max-w-[1300px] justify-center gap-4">
            <div class="mt-5 flex flex-col w-full max-w-[1300px] justify-center gap-4">
                <h2 class="text-2xl font-bold">Misi</h2>
                @foreach (json_decode($sejarah->misi) as $item)
                    <p>{{ $item }}</p>
                @endforeach
            </div>
        </div>
    </main>
@endsection
