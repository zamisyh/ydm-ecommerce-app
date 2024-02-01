<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Table as Tables;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Table extends Component
{

    use LivewireAlert, WithPagination;

    protected $paginationTheme = 'tailwind';
    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    public $openForm;
    public $search, $rows = 5;
    public $table_name, $nomor_table, $table_id;

    public function render()
    {

        $data = null;

        if ($this->search) {
            $data['data']['data_table'] = Tables::where('table_name', 'LIKE', '%' . $this->search . '%')->paginate($this->rows);

        }else{
            $data['data']['data_table'] = Tables::orderBy('created_at', 'DESC')->paginate($this->rows);

        }

        return view('livewire.admin.table', $data)->extends('layouts.app')->section('content');
    }

    public function backButton()
    {
        $this->openForm = false;
        $this->reset([]);
    }

    public function saveTable()
    {
        $this->validate([
            'nomor_table' => 'required|unique:tables,nomor_table',
            'table_name' => 'required'
        ]);

        try {
            Tables::create([
                'nomor_table' => $this->nomor_table,
                'table_name' => $this->table_name
            ]);

            $this->alert('success', 'Table berhasil ditambahkan');

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

        $this->table_id = $id;
    }

    public function confirmed()
    {

        $data = Tables::findOrFail($this->table_id);

        // $path = public_path('storage/images/products/' . $data->image);
        // File::exists($path) ? File::delete($path) : '';
        $data->delete();

        $this->alert(
            'success',
            'Category deleted'
        );
    }
}
