<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;

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

// ================ Route Authentication GET ================ //
Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::get('/success', [AuthenticationController::class, 'successLogin'])->name('successLogin')->middleware('checkauth');

// ================ Route Authentication POST ================ //
Route::post('/loginProcess', [AuthenticationController::class, 'loginProcess'])->name('loginProcess');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout')->middleware('checkauth');

// ================ Route Users POST ================ //
Route::prefix('users')->group(function(){
    Route::get('/list', [UsersController::class, 'getListUsers'])->name('getListUsers')->middleware('checkauth');
    Route::get('/formAdd', [UsersController::class, 'formAddUser'])->name('formAddUser')->middleware('checkauth');
    Route::get('/formUpdate/{id}', [UsersController::class, 'formUpdateUser'])->name('formUpdateUser')->middleware('checkauth');
    
    Route::post('/prosesAddUser', [UsersController::class, 'prosesAddUser'])->name('prosesAddUser');
    Route::post('/prosesUpdateUser', [UsersController::class, 'prosesUpdateUser'])->name('prosesUpdateUser');
    Route::get('/prosesDeleteUser', [UsersController::class, 'prosesDeleteUser'])->name('prosesDeleteUser');
});

// ================ Route Dashboard ================ //
Route::get('/dashboardApp', [DashboardController::class, 'dashboardApp'])->name('dashboardApp')->middleware('checkauth');
