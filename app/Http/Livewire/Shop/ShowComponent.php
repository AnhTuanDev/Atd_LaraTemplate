<?php

namespace App\Http\Livewire\Shop;

use Illuminate\Database\Eloquent\Collection;

use Livewire\Component;

use App\Models\Shop\Product;

class ShowComponent extends Component
{
    public Product $product;
    public $quantity = 1;
    public $sizes    = [];
    public $size     = 'S';
    public $color;
    public $colorName;
    public $colors   = [];
    public $cartMessage = false;
    public $imageZoom = '175';

    public function mount()
    {
        if($this->product->colors->count()) {
            $this->colors = $this->product->colors;
            $this->color = $this->product->colors[0]['value'];
        }
        if($this->product->sizes->count()) {
            $this->sizes = $this->product->sizes;
            $this->size = $this->product->sizes[0]['name'];
        }
    }

    public function addCart($prdId) 
    {
        $cartProduct = Product::findOrFail($prdId);
        $discount = $cartProduct['discount'] < 1;
        $price = $discount ? $cartProduct['price'] : $cartProduct['discount'];
        \Cart::add([
            'id'        => $cartProduct['id'], 
            'name'      => $cartProduct['name'], 
            'qty'       => $this->quantity,
            'price'     => (int) $price, 
            'weight'    => 1, 
            'options'   => [
                    'size'      => 'Size: ' . $this->size,
                    'img'       => $cartProduct->cover ? $cartProduct->cover->url() : '/',
                    'color'     => $this->color,
                    'colorName' => $this->colorName,
            ]
        ]);
        $this->reset(['quantity', 'cartMessage']);
        $this->emit('cartAdded');
    }
    public function setColor($value)
    {
        $this->reset(['color', 'colorName']);
        $this->color = $value;
    }
    public function setSize($sz)
    {
        $this->reset('size');
        $this->size = $sz;
    }
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
    public function toggleMessage()
    {
        $this->reset('cartMessage');
        $this->cartMessage = false;
    }
    public function render()
    {
        $products = $this->product->category->products->take(6);
        return view('livewire.shop.show-component', [
            'photos' => $this->product->attachment()->get(),
            'cartCount' => \Cart::count(),
            'products' => $products,
        ])->layout('components.shop.layouts.app');
    }
}
