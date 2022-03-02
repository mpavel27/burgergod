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
    Route::get('/', [AdminController::class, 'viewAdminIndex'])->name('app.admin.dashboard')->middleware('auth');
    Route::get('/login', [AdminController::class, 'viewLogin'])->name('login')->middleware('guest');
    Route::post('/login/validate', [AdminController::class, 'login'])->middleware('guest')->name('app.admin.login.post');
    Route::get('items', [AdminController::class, 'viewItems'])->middleware('auth')->name('app.admin.items');
    Route::post('items/create', [AdminController::class, 'createItem'])->middleware('auth')->name('app.admin.item.create');
    Route::get('items/delete/{itemId}', [AdminController::class, 'deleteItem'])->middleware('auth')->name('app.admin.item.delete');
    Route::get('items/edit/{itemId}', [AdminController::class, 'editItem'])->middleware('auth')->name('app.admin.item.edit');
    Route::get('categories', [AdminController::class, 'viewCategories'])->middleware('auth')->name('app.admin.categories');
    Route::post('categories/create', [AdminController::class, 'createCategory'])->middleware('auth')->name('app.admin.categories.create');
});
