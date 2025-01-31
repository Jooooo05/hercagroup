<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\HasilPerhitunganController;



Route::prefix('penjualan')->group(function () {
    Route::get('/', [PenjualanController::class, 'index']);
    Route::get('/komisi/{id}', [PenjualanController::class, 'getKomisiByMarketing']);
});

Route::prefix('marketings')->group(function (){
    Route::get('/', [MarketingController::class, 'index']);
    Route::post('/', [MarketingController::class, 'store']);
    Route::delete('/{id}', [MarketingController::class, 'destroy']);
    Route::get('/komisi', [MarketingController::class, 'getAllMarketingWithKomisi']);
});

Route::prefix('hasilPerhitungan')->group(function (){
    Route::get('/', [HasilPerhitunganController::class, 'index']);
});

Route::prefix('pembayaran')->group(function () {
    Route::get('/', [PembayaranController::class, 'index']);
    Route::post('/', [PembayaranController::class, 'store']);
});

Route::get('komisi-per-bulan', [MarketingController::class, 'getKomisiPerBulan']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
