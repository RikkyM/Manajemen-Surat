@extends('app')
@section('title')
    Data User
@endsection
@section('pages')
    <main class="flex h-screen overflow-y-auto bg-gray-100">
        @include('component.admin.sidebar')
        <div class="h-full flex-1 overflow-y-auto pt-8">
            <div class="grid gap-2">
                <h2 class="text-2xl font-semibold">Data User</h2>
                <span><a href="{{ route('admin.dashboard') }}">Dashboard</a> > <span class="font-semibold">Sejarah, Visi &
                        Misi</span></span>
            </div>
            @if (Session::has('success'))
                <p class="text-green-500">{{ Session::get('success') }}</p>
            @endif
            <div class="h-[calc(100%_-_64px)] w-full overflow-y-auto p-3">
                {{-- <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf

                </form> --}}
                @if ($sejarah && $sejarah->count() > 0)
                    <form action="{{ route('admin.sejarah') }}" method="POST"
                        class="grid w-full max-w-[1300px] grid-cols-2 gap-3">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col gap-3">
                            <div class="block">
                                <h3 class="mt-5 font-semibold">Input Gambar</h3>
                                <input type="file" id="editImg" name="gambar"
                                    class="mt-2 block w-full text-sm text-slate-500 file:mr-4 file:rounded-full file:border file:border-violet-500 file:bg-violet-50 file:px-3 file:py-2 file:text-sm file:font-semibold file:text-violet-700 hover:file:bg-violet-100"
                                    value="{{ $sejarah->gambar }}" />
                            </div>
                            <label class="flex h-[200px] max-h-[200px] w-[450px] shrink-0 items-center justify-center"
                                id="gambar">
                                <img id='edit-preview_img' src="{{ asset('sejarah/' . $sejarah->gambar) }}" alt="sejarah"
                                    class="h-full max-h-[200px] object-cover" />
                            </label>
                        </div>
                        <div class="flex flex-col gap-3">
                            <label for="sejarah" class="text-xl font-semibold">Sejarah</label>
                            <textarea name="sejarah" id="sejarah" class="h-44">{{ $sejarah->sejarah }}</textarea>
                        </div>
                        <div class="mt-4 flex flex-col gap-3">
                            <h2 class="text-xl font-semibold font-semibold">Visi</h2>
                            <ul id="editVisiContainer" class="flex flex-col gap-3">
                                @foreach (json_decode($sejarah->visi) as $visi)
                                    <li id="listVisi"><input type="text" value="{{ $visi }}" name="visi[]"
                                            class="w-full border border-black p-2" required></li>
                                @endforeach
                            </ul>
                            <button id="edit-addVisi" type="button"
                                class="rounded-md bg-green-500 px-2 py-1 font-semibold text-white">Tambah</button>
                        </div>
                        <div class="mt-4 flex flex-col gap-3">
                            <h2 class="text-xl font-semibold font-semibold">Misi</h2>
                            <ul id="editMisiContainer" class="flex flex-col gap-3">
                                @foreach (json_decode($sejarah->misi) as $misi)
                                    <li id="listMisi" class="flex gap-3"><input type="text" value="{{ $misi }}"
                                            name="misi[]" class="w-full border border-black p-2" required>
                                        <button
                                            class="deleteNow bg-red-500 px-2 py-1 font-semibold text-white">Hapus</button>
                                    </li>
                                @endforeach
                            </ul>
                            <button id="edit-addMisi" type="button"
                                class="rounded-md bg-green-500 px-2 py-1 font-semibold text-white">Tambah</button>
                        </div>
                        <div class="col-span-2 flex items-center justify-center p-3">
                            <button type="submit" class="bg-green-500 px-3 py-2 font-bold text-white">Submit</button>
                        </div>
                    </form>
                @else
                    @include('admin.sejarah.input-sejarah')
                @endif
            </div>
        </div>
    </main>
    <script>
        document.querySelector('#edit-addVisi').addEventListener('click', e => {
            e.preventDefault();

            const visiContainer = document.querySelector('#editVisiContainer');
            const visiBaru = document.createElement('li');
            visiBaru.classList.add('list', 'flex', 'gap-3');
            visiBaru.innerHTML = `
                <input type="text" name="visi[]" class="w-full border border-black p-2" required>
                <button class="delete bg-red-500 px-2 py-1 text-white font-semibold">Hapus</button>
            `
            visiContainer.appendChild(visiBaru);

            visiBaru.querySelector('.delete').addEventListener('click', e => {
                visiContainer.removeChild(visiBaru);
            });
        })

        document.querySelector('#edit-addMisi').addEventListener('click', e => {
            e.preventDefault();

            const misiContainer = document.querySelector('#editMisiContainer');
            const misiBaru = document.createElement('li')
            misiBaru.classList.add('misiList', 'flex', 'gap-3');
            misiBaru.innerHTML = `
                <input type="text" name="misi[]" class="w-full border border-black p-2" required>
                <button class="delete bg-red-500 px-2 py-1 text-white font-semibold">Hapus</button>
            `

            misiContainer.appendChild(misiBaru);

            misiBaru.querySelector('.delete').addEventListener('click', e => {
                misiContainer.removeChild(misiBaru);
            })
        })

        document.querySelectorAll('.deleteNow').forEach(item => {
            item.addEventListener('click', e => {
                const listMisi = item.closest('#listMisi');
                listMisi.parentNode.removeChild(listMisi);
            })
        })

        document.querySelector('#editImg').addEventListener('change', e => {
            var input = event.target;
            var file = input.files[0];
            var type = file.type;

            let output = document.querySelector('#edit-preview_img');

            console.log('adasd');

            output.src = URL.createObjectURL(e.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src);
            }
        })
    </script>
@endsection
