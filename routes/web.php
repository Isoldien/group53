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
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');
