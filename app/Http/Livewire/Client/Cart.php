<?php

namespace App\Http\Livewire\Client;

use App\Models\Order;
use Livewire\Component;
use App\Models\Product;
use Darryldecode\Cart\Cart as ProductCart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Table;

class Cart extends Component
{

    use LivewireAlert;

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    public $cart, $product_id, $nomor_meja;
    public $openFormMeja;
    public $dataMeja, $qty, $alertSuccess;

    public function render()
    {
        $this->cart = \Cart::getContent();
        $this->dataMeja = Table::orderBy('created_at', 'ASC')->get();

        return view('livewire.client.cart')->extends('layouts.app')->section('content');
    }

    public function checkout()
    {
        if (is_null($this->nomor_meja)) {
            $this->openFormMeja = true;
        }else{
            $this->openFormMeja = false;

            $order = Order::create([
                'table_id' => $this->nomor_meja,
                'order_date' => date('Y-m-d H:i:s')
            ]);

            $datas = null;

            foreach (\Cart::getContent() as $key => $value) {
                $datas[] = [
                    'product_id' => $value->id,
                    'qty' => $value->quantity,
                    'total' => $value->price * $value->quantity
                ];
            }

            $order->products()->attach($datas);

            $this->alert('success', 'Berhasil melakukan pemesanan');
            $this->alertSuccess = true;
            $this->emit('orderNew');
            \Cart::clear();
        }
    }

    public function increment($id)
    {
        \Cart::update($id, [
            'quantity' => +1
        ]);
    }

    public function decrement($id)
    {
        \Cart::update($id, [
            'quantity' => -1
        ]);
    }

    public function delete($id)
    {
        $this->confirm('Are you sure delete this product?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'No',
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled'
        ]);

        $this->product_id = $id;
    }

    public function confirmed()
    {
        \Cart::remove($this->product_id);


        $this->alert(
            'success',
            'Product deleted'
        );
    }

}
