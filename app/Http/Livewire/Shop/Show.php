<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;

use App\Models\Shop\Product;

class Show extends Component
{
    public $product;

    public $quantity = 1;

    public $sizes = [ 'S', 'M', 'L', 'XL' ];

    public $size = 's';

    public function addCart($prdId) 
    {
        //ddd($cartProduct);
        $cartProduct = Product::whereId($prdId)->first();

        \Cart::add([
            'id' => $cartProduct['id'], 
            'name' => $cartProduct['name'], 
            'qty' => $this->quantity,
            'price' => (int)$cartProduct['price'], 
            'weight' => 1, 
            'options' => [
                'size' => $this->size,
            ]
        ]);

        $this->reset('quantity');

        $this->emit('cartAdded', \Cart::count());
    }

    // Set size.
    public function setSize($sz)
    {

        $this->reset('size');

        $this->size = $sz;

    }

    // Set quantity.
    public function setQuantity($q)
    {

        if($q === '-') {
            if($this->quantity >= 2) {
                $this->quantity -= 1;
            }
        }
        elseif($q === '+') {
            $this->quantity += 1;
        }
    }

    public function render()
    {
        return view('livewire.shop.show', [
            'photos' => $this->product->attachment()->get(),

            'cartCount' => \Cart::count(),

        ]);
    }
}
