<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;

Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/privacy', [App\Http\Controllers\HomeController::class, 'privacy'])->name('privacy');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    // Cart Routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    // Review Routes
    Route::post('/products/{id}/reviews', [App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store');
    Route::put('/reviews/{review}', [App\Http\Controllers\ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{review}', [App\Http\Controllers\ReviewController::class, 'destroy'])->name('reviews.destroy');
});

// Contact Routes

    Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
    Route::get('/products/{category_id}', [ProductController::class, 'showProductsUnderCategory'])->name('show_products');


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
Route::get('/test-event', function () {
    \Log::info("Dispatching OutOfStock event");
    $noOutOfStock = DB::table('products')->where("stock_quantity", "=", 0)->count();
    event(new \App\Events\StockEvent($noOutOfStock));

    return 'Event dispatched!';
});
Route::get("/corrupt", function () {
    return view('corrupt');
});
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::delete('/users/{user}', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('users.destroy');
    Route::resource('inventory', App\Http\Controllers\Admin\InventoryController::class);
    
    // Admin Review Routes
    Route::get('/reviews', [App\Http\Controllers\AdminController::class, 'reviews'])->name('reviews.index');
    Route::delete('/reviews/{review}', [App\Http\Controllers\AdminController::class, 'deleteReview'])->name('reviews.destroy');
});

require __DIR__.'/settings.php';




