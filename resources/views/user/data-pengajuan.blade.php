@extends('app')
@section('title')
    Pengajuan Data
@endsection
@section('pages')
    <main class="flex h-screen w-full">
        @include('component.user.sidebar')
        <div class="relative flex-1 overflow-y-auto">
            <div class="w-full p-8">
                <div class="h-full w-full p-2">
                    <h2 class="text-2xl font-semibold">Data Pengajuan</h2>
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
                                Data Pengajuan
                            </span>
                        </li>
                    </ol>
                </div>
                <div class="grid">
                    <div class="flex justify-center gap-5 font-bold">
                        <button id="btn" class="rounded-md p-3">Surat Keterangan Domisili</button>
                        <button id="btn" class="rounded-md p-3">Surat Keterangan Kematian</button>
                        <button id="btn" class="rounded-md p-3">Surat Keterangan Usaha</button>
                        <button id="btn" class="rounded-md p-3">Surat Keterangan Kehilangan</button>
                    </div>
                    @include('user.table.skd')
                    @include('user.table.skk')
                    @include('user.table.sku')
                    @include('user.table.skh')
                </div>
            </div>
            <div id="modal"
                class="fixed left-0 top-0 z-50 flex hidden h-full w-full items-center justify-center bg-black/20 backdrop-blur-sm">
                <div class="grid gap-3 bg-white p-10" id="modalBody">
                </div>
            </div>
        </div>
    </main>
    <script>
        const btn = document.querySelectorAll('#btn');
        const content = document.querySelectorAll('#content');

        var modal = document.getElementById('modal');
        var modalBody = document.getElementById('modalBody');

        modal.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        });

        modalBody.addEventListener('click', function(event) {
            event.stopPropagation();
        });

        btn.forEach((tab, index) => {
            if (index == 0) {
                tab.classList.add('bg-blue-500')
                tab.classList.add('text-white')
                content[index].classList.remove('hidden')
            }

            tab.addEventListener('click', () => {
                btn.forEach(tab => {
                    tab.classList.remove('bg-blue-500')
                    tab.classList.remove('text-white')
                })
                tab.classList.add('bg-blue-500')
                tab.classList.add('text-white')

                content.forEach(ctn => {
                    ctn.classList.add('hidden')
                })
                content[index].classList.remove('hidden')
            })
        })
    </script>
@endsection
