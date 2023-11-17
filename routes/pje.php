<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PJE\DashboardController;
use App\Http\Controllers\PJE\AtmCrmController;
use App\Http\Controllers\PJE\OosController;
use App\Http\Controllers\PJE\AvailibilityEdcController;
use App\Http\Controllers\PJE\PaguKasController;
use App\Http\Controllers\PJE\DisputeResolutionController;
use App\Http\Controllers\PJE\AvailibilityAtmController;
use App\Http\Controllers\PJE\KasController;
use App\Http\Controllers\PJE\RekapPemasanganEdcController;

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

Route::get('/poa', [DashboardController::class, 'dashboardPOA'])->name('dashboardPOA');
Route::prefix('pje')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboardPJE'])->name('dashboardPJE')->middleware('checkauth');

    // ================ Route ATM CRM ================ //
    Route::prefix('AtmCrm')->group(function(){
        Route::get('/formUpload', [AtmCrmController::class, 'formUploadAtmCrm'])->name('formUploadAtmCrm')->middleware('checkauth');
        Route::get('/list', [AtmCrmController::class, 'getListAtmCrm'])->name('getListAtmCrm')->middleware('checkauth');
        Route::get('/formUpdate/{id}', [AtmCrmController::class, 'formUpdateAtmCrm'])->name('formUpdateAtmCrm')->middleware('checkauth');
        Route::get('/formUpdateBulk', [AtmCrmController::class, 'formUpdateBulkAtmCrm'])->name('formUpdateBulkAtmCrm')->middleware('checkauth');

        Route::post('prosesImport', [AtmCrmController::class, 'prosesImportAtmCrm'])->name('prosesImportAtmCrm');
        Route::post('prosesUpdate', [AtmCrmController::class, 'prosesUpdateAtmCrm'])->name('prosesUpdateAtmCrm');
        Route::post('prosesUpdateBulk', [AtmCrmController::class, 'prosesUpdateBulkAtmCrm'])->name('prosesUpdateBulkAtmCrm');
        Route::post('exportReport', [AtmCrmController::class, 'exportReportAtmCrm'])->name('exportReportAtmCrm');
        Route::get('prosesDelete/{id}', [AtmCrmController::class, 'prosesDeleteAtmCrm'])->name('prosesDeleteAtmCrm')->middleware('checkauth');
        Route::delete('prosesDeleteBulk', [AtmCrmController::class, 'prosesDeleteAtmCrmBulk'])->name('prosesDeleteAtmCrmBulk');
    });

    // ================ Route Out of Service ================ //
    Route::prefix('Oos')->group(function(){
        Route::get('/formUpload', [OosController::class, 'formUploadOos'])->name('formUploadOos')->middleware('checkauth');
        Route::get('/list', [OosController::class, 'getListOos'])->name('getListOos')->middleware('checkauth');
        Route::get('/formUpdateBulk', [OosController::class, 'formUpdateBulkOos'])->name('formUpdateBulkOos')->middleware('checkauth');

        Route::post('prosesImport', [OosController::class, 'prosesImportOos'])->name('prosesImportOos');
        Route::post('prosesUpdateBulk', [OosController::class, 'prosesUpdateBulkOos'])->name('prosesUpdateBulkOos');
        Route::post('exportReport', [OosController::class, 'exportReportOos'])->name('exportReportOos');
        Route::get('prosesDelete/{id}', [OosController::class, 'prosesDeleteOos'])->name('prosesDeleteOos')->middleware('checkauth');
        Route::delete('prosesDeleteBulk', [OosController::class, 'prosesDeleteOosBulk'])->name('prosesDeleteOosBulk');
    });

    // ================ Route Availibility EDC ================ //
    Route::prefix('AvailibilityEdc')->group(function(){
        Route::get('/formUpload', [AvailibilityEdcController::class, 'formUploadAvailibilityEdc'])->name('formUploadAvailibilityEdc')->middleware('checkauth');
        Route::get('/list', [AvailibilityEdcController::class, 'getListAvailibilityEdc'])->name('getListAvailibilityEdc')->middleware('checkauth');
        Route::get('/formUpdate/{id}', [AvailibilityEdcController::class, 'formUpdateAvailibilityEdc'])->name('formUpdateAvailibilityEdc')->middleware('checkauth');
        Route::get('/formUpdateBulk', [AvailibilityEdcController::class, 'formUpdateBulkAvailibilityEdc'])->name('formUpdateBulkAvailibilityEdc')->middleware('checkauth');

        Route::post('prosesImport', [AvailibilityEdcController::class, 'prosesImportAvailibilityEdc'])->name('prosesImportAvailibilityEdc');
        Route::post('prosesUpdate', [AvailibilityEdcController::class, 'prosesUpdateAvailibilityEdc'])->name('prosesUpdateAvailibilityEdc');
        Route::post('prosesUpdateBulk', [AvailibilityEdcController::class, 'prosesUpdateBulkAvailibilityEdc'])->name('prosesUpdateBulkAvailibilityEdc');
        Route::post('exportReport', [AvailibilityEdcController::class, 'exportReportAvailibilityEdc'])->name('exportReportAvailibilityEdc');
        Route::get('prosesDelete/{id}', [AvailibilityEdcController::class, 'prosesDeleteAvailibilityEdc'])->name('prosesDeleteAvailibilityEdc')->middleware('checkauth');
        Route::delete('prosesDeleteBulk', [AvailibilityEdcController::class, 'prosesDeleteAvailibilityEdcBulk'])->name('prosesDeleteAvailibilityEdcBulk');
    });

    // ================ Route Availibility ATM ================ //
    Route::prefix('AvailibilityAtm')->group(function(){
        Route::get('/formUpload', [AvailibilityAtmController::class, 'formUploadAvailibilityAtm'])->name('formUploadAvailibilityAtm')->middleware('checkauth');
        Route::get('/list', [AvailibilityAtmController::class, 'getListAvailibilityAtm'])->name('getListAvailibilityAtm')->middleware('checkauth');
        Route::get('/formUpdate/{id}', [AvailibilityAtmController::class, 'formUpdateAvailibilityAtm'])->name('formUpdateAvailibilityAtm')->middleware('checkauth');
        Route::get('/formUpdateBulk', [AvailibilityAtmController::class, 'formUpdateBulkAvailibilityAtm'])->name('formUpdateBulkAvailibilityAtm')->middleware('checkauth');

        Route::post('prosesImport', [AvailibilityAtmController::class, 'prosesImportAvailibilityAtm'])->name('prosesImportAvailibilityAtm');
        Route::post('prosesUpdate', [AvailibilityAtmController::class, 'prosesUpdateAvailibilityAtm'])->name('prosesUpdateAvailibilityAtm');
        Route::post('prosesUpdateBulk', [AvailibilityAtmController::class, 'prosesUpdateBulkAvailibilityAtm'])->name('prosesUpdateBulkAvailibilityAtm');
        Route::post('exportReport', [AvailibilityAtmController::class, 'exportReportAvailibilityAtm'])->name('exportReportAvailibilityAtm');
        Route::get('prosesDelete/{id}', [AvailibilityAtmController::class, 'prosesDeleteAvailibilityAtm'])->name('prosesDeleteAvailibilityAtm')->middleware('checkauth');
        Route::delete('prosesDeleteBulk', [AvailibilityAtmController::class, 'prosesDeleteAvailibilityAtmBulk'])->name('prosesDeleteAvailibilityAtmBulk');
    });

    // ================ Route Kas ATM/CRM ================ //
    Route::prefix('Kas')->group(function(){
        Route::get('/formUpload', [KasController::class, 'formUploadKas'])->name('formUploadKas')->middleware('checkauth');
        Route::get('/list', [KasController::class, 'getListKas'])->name('getListKas')->middleware('checkauth');
        Route::get('/formUpdate/{id}', [KasController::class, 'formUpdateKas'])->name('formUpdateKas')->middleware('checkauth');
        Route::get('/formUpdateBulk', [KasController::class, 'formUpdateBulkKas'])->name('formUpdateBulkKas')->middleware('checkauth');

        Route::post('prosesImport', [KasController::class, 'prosesImportKas'])->name('prosesImportKas');
        Route::post('prosesUpdate', [KasController::class, 'prosesUpdateKas'])->name('prosesUpdateKas');
        Route::post('prosesUpdateBulk', [KasController::class, 'prosesUpdateBulkKas'])->name('prosesUpdateBulkKas');
        Route::post('exportReport', [KasController::class, 'exportReportKas'])->name('exportReportKas');
        Route::get('prosesDelete/{id}', [KasController::class, 'prosesDeleteKas'])->name('prosesDeleteKas')->middleware('checkauth');
        Route::delete('prosesDeleteBulk', [KasController::class, 'prosesDeleteKasBulk'])->name('prosesDeleteKasBulk');
    });

    // ================ Route Rekap Pemasangan EDC ================ //
    Route::prefix('RekapPemasanganEdc')->group(function(){
        Route::get('/formUpload', [RekapPemasanganEdcController::class, 'formUploadRekapPemasanganEdc'])->name('formUploadRekapPemasanganEdc')->middleware('checkauth');
        Route::get('/list', [RekapPemasanganEdcController::class, 'getListRekapPemasanganEdc'])->name('getListRekapPemasanganEdc')->middleware('checkauth');
        Route::get('/formUpdate/{id}', [RekapPemasanganEdcController::class, 'formUpdateRekapPemasanganEdc'])->name('formUpdateRekapPemasanganEdc')->middleware('checkauth');
        Route::get('/formUpdateBulk', [RekapPemasanganEdcController::class, 'formUpdateBulkRekapPemasanganEdc'])->name('formUpdateBulkRekapPemasanganEdc')->middleware('checkauth');

        Route::post('prosesImport', [RekapPemasanganEdcController::class, 'prosesImportRekapPemasanganEdc'])->name('prosesImportRekapPemasanganEdc');
        Route::post('prosesUpdate', [RekapPemasanganEdcController::class, 'prosesUpdateRekapPemasanganEdc'])->name('prosesUpdateRekapPemasanganEdc');
        Route::post('prosesUpdateBulk', [RekapPemasanganEdcController::class, 'prosesUpdateBulkRekapPemasanganEdc'])->name('prosesUpdateBulkRekapPemasanganEdc');
        Route::post('exportReport', [RekapPemasanganEdcController::class, 'exportReportRekapPemasanganEdc'])->name('exportReportRekapPemasanganEdc');
        Route::get('prosesDelete/{id}', [RekapPemasanganEdcController::class, 'prosesDeleteRekapPemasanganEdc'])->name('prosesDeleteRekapPemasanganEdc')->middleware('checkauth');
        Route::delete('prosesDeleteBulk', [RekapPemasanganEdcController::class, 'prosesDeleteRekapPemasanganEdcBulk'])->name('prosesDeleteRekapPemasanganEdcBulk');
    });
    
    // ================ Route Pagu Kas ================ //
    Route::prefix('PaguKas')->group(function(){
        Route::get('/formUpload', [PaguKasController::class, 'formUploadPaguKas'])->name('formUploadPaguKas')->middleware('checkauth');
        Route::get('/list', [PaguKasController::class, 'getListPaguKas'])->name('getListPaguKas')->middleware('checkauth');
        Route::get('/formUpdate/{id}', [PaguKasController::class, 'formUpdatePaguKas'])->name('formUpdatePaguKas')->middleware('checkauth');
        Route::get('/formUpdateBulk', [PaguKasController::class, 'formUpdateBulkPaguKas'])->name('formUpdateBulkPaguKas')->middleware('checkauth');

        Route::post('prosesImport', [PaguKasController::class, 'prosesImportPaguKas'])->name('prosesImportPaguKas');
        Route::post('prosesUpdate', [PaguKasController::class, 'prosesUpdatePaguKas'])->name('prosesUpdatePaguKas');
        Route::post('prosesUpdateBulk', [PaguKasController::class, 'prosesUpdateBulkPaguKas'])->name('prosesUpdateBulkPaguKas');
        Route::post('exportReport', [PaguKasController::class, 'exportReportPaguKas'])->name('exportReportPaguKas');
        Route::get('prosesDelete/{id}', [PaguKasController::class, 'prosesDeletePaguKas'])->name('prosesDeletePaguKas')->middleware('checkauth');
        Route::delete('prosesDeleteBulk', [PaguKasController::class, 'prosesDeletePaguKasBulk'])->name('prosesDeletePaguKasBulk');
    });
});
