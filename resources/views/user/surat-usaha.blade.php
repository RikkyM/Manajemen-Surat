@extends('app')
@section('title')
    Surat Keterangan Usaha
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
        <div class="flex-1 overflow-y-auto">
            <div class="w-full p-8">
                <div class="h-full w-full p-2">
                    <h2 class="text-2xl font-semibold">{{ Auth::user()->name }} - Request</h2>
                    <h2 class="font-semibold text-gray-400">Form Request Permohonan</h2>
                </div>
                <div class="h-full w-full p-2">
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
                                    Surat Keterangan Usaha
                                </span>
                            </li>
                        </ol>
                    </div>
                    <div class="my-2">
                        <h2 class="text-xl font-semibold">Yang Mengajukan:</h2>
                    </div>
                    <div class="grid grid-cols-4 grid-rows-3 gap-3">
                        <div class="col-span-2">
                            <h2 class="text-lg">Nama Lengkap</h2>
                            <span
                                class="my-1 inline-block w-full border bg-slate-100 p-2 text-lg text-slate-500">{{ Auth::user()->name }}</span>
                        </div>
                        <div class="col-span-2">
                            <h2 class="text-lg">Tempat/Tanggal Lahir</h2>
                            <span class="my-1 inline-block w-full border bg-slate-100 p-2 text-lg text-slate-500">
                                @if (isset($user->tempat_lahir) && isset($user->tanggal_lahir))
                                    {{ $user->tempat_lahir }},
                                    {{ date('d-m-Y', strtotime($user->tanggal_lahir)) }}
                                @else
                                    Lengkapi Data Anda
                                @endif
                            </span>
                        </div>
                        <div class="col-span-2">
                            <h2 class="text-lg">Nik</h2>
                            <span class="my-1 inline-block w-full border bg-slate-100 p-2 text-lg text-slate-500">
                                @if (isset($user->nik))
                                    {{ $user->nik }}
                                @else
                                    Lengkapi Data Anda
                                @endif
                            </span>
                        </div>
                        <div class="col-span-2">
                            <h2 class="text-lg">Pekerjaan</h2>
                            <span class="my-1 inline-block w-full border bg-slate-100 p-2 text-lg text-slate-500">
                                @if (isset($user))
                                    {{ $user->pekerjaan }}
                                @else
                                    Lengkapi Data Anda
                                @endif
                            </span>
                        </div>
                        <div class="col-span-2">
                            <h2 class="text-lg">Agama</h2>
                            <span class="my-1 inline-block w-full border bg-slate-100 p-2 text-lg text-slate-500">
                                @if (isset($user))
                                    {{ $user->agama }}
                                @else
                                    Lengkapi Data Anda
                                @endif
                            </span>
                        </div>
                        <div class="col-span-2">
                            <h2 class="text-lg">Jenis Kelamin</h2>
                            <span class="my-1 inline-block w-full border bg-slate-100 p-2 text-lg text-slate-500">
                                @if (isset($user))
                                    {{ $user->jenis_kelamin }}
                                @else
                                    Lengkapi Data Anda
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="my-2">
                        <h2 class="text-xl font-semibold">Lengkapi Form dibawah ini:</h2>
                    </div>
                    <form action="{{ route('user.surat.usaha') }}" method="POST" enctype="multipart/form-data"
                        class="grid-rows-8 grid grid-cols-8 gap-5">
                        @csrf
                        <label for="nama" class="relative left-0 col-span-4 flex h-max w-full flex-col">
                            <input type="text" id="nama" name="nama" placeholder="" autocomplete="off"
                                value="{{ old('nama') }}" class="peer w-72 w-full rounded-md border border-black/30 p-2">
                            <span
                                class="absolute -top-2 left-2 h-max w-max bg-white px-0.5 text-xs transition-[font,inset] after:text-red-500 after:content-['*'] peer-placeholder-shown:inset-y-2 peer-placeholder-shown:text-base peer-focus:-top-2 peer-focus:text-xs">Nama</span>
                            @error('nama')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </label>
                        <label for="tempat_lahir" class="relative left-0 col-span-2 flex h-max w-full flex-col">
                            <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="" autocomplete="off"
                                value="{{ old('tempat_lahir') }}"
                                class="peer w-72 w-full rounded-md border border-black/30 p-2">
                            <span
                                class="absolute -top-2 left-2 h-max w-max bg-white px-0.5 text-xs transition-[font,inset] after:text-red-500 after:content-['*'] peer-placeholder-shown:inset-y-2 peer-placeholder-shown:text-base peer-focus:-top-2 peer-focus:text-xs">Tempat
                                Lahir</span>
                            @error('tempat_lahir')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </label>
                        <label for="tanggal_lahir" class="relative left-0 col-span-2 flex h-max w-full flex-col">
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="" autocomplete="off"
                                value="{{ old('tanggal_lahir') }}"
                                class="peer w-72 w-full rounded-md border border-black/30 p-2">
                            <span
                                class="absolute -top-2 left-2 h-max w-max bg-white px-0.5 text-xs transition-[font,inset] after:text-red-500 after:content-['*'] peer-placeholder-shown:inset-y-2 peer-placeholder-shown:text-base peer-focus:-top-2 peer-focus:text-xs">Tanggal
                                Lahir</span>
                            @error('tanggal_lahir')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </label>
                        <label for="nik" class="relative left-0 col-span-4 flex h-max w-full flex-col">
                            <input type="text" id="nik" name="nik" placeholder="" autocomplete="off"
                                value="{{ old('nik') }}" maxlength="16"
                                class="peer w-72 w-full rounded-md border border-black/30 p-2">
                            <span
                                class="absolute -top-2 left-2 h-max w-max bg-white px-0.5 text-xs transition-[font,inset] after:text-red-500 after:content-['*'] peer-placeholder-shown:inset-y-2 peer-placeholder-shown:text-base peer-focus:-top-2 peer-focus:text-xs">Nik</span>
                            @error('nik')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </label>
                        <label for="jenis_kelamin" class="relative left-0 col-span-4 flex h-max w-full flex-col">
                            <select name="jenis_kelamin" id="jenis_kelamin"
                                class="h-full rounded-md border border-black/30 p-2">
                                <option value="">Jenis Kelamin</option>
                                <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>
                                    Laki-Laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </label>
                        <label for="kewarganegaraan" class="relative left-0 col-span-4 flex h-max w-full flex-col">
                            <input type="text" id="kewarganegaraan" name="kewarganegaraan" placeholder=""
                                value="{{ old('kewarganegaraan') }}" autocomplete="off"
                                class="peer w-72 w-full rounded-md border border-black/30 p-2">
                            <span
                                class="absolute -top-2 left-2 h-max w-max bg-white px-0.5 text-xs transition-[font,inset] after:text-red-500 after:content-['*'] peer-placeholder-shown:inset-y-2 peer-placeholder-shown:text-base peer-focus:-top-2 peer-focus:text-xs">Kewarganegaraan</span>
                            @error('kewarganegaraan')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </label>
                        <label for="agama" class="relative left-0 col-span-4 flex h-max w-full flex-col">
                            <select name="agama" id="agama" class="h-full rounded-md border border-black/30 p-2">
                                <option value="" {{ is_null($user) || empty($user->agama) ? 'selected' : '' }}>
                                    Agama</option>
                                <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Khonghucu" {{ old('agama') == 'Khonghucu' ? 'selected' : '' }}>Khonghucu
                                </option>
                            </select>
                            @error('agama')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </label>
                        <label for="pekerjaan" class="relative left-0 col-span-4 flex h-max w-full flex-col">
                            <input type="text" id="pekerjaan" name="pekerjaan" placeholder="" autocomplete="off"
                                value="{{ old('pekerjaan') }}"
                                class="peer w-72 w-full rounded-md border border-black/30 p-2">
                            <span
                                class="absolute -top-2 left-2 h-max w-max bg-white px-0.5 text-xs transition-[font,inset] after:text-red-500 after:content-['*'] peer-placeholder-shown:inset-y-2 peer-placeholder-shown:text-base peer-focus:-top-2 peer-focus:text-xs">Pekerjaan</span>
                            @error('pekerjaan')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </label>
                        <label for="upload_kk" class="relative left-0 col-span-4 flex h-max w-full flex-col">
                            <input type="file" id="upload_kk" name="upload_kk" placeholder="" autocomplete="off"
                                value="{{ old('upload_kk') }}"
                                class="peer w-72 w-full rounded-md border border-black/30 p-2">
                            <span
                                class="absolute -top-2 left-2 h-max w-max bg-white px-0.5 text-xs transition-[font,inset] after:text-red-500 after:content-['*'] peer-placeholder-shown:inset-y-2 peer-placeholder-shown:text-base peer-focus:-top-2 peer-focus:text-xs">Upload KK</span>
                            @error('upload_kk')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </label>
                        <label for="alamat"
                            class="relative left-0 col-span-8 row-span-4 flex h-full h-full w-full flex-col">
                            <textarea name="alamat" id="alamat" class="peer h-full w-full rounded-md border border-black/30 p-2"
                                placeholder="">{{ old('alamat') }}</textarea>
                            <span
                                class="absolute -top-2 left-2 h-max w-max bg-white px-0.5 text-xs transition-[font,inset] peer-placeholder-shown:inset-y-2 peer-placeholder-shown:text-base peer-focus:-top-2 peer-focus:text-xs">Alamat</span>
                            @error('alamat')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </label>
                        <div class="col-span-8 flex justify-start">
                            @if (isset($user))
                                <button type="submit"
                                    class="w-full rounded-md bg-teal-500 px-4 py-2 font-bold text-white">Save</button>
                            @else
                                <a href="{{ route('user.profile') }}"
                                    class="flex w-full items-center justify-center gap-3 rounded-md bg-red-400 px-4 py-2 font-bold text-white">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor" stroke-width="2">
                                                <path
                                                    d="M13.737 21.848a10.002 10.002 0 0 0 6.697-15.221a10 10 0 1 0-6.698 15.221z" />
                                                <path stroke-linecap="square" d="M12 12v6m0-11V6" />
                                            </g>
                                        </svg></span>
                                    <span>Lengkapi Profil Anda</span>
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script>
        document.getElementById('nik').addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
@endsection
