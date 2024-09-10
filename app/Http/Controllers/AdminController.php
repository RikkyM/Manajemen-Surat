<?php

namespace App\Http\Controllers;

use App\Models\Skd;
use App\Models\Skh;
use App\Models\Skk;
use App\Models\Sku;
use App\Models\userProfil;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $skd = Skd::query();
        $skk = Skk::query();
        $sku = Sku::query();
        $skh = Skh::query();

        $data = [
            'skd' => $skd->count(),
            'skk' => $skk->count(),
            'sku' => $sku->count(),
            'skh' => $skh->count()
        ];
        return view('admin.dashboard', ['user' => $user, 'data' => $data]);
    }

    public function dataUser(Request $req)
    {
        $user = Auth::user();
        $data = userProfil::with('user')->whereHas('user', function ($query) use ($req) {
            $query->where('name', 'like', "%{$req->search}%");
        })->get();
        return view('admin.data-user', ['user' => $user, 'data' => $data]);
    }

    public function domisili()
    {
        $user = Auth::user();
        $data = Skd::get();
        // dd($data->count());
        return view('admin.domisili', ['user' => $user, 'data' => $data]);
    }

    public function domisiliDetail($id)
    {
        $user = Auth::user();
        $data = Skd::find($id);
        $tahun = Carbon::now()->format('Y');

        return view('admin.detail.domisili-detail', ['user' => $user, 'data' => $data, 'tahun' => $tahun]);
    }

    public function kematian()
    {
        $user = Auth::user();
        $data = Skk::get();
        return view('admin.kematian', ['user' => $user, 'data' => $data]);
    }

    public function kematianDetail($id)
    {
        $user = Auth::user();
        $data = Skk::find($id);
        $tahun = Carbon::now()->format('Y');

        $data->tanggal_lahir = Carbon::parse($data->tanggal_lahir)->translatedFormat('d-M-Y');
        $data->tanggal_meninggal = Carbon::parse($data->tanggal_meninggal)->translatedFormat('d-M-Y');
        $data->waktu_meninggal = Carbon::parse($data->waktu_meninggal)->format('H:i');
        

        return view('admin.detail.kematian-detail', ['user' => $user, 'data' => $data, 'tahun' => $tahun]);
    }

    public function usaha()
    {
        $user = Auth::user();
        $data = Sku::get();
        return view('admin.usaha', ['user' => $user, 'data' => $data]);
    }

    public function usahaDetail($id)
    {
        $user = Auth::user();
        $data = Sku::find($id);
        $tahun = Carbon::now()->format('Y');

        $data->tanggal_lahir = Carbon::parse($data->tanggal_lahir)->translatedFormat('d-M-Y');

        return view('admin.detail.usaha-detail', ['user' => $user, 'data' => $data, 'tahun' => $tahun]);
    }

    public function kehilangan()
    {
        $user = Auth::user();
        $data = Skh::get();
        return view('admin.kehilangan', ['user' => $user, 'data' => $data]);
    }

    public function kehilanganDetail($id)
    {
        $user = Auth::user();
        $data = Skh::find($id);
        $tahun = Carbon::now()->format('Y');

        $data->tanggal_lahir = Carbon::parse($data->tanggal_lahir)->translatedFormat('d-M-Y');

        return view('admin.detail.kehilangan-detail', ['user' => $user, 'data' => $data, 'tahun' => $tahun]);
    }
}
