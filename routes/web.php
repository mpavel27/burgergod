<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountController;

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


Route::get('/', [UserController::class, 'viewHomepage'])->name('app.home');
Route::get('/item/{id}', [UserController::class, 'viewItem'])->name('app.item');
Route::post('/loginValidation', [UserController::class, 'login'])->name('app.login');
Route::post('/registerValidation', [UserController::class, 'register'])->name('app.register');
Route::get('/logout', [UserController::class, 'logout'])->name('app.logout');

Route::prefix('/account')->middleware('auth')->group(function () {
    Route::get('/', [AccountController::class, 'viewAccount'])->name('app.account');
});

Route::prefix('/cart')->group(function () {
    Route::get('/', [UserController::class, 'viewCart'])->name('app.cart');
    Route::post('/add', [UserController::class, 'addToCart'])->name('app.cart.add');
    Route::post('/remove/{index}', [UserController::class, 'removeFromCart'])->name('app.cart.remove');
});


Route::prefix('/admin')->group(function () {
    Route::get('/logout', [AdminController::class, 'logout'])->middleware('auth:admin')->name('app.admin.logout');
    Route::get('/', [AdminController::class, 'viewAdminIndex'])->name('app.admin.dashboard')->middleware(['auth:admin', 'isAdmin']);

    Route::prefix('login')->group(function () {
        Route::get('/', [AdminController::class, 'viewLogin'])->name('login')->middleware('guest:admin');
        Route::post('/validate', [AdminController::class, 'login'])->middleware('guest:admin')->name('app.admin.login.post');
    });

    Route::prefix('items')->middleware(['auth:admin', 'isAdmin'])->group(function () {
        Route::get('/', [AdminController::class, 'viewItems'])->name('app.admin.items');
        Route::post('/create', [AdminController::class, 'createItem'])->name('app.admin.item.create');
        Route::get('/delete/{itemId}', [AdminController::class, 'deleteItem'])->name('app.admin.item.delete');
        Route::get('/edit/{itemId}', [AdminController::class, 'editItem'])->name('app.admin.item.edit');
        Route::post('/edit/{itemId}/validate', [AdminController::class, 'editItemValidation'])->name('app.admin.item.edit.post');
    });

    Route::prefix('category')->middleware(['auth:admin', 'isAdmin'])->group(function () {
        Route::get('/', [AdminController::class, 'viewCategories'])->name('app.admin.categories');
        Route::post('/create', [AdminController::class, 'createCategory'])->name('app.admin.categories.create');
        Route::get('/delete/{categoryId}', [AdminController::class, 'deleteCategory'])->name('app.admin.category.delete');
        Route::get('/edit/{categoryId}', [AdminController::class, 'editCategory'])->name('app.admin.category.edit');
        Route::post('/edit/{categoryId}/validate', [AdminController::class, 'editCategoryValidation'])->name('admin.category.edit.post');
    });

    Route::prefix('extras')->middleware(['auth:admin', 'isAdmin'])->group(function () {
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

Route::get('/websockets', function() {
//    event(new App\Events\Orders('test'));
    $cart = json_decode(Auth::user()->cart);
    $sessionCart = json_decode(session('cart'));
    $full_cart = array_merge($cart, $sessionCart);
    return dd($full_cart);
});
