<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data['title'] }}</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .main {
            width: 100%;
            border-bottom: solid 3px black;
        }

        .text-header {
            text-align: center;
        }

        .text-header h2,
        .text-header h3 {
            font-size: 15px;
            margin: 0;
        }

        .header-image {
            max-width: 80px;
            vertical-align: middle;
        }
    </style>
</head>

<body>

    <table class="main">
        <tr>
            <td style="text-align: center;">
                <img src="{{ public_path('data/img/logo.png') }}" alt="Logo" class="header-image">
            </td>
            <td class="text-header">
                <h2>PEMERINTAH KABUPATEN BANYUASIN</h2>
                <h2>KECAMATAN BANYUASIN I</h2>
                <h3>DESA TIRTOSARI</h3>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; font-size: 12px; margin-bottom: 3px;">Alamat : Jl. Inpres KM 7
                Desa Tirto Sari Kec. Banyuasin I Kab. Banyuasin
                Pos. 30764 Tirtosarisejatra012@gmail.com</td>
        </tr>
    </table>

    <table style="width: 100%; margin-top: 20px;">
        <tr>
            <td style="text-align: center; font-size: 13px;">
                <h2 style="border-bottom: solid 2px black;">SURAT KETERANGAN DOMISILI</h2>
            </td>
        </tr>
        <tr style="margin-top: 10px;">
            <td style="text-align: center">
                <span style="margin-top: 5px; font-size: 15px;">Nomor :470/ {{ $data['data']->id }}
                    /TRS/BA.1/{{ $waktu }}</span>
            </td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr style="text-align: justify">
            <td style="line-height: 30px">Yang bertanda tangan di bawah ini Kepala Desa Tirto Sari Kecamatan Banyuasin I
                Kabupaten Banyuasin,
                dengan ini kami menerangkan bahwa :</td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>

    <table style="width: 100%;">
        <tr>
            <td style="padding: 5px 0; width: 250px;">1. Nama</td>
            <td>: {{ $data['data']->nama }}</td>
        </tr>
        <tr>
            <td style="padding: 5px 0; width: 250px;">2. NIK</td>
            <td>: {{ $data['data']->nik }}</td>
        </tr>
        <tr>
            <td style="padding: 5px 0; width: 250px;">3. KK</td>
            <td>: {{ $data['data']->no_kk }}</td>
        </tr>
        <tr>
            <td style="padding: 5px 0; width: 250px;">4. Jenis Kelamin</td>
            <td>: {{ $data['data']->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td style="padding: 5px 0; width: 250px;">5. Tempat & Tanggal Lahir</td>
            <td>: {{ $data['data']->tempat_lahir }}, {{ $data['data']->tanggal_lahir->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td style="padding: 5px 0; width: 250px;">6. Warga Negara</td>
            <td>: {{ $data['data']->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td style="padding: 5px 0; width: 250px;">7. Agama</td>
            <td>: {{ $data['data']->agama }}</td>
        </tr>

        <tr>
            <td style="padding: 5px 0; width: 250px;">8. Pekerjaan</td>
            <td>: {{ $data['data']->pekerjaan }}</td>
        </tr>
        <tr>
            <td style="padding: 5px 0; width: 250px;">9. Alamat</td>
            <td>: {{ $data['data']->alamat }}</td>
        </tr>
    </table>

    <div style="margin-left: -18px">
        <ol type="a">
            <li style="text-align: justify; margin: 10px 0; line-height: 20px">
                Bahwa benar menurut keterangan RT 021 Dusun 005 nama tersebut di atas
                berdomisili Sejak 2016 dan terdaftar sebagai penduduk Desa Tirto Sari, sebagai mana pada
                alamat tersebut diatas.
            </li>
            <li style="text-align: justify; margin: 10px 0; line-height: 30px">
                Dan surat keterangan ini di berikan kepada yang bersangkutan sebagai pengganti
                EKTP Asli masih dalam pembuatan.
            </li>
            <li style="text-align: justify; margin: 10px 0; line-height: 20px">
                Surat keterangan ini di berikan kepada yang bersangkutan guna melengkapi
                persyaratan.
            </li>
        </ol>
    </div>

    <p style="text-indent: 30px; line-height: 30px;">Demikian Surat Keterangan ini di buat dengan sebenarnya untuk dapat
        dipergunakan seperlunya dan kepada yang berkepentingan untuk memaklumi.</p>
    <p>Berlaku 1 bulan setelah tanggal pembuatan.</p>

    <div style="display: table; position: absolute; right: 80px; width: 200px;">
        <div style="display: table-cell; font-size: 20px;">
            Tirto Sari, {{ $data['data']->created_at }}
        </div>
        <div
            style="display: table-cell; padding-bottom: 10px; font-size: 20px; display: flex; flex-direction: column; gap: 2px;">
            <span>Kepala Desa Tirto Sari</span>
            <div style="margin-top: 10px;">
                <table>
                    <tr>
                        <td><img src="data:image/svg+xml;base64,{{ base64_encode(QrCode::format('svg')->size(120)->generate(route('ttd', 'ttd.png'))) }}"
                    alt="qrcode"></td>
                    <td style="margin-left: 20px; font-size: 14px;"><span>Dokumen ini telah ditandatangani secara elektronik.</span></td>
                    </tr>
                </table>
            </div>
        </div>
        <div
            style="display: table-cell; margin-bottom: 50px; font-size: 20px; display: flex; flex-direction: column; gap: 2px;">
            <span>Suwarno</span>
        </div>
    </div>
</body>

</html>
