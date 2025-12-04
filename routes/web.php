<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\ProductController;

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

// 🔹 Product detail page (uses ProductController@show)
Route::get('/product_detail', [ProductController::class, 'show'])
    ->name('product.detail');

// 🔹 Cart page placeholder (your teammate can replace later)
Route::view('/cart_checkout', 'cart_checkout')
    ->name('cart.checkout');

require __DIR__.'/settings.php';
