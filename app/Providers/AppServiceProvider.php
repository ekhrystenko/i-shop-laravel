<?php

namespace App\Providers;

use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        if(\Schema::hasTable('categories')) {
            $categories = Category::where('active', true)->get();
            View::share(['categories'=>$categories]);
        }

        if(\Schema::hasTable('products')){
            $products = Product::where('active', true)->get();
            View::share(['products'=>$products]);
        }

    }
}
