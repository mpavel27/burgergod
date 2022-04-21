<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WheelController;

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
Route::get('magazin-inchis', [UserController::class, 'viewShop'])->name('app.offline.shop');

Route::middleware('isShopOnline')->group(function () {
    Route::get('/item/{id}', [UserController::class, 'viewItem'])->name('app.item');
    Route::get('/order/{id}', [OrderController::class, 'viewOrder'])->name('app.order');
    Route::get('/orders', [OrderController::class, 'viewSessionOrders'])->name('app.orders');
    Route::get('/meniu', [UserController::class, 'viewMenu'])->name('app.menu');
});

Route::get('/', [UserController::class, 'viewHomepage'])->name('app.home');
Route::post('/loginValidation', [UserController::class, 'login'])->name('app.login');
Route::post('/registerValidation', [UserController::class, 'register'])->name('app.register');
Route::get('/logout', [UserController::class, 'logout'])->name('app.logout');

Route::prefix('/account')->middleware('auth')->group(function () {
    Route::get('/', [AccountController::class, 'viewAccount'])->name('app.account');
    Route::post('/validate', [AccountController::class, 'updateAccount'])->name('app.account.post');
    Route::post('/change-password', [AccountController::class, 'changePassword'])->name('app.account.change-password');
});


Route::prefix('/cart')->group(function () {
    Route::get('/', [UserController::class, 'viewCart'])->name('app.cart');
    Route::post('/add', [UserController::class, 'addToCart'])->middleware('isShopOnline')->name('app.cart.add');
    Route::post('/remove/{index}', [UserController::class, 'removeFromCart'])->name('app.cart.remove');
    Route::post('/validate', [OrderController::class, 'cartPost'])->middleware('isShopOnline')->name('app.cart.post');
    Route::get('/checkout', [OrderController::class, 'viewCheckout'])->middleware('isShopOnline')->name('app.cart.checkout');
    Route::post('/checkout/validation', [OrderController::class, 'checkoutPost'])->middleware('isShopOnline')->name('app.cart.checkout.post');
});

Route::get('/despre-noi', [UserController::class, 'viewAboutUs'])->name('app.about-us');
Route::get('/contact', [UserController::class, 'viewContact'])->name('app.contact');
Route::get('/termeni-si-conditii', [UserController::class, 'viewTerms'])->name('app.terms');

Route::get('/gift', [\App\Http\Controllers\GiftController::class, 'viewGift'])->name('app.gift');

Route::prefix('/admin')->group(function () {
    Route::get('/logout', [AdminController::class, 'logout'])->middleware('auth:admin')->name('app.admin.logout');
    Route::get('/', [AdminController::class, 'viewAdminIndex'])->name('app.admin.dashboard')->middleware(['auth:admin']);

    Route::post('/send/order/action/{id}/{type}', [AdminController::class, 'orderPost'])->name('app.admin.order.action')->middleware(['auth:admin']);

    Route::prefix('login')->group(function () {
        Route::get('/', [AdminController::class, 'viewLogin'])->name('login')->middleware('guest:admin');
        Route::post('/validate', [AdminController::class, 'login'])->middleware('guest:admin')->name('app.admin.login.post');
    });

    Route::post('assign/delivery', [AdminController::class, 'assignOrder'])->middleware('auth:admin')->name('app.admin.assign.order');
    Route::post('markAsReadyPickUp', [AdminController::class, 'markAsReadyPickUp'])->middleware('auth:admin')->name('app.admin.mark.pick-up');
    Route::post('markAsPickedUp', [AdminController::class, 'markAsPickedUp'])->middleware('auth:admin')->name('app.admin.mark.picked-up');
//    Route::post('rejectOrder', [AdminController::class, 'rejectOrder'])->middleware('auth:admin')->name('app.admin.mark.reject');
    //Route::post('markAsDelivered', [AdminController::class, 'markAsDelivered'])->middleware(['auth:admin', 'isDeliveryBoy'])->name('app.admin.mark.delivered');

    Route::get('print/{id}', [AdminController::class, 'printOrder'])->middleware('auth:admin')->name('app.admin.print');

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

    Route::prefix('/delivery-boys')->middleware(['auth:admin', 'isAdmin'])->group(function () {
        Route::get('/', [AdminController::class, 'viewDeliveryBoys'])->name('app.admin.delivery-boys');
        Route::post('/add', [AdminController::class, 'addDeliveryBoy'])->name('app.admin.delivery-boys.post');
        Route::get('/edit/{deliveryId}', [AdminController::class, 'editDeliveryBoy'])->name('app.admin.delivery-boys.edit');
        Route::post('/edit/{deliveryId}/validation', [AdminController::class, 'editDeliveryValidation'])->name('app.admin.delivery-boys.edit.post');
    });

    Route::prefix('/shop-settings')->middleware(['auth:admin', 'isAdmin'])->group(function () {
        Route::get('/', [AdminController::class, 'viewShopSettings'])->name('app.admin.shop-settings');
        Route::post('/validate', [AdminController::class, 'ShopSettingsValidation'])->name('app.admin.shop-settings.validate');
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
    $cart = json_decode(Auth::user()->cart);
    $sessionCart = json_decode(session('cart'));
    $full_cart = array_merge($cart, $sessionCart);
    return dd($full_cart);
});
