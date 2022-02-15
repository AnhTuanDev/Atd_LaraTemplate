<?php

namespace App\Http\Livewire\Partials;

use Livewire\Component;

class Breadcrumbs extends Component
{

    public $breadcrumbs;

    public $home = 'Home';
    public $blog;
    public $shop;
    public $category;
    public $tag;
    public $currentItemName;

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.partials.breadcrumbs');
    }
}
