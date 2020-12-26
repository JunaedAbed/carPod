<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\CarController::class, 'index']);

Route::prefix('cars')->group(function(){
    Route::get('/', [App\Http\Controllers\CarController::class, 'index']);
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'userLogout'])->name('user.logout');
    Route::get('/message', [App\Http\Controllers\MessageController::class, 'create']);
    Route::post('/message', [App\Http\Controllers\MessageController::class, 'sendMessage']);
    Route::get('/pay', [App\Http\Controllers\CarController::class, 'showPay'])->middleware('auth');
    Route::get('/{id}/status', [App\Http\Controllers\CarController::class, 'showStatus'])->middleware('auth');
    Route::get('/{id}/pay', [App\Http\Controllers\CarController::class, 'pay'])->middleware('auth');

    Route::put('/{id}', [App\Http\Controllers\CarController::class, 'updatePay'])->middleware('auth');
    Route::get('/{id}', [App\Http\Controllers\CarController::class, 'show']);
});


Route::prefix('admin')->group(function(){
    Route::get('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('/create', [App\Http\Controllers\AdminController::class, 'create']);
    Route::post('/', [App\Http\Controllers\AdminController::class, 'store']);
    Route::get('/customers', [App\Http\Controllers\AdminController::class, 'userShow']);
    Route::get('/requests', [App\Http\Controllers\AdminController::class, 'showReq']);
    Route::put('/requests/{client_id}', [App\Http\Controllers\AdminController::class, 'updateReq']);
    Route::get('/client_messages', [App\Http\Controllers\MessageController::class, 'index'])->middleware('auth:admin');
    Route::delete('/client_messages/{msg_id}', [App\Http\Controllers\MessageController::class, 'destroy'])->middleware('auth:admin');
    Route::get('/{id}', [App\Http\Controllers\AdminController::class, 'show']);
    Route::put('/{id}', [App\Http\Controllers\AdminController::class, 'update']);
    Route::get('/{id}/edit', [App\Http\Controllers\AdminController::class, 'edit']);
    Route::delete('/{id}', [App\Http\Controllers\AdminController::class, 'destroy']);
});


Auth::routes();




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');