@extends('app')
@section('title')
    Login
@endsection
@section('pages')
    <main class="w-full">
        <div class="flex h-screen w-full">
            <section class="flex w-full flex-col items-center justify-center gap-10">
                <div class="max-w-20">
                    <img src="{{ asset('data/img/logo.png') }}" alt="logo" class="object-fill">
                </div>
                <form action="{{ route('login') }}" method="POST"
                    class="grid gap-6 rounded-lg border border-black/30 p-5 shadow-[0_5px_15px_-3px_rgb(0,0,0,0.2),0_4px_6px_-4px_rgb(0,0,0,0.2)]">
                    @csrf
                    <div class="">
                        <h2 class="text-center text-2xl font-bold">Masuk</h2>
                        @if (Session::has('message'))
                            <p class="bg-green-500 py-1.5 text-center font-semibold text-white">
                                {{ Session::get('message') }}</p>
                        @endif
                    </div>
                    <label for="email" class="relative left-0 flex h-max w-max flex-col">
                        <input type="text" id="email" name="email" placeholder="" autocomplete="off"
                            class="@error('email') border-red-500 focus:outline-red-500 text-red-500 @enderror peer w-72 border border-black/30 p-2">
                        <span
                            class="@error('email') text-red-500 @enderror absolute -top-2 left-2 h-max w-max bg-white px-0.5 text-xs transition-[font,inset] peer-placeholder-shown:inset-y-2 peer-placeholder-shown:text-base peer-focus:-top-2 peer-focus:text-xs">Email</span>
                        @error('email')
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </label>
                    <label for="password" class="relative left-0 flex h-max w-max flex-col">
                        <input type="password" id="password" name="password" placeholder="" autocomplete="off"
                            class="@error('password') border-red-500 focus:outline-red-500 text-red-500 @enderror peer w-72 border border-black/30 p-2">
                        <span
                            class="@error('password') text-red-500 @enderror absolute -top-2 left-2 h-max w-max bg-white px-0.5 text-xs transition-[font,inset] peer-placeholder-shown:inset-y-2 peer-placeholder-shown:text-base peer-focus:-top-2 peer-focus:text-xs">Kata
                            Sandi</span>
                        @error('password')
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </label>
                    <div class="flex flex-col items-center justify-center gap-2">
                        <button type="submit"
                            class="relative overflow-hidden rounded-sm bg-teal-500 px-4 py-1 font-semibold text-white before:absolute before:-left-2 before:-top-2 before:h-5 before:w-5 before:scale-[0] before:rounded-full before:bg-white/20 before:transition-[transform] before:duration-[.4s] before:content-[''] hover:before:scale-[10]">Masuk</button>
                        <span class="text-sm">Belum punya akun ? <a href="{{ route('register') }}"
                                class="text-blue-500">Daftar</a></span>

                    </div>
                </form>
            </section>
        </div>
    </main>
@endsection
