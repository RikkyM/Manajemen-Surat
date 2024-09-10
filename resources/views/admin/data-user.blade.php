@extends('app')
@section('title')
    Data User
@endsection
@section('pages')
    <main class="flex h-screen overflow-y-auto bg-gray-100">
        @include('component.admin.sidebar')
        <div class="h-full flex-1 overflow-y-auto p-8">
            <div class="grid gap-2">
                <h2 class="text-2xl font-semibold">Data User</h2>
                <span><a href="{{ route('admin.dashboard') }}">Dashboard</a> > <span class="font-semibold">Data
                        User</span></span>
            </div>
            <div class="mt-5 w-full">
                <div class="w-max rounded-md bg-white px-4 py-2">
                    <form action="{{ route('admin.data-user') }}">
                        <input type="text" class="outline-0" name="search" placeholder="Cari">
                        <button>Cari</button>
                    </form>
                </div>
                <table class="mt-3 w-full rounded-lg bg-white">
                    <thead>
                        <tr class="text-sm text-gray-400">
                            <td class="max-w-14 w-14 py-5 text-center">No.</td>
                            <td class="px-2 py-5">Nama</td>
                            <td class="py-5 text-center">NIK</td>
                            <td class="py-5 text-center">Role</td>
                            <td class="py-5 text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr class="{{ $loop->last ? '' : 'border-b' }}">
                                <td class="py-5 text-center">{{ $loop->iteration }}</td>
                                <td class="px-2 py-5 capitalize">{{ $item->user->name }}</td>
                                <td class="py-5 text-center capitalize">{{ $item->nik }}</td>
                                <td class="py-5 text-center capitalize">{{ $item->user->role->role }}</td>
                                <td class="py-5 text-center capitalize"><button id="detail" class="bg-green-400 py-2 px-3 font-semibold text-white rounded-md"
                                        data-id="{{ $item->id }}">Detail</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="modal"
                class="absolute left-0 top-0 flex hidden h-full w-full items-center justify-center bg-black/20 backdrop-blur-sm">
                <div id="modalDetail" class="relative rounded-lg bg-white p-7">
                    <button id="close" class="absolute right-4 top-4"><svg xmlns="http://www.w3.org/2000/svg"
                            width="15" height="15" viewBox="0 0 8 8">
                            <path fill="red"
                                d="M1.41 0L0 1.41l.72.72L2.5 3.94L.72 5.72L0 6.41l1.41 1.44l.72-.72l1.81-1.81l1.78 1.81l.69.72l1.44-1.44l-.72-.69l-1.81-1.78l1.81-1.81l.72-.72L6.41 0l-.69.72L3.94 2.5L2.13.72L1.41 0z" />
                        </svg></button>
                    <h2 class="mb-5 text-center text-2xl font-semibold">Detail Data</h2>
                    <div id="list">

                    </div>
                </div>
            </div>
    </main>

    <script>
        const detail = document.querySelectorAll('#detail');
        detail.forEach(item => {
            item.addEventListener('click', () => {
                fetch(`/api/detail-data/${item.dataset.id}`).then(response => response.json()).then(
                    response => {
                        const modal = document.querySelector("#modal");
                        const list = document.querySelector("#list");
                        const close = document.querySelector('#close');
                        const modalDetail = document.querySelector('#modalDetail');
                        const tanggal_lahir = new Date(response.data.tanggal_lahir);
                        const formatted_tanggal_lahir =
                            `${tanggal_lahir.getDate()}-${tanggal_lahir.toLocaleString('default', { month: 'short' })}-${tanggal_lahir.getFullYear()}`;

                        modal.addEventListener('click', () => {
                            modal.classList.add('hidden')
                            modal.classList.add('pointer-events-none')
                        })

                        modalDetail.addEventListener('click', e => {
                            e.stopPropagation();
                        })

                        close.addEventListener('click', () => {
                            modal.classList.add('hidden')
                            modal.classList.add('pointer-events-none')
                        })

                        modal.classList.remove('hidden');
                        modal.classList.add('pointer-events-auto');
                        list.innerHTML = `
                            <table>
                            <tr>
                                <td class="p-2">Nama</td>
                                <td class="p-2 capitalize">: ${response.data.user.name}</td>
                            </tr>
                            <tr>
                                <td class="p-2">Pekerjaan</td>
                                <td class="p-2 capitalize">: ${response.data.pekerjaan}</td>
                            </tr>
                            <tr>
                                <td class="p-2">Nomor HP</td>
                                <td class="p-2 capitalize">: ${response.data.ponsel}</td>
                            </tr>
                            <tr>
                                <td class="p-2">NIK</td>
                                <td class="p-2 capitalize">: ${response.data.nik}</td>
                            </tr>
                            <tr>
                                <td class="p-2">Agama</td>
                                <td class="p-2 capitalize">: ${response.data.agama}</td>
                            </tr>
                            <tr>
                                <td class="p-2">Tempat Lahir</td>
                                <td class="p-2 capitalize">: ${response.data.tempat_lahir}</td>
                            </tr>
                            <tr>
                                <td class="p-2">Jenis Kelamin</td>
                                <td class="p-2 capitalize">: ${response.data.jenis_kelamin}</td>
                            </tr>
                            <tr>
                                <td class="p-2">Tanggal Lahir</td>
                                <td class="p-2 capitalize">: ${formatted_tanggal_lahir}</td>
                            </tr>
                            <tr>
                                <td class="p-2">Alamat</td>
                                <td class="p-2 capitalize">: ${response.data.alamat}</td>
                            </tr>
                        </table>
                        `
                    }).catch(error => alert(error));
            })
        })
    </script>
@endsection
