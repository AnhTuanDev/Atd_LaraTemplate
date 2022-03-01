<?php

namespace App\Http\Livewire\Shop;

use Illuminate\Http\Request;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartOrderComponent extends Component
{
    public $isOrder = false;

    public $cartNote, $orderId;

    public $cartCount, $cartContent, $quantity;

    public function mount()
    {
        $this->cartCount = Cart::count();
        $this->cartContent = Cart::content();
        $this->orderId = $this->id;
    }
    public function setQuantity($q, $row)
    {
        $cart = Cart::get($row);

        $qty = $cart->qty;

        if($q === '-' && $qty >= 2) {
            $qty -= 1;
        }
        elseif($q === '+') {
            $qty += 1;
        }

        Cart::update($row, ['qty' => $qty]);

        $this->cartContent = Cart::content();

        $this->reset('cartCount');

        $this->cartCount = Cart::count();
    }
    public function cartRemove($row)
    {
        Cart::remove($row);

        $this->cartContent = Cart::content();

        $this->reset('cartCount');

        $this->cartCount = Cart::count();
    }

    public function destroyCart()
    {
        Cart::destroy();
        $this->reset(['cartCount', 'cartContent']);
    }

    public function checkout()
    {
        //return redirect()->route('shop.cart.checkout', [ 'cartNote' => $this->cartnote, 'orderId' => $this->id ]);
        return redirect()->route('shop.cart.checkout', [ 'orderId' => $this->id, 'cartNote' => $this->cartNote]);
    }
    public function render()
    {
        return view('livewire.shop.cart-order-component', [
        ])->layout('components.shop.layouts.app');
    }
}
