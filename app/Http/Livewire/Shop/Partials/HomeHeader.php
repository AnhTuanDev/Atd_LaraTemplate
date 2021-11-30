<?php

namespace App\Http\Livewire\Shop\Partials;

use Livewire\Component;

use App\Models\Shop\Product;

class HomeHeader extends Component
{
    public function render()
    {
        $productHeader = Product::whereNotNull('home_banner')->first();

        return view('livewire.shop.partials.home-header', [
            'productHeader' => $productHeader,
        ]);
    }
}
