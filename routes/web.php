<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Shop\ShopController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [ ShopController::class, 'index' ])->name('home');
