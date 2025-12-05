<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\CartController;

Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index'])->name('landing');

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

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
})->name('about');

// About Us Page
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');

// Product Listing Page
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');

// Basket Routes
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');

// Contact Us Page
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

// Authentication Routes
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset']);

// Checkout Page
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');

require __DIR__.'/settings.php';
