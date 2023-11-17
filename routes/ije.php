<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IJE\DashboardController;
use App\Http\Controllers\IJE\KomplainController;
use App\Http\Controllers\IJE\PemasanganEdcController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('ije')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboardIJE'])->name('dashboardIJE')->middleware('checkauth');

    // ================ Route Komplain ATM & E-Channel, EDC ================ //
    Route::prefix('Komplain')->group(function(){
        Route::get('/formUpload', [KomplainController::class, 'formUploadKomplain'])->name('formUploadKomplain')->middleware('checkauth');
        Route::get('/list', [KomplainController::class, 'getListKomplain'])->name('getListKomplain')->middleware('checkauth');
        Route::get('/formUpdate/{id}', [KomplainController::class, 'formUpdateKomplain'])->name('formUpdateKomplain')->middleware('checkauth');
        Route::get('/formUpdateBulk', [KomplainController::class, 'formUpdateBulkKomplain'])->name('formUpdateBulkKomplain')->middleware('checkauth');

        Route::post('prosesImport', [KomplainController::class, 'prosesImportKomplain'])->name('prosesImportKomplain');
        Route::post('prosesUpdate', [KomplainController::class, 'prosesUpdateKomplain'])->name('prosesUpdateKomplain');
        Route::post('prosesUpdateBulk', [KomplainController::class, 'prosesUpdateBulkKomplain'])->name('prosesUpdateBulkKomplain');
        Route::post('exportReport', [KomplainController::class, 'exportReportKomplain'])->name('exportReportKomplain');
        Route::get('prosesDelete/{id}', [KomplainController::class, 'prosesDeleteKomplain'])->name('prosesDeleteKomplain')->middleware('checkauth');
        Route::delete('prosesDeleteBulk', [KomplainController::class, 'prosesDeleteKomplainBulk'])->name('prosesDeleteKomplainBulk');
    });

    // ================ Route Pemasangan EDC ================ //
    Route::prefix('PemasanganEdc')->group(function(){
        Route::get('/formUpload', [PemasanganEdcController::class, 'formUploadPemasanganEdc'])->name('formUploadPemasanganEdc')->middleware('checkauth');
        Route::get('/list', [PemasanganEdcController::class, 'getListPemasanganEdc'])->name('getListPemasanganEdc')->middleware('checkauth');
        Route::get('/formUpdate/{id}', [PemasanganEdcController::class, 'formUpdatePemasanganEdc'])->name('formUpdatePemasanganEdc')->middleware('checkauth');
        Route::get('/formUpdateBulk', [PemasanganEdcController::class, 'formUpdateBulkPemasanganEdc'])->name('formUpdateBulkPemasanganEdc')->middleware('checkauth');

        Route::post('prosesImport', [PemasanganEdcController::class, 'prosesImportPemasanganEdc'])->name('prosesImportPemasanganEdc');
        Route::post('prosesUpdate', [PemasanganEdcController::class, 'prosesUpdatePemasanganEdc'])->name('prosesUpdatePemasanganEdc');
        Route::post('prosesUpdateBulk', [PemasanganEdcController::class, 'prosesUpdateBulkPemasanganEdc'])->name('prosesUpdateBulkPemasanganEdc');
        Route::post('exportReport', [PemasanganEdcController::class, 'exportReportPemasanganEdc'])->name('exportReportPemasanganEdc');
        Route::get('prosesDelete/{id}', [PemasanganEdcController::class, 'prosesDeletePemasanganEdc'])->name('prosesDeletePemasanganEdc')->middleware('checkauth');
        Route::delete('prosesDeleteBulk', [PemasanganEdcController::class, 'prosesDeletePemasanganEdcBulk'])->name('prosesDeletePemasanganEdcBulk');
    });
});
