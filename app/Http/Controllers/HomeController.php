<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function homeSejarah()
    {

        $sejarah = Sejarah::first();

        return view('sejarah', [
            'sejarah' => $sejarah
        ]);
    }

    public function viewSejarah()
    {
        $user = Auth::user();

        $sejarah = Sejarah::first();

        return view('admin.sejarah.admin-sejarah', [
            'user' => $user,
            'sejarah' => $sejarah
        ]);
    }

    public function input(Request $req)
    {
        $req->validate([
            'gambar' => 'required',
            'sejarah' => 'required',
            'visi.*' => 'required',
            'misi.*' => 'required'
        ]);

        $gambar = $req->file('gambar');
        $new_photo_name = uniqid() . "." . $gambar->getClientOriginalExtension();
        $gambar->move('sejarah', $new_photo_name);

        $sejarah = new Sejarah();
        $sejarah->sejarah = $req->sejarah;
        $sejarah->gambar = $new_photo_name;
        $sejarah->visi = json_encode($req->visi);
        $sejarah->misi = json_encode($req->misi);
        $sejarah->save();

        return redirect()->back();
    }

    public function edit(Request $req)
    {
        if ($req->hasFile('gambar')) {
            $gambar = $req->file('gambar');
            $new_photo_name = uniqid() . "." . $gambar->getClientOriginalExtension();
            $gambar->move('sejarah', $new_photo_name);
        }


        $sejarah = Sejarah::first();
        $sejarah->sejarah = $req->sejarah ?? $sejarah->sejarah;
        $sejarah->gambar = $new_photo_name ?? $sejarah->gambar;
        $sejarah->visi = json_encode($req->visi);
        $sejarah->misi = json_encode($req->misi);
        $sejarah->save();

        return redirect()->back()->with('success', 'Data berhasil diubah');
    }

    public function kegiatan()
    {
        $user = Auth::user();

        $kegiatan = Kegiatan::get();

        return view('admin.kegiatan', [
            'user' => $user,
            'kegiatan' => $kegiatan
        ]);
    }

    public function kegiatanProcess(Request $req)
    {

        $files = $req->file('gambar');

        foreach ($files as $file) {
            $fileName = uniqid() . "." . $file->getClientOriginalExtension();
            $file->move('kegiatan', $fileName);
            Kegiatan::create(['gambar' => $fileName]);
        }

        return redirect()->back()->with('success', 'Kegiatan Berhasil Ditambah');
    }
}
