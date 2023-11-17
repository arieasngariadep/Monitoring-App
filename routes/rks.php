<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RKS\DashboardController;
use App\Http\Controllers\RKS\DisputeResolutionController;
use App\Http\Controllers\RKS\RekonRjiController;

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

Route::prefix('rks')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboardRKS'])->name('dashboardRKS')->middleware('checkauth');

    // ================ Route Dispute Resolution ================ //
    Route::prefix('DisputeResolution')->group(function(){
        Route::get('/formUpload', [DisputeResolutionController::class, 'formUploadDisputeResolution'])->name('formUploadDisputeResolution')->middleware('checkauth');
        Route::get('/list', [DisputeResolutionController::class, 'getListDisputeResolution'])->name('getListDisputeResolution')->middleware('checkauth');
        Route::get('/formUpdate/{id}', [DisputeResolutionController::class, 'formUpdateDisputeResolution'])->name('formUpdateDisputeResolution')->middleware('checkauth');
        Route::get('/formUpdateBulk', [DisputeResolutionController::class, 'formUpdateBulkDisputeResolution'])->name('formUpdateBulkDisputeResolution')->middleware('checkauth');

        Route::post('prosesImport', [DisputeResolutionController::class, 'prosesImportDisputeResolution'])->name('prosesImportDisputeResolution');
        Route::post('prosesUpdate', [DisputeResolutionController::class, 'prosesUpdateDisputeResolution'])->name('prosesUpdateDisputeResolution');
        Route::post('prosesUpdateBulk', [DisputeResolutionController::class, 'prosesUpdateBulkDisputeResolution'])->name('prosesUpdateBulkDisputeResolution');
        Route::post('exportReport', [DisputeResolutionController::class, 'exportReportDisputeResolution'])->name('exportReportDisputeResolution');
        Route::get('prosesDelete/{id}', [DisputeResolutionController::class, 'prosesDeleteDisputeResolution'])->name('prosesDeleteDisputeResolution')->middleware('checkauth');
        Route::delete('prosesDeleteBulk', [DisputeResolutionController::class, 'prosesDeleteDisputeResolutionBulk'])->name('prosesDeleteDisputeResolutionBulk');
    });

    // ================ Route Rekon Rji ================ //
    Route::prefix('RekonRji')->group(function(){
        Route::get('/listRekonRji', [RekonRjiController::class, 'getAllRekonRji'])->name('getAllRekonRji')->middleware('checkauth');
        Route::get('/formEditRekonRji/{id}', [RekonRjiController::class, 'editRekonRji'])->name('editRekonRji')->middleware('checkauth');
        Route::get('/formUpdateBulkRekonRji', [RekonRjiController::class, 'uploadBulkRekonRji'])->name('uploadBulkRekonRji')->middleware('checkauth');

        Route::post('prosesEdit', [RekonRjiController::class, 'prosesEditRekonRji'])->name('prosesEditRekonRji');
        Route::post('prosesUploadBulkRekonRji', [RekonRjiController::class, 'prosesUploadBulkRekonRji'])->name('prosesUploadBulkRekonRji');
        Route::post('exportReportRji', [RekonRjiController::class, 'exportReportRekonRji'])->name('exportReportRekonRji');
    });
});
