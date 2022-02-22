<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;

class CheckoutComponent extends Component
{

    public $cartCount, $cartContent, $quantity;

    public function mount()
    {

        //$this->reset(['cartCount']);

        $this->cartCount = \Cart::count();

        $this->cartContent = \Cart::content();

    }

    public function cartRemove($row)
    {
        \Cart::remove($row);

        $this->cartContent = \Cart::content();

        $this->reset('cartCount');

        $this->cartCount = \Cart::count();

    }

    public function destroyCart()
    {
        \Cart::destroy();

        $this->reset(['cartCount', 'cartContent']);
    }

    public function render()
    {
        return view('livewire.shop.checkout-component', [
            //
        ])->layout('components.shop.layouts.app');
    }
}
