<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\CartController;

Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    // Cart Routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});

// Contact Routes
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
Route::get('/products/{category_id}',[ProductController::class,'showProductsUnderCategory'])->name('show_products');


Route::get('/database-connection', [App\Http\Controllers\DatabaseConnectionController::class, 'index']);



Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.post');
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register.post');
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::post('/forgot-password', [App\Http\Controllers\AuthController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('new-password', ['token' => $token]);
})->name('password.reset');

Route::post('/reset-password', [App\Http\Controllers\AuthController::class, 'resetPassword'])->name('password.update');

Route::get('/resetpassword', function () {
    return view('resetpassword');
})->name('password.request');
Route::get('/shoplisting', [ProductController::class, 'index'])->name('shop.index');


Route::get('/about', function () {
    return view('about');
})->name('about');


require __DIR__.'/settings.php';

// ABOUT US PAGE
Route::get('/about', function () {
    return view('about');
})->name('about');

// CONTACT PAGE
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'show'])->name('contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');

// CHECKOUT PAGE
Route::middleware(['auth'])->group(function () {
    Route::get('/basket', [BasketController::class, 'getCustomerBasket'])->name('checkout');
    Route::post('/basket/add/{productId}', [BasketController::class, 'addProduct']);
    Route::post('/basket/remove/{productId}', [BasketController::class, 'removeProduct']);
    Route::post('/basket/increase/{productId}', [BasketController::class, 'increaseQuantity']);
    Route::post('/basket/decrease/{productId}', [BasketController::class, 'decreaseQuantity']);
    Route::post('/basket/place_order', [OrderController::class, 'placeOrder'])->name("placeOrder");
});
route::get('/',function (){
    return view("homepage");
});
//PRODUCT PAGE(s)

route::get('/products/{category_id}',[ProductController::class,'showProductsUnderCategory']);
route::get('/products/{product}',[ProductController::class,'showProductDetails']);

// Home page
Route::get('/', function () {
    return view('welcome');
});
// Signup
Route::view('/signup', 'register')->name('signup');

// Checkout cart
Route::get('/checkoutpage', function () {
    return view('checkout_version2');
});

// Product details
Route::get('/productdetail', function () {
    return view('productdetails');
});


