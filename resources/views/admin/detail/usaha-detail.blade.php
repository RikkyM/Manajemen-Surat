@extends('app')
@section('title')
    Surat Keterangan Usaha
@endsection
@section('pages')
    <main class="flex h-screen overflow-y-auto bg-gray-100">
        @include('component.admin.sidebar')
        <div class="h-full flex-1 overflow-y-auto p-8">
            <div class="grid gap-2">
                <h2 class="text-2xl font-semibold">Surat Keterangan Usaha</h2>
                <span><a href="{{ route('admin.dashboard') }}">Dashboard</a> > <a href="{{ route('admin.domisili') }}">Surat
                        Keterangan
                        Usaha</a> > <span class="font-semibold">Detail Surat</span></span>
            </div>
            <div class="flex">
                <div class="mt-3 grid flex-1 grid-cols-2 gap-5 rounded-md bg-white p-5">
                    <div class="row-start-1 grid gap-3">
                        <h2 class="h-fit text-lg">Keterangan</h2>
                        <select name="status" id="status" class="p-2">
                            <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Data sudah lengkap</option>
                            <option value="2" {{ $data->status == 2 ? 'selected' : '' }}>Data tidak lengkap</option>
                        </select>
                        <button id="statusBtn" data-id="{{ $data->id }}"
                            class="w-max rounded-md bg-green-500 px-2 py-1 font-semibold text-white">Ubah</button>
                    </div>
                    <div></div>
                    <div class="row-start-2 font-semibold">
                        <h2>NIK</h2>
                        <span>{{ $data->nik }}</span>
                    </div>
                    <div class="font-semibold">
                        <h2>Nama Lengkap</h2>
                        <span>{{ $data->nama }}</span>
                    </div>
                    <div class="font-semibold">
                        <h2>Alamat</h2>
                        <span>{{ $data->alamat }}</span>
                    </div>
                    <div class="font-semibold">
                        <h2>Jenis Kelamin</h2>
                        <span>{{ $data->jenis_kelamin }}</span>
                    </div>
                    <div class="font-semibold">
                        <h2>Agama</h2>
                        <span>{{ $data->agama }}</span>
                    </div>
                    <div class="font-semibold">
                        <h2>Tempat Lahir</h2>
                        <span>{{ $data->tempat_lahir }}</span>
                    </div>
                    <div class="font-semibold">
                        <h2>Tanggal Lahir</h2>
                        <span>{{ $data->tanggal_lahir }}</span>
                    </div>
                    <div class="font-semibold">
                        <h2>Kewarganegaraan</h2>
                        <span>{{ $data->kewarganegaraan }}</span>
                    </div>
                    <div class="font-semibold">
                        <h2>Pekerjaan</h2>
                        <span>{{ $data->pekerjaan }}</span>
                    </div>
                    <div class="font-semibold">
                        <h2>Status Pengajuan</h2>
                        <span>
                            @if ($data->status == 0)
                                Data sedang diperiksa
                            @elseif ($data->status == 1)
                                Data sudah lengkap
                            @elseif ($data->status = 2)
                                Data tidak lengkap
                            @endif
                        </span>
                    </div>
                    <div class="font-semibold">
                        <h2>Nomor Surat</h2>
                        <span>470/ {{ $data->id }} /TRS/BA.1/ {{ $tahun }}</span>
                    </div>
                </div>
                <div class="mt-3 overflow-y-auto rounded-xl border-2 border-black">
                    <embed src="{{ asset('upload_kk/sku/' . $data->upload_kk) }}" class="h-full w-[500px]"
                        type="application/pdf">
                </div>
            </div>
        </div>
    </main>

    <script>
        const status = document.querySelector('#status');
        const statusBtn = document.querySelector('#statusBtn');

        statusBtn.addEventListener('click', () => {
            const confirmation = confirm('Apakah anda yakin untuk lanjut ?')

            if (confirmation == true) {
                fetch(`/api/statusSku/${statusBtn.dataset.id}`, {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    body: JSON.stringify({
                        status: status.value
                    })
                }).then(response => response.json()).then(response => {
                    window.location.href = response.route
                }).catch(error => alert(error))
            }
        })
    </script>
@endsection
