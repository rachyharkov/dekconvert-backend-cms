<?php

namespace App\Http\Livewire;

use App\Models\MetodePembayaran;
use Livewire\Component;

class CrudMetodepembayaran extends Component
{
    public $page, $titlenya;
    public $metode_pembayaran, $action, $method;

    protected $listeners = [
        'setPage'
    ];

    public function mount()
    {
        $this->dispatchBrowserEvent('initTableNya');
        $this->setPage('index');
    }

    public function render()
    {
        return view('livewire.crud-metodepembayaran');
    }

    public function setPage($page, $id = null)
    {
        if($page == 'index') {
            $this->page = 'index';
            $this->titlenya = 'metode_pembayaran List';
            $this->dispatchBrowserEvent('initTableNya', ['message' => 'initated']);
            $this->cleanForm();
        }
        if($page == 'create') {
            $this->page = 'create';
            $this->titlenya = 'Add New metode_pembayaran';
            $this->action = route('metode_pembayaran.store');
            $this->method = 'POST';
        }
        if($page == 'edit') {
            $this->page = 'edit';
            $this->titlenya = 'Edit metode_pembayaran';
            $this->action = route('metode_pembayaran.update', $this->id);
            $datametode_pembayaran = MetodePembayaran::find($id);
            foreach($datametode_pembayaran->getAttributes() as $key => $value) {
                $this->metode_pembayaran[$key] = $value;
            }
            $this->method = 'POST';
        }
    }

    public function cleanForm()
    {
        $this->metode_pembayaran = [
            'nama_metode_pembayaran' => '',
            'jenis_metode_pembayaran' => '',
            'nomor_rekening' => '',
            'atas_nama' => '',
            'status' => '',
            'gambar' => '',
            'biaya_admin' => '',
        ];
    }
}
