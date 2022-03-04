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

    Route::prefix('login')->group(function () {
        Route::get('/', [AdminController::class, 'viewLogin'])->name('login')->middleware('guest');
        Route::post('/validate', [AdminController::class, 'login'])->middleware('guest')->name('app.admin.login.post');
    });

    Route::prefix('items')->middleware('auth')->group(function () {
        Route::get('/', [AdminController::class, 'viewItems'])->name('app.admin.items');
        Route::post('/create', [AdminController::class, 'createItem'])->name('app.admin.item.create');
        Route::get('/delete/{itemId}', [AdminController::class, 'deleteItem'])->name('app.admin.item.delete');
        Route::get('/edit/{itemId}', [AdminController::class, 'editItem'])->name('app.admin.item.edit');
        Route::post('/edit/{itemId}/validate', [AdminController::class, 'editItemValidation'])->name('app.admin.item.edit.post');
    });

    Route::prefix('category')->middleware('auth')->group(function () {
        Route::get('/', [AdminController::class, 'viewCategories'])->name('app.admin.categories');
        Route::post('/create', [AdminController::class, 'createCategory'])->name('app.admin.categories.create');
        Route::get('/delete/{categoryId}', [AdminController::class, 'deleteCategory'])->name('app.admin.category.delete');
        Route::get('/edit/{categoryId}', [AdminController::class, 'editCategory'])->name('app.admin.category.edit');
        Route::post('/edit/{categoryId}/validate', [AdminController::class, 'editCategoryValidation'])->name('admin.category.edit.post');
    });

    Route::prefix('extras')->middleware('auth')->group(function () {
        Route::get('/', [AdminController::class, 'viewExtras'])->name('app.admin.extras');
        Route::post('/create', [AdminController::class, 'createExtra'])->name('app.admin.extras.create');
    });
});

Route::get('/cleareverything', function () {
    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";
    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";
    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";
    $clearroute = Artisan::call('route:cache');
    echo "Route cleared<br>";
})->middleware('auth');

Route::get('/migrate', function () {
    $migrate = Artisan::call('migrate');
    echo "Migration completed";
})->middleware('auth');
