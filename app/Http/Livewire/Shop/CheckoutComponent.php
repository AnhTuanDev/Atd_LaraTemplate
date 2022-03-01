<?php

namespace App\Http\Livewire\Shop;

use Illuminate\Http\Request;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $cartCount, $cartContent, $quantity, $cartNote = 'Không có ghi chú';

    public function mount(Request $request)
    {
        $this->cartCount = \Cart::count();

        $this->cartContent = \Cart::content();

        if($request->has('oder-trixFields')){
            $note = $request->all();
            $this->cartNote = $note['oder-trixFields']['content'];
        }
    }
    public function render()
    {
        return view('livewire.shop.checkout-component', [
        ])->layout('components.shop.layouts.app');
    }
}
