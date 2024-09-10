<?php

use App\Http\Controllers\Api\SuratController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getSkd/{id}', [SuratController::class, 'getSkd']);
Route::get('/getSkk/{id}', [SuratController::class, 'getSkk']);
Route::get('/getSku/{id}', [SuratController::class, 'getSku']);
Route::get('/getSkh/{id}', [SuratController::class, 'getSkh']);
Route::get('/detail-data/{id}', [SuratController::class, 'detail']);

Route::post('/statusSkd/{id}', [SuratController::class, 'statusChangeSkd']);
Route::post('/statusSkk/{id}', [SuratController::class, 'statusChangeSkk']);
Route::post('/statusSku/{id}', [SuratController::class, 'statusChangeSku']);
Route::post('/statusSkh/{id}', [SuratController::class, 'statusChangeSkh']);

// Route::post('/konfirmasiSkd/{id}', [SuratController::class, 'konfirmasiSkd']);
