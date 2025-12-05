<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('homepage');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return view('home');
    })->name('dashboard');

    // Cart Routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
});
Route::get('/products/{category_id}',[ProductController::class,'showProductsUnderCategory'])->name('show_products');

/*
@author: Habibur Rahman <240217006@aston.ac.uk>
@Description: This route is used to test the database connection, shouldn't be used for production
*/
Route::get('/database-connection', [App\Http\Controllers\DatabaseConnectionController::class, 'index']);

Route::get('/product/{product}',[ProductController::class,'showProductDetails'])->name('show_product_details');

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/resetpassword', function () {
    return view('resetpassword');
});
Route::get('/shoplisting', [ProductController::class, 'index'])->name('shop.index');
require __DIR__.'/settings.php';
