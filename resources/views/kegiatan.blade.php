@extends('app')
@section('title')
    Kegiatan
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
    <main class="mt-24 flex w-full flex-col items-center gap-5 overflow-y-auto pb-10">
        <h2 class="mt-10 text-3xl font-bold">Kegiatan Desa Tirto Sari</h2>
        <div class="w-full columns-4 rounded-lg">
            @if ($kegiatan->count() > 0)
                @foreach ($kegiatan as $item)
                    <img class="mx-auto py-4" src="{{ asset('kegiatan/' . $item->gambar) }}" alt="kegiatan">
                @endforeach
            @else
                <di([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required|confirmed',
            'alamat' => 'required'
        ], [
            'name.required' => 'Nama perlu diisi',
            'username.required' => 'Username perlu diisi',
            'password.required' => 'Password perlu diisi',
            'password.confirmed' => 'Password tidak sama',
            'alamat.required' => 'Alamat perlu diisi'
        ]); class="w-full h-[calc(100%_-_193px)] absolute flex items-center justify-center">
                    <span class="font-bold text-xl">Belum Ada Kegiatan</span>
                </di>
            @endif
            {{-- <img class="mx-auto my-4" src="{{ asset('data/img/kegiatan/1.jpg') }}" alt="kegiatan">
            <img class="mx-auto my-4" src="{{ asset('data/img/kegiatan/2.jpg') }}" alt="kegiatan">
            <img class="mx-auto my-4" src="{{ asset('data/img/kegiatan/3.jpg') }}" alt="kegiatan">
            <img class="mx-auto my-4" src="{{ asset('data/img/kegiatan/4.jpg') }}" alt="kegiatan">
            <img class="mx-auto my-4" src="{{ asset('data/img/kegiatan/5.jpg') }}" alt="kegiatan">
            <img class="mx-auto my-4" src="{{ asset('data/img/kegiatan/6.jpg') }}" alt="kegiatan">
            <img class="mx-auto my-4" src="{{ asset('data/img/kegiata/7.jpg') }}" alt="kegiatan">
            <img class="mx-auto my-4" src="{{ asset('data/img/kegiatan/8.jpg') }}" alt="kegiatan">
            <img class="mx-auto my-4" src="{{ asset('data/img/kegiatan/9.jpg') }}" alt="kegiatan">
            <img class="mx-auto my-4" src="{{ asset('data/img/kegiatan/10.jpg') }}" alt="kegiatan">
            <img class="mx-auto my-4" src="{{ asset('data/img/kegiatan/11.jpg') }}" alt="kegiatan">
            <img class="mx-auto my-4" src="{{ asset('data/img/kegiatan/12.jpg') }}" alt="kegiatan"> --}}
        </div>
    </main>
@endsection
