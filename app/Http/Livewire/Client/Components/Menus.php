<?php

namespace App\Http\Livewire\Client\Components;

use Livewire\Component;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Menus extends Component
{

    use LivewireAlert;

    public $products;

    public function mount()
    {
        $this->products = Product::orderBy('created_at', 'DESC')->get();
    }

    public function render()
    {
        return view('livewire.client.components.menus')->extends('layouts.app')->section('content');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        \Cart::add(array(
            'id' => $id,
            'name' => $product->coffe_name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(
                'image' => $product->image,
                'description' => $product->description
            ),
            'associatedModel' => $product
        ));

        $this->alert('success', 'Berhasil menambahkan ke keranjang');

        $this->emit('addProduct', $id);

    }
}
