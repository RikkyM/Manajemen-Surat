@extends('app')
@section('title')
    Dashboard
@endsection
@section('pages')
    <main class="flex h-screen w-full">

        @include('component.user.sidebar')

        <div class="flex-1 overflow-y-auto p-5">
            <div class="m-3 flex justify-between gap-5">
                <div class="flex items-center gap-6 rounded-md bg-[#6147DC] p-8 text-lg font-semibold text-white">
                    <span>Surat Keterangan Domisili</span>
                    <div class="size-9 flex items-center justify-center rounded-md bg-white font-bold text-black">
                        {{ $data['skd'] }}</div>
                </div>
                <div class="flex items-center gap-6 rounded-md bg-[#12BC95] p-8 text-lg font-semibold text-white">
                    <span>Surat Keterangan Kematian</span>
                    <div class="size-9 flex items-center justify-center rounded-md bg-white font-bold text-black">
                        {{ $data['skk'] }}</div>
                </div>
                <div class="flex items-center gap-6 rounded-md bg-[#F76767] p-8 text-lg font-semibold text-white">
                    <span>Surat Keterangan Usaha</span>
                    <div class="size-9 flex items-center justify-center rounded-md bg-white font-bold text-black">
                        {{ $data['sku'] }}</div>
                </div>
                <div class="flex items-center gap-6 rounded-md bg-[#3B82F6] p-8 text-lg font-semibold text-white">
                    <span>Surat Keterangan Kehilangan</span>
                    <div class="size-9 flex items-center justify-center rounded-md bg-white font-bold text-black">
                        {{ $data['skh'] }}</div>
                </div>
            </div>
            <div class="m-3 flex gap-3">
                <div class="flex h-max w-[500px] flex-col gap-3 rounded-md bg-[#FB8136] p-10 text-xl font-bold text-white">
                    <span class="drop-shadow-xl">Selamat Datang {{ $profil->name }} 👋</span>
                    <span class="text-sm">Terima kasih telah mengunjungi Tirto Sari. Mari bersama kita menjaga kelestarian
                        alam dan keindahan yang ada. Selamat menikmati setiap momen berharga di Tirto Sari!</span>
                </div>
                <div class="h-full max-h-[500px] w-full max-w-max overflow-y-auto px-2">
                    <table>
                        <thead class="sticky top-0 bg-white">
                            <tr>
                                <th class="text-nowrap bg-black px-3 py-2 text-center text-white">No .</th>
                                <th class="text-nowrap bg-black px-3 py-2 text-center text-white">Jenis Surat</th>
                                <th class="bg-black py-2 text-left text-white">Nama</th>
                                <th class="text-nowrap bg-black px-3 py-2 text-center text-white">Jenis Kelamin</th>
                                <th class="text-nowrap bg-black px-3 py-2 text-center text-white">Tanggal Dibuat</th>
                                <th class="bg-black px-3 py-2 text-center text-white">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($table as $model => $item)
                                <tr class="hover:bg-black/20">
                                    <td class="py-3.5 text-center">{{ $model + 1 }}</td>
                                    <td class="py-3.5 text-center uppercase">{{ ucfirst($item['jenis']) }}</td>
                                    <td class="py-3.5 pr-14">{{ $item->nama }}</td>
                                    <td class="text-nowrap py-3.5 text-center">{{ $item->jenis_kelamin }}</td>
                                    <td class="text-nowrap py-3.5 text-center">{{ $item->created_at }}</td>
                                    <td class="text-nowrap px-5 py-3.5 text-center">
                                        @if ($item->status == 0)
                                            Data sedang diperiksa
                                        @elseif ($item->status == 1)
                                            <span class="bg-green-500 px-2 py-1 font-semibold text-white">Data sudah
                                                lengkap</span>
                                        @elseif ($item->status == 2)
                                            <span class="bg-red-500 px-2 py-1 font-semibold text-white">Data tidak
                                                lengkap</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <div id="map" class="w-full border border-black"></div> --}}
            </div>
        </div>
    </main>

    {{-- <script>
        var map = L.map('map', {
            center: [-2.9550488910426664, 104.96862270076114],
            zoom: 2
        })

        var tiles = new L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            minZoom: '12'
        }).addTo(map);

        var marker = L.marker(
            [-2.9550488910426664, 104.96862270076114], {
                title: ""
            });

        marker.addTo(map).bindPopup(
            "<p><b>Kantor Desa Tirto Sari</b><br></p>"
        ).openPopup();
    </script> --}}
@endsection
