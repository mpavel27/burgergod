<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [UserController::class, 'test']);

Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'viewAdminIndex']);
    Route::get('/login', [AdminController::class, 'viewLogin'])->middleware('guest');
    Route::post('/login/validate', [AdminController::class, 'login'])->middleware('guest')->name('app.admin.login.post');
});
