<?php

namespace App\Http\Livewire\Client\Components;

use Livewire\Component;
use Darryldecode\Cart\Cart;

class Header extends Component
{


    protected $listeners = [
        'addProduct', 'deleteProductCount'
    ];

    public $countCart = 0;

    public function mount()
    {
        $items = \Cart::getContent();
        $this->countCart = count($items);

    }

    public function render()
    {
        return view('livewire.client.components.header');
    }

    public function addProduct()
    {
        $items = \Cart::getContent();
        $this->countCart = $items->count();
    }
}
