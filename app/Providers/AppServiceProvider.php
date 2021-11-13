<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Models\Shop\Category;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('path.public', function() {
            //return base_path('public_html');
            return base_path().'/public_html';
        });
    }

    public function boot()
    {

       $topMenu = Category::where('location', 'navbar')->orderBy('order', 'asc')->get(); 

        View::share('mainMenu', $topMenu);
    }
}
