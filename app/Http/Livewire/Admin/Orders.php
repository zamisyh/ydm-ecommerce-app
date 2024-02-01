<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order as OrderModel;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use App\Models\Product as ProductModel;
use App\Models\Table as TableModel;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class Orders extends Component
{

    use WithPagination, LivewireAlert, WithFileUploads;

    protected $paginationTheme = 'tailwind';
    protected $listeners = [
        'confirmed',
        'cancelled',
        'orderNew'
    ];



    public $openForm;
    public $search, $rows = 5;
    public $orderToday, $allOrder;

    public function mount()
    {
        $this->getOrder();
    }

    public function render()
    {
        return view('livewire.admin.orders')->extends('layouts.app')->section('content');
    }

    public function orderNew()
    {
        $this->getOrder();
    }

    public function getOrder()
    {
        $this->orderToday = OrderModel::with('products', 'table')->whereDate('created_at', Carbon::today())->orderBy('created_at', 'DESC')->get();
    }
}
