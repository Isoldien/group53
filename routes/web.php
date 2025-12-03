<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

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
Route::get('/products/{category_id}',[ProductController::class,'showProductsUnderCategory'])->name('show_products');

/*
@author: Habibur Rahman <240217006@aston.ac.uk>
@Description: This route is used to test the database connection, shouldn't be used for production
*/
Route::get('/database-connection', [App\Http\Controllers\DatabaseConnectionController::class, 'index']);

Route::get('/product/{product}',[ProductController::class,'showProductDetails'])->name('show_product_details');
require __DIR__.'/settings.php';
