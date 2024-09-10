<?php

namespace App\Repository;

use App\Models\Skd;
use App\Models\Skh;
use App\Models\Skk;
use App\Models\Sku;
use App\Models\User;
use App\Models\userProfil;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepo
{
    public function updateProfil($req)
    {
        $user = Auth::user()->id;
        $profil = userProfil::where('user_id', $user)->first();

        if (!$profil) {
            $profil = new userProfil();
            $profil->user_id = $user;
        }

        if ($req->nama) {
            $personal = User::find($user);
            $personal->name = $req->nama;
            $personal->email = $req->email;
            $personal->save();
        }

        $profil->pekerjaan = $req->pekerjaan ?? $profil->pekerjaan;
        $profil->ponsel = $req->ponsel ?? $profil->ponsel;
        $profil->nik = $req->nik ?? $profil->nik;
        $profil->agama = $req->agama ?? $profil->agama;
        $profil->tempat_lahir = $req->tempat_lahir ?? $profil->tempat_lahir;
        $profil->jenis_kelamin = $req->jenis_kelamin ?? $profil->jenis_kelamin;
        $profil->tanggal_lahir = $req->tanggal_lahir ?? $profil->tanggal_lahir;
        $profil->alamat = $req->alamat ?? $profil->alamat;
        if ($profil->save()) {
            return true;
        } else {
            return false;
        }
    }

    public function skd($req)
    {
        $photo = $req->file('upload_kk');
        $new_photo_name = uniqid() . "." . $photo->getClientOriginalExtension();
        $photo->move('upload_kk/skd', $new_photo_name);
        $domisili = new Skd();
        $domisili->user_id = Auth::user()->id;
        $domisili->nama = $req->nama;
        $domisili->nik = $req->nik;
        $domisili->no_kk = $req->kk;
        $domisili->upload_kk = $new_photo_name;
        $domisili->agama = $req->agama;
        $domisili->tempat_lahir = $req->tempat_lahir;
        $domisili->tanggal_lahir = $req->tanggal_lahir;
        $domisili->jenis_kelamin = $req->jenis_kelamin;
        $domisili->kewarganegaraan = $req->kewarganegaraan;
        $domisili->pekerjaan = $req->pekerjaan;
        $domisili->alamat = $req->alamat;
        if ($domisili->save()) {
            return true;
        } else {
            return false;
        }
    }

    public function skk($req)
    {
        $photo = $req->file('upload_kk');
        $new_photo_name = uniqid() . "." . $photo->getClientOriginalExtension();
        $photo->move('upload_kk/skk', $new_photo_name);
        $kematian = new Skk();
        $kematian->user_id = Auth::user()->id;
        $kematian->nama = $req->nama;
        $kematian->upload_kk = $new_photo_name;
        $kematian->tempat_meninggal = $req->tempat_meninggal;
        $kematian->tanggal_meninggal = $req->tanggal;
        $kematian->waktu_meninggal = $req->jam;
        $kematian->tempat_lahir = $req->tempat_lahir;
        $kematian->tanggal_lahir = $req->tanggal_lahir;
        $kematian->jenis_kelamin = $req->jenis_kelamin;
        $kematian->pekerjaan = $req->pekerjaan;
        $kematian->alamat = $req->alamat;
        if ($kematian->save()) {
            return true;
        } else {
            return false;
        }
    }

    public function sku($req)
    {
        $photo = $req->file('upload_kk');
        $new_photo_name = uniqid() . "." . $photo->getClientOriginalExtension();
        $photo->move('upload_kk/sku', $new_photo_name);

        $usaha = new Sku();
        $usaha->user_id = Auth::user()->id;
        $usaha->nama = $req->nama;
        $usaha->tempat_lahir = $req->tempat_lahir;
        $usaha->tanggal_lahir = $req->tanggal_lahir;
        $usaha->nik = $req->nik;
        $usaha->upload_kk = $new_photo_name;
        $usaha->jenis_kelamin = $req->jenis_kelamin;
        $usaha->kewarganegaraan = $req->kewarganegaraan;
        $usaha->pekerjaan = $req->pekerjaan;
        $usaha->agama = $req->agama;
        $usaha->alamat = $req->alamat;
        if ($usaha->save()) {
            return true;
        } else {
            return false;
        }
    }

    public function skh($req)
    {
        $photo = $req->file('upload_kk');
        $new_photo_name = uniqid() . "." . $photo->getClientOriginalExtension();
        $photo->move('upload_kk/skh', $new_photo_name);

        $kehilangan = new Skh();
        $kehilangan->user_id = Auth::user()->id;
        $kehilangan->nama = $req->nama;
        $kehilangan->nik = $req->nik;
        $kehilangan->no_kk = $req->kk;
        $kehilangan->upload_kk = $new_photo_name;
        $kehilangan->agama = $req->agama;
        $kehilangan->tempat_lahir = $req->tempat_lahir;
        $kehilangan->tanggal_lahir = $req->tanggal_lahir;
        $kehilangan->jenis_kelamin = $req->jenis_kelamin;
        $kehilangan->pekerjaan = $req->pekerjaan;
        $kehilangan->alamat = $req->alamat;
        if ($kehilangan->save()) {
            return true;
        } else {
            return false;
        }
    }

    public function ubahSandi($req)
    {
        $pengguna = Auth::user();

        if (!empty($req->old_password) && !empty($req->password)) {
            if (Hash::check($req->old_password, $pengguna->password)) {
                $pengguna->password = Hash::make($req->password);
                if ($pengguna->save()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return null;
        }
    }
}
