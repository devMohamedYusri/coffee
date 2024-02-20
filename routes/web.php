<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\users\UserController;
use App\Http\Controllers\admins\UsersController;
use App\Http\Controllers\Admins\AdminsController;
use App\Http\Controllers\admins\BookingsController;
use App\Http\Controllers\Admins\OrdersController;
use App\Http\Controllers\admins\ProductsController;
use App\Http\Controllers\Admins\HomeController as AdminHomeControllerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

// routes without auth main pages
Route::get('/coffee/menu', [HomeController::class, 'menu'])->name('coffee.menu');
Route::post('/coffee/booking', [ProductController::class, 'store'])->name('coffee.booking.store');
Route::get('/coffee/services', [HomeController::class, 'services'])->name('coffee.services');
Route::get('/coffee/about', [HomeController::class, 'about'])->name('coffee.about');

Route::middleware('auth')->prefix('coffee')->name('coffee.')->group(function () {

    Route::prefix('user')->name('user.')->group(function () {
        //name= coffee.user.
        Route::get('profile', [UserController::class, 'profile'])->name('profile');
        Route::get('cart', [ProductController::class, 'cart'])->name('cart');
        Route::get('Orders', [UserController::class, 'userOrders'])->name('orders');
        Route::get('booked-tables', [UserController::class, 'userBookings'])->name('bookings');
        Route::get('review/{id}/{type}', [UserController::class, 'review_page'])->name('review');
        Route::post('review/store', [UserController::class, 'store'])->name('review.store');
    });

    //name= coffee.product.

    Route::prefix('product/')->name('product.')->group(function () {

        Route::get('{product}', [ProductController::class, 'show'])->name('show');
        Route::post('prepare-checkout', [ProductController::class, 'prepare'])->name('prepare-checkout');
        Route::post('{product}', [ProductController::class, 'addCart'])->name('addCart');
        Route::delete('{product}', [ProductController::class, 'removeCart'])->name('removeCart');
    });

    // routes with auth and pay middleware
    //name = coffee.checkout.

    Route::middleware('pay')->prefix('/checkout')->name('checkout.')->group(function () {

        Route::get('page', [ProductController::class, 'checkout_page'])->name('page');
        Route::get('success', [ProductController::class, 'pay_successfully'])->name('success');
        Route::get('pay', [ProductController::class, 'pay'])->name('pay');
        Route::post('process', [ProductController::class, 'newOrder'])->name('storeCheckout');

    });
});





// admin routes
    //name= admin.

Route::middleware('check_login')->prefix('/coffee')->name('admin.')->group(function () {
    Route::get('/admin/login', [AdminsController::class , 'login'])->name('login');
    Route::post('/admin/login', [AdminsController::class , 'checkAdmin'])->name('checkLogin');
});

    //name= admin.
Route::middleware('admin')->prefix('/coffee/admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminHomeControllerController::class , 'index'])->name('dashboard');
    Route::delete('/coffee/admin/logout', [AdminsController::class , 'adminLogout'])->name('logout');

        //name= admin.admins.
    Route::prefix('/admins')->name('admins.')->group(function () {
        Route::get('/index', [AdminsController::class , 'index'])->name('index');
        Route::get('/create', [AdminsController::class , 'create'])->name('create');
        Route::post('/store', [AdminsController::class , 'store'])->name('store');
        Route::get('/{admin}/edit', [AdminsController::class , 'edit'])->name('edit');
        Route::put('/{admin}', [AdminsController::class , 'update'])->name('update');
        Route::delete('/{admin}', [AdminsController::class , 'destroy'])->name('destroy');
    });

    Route::prefix('/orders')->name('orders.')->group(function () {
        Route::get('/index', [OrdersController::class , 'index'])->name('index');
        Route::get('/{order}/edit', [OrdersController::class , 'edit'])->name('edit');
        Route::put('/{order}', [OrdersController::class , 'update'])->name('update');
        Route::delete('/{order}', [OrdersController::class , 'destroy'])->name('destroy');
    });

    Route::prefix('/users')->name('users.')->group(function () {
        Route::get('/index', [UsersController::class , 'index'])->name('index');
        Route::get('/create', [UsersController::class , 'create'])->name('create');
        Route::post('/store', [UsersController::class , 'store'])->name('store');
        Route::get('/{user}/edit', [UsersController::class , 'edit'])->name('edit');
        Route::put('/{user}', [UsersController::class , 'update'])->name('update');
    });

    Route::prefix('/products')->name('products.')->group(function () {
        Route::get('/index', [ProductsController::class , 'index'])->name('index');
        Route::get('/create', [ProductsController::class , 'create'])->name('create');
        Route::post('/store', [ProductsController::class , 'store'])->name('store');
        Route::get('/{product}/edit', [ProductsController::class , 'edit'])->name('edit');
        Route::put('/{product}', [ProductsController::class , 'update'])->name('update');
        Route::delete('/{product}', [ProductsController::class , 'destroy'])->name('destroy');
    });

    Route::prefix('/books')->name('bookings.')->group(function () {
        Route::get('/index', [BookingsController::class , 'index'])->name('index');
        Route::get('/create', [BookingsController::class , 'create'])->name('create');
        Route::post('/store', [BookingsController::class , 'store'])->name('store');
        Route::get('/{book}/edit', [BookingsController::class , 'edit'])->name('edit');
        Route::put('/{book}', [BookingsController::class , 'update'])->name('update');
        Route::delete('/{book}', [BookingsController::class , 'destroy'])->name('destroy');
    });
});
