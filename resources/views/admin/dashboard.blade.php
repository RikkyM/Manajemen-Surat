@extends('app')
@section('title')
    Dashboard
@endsection
@section('pages')
    <main class="flex h-screen bg-gray-100">
        @include('component.admin.sidebar')
        <div class="h-full flex-1 overflow-y-auto p-8">
            <div class="grid gap-7">
                <div>
                    <h2 class="text-2xl font-semibold">Dashboard</h2>
                </div>
                <div>
                    <ul class="grid grid-cols-4 grid-rows-1 gap-5">
                        <li class="h-20">
                            <a href="{{ route('admin.domisili') }}"
                                class="flex flex h-full w-full items-center gap-5 rounded-md bg-blue-500 text-xl font-semibold text-white justify-around">
                                <span class="flex items-center gap-5">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                            viewBox="-4 -2 24 24">
                                            <path fill="currentColor"
                                                d="M3 0h10a3 3 0 0 1 3 3v14a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3V3a3 3 0 0 1 3-3zm0 2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H3zm2 1h6a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2zm0 12h2a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2zm0-4h6a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2zm0-4h6a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2z" />
                                        </svg></span>
                                    <span>Domisili</span>
                                </span>
                                <span>{{ $data['skd'] }}</span>
                            </a>
                        </li>
                        <li class="h-20">
                            <a href="{{ route('admin.kematian') }}"
                                class="flex flex h-full w-full items-center gap-5 rounded-md bg-teal-500 text-xl font-semibold text-white justify-around">
                                <span class="flex items-center gap-5">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                            viewBox="-4 -2 24 24">
                                            <path fill="currentColor"
                                                d="M3 0h10a3 3 0 0 1 3 3v14a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3V3a3 3 0 0 1 3-3zm0 2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H3zm2 1h6a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2zm0 12h2a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2zm0-4h6a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2zm0-4h6a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2z" />
                                        </svg></span>
                                    <span>Kematian</span>
                                </span>
                                <span>{{ $data['skk'] }}</span>
                            </a>
                        </li>
                        <li class="h-20">
                            <a href="{{ route('admin.usaha') }}"
                                class="flex flex h-full w-full items-center gap-5 rounded-md bg-yellow-500 text-xl font-semibold text-white justify-around">
                                <span class="flex items-center gap-5">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                            viewBox="-4 -2 24 24">
                                            <path fill="currentColor"
                                                d="M3 0h10a3 3 0 0 1 3 3v14a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3V3a3 3 0 0 1 3-3zm0 2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H3zm2 1h6a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2zm0 12h2a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2zm0-4h6a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2zm0-4h6a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2z" />
                                        </svg></span>
                                    <span>Usaha</span>
                                </span>
                                <span>{{ $data['sku'] }}</span>
                            </a>
                        </li>
                        <li class="h-20">
                            <a href="{{ route('admin.kehilangan') }}"
                                class="flex h-full w-full items-center gap-5 rounded-md bg-orange-500 text-xl font-semibold text-white justify-around">
                                <span class="flex items-center gap-5">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                            viewBox="-4 -2 24 24">
                                            <path fill="currentColor"
                                                d="M3 0h10a3 3 0 0 1 3 3v14a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3V3a3 3 0 0 1 3-3zm0 2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H3zm2 1h6a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2zm0 12h2a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2zm0-4h6a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2zm0-4h6a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2z" />
                                        </svg></span>
                                    <span>Kehilangan</span>
                                </span>
                                <span>{{ $data['skh'] }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
