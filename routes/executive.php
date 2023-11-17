<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Executive\DashboardController;

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

Route::prefix('executive')->group(function(){
    Route::get('/dashboard1', [DashboardController::class, 'executiveDashboard1'])->name('executiveDashboard1');
    Route::get('/dashboard2', [DashboardController::class, 'executiveDashboard2'])->name('executiveDashboard2');
    Route::get('/dashboard3', [DashboardController::class, 'executiveDashboard3'])->name('executiveDashboard3');
    Route::get('/Rekonsiliasi', [DashboardController::class, 'executiveDashboard4'])->name('executiveDashboard4');
    Route::get('/AntarBank', [DashboardController::class, 'executiveDashboard5'])->name('executiveDashboard5');
    Route::get('/UsageAtmCrm', [DashboardController::class, 'executiveDashboard6'])->name('executiveDashboard6');
});
