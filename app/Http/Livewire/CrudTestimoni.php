<?php

namespace App\Http\Livewire;

use App\Models\Testimoni;
use Livewire\Component;

class CrudTestimoni extends Component
{
    public $page, $titlenya;
    public $testimoni, $action, $method;

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
        return view('livewire.crud-testimoni');
    }

    public function setPage($page, $id = null)
    {
        if($page == 'index') {
            $this->page = 'index';
            $this->titlenya = 'testimoni List';
            $this->dispatchBrowserEvent('initTableNya', ['message' => 'initated']);
            $this->cleanForm();
        }
        if($page == 'create') {
            $this->page = 'create';
            $this->titlenya = 'Add New testimoni';
            $this->action = route('testimoni.store');
            $this->method = 'POST';
        }
        if($page == 'edit') {
            $this->page = 'edit';
            $this->titlenya = 'Edit testimoni';
            $this->action = route('testimoni.update', $this->id);
            $datatestimoni = Testimoni::find($id);
            foreach($datatestimoni->getAttributes() as $key => $value) {
                $this->testimoni[$key] = $value;
            }
            $this->method = 'POST';
        }
    }

    public function cleanForm()
    {
        $this->testimoni = [
            'id' => '',
            'name' => '',
            'rating' => '',
            'comment' => '',
        ];
    }
}
