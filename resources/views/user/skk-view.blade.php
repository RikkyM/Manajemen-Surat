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
                <h2 style="border-bottom: solid 2px black;">SURAT KETERANGAN KEMATIAN</h2>
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
            <td style="line-height: 30px">Yang bertanda tangan di bawah ini :</td>
        </tr>
        <tr>
            <td style="line-height: 30px">Kepala Desa Tirtosari Kecamatan Banyuasin I Kabupaten Banyuasin,dengan ini menerangkan bahwa :</td>
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
            <td style="padding: 5px 0; width: 250px;">Nama</td>
            <td>: {{ $data['data']->nama }}</td>
        </tr>
        <tr>
            <td style="padding: 5px 0; width: 250px;">Jenis Kelamin</td>
            <td>: {{ $data['data']->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td style="padding: 5px 0; width: 250px;">Tempat, Tanggal Lahir</td>
            <td>: {{ $data['data']->tempat_lahir }}, {{ $data['data']->tanggal_lahir->translatedFormat('d-M-Y') }}</td>
        </tr>
        <tr>
            <td style="padding: 5px 0; width: 250px;">Pekerjaan</td>
            <td>: {{ $data['data']->pekerjaan }}</td>
        </tr>
        <tr>
            <td style="padding: 5px 0; width: 250px;">Alamat</td>
            <td>: {{ $data['data']->alamat }}</td>
        </tr>
    </table>

    <p>Telah meninggal dunia pada   :</p>
    <table>
        <tr>
            <td style="padding: 5px 0; width: 250px;">Hari/Tanggal</td>
            <td>: {{ $data['data']->tanggal_meninggal->isoFormat('dddd') }}, {{ $data['data']->tanggal_meninggal->translatedFormat('d-m-Y') }}</td>
        </tr>
        <tr>
            <td style="padding: 5px 0; width: 250px;">Pukul</td>
            <td>: {{ $data['data']->waktu_meninggal->format('H:i') }} WIB</td>
        </tr>
        <tr>
            <td style="padding: 5px 0; width: 250px;">Bertempat</td>
            <td>: {{ $data['data']->tempat_meninggal }}</td>
        </tr>
    </table>

    <div>
        <p style="text-align: justify">Yang bersangkutan adalah benar Penduduk Desa Tirto sari Kecamatan Banyuasin I Kabupaten Banyuasin.</p>
        <p style="text-indent: 30p; text-align: justify">Demikian keterangan ini di buat dengan sebenarnya, agar dapat di pergunakan sebagaimana mestinya. </p>
    </div>

    <div style="display: table; position: absolute; right: 80px; width: 200px;">
        <div style="display: table-cell; font-size: 13px;">
            Tirto Sari, {{ $data['data']->created_at }}
        </div>
        <div
            style="display: table-cell; padding-bottom: 10px; font-size: 20px; display: flex; flex-direction: column; gap: 2px;">
            <span style="font-size: 12px;">Kepala Desa Tirto Sari</span>
            <div style="margin-top: 10px;">
                <table>
                    <tr>
                        <td><img src="data:image/svg+xml;base64,{{ base64_encode(QrCode::format('svg')->size(80)->generate(route('ttd', 'ttd.png'))) }}"
                    alt="qrcode"></td>
                    <td style="margin-left: 20px; font-size: 12px;"><span>Dokumen ini telah ditandatangani secara elektronik.</span></td>
                    </tr>
                </table>
            </div>
        </div>
        <div
            style="display: table-cell; margin-bottom: 50px; font-size: 13px; display: flex; flex-direction: column; gap: 2px;">
            <span>Suwarno</span>
        </div>
    </div>
</body>

</html>
