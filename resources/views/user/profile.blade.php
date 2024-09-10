@extends('app')
@section('title')
    Profile
@endsection
@section('pages')
    <main class="flex h-screen w-full">
        @include('component.user.sidebar')
        <div class="flex-1 overflow-y-auto">
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
            <div class="w-full p-8">
                <div class="h-full w-full p-2">
                    <h2 class="text-2xl font-semibold">Profile</h2>
                </div>
                <div class="gap-4 p-3">
                    <form action="{{ route('user.profile') }}" method="POST" class="grid-rows-8 grid grid-cols-6 gap-5"
                        enctype="multipart/form-data">
                        @csrf
                        <label for="email" class="relative left-0 col-span-3 flex h-max w-full flex-col">
                            <input type="email" id="email" name="email" placeholder="" value="{{ Auth::user()->email }}"
                                autocomplete="off" class="@error('email') border border-red-500 focus:outline-red-500 text-red-500 @endif peer w-72 w-full rounded-md border border-black/30 p-2">
                            <span
                                class="@error('email') text-red-500 @endif absolute -top-2 left-2 h-max w-max bg-white px-0.5 text-xs transition-[font,inset] peer-placeholder-shown:inset-y-2 peer-placeholder-shown:text-base peer-focus:-top-2 peer-focus:text-xs">Email</span>
                            @error('email')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </label>
                        <label for="nama" class="relative left-0 col-span-3 flex h-max w-full flex-col">
                            <input type="text" id="nama" name="nama" placeholder="" value="{{ Auth::user()->name }}"
                                autocomplete="off" class="@error('nama') border border-red-500 focus:outline-red-500 text-red-500 @endif peer w-72 w-full rounded-md border border-black/30 p-2">
                            <span
                                class="@error('nama') text-red-500 @endif absolute -top-2 left-2 h-max w-max bg-white px-0.5 text-xs transition-[font,inset] peer-placeholder-shown:inset-y-2 peer-placeholder-shown:text-base peer-focus:-top-2 peer-focus:text-xs">Nama</span>
                            @error('nama')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </label>
                        <label for="pekerjaan" class="relative left-0 col-span-3 flex h-max w-full flex-col">
                            <input type="text" id="pekerjaan" name="pekerjaan" placeholder=""
                                value="{{ old('pekerjaan', isset($user->pekerjaan) ? $user->pekerjaan : '') }}"
                                autocomplete="off"
                                class="@error('pekerjaan') border border-red-500 focus:outline-red-500 text-red-500 @endif peer w-72 w-full rounded-md border border-black/30 p-2">
                            <span
                                class="@error('pekerjaan') text-red-500 @endif absolute -top-2 left-2 h-max w-max bg-white px-0.5 text-xs transition-[font,inset] peer-placeholder-shown:inset-y-2 peer-placeholder-shown:text-base peer-focus:-top-2 peer-focus:text-xs">Pekerjaan</span>
                            @error('pekerjaan')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror </label> <label for="ponsel"
                                class="relative left-0 col-span-3 flex h-max w-full flex-col">
                            <input type="text" id="ponsel" name="ponsel" placeholder="" maxlength="13"
                                value="{{ old('ponsel', isset($user->ponsel) ? $user->ponsel : '08') }}"
                                autocomplete="off" class="@error('ponsel') border border-red-500 focus:outline-red-500 text-red-500 @endif peer w-72 w-full rounded-md border border-black/30 p-2">
                            <span
                                class="@error('ponsel') text-red-500 @endif absolute -top-2 left-2 h-max w-max bg-white px-0.5 text-xs transition-[font,inset] peer-placeholder-shown:inset-y-2 peer-placeholder-shown:text-base peer-focus:-top-2 peer-focus:text-xs">Ponsel</span>
                            @error('ponsel')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </label>
                        <label for="nik" class="relative left-0 col-span-3 flex h-max w-full flex-col">
                            <input type="text" id="nik" name="nik" placeholder="" maxlength="16"
                                value="{{ old('nik', isset($user->nik) ? $user->nik : '') }}" autocomplete="off"
                                class="@error('nik') border border-red-500 focus:outline-red-500 text-red-500 @endif peer w-72 w-full rounded-md border border-black/30 p-2">
                            <span
                                class="@error('nik') text-red-500 @endif absolute -top-2 left-2 h-max w-max bg-white px-0.5 text-xs transition-[font,inset] peer-placeholder-shown:inset-y-2 peer-placeholder-shown:text-base peer-focus:-top-2 peer-focus:text-xs">Nik</span>
                            @error('nik')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </label>
                        <label for="agama" class="relative left-0 col-span-3 flex h-max w-full flex-col">
                            <select name="agama" id="agama" class="@error('agama') border border-red-500 focus:outline-red-500 text-red-500 @endif h-full rounded-md border border-black/30 p-2">
                                <option value="" {{ is_null($user) || empty($user->agama) ? 'selected' : '' }}>
                                    Agama</option>
                                <option value="Islam"
                                    {{ old('agama') == 'Islam' || (!is_null($user) && $user->agama == 'Islam') ? 'selected' : '' }}>
                                    Islam</option>
                                <option value="Kristen"
                                    {{ old('agama') == 'Kristen' || (!is_null($user) && $user->agama == 'Kristen') ? 'selected' : '' }}>
                                    Kristen
                                </option>
                                <option value="Katolik"
                                    {{ old('agama') == 'Katolik' || (!is_null($user) && $user->agama == 'Katolik') ? 'selected' : '' }}>
                                    Katolik
                                </option>
                                <option value="Hindu"
                                    {{ old('agama') == 'Hindu' || (!is_null($user) && $user->agama == 'Hindu') ? 'selected' : '' }}>
                                    Hindu</option>
                                <option value="Buddha"
                                    {{ old('agama') == 'Buddha' || (!is_null($user) && $user->agama == 'Buddha') ? 'selected' : '' }}>
                                    Buddha</option>
                                <option value="Khonghucu"
                                    {{ old('agama') == 'Khonghucu' || (!is_null($user) && $user->agama == 'Khonghucu') ? 'selected' : '' }}>
                                    Khonghucu
                                </option>
                            </select>
                            @error('agama')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </label>
                        <label for="tempat_lahir" class="relative left-0 col-span-2 flex h-max w-full flex-col">
                            <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder=""
                                value="{{ old('tempat_lahir', isset($user->tempat_lahir) ? $user->tempat_lahir : '') }}"
                                autocomplete="off" class="@error('tempat_lahir') border border-red-500 focus:outline-red-500 text-red-500 @endif peer w-72 w-full rounded-md border border-black/30 p-2">
                            <span
                                class="@error('tempat_lahir') text-red-500 @endif absolute -top-2 left-2 h-max w-max bg-white px-0.5 text-xs transition-[font,inset] peer-placeholder-shown:inset-y-2 peer-placeholder-shown:text-base peer-focus:-top-2 peer-focus:text-xs">Tempat
                                Lahir</span>
                            @error('tempat_lahir')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </label>
                        <label for="jenis_kelamin" class="relative left-0 col-span-2 flex h-max w-full flex-col">
                            <select name="jenis_kelamin" id="jenis_kelamin"
                                class="@error('jenis_kelamin') border border-red-500 focus:outline-red-500 text-red-500 @endif h-full rounded-md border border-black/30 p-2">
                                <option value=""
                                    {{ is_null($user) || empty($user->jenis_kelamin) ? 'selected' : '' }}>Jenis Kelamin
                                </option>
                                <option value="Laki-Laki"
                                    {{ old('jenis_kelamin') === 'Laki-Laki' || (!is_null($user) && $user->jenis_kelamin == 'Laki-Laki') ? 'selected' : '' }}>
                                    Laki-Laki</option>
                                <option value="Perempuan"
                                    {{ old('jenis_kelamin') === 'Perempuan' || (!is_null($user) && $user->jenis_kelamin == 'Perempuan') ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </label>
                        <label for="tanggal_lahir" class="relative left-0 col-span-2 flex h-max w-full flex-col">
                            <input type="date" max="2010-12-31" id="tanggal_lahir" name="tanggal_lahir"
                                placeholder=""
                                value="{{ old('tanggal_lahir', isset($user->tanggal_lahir) ? $user->tanggal_lahir : '') }}"
                                autocomplete="off" class="@error('tanggal_lahir') border border-red-500 focus:outline-red-500 text-red-500 @endif peer w-72 w-full rounded-md border border-black/30 p-2">
                            <span
                                class="@error('tanggal_lahir') text-red-500 @endif absolute -top-2 left-2 h-max w-max bg-white px-0.5 text-xs transition-[font,inset] peer-placeholder-shown:inset-y-2 peer-placeholder-shown:text-base peer-focus:-top-2 peer-focus:text-xs">Tanggal
                                Lahir</span>
                            @error('tanggal_lahir')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </label>
                        <label for="alamat"
                            class="relative left-0 col-span-6 row-span-4 flex h-full h-full w-full flex-col">
                            <textarea name="alamat" id="alamat" class="@error('alamat') border border-red-500 focus:outline-red-500 text-red-500 @endif peer h-full w-full rounded-md border border-black/30 p-2"
                                placeholder="">{{ old('alamat', isset($user->alamat) ? $user->alamat : '') }}</textarea>
                            <span
                                class="@error('alamat') text-red-500 @endif absolute -top-2 left-2 h-max w-max bg-white px-0.5 text-xs transition-[font,inset] peer-placeholder-shown:inset-y-2 peer-placeholder-shown:text-base peer-focus:-top-2 peer-focus:text-xs">Alamat</span>
                            @error('alamat')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </label>
                        <div class="col-span-6 flex justify-start">
                            <button type="submit"
                                class="w-full rounded-md bg-teal-500 px-4 py-2 font-bold text-white">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </main>

    <script>
        document.getElementById('ponsel').addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        document.getElementById('nik').addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
@endsection
