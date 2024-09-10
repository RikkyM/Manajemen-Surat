<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\Kegiatan;
use App\Models\Sejarah;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $sejarah = Sejarah::first();

    return view('home', compact('sejarah'));
})->name('home');

Route::get('history', [HomeController::class, 'homeSejarah'])->name('sejarah');

Route::get('kegiatan-kantor', function () {
    $sejarah = Sejarah::first();
    $kegiatan = Kegiatan::all();

    return view('kegiatan', [
        'sejarah' => $sejarah,
        'kegiatan' => $kegiatan
    ]);
})->name('kegiatan');

Route::get('location', function () {
    $sejarah = Sejarah::first();

    return view('location', compact('sejarah'));
})->name('location');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginProcess']);

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerProcess']);

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/data-user', [AdminController::class, 'dataUser'])->name('admin.data-user');
    Route::get('/domisili', [AdminController::class, 'domisili'])->name('admin.domisili');
    Route::get('/domisili/{id}', [AdminController::class, 'domisiliDetail'])->name('admin.domisiliDetail');
    Route::get('/kematian', [AdminController::class, 'kematian'])->name('admin.kematian');
    Route::get('/kematian/{id}', [AdminController::class, 'kematianDetail'])->name('admin.kematianDetail');
    Route::get('/usaha', [AdminController::class, 'usaha'])->name('admin.usaha');
    Route::get('/usaha/{id}', [AdminController::class, 'usahaDetail'])->name('admin.usahaDetail');
    Route::get('/kehilangan', [AdminController::class, 'kehilangan'])->name('admin.kehilangan');
    Route::get('/kehilangan/{id}', [AdminController::class, 'kehilanganDetail'])->name('admin.kehilanganDetail');
    Route::get('/admin-sejarah', [HomeController::class, 'viewSejarah'])->name('admin.sejarah');
    Route::post('/admin-sejarah', [HomeController::class, 'input']);
    Route::put('/admin-sejarah', [HomeController::class, 'edit']);
    Route::get('/kegiatan', [HomeController::class, 'kegiatan'])->name('admin.admin-kegiatan');
    Route::post('/kegiatan', [HomeController::class, 'kegiatanProcess']);
});

Route::prefix('user')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/profile', [UserController::class, 'updateProfil']);
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::prefix('/surat')->group(function () {
        Route::get('/domisili', [UserController::class, 'domisili'])->name('user.surat.domisili');
        Route::post('/domisili', [UserController::class, 'skd']);
        Route::get('/kematian', [UserController::class, 'kematian'])->name('user.surat.kematian');
        Route::post('/kematian', [UserController::class, 'skk']);
        Route::get('/usaha', [UserController::class, 'usaha'])->name('user.surat.usaha');
        Route::post('/usaha', [UserController::class, 'sku']);
        Route::get('/kehilangan', [UserController::class, 'kehilangan'])->name('user.surat.kehilangan');
        Route::post('/kehilangan', [UserController::class, 'skh']);
    });
    Route::get('/data-pengajuan', [UserController::class, 'pengajuan'])->name('user.pengajuan');
    Route::get('/surat/skd/{id}', [UserController::class, 'skdPdf'])->name('user.skdPdf');
    Route::get('/surat/skk/{id}', [UserController::class, 'skkPdf'])->name('user.skkPdf');
    Route::get('/surat/sku/{id}', [UserController::class, 'skuPdf'])->name('user.skuPdf');
    Route::get('/surat/skh/{id}', [UserController::class, 'skhPdf'])->name('user.skhPdf');
    Route::get('/ubah-sandi', [UserController::class, 'ubahSandi'])->name('user.sandi');
    Route::get('/ttd/{filename}', [UserController::class, 'ttd'])->name('ttd');
    Route::post('/ubah-sandi', [UserController::class, 'ubahSandiProcess']);
});
