<?php

namespace App\Http\Livewire\Partials;

use Livewire\Component;

use App\Models\Shop\Category;

class Navbar extends Component
{
    public function render()
    {

        $mainMenu = Category::where('location', 'navbar')
            ->where('parent_id', null)
            ->orderBy('order', 'asc')
            ->get(); 

        return view('livewire.partials.navbar', [
            'mainMenu' => $mainMenu,
        ]);
    }
}
