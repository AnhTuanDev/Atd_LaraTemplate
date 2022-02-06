<?php

namespace App\Http\Livewire\Shop\Partials;

use Livewire\Component;

class CartComponent extends Component
{
    public $cartCount;

    protected $listeners = ['cartAdded'];

    public function cartAdded($cart)
    {
        $this->reset('cartCount');

        $this->cartCount = $cart;
    }

    public function mount()
    {
        $this->cartCount = \Cart::count();
    }

    public function render()
    {
        return view('livewire.shop.partials.cart-component');
    }
}
