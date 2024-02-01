<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Product as ProductModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class Product extends Component
{

    use LivewireAlert, WithFileUploads, WithPagination;

    protected $paginationTheme = 'tailwind';
    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    public $openForm;
    public $search, $rows = 5;
    public $coffe_name, $price, $description, $image;
    public $product_id;


    public function render()
    {
        $data = null;

        if ($this->search) {
            $data['data']['data_coffe'] = ProductModel::where('coffe_name', 'LIKE', '%' . $this->search . '%')->orderBy('created_at', 'DESC')->paginate($this->rows);
        }else{
            $data['data']['data_coffe'] = ProductModel::orderBy('created_at', 'DESC')->paginate($this->rows);
        }


        return view('livewire.admin.product', $data)->extends('layouts.app')->section('content');
    }

    public function backButton()
    {
        $this->openForm = false;
        $this->reset([]);
    }

    public function saveProduct()
    {
        $this->validate([
            'coffe_name' => 'required|unique:products,coffe_name',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,webp'
        ]);


        try {

            $nameFile = 'foto' . '-' . rand(10000, 99999) . '-' . time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images/products', $nameFile);

            ProductModel::create([
                'coffe_name' => $this->coffe_name,
                'price' => $this->price,
                'description' => $this->description,
                'image' => $nameFile
            ]);


            $this->alert('success', 'Produk berhasil ditambahkan');

            $this->backButton();

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function delete($id)
    {
        $this->confirm('Are you sure delete this data?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'No',
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled'
        ]);

        $this->product_id = $id;
    }

    public function edit($id)
    {
        $product = ProductModel::where('id', $id)->first();
        $this->coffe_name = $product->coffe_name;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->image = $product->image;

        $this->product_id = $id;
        $this->openForm = true;
    }

    public function update($id)
    {
        $product = ProductModel::where('id', $id)->first();
        $product->coffe_name = $this->coffe_name;
        $product->price = $this->price;
        $product->description = $this->description;

        if ($this->image === $product->image) {
            $product->image = $this->image;
        }else{

            $nameFile = 'foto' . '-' . rand(10000, 99999) . '-' . time() . '.' . $this->image->getClientOriginalExtension();

            $path = public_path('storage/images/products/' . $product->image);
            File::delete($path);
            $this->image->storeAs('public/images/products', $nameFile);
            $product->image = $nameFile;

        }

        $this->alert('success', 'Succesfully update produk');

        $product->update();
        $this->backButton();
    }

    public function confirmed()
    {

        $data = ProductModel::findOrFail($this->product_id);

        $path = public_path('storage/images/products/' . $data->image);
        File::exists($path) ? File::delete($path) : '';
        $data->delete();

        $this->alert(
            'success',
            'Category deleted'
        );
    }
}
