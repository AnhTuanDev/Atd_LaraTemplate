<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;

class Show extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.shop.show', [
            'photos' => $this->product->attachment()->get(),
        ]);
    }
}
