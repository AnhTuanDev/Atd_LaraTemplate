<?php

namespace App\Http\Livewire\Shop;

use Illuminate\Http\Request;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $cartCount, $cartContent, $quantity;

    public function mount(Request $request)
    {
        $this->cartNote = $request->get('cartNote');
        $this->cartCount = \Cart::count();
        $this->cartContent = \Cart::content();
    }
    public function render()
    {
        return view('livewire.shop.checkout-component', [
        ])->layout('components.shop.layouts.app');
    }
}
