<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\Shop\ViewController;


Route::get('/', [ ShopController::class, 'index' ])->name('shop.home');

Route::get('/blog', [ ShopController::class, 'index' ])->name('blog');

Route::get('/about', [ViewController::class, 'about'])->name('about');

Route::get('/contact', [ViewController::class, 'contact'])->name('contact');

Route::name('shop.')->group( function() {

    Route::get('/{category:slug}', [ShopController::class, 'shopCategory'])->name('category');

    Route::get('/{tag:slug}', [ShopController::class, 'shopTag'])->name('tag');

    Route::get('/{product:slug}', [ShopController::class, 'productShow'])->name('product.show');
});
