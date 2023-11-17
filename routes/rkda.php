<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RKDA\DashboardController;
use App\Http\Controllers\RKDA\AntarBankController;

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

Route::get('/rekon', [DashboardController::class, 'dashboardRekon'])->name('dashboardRekon');
Route::prefix('rkda')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboardRKDA'])->name('dashboardRKDA')->middleware('checkauth');

    // ================ Route ATM CRM ================ //
    Route::prefix('AntarBank')->group(function(){
        Route::get('/formUpload', [AntarBankController::class, 'formUploadAntarBank'])->name('formUploadAntarBank')->middleware('checkauth');
        Route::get('/list', [AntarBankController::class, 'getListAntarBank'])->name('getListAntarBank')->middleware('checkauth');
        Route::get('/formUpdate/{id}', [AntarBankController::class, 'formUpdateAntarBank'])->name('formUpdateAntarBank')->middleware('checkauth');
        Route::get('/formUpdateBulk', [AntarBankController::class, 'formUpdateBulkAntarBank'])->name('formUpdateBulkAntarBank')->middleware('checkauth');

        Route::post('prosesImport', [AntarBankController::class, 'prosesImportAntarBank'])->name('prosesImportAntarBank');
        Route::post('prosesUpdate', [AntarBankController::class, 'prosesUpdateAntarBank'])->name('prosesUpdateAntarBank');
        Route::post('prosesUpdateBulk', [AntarBankController::class, 'prosesUpdateBulkAntarBank'])->name('prosesUpdateBulkAntarBank');
        Route::post('exportReport', [AntarBankController::class, 'exportReportAntarBank'])->name('exportReportAntarBank');
        Route::get('prosesDelete/{id}', [AntarBankController::class, 'prosesDeleteAntarBank'])->name('prosesDeleteAntarBank')->middleware('checkauth');
        Route::delete('prosesDeleteBulk', [AntarBankController::class, 'prosesDeleteAntarBankBulk'])->name('prosesDeleteAntarBankBulk');
    });
});
