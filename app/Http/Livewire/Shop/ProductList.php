<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;

use App\Models\Shop\Category;

use App\Models\Shop\Product;

class ProductList extends Component
{

    public $category;

    public function render()
    {
        $category = $this->category;

        $products = $category->hasProduct();

        return view('livewire.shop.product-list', [

            //'products' => $products,
            'products' => Product::all(),

            'title' => $category->name,

        ]);
    }
}
