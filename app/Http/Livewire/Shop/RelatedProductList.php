<?php

namespace App\Http\Livewire\Shop;

use Livewire\WithPagination;

use Livewire\Component;

use App\Models\Shop\Category;

use App\Models\Shop\Product;

class RelatedProductList extends Component
{

    use WithPagination;

    public $moduleTile;

    public  $classes;

    public $category;

    public $product;

    public function mount() {

    }
    public function render()
    {

        return view('livewire.shop.related-product-list', [

            'products' => Product::where('status', 1)->paginate(10),

        ]);
    }


}
