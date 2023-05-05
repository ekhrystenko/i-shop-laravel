<?php

use App\Http\Controllers\Admin\CategoryCrudController;
use App\Http\Controllers\Admin\ProductCrudController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\OrderController;

Auth::routes();

Route::middleware(['auth', 'is_admin'])->group(function (){
    Route::prefix('admin')->group(function (){
        Route::get('/', function (){return view('auth.admin.index');})->name('admin.index');
        Route::get('/orders', [OrderController::class, 'index'])->name('orders');
        Route::post('/destroy/{image_id}', [ProductCrudController::class, 'imageDestroy'])->name('imageDestroy');

        Route::resource('product', ProductCrudController::class);
        Route::get('/product/{id}/activate', [ProductCrudController::class, 'activate'])->name('product.activate');
        Route::get('/product/{id}/deactivate', [ProductCrudController::class, 'deactivate'])->name('product.deactivate');

        Route::resource('category', CategoryCrudController::class);
        Route::get('/category/{id}/activate', [CategoryCrudController::class, 'activate'])->name('category.activate');
        Route::get('/category/{id}/deactivate', [CategoryCrudController::class, 'deactivate'])->name('category.deactivate');
    });
});

Route::prefix('cart')->group(function() {
    Route::middleware('cart_not_empty')->group(function (){
        Route::get('/', [CartController::class, 'execute'])->name('cart');
        Route::get('/check-order', [CartController::class, 'checkOrder'])->name('check-order');
        Route::post('/check-order', [CartController::class, 'confirm'])->name('confirm');
        Route::post('/remove/{id}', [CartController::class, 'removeFromCart'])->name('remove-from-cart');
    });
    Route::post('/add/{id}', [CartController::class, 'addToCart'])->name('add-to-cart');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/', [IndexController::class, 'execute'])->name('main');
Route::get('/about', [AboutUsController::class, 'execute'])->name('aboutUs');

Route::get('/feedback', [FeedbackController::class, 'execute'])->name('feedback');
Route::post('/feedback', [FeedbackController::class, 'send']);

Route::get('/all-products', [ProductController::class, 'allProducts'])->name('allProducts');
Route::get('/{category}', [CategoryController::class, 'execute'])->name('category');
Route::post('/{product}/comment', [ProductController::class, 'saveComment'])->name('saveComment');
Route::get('/{category}/{product}', [ProductController::class, 'execute'])->name('product');


