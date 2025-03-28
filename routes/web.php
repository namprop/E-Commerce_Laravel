<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\front\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\Front\ShopController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\Front\CheckOutController;





Route::get('/', [HomeController::class, 'index'])->name('product.show');

Route::prefix('shop')->group(function () {
    Route::post('product/{id}/comment', [ShopController::class, 'postComment'])->name('product.comment');
    Route::get('product/{id}', [ShopController::class, 'show'])->name('show');
    Route::get('/', [ShopController::class, 'index'])->name('shop.index');
    Route::get('category/{categoryName}', [ShopController::class, 'category'])->name('category');
});

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
});

Route::prefix('account')->group(function () {
    Route::get('/login', [AccountController::class, 'login'])->name('login');
    Route::post('/login', [AccountController::class, 'checkLogin'])->name('checkLogin');
    Route::get('/', [AccountController::class, 'logout'])->name('logout');
    Route::get('/register', [AccountController::class, 'register'])->name('register');
    Route::post('/register', [AccountController::class, 'postRegister'])->name('postRegister');
});

Route::prefix('checkout')->group(function () {
    Route::get('/', [CheckOutController::class, 'index'])->name('index');
    Route::post('/', [CheckOutController::class, 'addOrder'])->name('addOrder');
    Route::get('/result', [CheckOutController::class, 'result'])->name('result');
});


Route::prefix('admin')->middleware('admin.login')->group(function () {
    Route::redirect('', 'admin/user');
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
    Route::get('logout', [App\Http\Controllers\Admin\HomeController::class, 'Logout']);
    Route::resource('category', \App\Http\Controllers\Admin\ProductCategoryController::class);
    Route::resource('brand', \App\Http\Controllers\Admin\BrandController::class);
    Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('product/{product_id}/image', \App\Http\Controllers\Admin\ProductImageController::class);
    Route::resource('product/{product_id}/detail', \App\Http\Controllers\Admin\ProductDetailController::class);
    Route::resource('order', \App\Http\Controllers\Admin\OrderController::class);
});

Route::prefix('admin/login')->group(function () {
    Route::get('', [App\Http\Controllers\Admin\HomeController::class, 'getLogin']);
    Route::post('', [App\Http\Controllers\Admin\HomeController::class, 'postLogin']);
});



