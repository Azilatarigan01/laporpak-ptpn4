<?php

use App\Http\Controllers\Api\MasterDataApiController;
use App\Http\Controllers\Api\PengaduanApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - LaporPak PTPN IV
|--------------------------------------------------------------------------
|
| Di sini Anda mendaftarkan rute RESTful API untuk aplikasi LaporPak.
| Rute ini otomatis dimuat oleh RouteServiceProvider dan diberi prefix '/api'.
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| RESTful API Version 1 (v1)
|--------------------------------------------------------------------------
*/
Route::prefix('v1')->group(function () {

    // Health check endpoint
    Route::get('/ping', function () {
        return response()->json([
            'success' => true,
            'message' => 'LaporPak PTPN IV REST API is running smoothly',
            'server_time' => now('Asia/Jakarta')->toIso8601String(),
        ]);
    });

    // Master Data Endpoints (untuk dropdown form & referensi sistem)
    Route::prefix('master')->group(function () {
        Route::get('/kategori', [MasterDataApiController::class, 'kategori']);
        Route::get('/areas', [MasterDataApiController::class, 'areas']);
    });

    // Pengaduan & Tracking Endpoints
    Route::prefix('pengaduan')->group(function () {
        Route::get('/', [PengaduanApiController::class, 'index']);
        Route::get('/stats', [PengaduanApiController::class, 'stats']);
        Route::post('/', [PengaduanApiController::class, 'store']);
        Route::get('/{kode_pengaduan}', [PengaduanApiController::class, 'show']);
        Route::post('/{kode_pengaduan}/rating', [PengaduanApiController::class, 'submitRating']);
    });

});
