<?php

namespace App\Http\Livewire;

use App\Models\KursRate;
use App\Models\SimcardProvider;
use Livewire\Component;

class CrudSimcardprovider extends Component
{
    public $page, $titlenya;
    public $id_simcard_provider, $simcard_provider_name, $simcard_provider_keterangan, $simcard_provider_image, $simcard_provider_status, $action, $method, $created_at, $updated_at;
    public $kurs_rate_data;

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
        return view('livewire.crud-simcardprovider');
    }

    public function setPage($page, $id = null)
    {
        if($page == 'index') {
            $this->page = 'index';
            $this->titlenya = 'simcard_provider List';
            $this->dispatchBrowserEvent('initTableNya', ['message' => 'initated']);
            $this->cleanForm();
        }
        if($page == 'create') {
            $this->page = 'create';
            $this->titlenya = 'Add New simcard_provider';
            $this->action = route('simcard_provider.store');
            $this->method = 'POST';
            $this->dispatchBrowserEvent('formScript');
        }

        if($page == 'edit') {
            $this->page = 'edit';
            $this->titlenya = 'Edit simcard_provider';
            $this->action = route('simcard_provider.update', $this->id);
            $datasimcard_provider = SimcardProvider::find($id);
            foreach($datasimcard_provider->getAttributes() as $key => $value) {
                $this->$key = $value;
            }
            $this->id_simcard_provider = $id;
            $this->method = 'POST';
            $this->dispatchBrowserEvent('formScript');
        }

        if($page == 'edit_kurs_rate') {
            $this->page = 'edit_kurs_rate';

            $dataSimcardProvider = SimcardProvider::find($id);
            $this->kurs_rate_data = KursRate::where('simcard_provider_id', $id)->get();

            $this->titlenya = 'Edit Kurs Rate '.$dataSimcardProvider->simcard_provider_name;
            $this->id_simcard_provider = $id;
        }
    }

    public function cleanForm()
    {
        $this->id_simcard_provider = null;
        $this->simcard_provider_name = null;
        $this->simcard_provider_keterangan = null;
        $this->simcard_provider_image = null;
        $this->simcard_provider_status = null;
        $this->action = null;
        $this->method = null;
        $this->created_at = null;
        $this->updated_at = null;
    }
}
