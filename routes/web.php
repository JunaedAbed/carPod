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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/cars', [App\Http\Controllers\CarController::class, 'index']);
Route::get('/cars/message', [App\Http\Controllers\MessageController::class, 'create']);
Route::post('/cars/message', [App\Http\Controllers\MessageController::class, 'sendMessage']);
Route::get('/cars/pay', [App\Http\Controllers\CarController::class, 'showPay'])->middleware('auth');
Route::get('/cars/{id}/status', [App\Http\Controllers\CarController::class, 'showStatus'])->middleware('auth');
Route::get('/cars/{id}/pay', [App\Http\Controllers\CarController::class, 'pay'])->middleware('auth');

Route::put('/cars/{id}', [App\Http\Controllers\CarController::class, 'updatePay'])->middleware('auth');
Route::get('/cars/{id}', [App\Http\Controllers\CarController::class, 'show']);


Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);
Route::get('/admin/create', [App\Http\Controllers\AdminController::class, 'create']);
Route::post('/admin', [App\Http\Controllers\AdminController::class, 'store']);
Route::get('/admin/customers', [App\Http\Controllers\AdminController::class, 'userShow']);
Route::get('/admin/requests', [App\Http\Controllers\AdminController::class, 'showReq']);
Route::put('/admin/requests/{client_id}', [App\Http\Controllers\AdminController::class, 'updateReq']);
Route::get('/admin/client_messages', [App\Http\Controllers\MessageController::class, 'index']);
Route::delete('/admin/client_messages/{msg_id}', [App\Http\Controllers\MessageController::class, 'destroy']);
Route::get('/admin/{id}', [App\Http\Controllers\AdminController::class, 'show']);
Route::put('/admin/{id}', [App\Http\Controllers\AdminController::class, 'update']);
Route::get('/admin/{id}/edit', [App\Http\Controllers\AdminController::class, 'edit']);
Route::delete('/admin/{id}', [App\Http\Controllers\AdminController::class, 'destroy']);

Auth::routes();

// Authentication Routes...

Route::post('/admin/logout', 'Auth\LoginController@logout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/admin', function () {
//     return view('auth.adminLogin');
// })->name('admin');
