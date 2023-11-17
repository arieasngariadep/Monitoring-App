<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PBY\DashboardController;
use App\Http\Controllers\PBY\MonRekRTLController;

Route::prefix('pby')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboardPBY'])->name('dashboardPBY')->middleware('checkauth');

    // ================ Route Monitoring Rekening RTL ================ //
    Route::prefix('MonRekRTL')->group(function(){
        Route::get('/formUpload', [MonRekRTLController::class, 'formUploadMonRek'])->name('formUploadMonRek')->middleware('checkauth');
        Route::get('/formEdit', [MonRekRTLController::class, 'editMonRek'])->name('editMonRek')->middleware('checkauth');
        Route::get('/formUpdate', [MonRekRTLController::class, 'formUpdateMonRek'])->name('formUpdateMonRek')->middleware('checkauth');
        Route::get('/getMonRek', [MonRekRTLController::class, 'getMonRek'])->name('getMonRek')->middleware('checkauth');
    
        Route::post('prosesImport1', [MonRekRTLController::class, 'prosesImportMonRek1'])->name('prosesImportMonRek1');
        Route::post('prosesUpdateImport1', [MonRekRTLController::class, 'prosesImportUpdateMonRek1'])->name('prosesImportUpdateMonRek1');
        Route::post('prosesEditMonRek', [MonRekRTLController::class, 'prosesEditMonRek'])->name('prosesEditMonRek');

        Route::post('exportMonRek', [MonRekRTLController::class, 'exportMonRek'])->name('exportMonRek');

        Route::get('deleteData', [MonRekRTLController::class, 'deleteMonRek'])->name('deleteMonRek')->middleware('checkauth');
    });
});

?>