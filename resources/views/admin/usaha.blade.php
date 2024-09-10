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
                <span><a href="{{ route('admin.dashboard') }}">Dashboard</a> > <span class="font-semibold">Surat Keterangan
                        Usaha</span></span>
            </div>
            <table class="mt-3 w-full rounded-lg bg-white">
                <thead>
                    <tr class="text-sm text-gray-400">
                        <td class="max-w-14 w-14 py-5 text-center">No.</td>
                        <td class="px-2 py-5">Tanggal Pengajuan</td>
                        <td class="py-5">Surat</td>
                        <td class="py-5">Nama</td>
                        <td class="py-5 text-center">Status</td>
                        {{-- <td class="py-5 text-center">Keterangan</td> --}}
                        <td class="py-5 text-center">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @if ($data->count() > 0)
                        @foreach ($data as $item)
                            <tr class="{{ $loop->last ? '' : 'border-b' }}">
                                <td class="py-5 text-center">{{ $loop->iteration }}</td>
                                <td class="px-2 py-5 capitalize">{{ $item->created_at }}</td>
                                <td class="px-2 py-5 capitalize">Surat Keterangan Usaha</td>
                                <td class="px-2 py-5 capitalize">{{ $item->user->name }}</td>
                                <td class="py-5 text-center capitalize">
                                    @if ($item->status == 0)
                                        <span class="rounded-md px-3 py-2 font-semibold text-black">Data Sedang
                                            Diperiksa</span>
                                    @elseif ($item->status == 1)
                                        <span class="rounded-md bg-green-500 px-3 py-2 font-semibold text-white">Data Sudah
                                            Lengkap</span>
                                    @elseif ($item->status == 2)
                                        <span class="rounded-md bg-red-500 px-3 py-2 font-semibold text-white">Data tidak lengkap</span>
                                    @endif
                                </td>
                                {{-- <td class="py-5 text-center capitalize">
                                    @if ($item->keterangan == 0)
                                        Menunggu Konfirmasi
                                    @elseif ($item->keterangan == 1)
                                        <span class="rounded-md bg-green-500 px-3 py-2 font-semibold text-white">Sudah
                                            Dikonfirmasi</span>
                                    @elseif ($item->keterangan == 2)
                                        <span class="rounded-md bg-green-500 px-3 py-2 font-semibold text-white">Surat
                                            Selesai</span>
                                    @endif
                                </td> --}}
                                <td class="py-5 text-center capitalize">
                                    <a href="{{ route('admin.usahaDetail', ['id' => $item->id]) }}"
                                        class="rounded-md bg-blue-400 px-3 py-2 font-semibold text-white">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="h-80">
                            <td colspan="7" class="text-center">Belum Ada Surat</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </main>
@endsection
