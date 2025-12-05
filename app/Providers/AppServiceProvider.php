<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useTailwind();

        // View Composer for Navbar Cart Count
        \Illuminate\Support\Facades\View::composer('partials.navbar', function ($view) {
            $cartCount = 0;
            if (\Illuminate\Support\Facades\Auth::check()) {
                $cartCount = \Illuminate\Support\Facades\DB::table('cart_items')
                    ->join('carts', 'cart_items.cart_id', '=', 'carts.cart_id')
                    ->where('carts.user_id', \Illuminate\Support\Facades\Auth::id())
                    ->sum('quantity');
            }
            $view->with('cartCount', $cartCount);
        });
    }
}
