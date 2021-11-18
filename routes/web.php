<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\Shop\ViewController;


Route::get('/', [ ShopController::class, 'index' ])->name('home');
Route::get('/blog', [ ShopController::class, 'index' ])->name('blog');

Route::get('/about', [ViewController::class, 'about'])->name('about');
Route::get('/contact', [ViewController::class, 'contact'])->name('contact');

Route::get('/danh-muc/{category:slug}', [ShopController::class, 'category'])->name('category.index');
