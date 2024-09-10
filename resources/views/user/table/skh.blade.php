
<div id="content" class="hidden p-3">
    <form action="{{ route('user.pengajuan') }}"
        class="my-5 flex h-max w-max items-center border-2 border-black bg-white">
        <input type="text" name="search" class="p-2 focus:border-none focus:outline-none" placeholder="Cari">
        <button type="submit" class="p-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                <g fill="none" stroke="black" stroke-width="2">
                    <circle cx="11" cy="11" r="7" />
                    <path stroke-linecap="round" d="m20 20l-3-3" />
                </g>
            </svg>
        </button>
    </form>
    <table class="w-full text-center">
        <thead>
            <tr class="bg-black text-white">
                <th class="max-w-12 w-12 border py-3">No.</th>
                <th class="border py-3">Tanggal Pengajuan</th>
                <th class="border py-3">Surat</th>
                <th class="min-w-32 border py-3">Nama</th>
                <th class="border py-3">Status</th>
                {{-- <th class="border py-3">Keterangan</th> --}}
                <th class="border py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($skh->count() > 0)
                @foreach ($skh as $item)
                    <tr class="border hover:bg-slate-100">
                        <td class="border py-3">{{ $loop->iteration }}</td>
                        <td class="border py-3">{{ $item->created_at }}</td>
                        <td class="border py-3">Surat Keterangan Kehilangan</td>
                        <td class="border py-3">{{ $item->nama }}</td>
                        <td class="border py-3">
                            @if ($item->status == 0)
                                <span class="px-2 py-1 font-semibold text-black">Data sedang di
                                    periksa</span>
                            @elseif ($item->status == 1)
                                <span class="bg-green-500 px-2 py-1 font-semibold text-white">Data sudah
                                    lengkap</span>
                            @elseif ($item->status == 2)
                                <span class="bg-red-500 px-2 py-1 font-semibold text-white">Data tidak lengkap</span>
                            @endif
                        </td>
                        {{-- <td class="border py-3">
                            @if ($item->keterangan == 0)
                                Menunggu Konfirmasi
                            @elseif ($item->keterangan == 1)
                                <span class="bg-green-500 px-2 py-1 font-semibold text-white">Sudah di
                                    konfirmasi</span>
                            @elseif ($item->keterangan == 2)
                                <span class="bg-green-500 px-2 py-1 font-semibold text-white">
                                    Surat Selesai
                                </span>
                            @endif
                        </td> --}}
                        <td>
                            <div class="flex h-full items-center justify-center gap-2">
                                <buttton class="cursor-pointer bg-teal-500 px-2 py-1 text-white" id="skhBtn"
                                    data-id="{{ $item->id }}">
                                    Lihat
                                </buttton>
                                @if ($item->status == 1)
                                    <a href="{{ route('user.skhPdf', ['id' => $item->id]) }}"
                                        class="cursor-pointer bg-blue-500 px-2 py-1 text-white">Unduh</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            @elseif ($skh->isEmpty())
                <tr>
                    <td colspan="7" class="h-[500px] font-bold">Tidak ada surat yang diajukan</td>
                </tr>
            @else
                <tr>
                    <td colspan="7" class="h-[500px] font-bold">Surat tidak ditemukan</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

<script>
    document.querySelectorAll('#skhBtn').forEach(button => {
        button.addEventListener('click', function() {
            fetch(`/api/getSkh/: ${this.getAttribute('data-id')}`)
                .then(response => {
                    return response.json()
                })
                .then(response => {
                    const modalSkhContainer = document.querySelector('#modal');
                    const modalSkh = document.querySelector('#modalBody');
                    modalSkhContainer.classList.remove('hidden')

                    const tanggalLahir = new Date(response.data.tanggal_lahir);
                    const tanggal = tanggalLahir.getDate();
                    const bulan = tanggalLahir.getMonth() + 1;
                    const tahun = tanggalLahir.getFullYear();
                    const tanggalFormat = tanggal < 10 ? '0' + tanggal : tanggal;
                    const bulanFormat = bulan < 10 ? '0' + bulan : bulan;
                    const tahunFormat = tahun.toString();
                    const tanggalLahirFormat = `${tanggalFormat}-${bulanFormat}-${tahunFormat}`;

                    modalSkh.innerHTML = `
                        <h2 class="text-center text-xl font-bold">Detail Surat Kehilangan</h2>
                        <table>
                            <tr>
                                <td class="p-2">Nama</td>
                                <td class="p-2">: ${response.data.nama}</td>
                            </tr>
                            <tr>
                                <td class="p-2">Nik</td>
                                <td class="p-2">: ${response.data.nik}</td>
                            </tr>
                            <tr>
                                <td class="p-2">No. KK</td>
                                <td class="p-2">: ${response.data.no_kk}</td>
                            </tr>
                            <tr>
                                <td class="p-2">Alamat</td>
                                <td class="p-2">: ${response.data.alamat}</td>
                            </tr>
                            <tr>
                                <td class="p-2">Jenis Kelamin</td>
                                <td class="p-2">: ${response.data.jenis_kelamin}</td>
                            </tr>
                            <tr>
                                <td class="p-2">Agama</td>
                                <td class="p-2">: ${response.data.agama}</td>
                            </tr>
                            <tr>
                                <td class="p-2">Tempat Lahir</td>
                                <td class="p-2">: ${response.data.tempat_lahir}</td>
                            </tr>
                            <tr>
                                <td class="p-2">Tanggal Lahir</td>
                                <td class="p-2">: ${tanggalLahirFormat}</td>
                            </tr>
                            <tr>
                                <td class="p-2">Pekerjaan</td>
                                <td class="p-2">: ${response.data.pekerjaan}</td>
                            </tr>
                        </table>
                        <button id="closeSkd" class="bg-red-500 px-4 py-2 text-white">Tutup</button>
                    `
                    document.getElementById('closeSkd').addEventListener('click', function() {
                        modalSkhContainer.classList.add('hidden');
                    });
                });
        });
    });
</script>
