@extends('app')
@section('title')
    Ganti Kata Sandi
@endsection
@section('pages')
    <main class="flex h-screen w-full">
        @include('component.user.sidebar')
        @if (Session::has('message'))
            <div class="absolute right-8 top-8 rounded-md bg-[#96C65E] px-4 py-2 font-semibold text-white">
                <p>{{ Session::get('message') }}</p>
            </div>
        @endif
        @if (Session::has('error'))
            <div class="absolute right-8 top-8 rounded-md bg-red-500 px-4 py-2 font-semibold text-white">
                <p>{{ Session::get('error') }}</p>
            </div>
        @endif
        <div class="relative flex-1 overflow-y-auto">
            <div class="w-full p-8">
                <div class="h-full w-full p-2">
                    <h2 class="text-2xl font-semibold">Ubah Kata Sandi</h2>
                </div>
                <div class="my-2">
                    <ol class="flex w-max overflow-hidden rounded-lg border border-gray-200 text-gray-600">
                        <li class="flex items-center">
                            <a href="{{ route('user.dashboard') }}"
                                class="flex h-10 items-center gap-1.5 bg-gray-100 px-4 transition hover:text-gray-900">
                                <span class="ms-1.5 text-xs font-medium"> Dashboard </span>
                            </a>
                        </li>

                        <li class="relative flex items-center">
                            <span
                                class="absolute inset-y-0 -start-px h-10 w-4 bg-gray-100 [clip-path:_polygon(0_0,_0%_100%,_100%_50%)] rtl:rotate-180">
                            </span>

                            <span
                                class="flex h-10 select-none items-center bg-white pe-4 ps-8 text-xs font-medium transition hover:text-gray-900">
                                Ubah Sandi
                            </span>
                        </li>
                    </ol>
                </div>
                <div class="flex items-center justify-center py-10">
                    <div class="rounded-md border p-5">
                        <div class="mb-10 w-full">
                            <h2 class="text-center text-xl font-bold">Masukkan Kata Sandi Baru</h2>
                        </div>
                        <form action="{{ route('user.sandi') }}" method="POST" class="grid grid-cols-1 gap-5">
                            @csrf
                            <label for="old_password" class="relative left-0 col-span-4 flex h-max w-full flex-col">
                                <input type="password" id="old_password" name="old_password" placeholder=""
                                    autocomplete="off" class="peer w-72 w-full rounded-md border border-black/30 p-2">
                                <span
                                    class="absolute -top-2 left-2 h-max w-max bg-white px-0.5 text-xs transition-[font,inset] peer-placeholder-shown:inset-y-2 peer-placeholder-shown:text-base peer-focus:-top-2 peer-focus:text-xs">Kata
                                    Sandi Lama</span>
                                @error('old_password')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </label>
                            <label for="password" class="relative left-0 col-span-4 flex h-max w-full flex-col">
                                <input type="password" id="password" name="password" placeholder="" autocomplete="off"
                                    class="peer w-72 w-full rounded-md border border-black/30 p-2">
                                <span
                                    class="absolute -top-2 left-2 h-max w-max bg-white px-0.5 text-xs transition-[font,inset] peer-placeholder-shown:inset-y-2 peer-placeholder-shown:text-base peer-focus:-top-2 peer-focus:text-xs">Kata
                                    Sandi Baru</span>
                                @error('password')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </label>
                            <label for="password_confirmation"
                                class="relative left-0 col-span-4 flex h-max w-full flex-col">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    placeholder="" autocomplete="off"
                                    class="peer w-72 w-full rounded-md border border-black/30 p-2">
                                <span
                                    class="absolute -top-2 left-2 h-max w-max bg-white px-0.5 text-xs transition-[font,inset] peer-placeholder-shown:inset-y-2 peer-placeholder-shown:text-base peer-focus:-top-2 peer-focus:text-xs">Konfirmasi
                                    Kata Sandi</span>
                                @error('password_confirmation')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </label>
                            <div class="relative col-span-4 flex h-max w-full flex-col">
                                <button type="submit"
                                    class="w-full rounded-md bg-green-500 py-2 font-bold text-white">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
