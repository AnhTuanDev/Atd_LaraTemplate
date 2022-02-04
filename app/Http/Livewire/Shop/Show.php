<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;

use App\Models\Shop\Product;

class Show extends Component
{
    public $product;

    public $quantity = 1;

    public function addCart($prdId) 
    {
        //ddd($cartProduct);
        $cartProduct = Product::whereId($prdId['id'])->first();

        \Cart::add([
            'id' => $cartProduct['id'], 
            'name' => $cartProduct['name'], 
            'qty' => $this->quantity,
            'price' => (int)$cartProduct['price'], 
            'weight' => 1, 
            'options' => [
                'size' => 'large'
            ]
        ]);
    }

    public function render()
    {
        return view('livewire.shop.show', [
            'photos' => $this->product->attachment()->get(),
        ]);
    }
}
