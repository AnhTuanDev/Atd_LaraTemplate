<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Shop\ShopController;

use App\Http\Livewire\Shop\ShowComponent;

use App\Http\Livewire\Shop\CheckoutComponent;

use App\Http\Controllers\Shop\ViewController;

Route::get('/', [ ShopController::class, 'index' ])->name('shop.home');

Route::get('/blog', [ ShopController::class, 'index' ])->name('blog');

Route::get('/about', [ViewController::class, 'about'])->name('about');

Route::get('/contact', [ViewController::class, 'contact'])->name('contact');

Route::get('/xem-don-hang', CheckoutComponent::class )->name('shop.cart.checkout');

Route::name('shop.')->group( function() {

    Route::get('/shop', [ShopController::class, 'shopCategory'])->name('index');

    Route::get('/shop/danh-muc/{category:slug?}', [ShopController::class, 'shopCategory'])->name('category');

    Route::get('/shop/tag/{tag:slug}', [ShopController::class, 'shopTag'])->name('tag');

    //Route::get('/{product:slug}', [ShopController::class, 'productShow'])->name('product.show');
    Route::get('/shop/san-pham/{product:slug}', ShowComponent::class )->name('product.show');

});

