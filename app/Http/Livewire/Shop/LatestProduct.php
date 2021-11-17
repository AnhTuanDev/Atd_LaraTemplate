<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;

class LatestProduct extends Component
{
    public $products;

    public $title;

    public function render()
    {
        return view('livewire.shop.latest-product');
    }
}
