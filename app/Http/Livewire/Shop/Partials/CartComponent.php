<?php

namespace App\Http\Livewire\Shop\Partials;

use Livewire\Component;

class CartComponent extends Component
{

    public $cartCount, $cartContent;

    protected $listeners = ['cartAdded'];

    public function cartAdded()
    {
        $this->reset(['cartCount', 'cartContent']);

        $this->cartCount = \Cart::count();

        $this->cartContent = \Cart::content();
    }

    public function cartRemove($row)
    {
        \Cart::remove($row);

        $this->cartContent = \Cart::content();

        $this->reset('cartCount');

        $this->cartCount = \Cart::count();

        if($this->cartCount < 1) {
            return redirect()->route('shop.index');
        }

    }

    public function destroyCart()
    {
        \Cart::destroy();

        $this->reset(['cartCount', 'cartContent']);

        return redirect()->route('shop.index');
    }

    public function mount()
    {
        $this->reset(['cartCount', 'cartContent']);

        $this->cartCount = \Cart::count();

        $this->cartContent = \Cart::content();
    }

    public function render()
    {
        return view('livewire.shop.partials.cart-component');
    }
}
