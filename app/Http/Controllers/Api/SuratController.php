<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Skd;
use App\Models\Skh;
use App\Models\Skk;
use App\Models\Sku;
use App\Models\userProfil;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function getSkd($id)
    {
        $skd = Skd::find($id);

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $skd,
        ], 200);
    }

    public function getSkk($id)
    {
        $skk = Skk::find($id);

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $skk,
        ], 200);
    }

    public function getSku($id)
    {
        $sku = Sku::find($id);

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $sku,
        ], 200);
    }

    public function getSkh($id)
    {
        $skh = Skh::find($id);

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $skh,
        ], 200);
    }

    public function detail($id)
    {
        $user = userProfil::with('user')->find($id);

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $user
        ]);
    }

    public function statusChangeSkd(Request $req, $id)
    {
        $status = Skd::find($id);
        if ($status) {
            $status->status = $req->input('status');
            $route = route('admin.domisili');
            $status->save();

            return response()->json(['status' => true, 'message' => 'Status updated successfully', 'route' => $route]);
        }

        return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
    }

    public function statusChangeSkk(Request $req, $id)
    {
        $status = Skk::find($id);
        if ($status) {
            $status->status = $req->input('status');
            $route = route('admin.kematian');
            $status->save();

            return response()->json(['status' => true, 'message' => 'Status updated successfully', 'route' => $route]);
        }

        return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
    }

    public function statusChangeSku(Request $req, $id)
    {
        $status = Sku::find($id);
        if ($status) {
            $route = route('admin.usaha');
            $status->status = $req->input('status');
            $status->save();

            return response()->json(['status' => true, 'message' => 'Status updated successfully', 'route' => $route]);
        }

        return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
    }

    public function statusChangeSkh(Request $req, $id)
    {
        $status = Skh::find($id);
        if ($status) {
            $route = route('admin.kehilangan');
            $status->status = $req->input('status');
            $status->save();

            return response()->json(['status' => true, 'message' => 'Status updated successfully', 'route' => $route]);
        }

        return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
    }

    // public function konfirmasiSkd($id)
    // {
    //     $konfirmasi = Skd::findOrFail($id);
    //     $route = route('admin.domisili');
    //     $konfirmasi->keterangan = '1';
    //     $konfirmasi->save();

    //     return response()->json(['status' => true, 'message' => 'Data berhasil dikonfirmasi', 'route' => $route]);
    // }
}
