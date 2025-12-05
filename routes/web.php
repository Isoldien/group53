<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

/*
@author: Habibur Rahman <240217006@aston.ac.uk>
@Description: This route is used to test the database connection, shouldn't be used for production
*/
Route::get('/database-connection', [App\Http\Controllers\DatabaseConnectionController::class, 'index']);

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


