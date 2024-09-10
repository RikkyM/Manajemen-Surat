<?php

namespace App\Http\Controllers;

use App\Http\Requests\Domisili;
use App\Http\Requests\Kehilangan;
use App\Http\Requests\Kematian;
use App\Http\Requests\Password;
use App\Http\Requests\Profil;
use App\Http\Requests\Usaha;
use App\Models\Skd;
use App\Models\Skh;
use App\Models\Skk;
use App\Models\Sku;
use App\Models\User;
use App\Models\userProfil;
use App\Repository\UserRepo;
use Barryvdh\Debugbar\Facades\Debugbar;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use FontLib\TrueType\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{

    protected $user_repo, $user;

    public function __construct(UserRepo $userRepo)
    {
        $this->user_repo = $userRepo;
    }

    public function dashboard()
    {
        $user = Auth::user();
        $profil = userProfil::with('user')->where('user_id', Auth::user()->id)->first();

        $data['skd'] = Skd::where('user_id', Auth::user()->id)->count();
        $data['sku'] = Sku::where('user_id', Auth::user()->id)->count();
        $data['skh'] = Skh::where('user_id', Auth::user()->id)->count();
        $data['skk'] = Skk::where('user_id', Auth::user()->id)->count();

        $surat['skd'] = Skd::where('user_id', Auth::user()->id)->get()->map(function ($item) {
            $item['jenis'] = 'skd';
            return $item;
        });
        $surat['sku'] = Sku::where('user_id', Auth::user()->id)->get()->map(function ($item) {
            $item['jenis'] = 'sku';
            return $item;
        });
        $surat['skh'] = Skh::where('user_id', Auth::user()->id)->get()->map(function ($item) {
            $item['jenis'] = 'skh';
            return $item;
        });
        $surat['skk'] = Skk::where('user_id', Auth::user()->id)->get()->map(function ($item) {
            $item['jenis'] = 'skk';
            return $item;
        });

        // $merge = $surat['skd']->merge($surat['sku'])->merge($surat['skk']);
        $merge = $surat['skd']->concat($surat['sku'])->concat($surat['skh'])->concat($surat['skk']);
        
        $merge = $merge->shuffle();

        return view('user.dashboard', ['user' => $profil, 'data' => $data, 'table' => $merge, 'profil' => $user]);
    }

    public function profile()
    {
        $profil = userProfil::with('user')->where('user_id', Auth::user()->id)->first();
        return view('user.profile', ['user' => $profil]);
    }

    public function updateProfil(Profil $request)
    {
        $result = $this->user_repo->updateProfil($request);
        if ($result) {
            return redirect()->route('user.profile')->with('message', 'Data Anda berhasil disimpan');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function domisili()
    {
        $profil = userProfil::with('user')->where('user_id', Auth::user()->id)->first();
        return view('user.surat-domisili', ['user' => $profil]);
    }

    public function skd(Domisili $request)
    {
        $save = $this->user_repo->skd($request);
        if ($save) {
            return redirect()->route('user.surat.domisili')->with('message', 'Data Anda berhasil dibuat');
        } else {
            return redirect()->back()->with('error', 'Gagal membuat data');
        }
    }

    public function kematian()
    {
        $profil = userProfil::with('user')->where('user_id', Auth::user()->id)->first();
        return view('user.surat-kematian', ['user' => $profil]);
    }

    public function skk(Kematian $request)
    {
        $result = $this->user_repo->skk($request);
        if ($result) {
            return redirect()->route('user.surat.kematian')->with('message', 'Data Anda berhasil dibuat');
        } else {
            return redirect()->back()->with('error', 'Gagal membuat data');
        }
    }

    public function usaha()
    {
        $profil = userProfil::with('user')->where('user_id', Auth::user()->id)->first();
        return view('user.surat-usaha', ['user' => $profil]);
    }

    public function sku(Usaha $request)
    {
        $result = $this->user_repo->sku($request);
        if ($result) {
            return redirect()->route('user.surat.usaha')->with('message', 'Data Anda berhasil dibuat');
        } else {
            return redirect()->back()->with('error', 'Gagal membuat data');
        }
    }

    public function kehilangan()
    {
        $profil = userProfil::with('user')->where('user_id', Auth::user()->id)->first();
        return view('user.surat-kehilangan', ['user' => $profil]);
    }

    public function skh(Kehilangan $request)
    {
        $result = $this->user_repo->skh($request);
        if ($result) {
            return redirect()->route('user.surat.kehilangan')->with('message', 'Data Anda berhasil dibuat');
        } else {
            return redirect()->back()->with('error', 'Gagal membuat data');
        }
    }

    public function pengajuan(Request $r)
    {
        $profil = userProfil::with('user')->where('user_id', Auth::user()->id)->first();
        $skd = Skd::with('user')->where('user_id', Auth::user()->id)->where('nama', 'like', "%$r->search%")->get();
        $skk = Skk::with('user')->where('user_id', Auth::user()->id)->where('nama', 'like', "%$r->search%")->get();
        $sku = Sku::with('user')->where('user_id', Auth::user()->id)->where('nama', 'like', "%$r->search%")->get();
        $skh = Skh::with('user')->where('user_id', Auth::user()->id)->where('nama', 'like', "%$r->search%")->get();
        return view('user.data-pengajuan', [
            'user' => $profil,
            'skd' => $skd,
            'skk' => $skk,
            'sku' => $sku,
            'skh' => $skh
        ]);
    }

    public function ubahSandi()
    {
        $profil = userProfil::with('user')->where('user_id', Auth::user()->id)->first();
        return view('user.kata-sandi', ['user' => $profil]);
    }

    public function ubahSandiProcess(Password $request)
    {
        $result = $this->user_repo->ubahSandi($request);
        if ($result === true) {
            return redirect()->route('user.sandi')->with('message', 'Kata Sandi Anda Berhasil Diubah');
        } elseif ($result === false) {
            return redirect()->back()->with('error', 'Kata Sandi lama yang anda masukkan salah');
        } else {
            return redirect()->back();
        }
    }

    public function skdPdf($id)
    {
        $data = [];
        $waktu = Carbon::now()->format('Y');

        $data['data'] = Skd::with('user')->find($id);
        $data['data']->tanggal_lahir = Carbon::parse($data['data']->tanggal_lahir);
        $data['title'] = "Surat Keterangan Domisili";

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML(view('user.skd-view', ['data' => $data, 'waktu' => $waktu]));
        $mpdf->Output();
    }

    public function skkPdf($id)
    {
        $data = [];
        $waktu = Carbon::now()->format('Y');

        $data['data'] = Skk::with('user')->find($id);
        $data['data']->tanggal_lahir = Carbon::parse($data['data']->tanggal_lahir);
        $data['data']->tanggal_meninggal = Carbon::parse($data['data']->tanggal_meninggal);
        $data['data']->waktu_meninggal = Carbon::parse($data['data']->waktu_meninggal)->timezone('Asia/Jakarta');
        $data['title'] = "Surat Keterangan Kematian";

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML(view('user.skk-view', ['data' => $data, 'waktu' => $waktu]));
        $mpdf->Output();
    }

    public function skuPdf($id)
    {
        $data = [];
        $waktu = Carbon::now()->format('Y');

        $data['data'] = Sku::with('user')->find($id);
        $data['data']->tanggal_lahir = Carbon::parse($data['data']->tanggal_lahir);
        $data['title'] = "Surat Keterangan Usaha";

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML(view('user.sku-view', ['data' => $data, 'waktu' => $waktu]));
        $mpdf->Output();
    }

    public function skhPdf($id)
    {
        $data = [];
        $waktu = Carbon::now()->format('Y');

        $data['data'] = Skh::with('user')->find($id);
        $data['data']->tanggal_lahir = Carbon::parse($data['data']->tanggal_lahir);
        $data['title'] = "Surat Keterangan Usaha";

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML(view('user.skh-view', ['data' => $data, 'waktu' => $waktu]));
        $mpdf->Output();
    }

    public function ttd($filename)
    {
        $filePath = public_path('data/img/' . $filename);

        if (!file_exists($filePath)) {
            abort(404);
        }

        $fileContents = file_get_contents($filePath);

        return response($fileContents, 200)
            ->header('Content-Type', 'image/jpg');
    }
}
