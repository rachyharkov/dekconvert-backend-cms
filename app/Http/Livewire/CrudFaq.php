<?php

namespace App\Http\Livewire;

use App\Models\Faq;
use Livewire\Component;

class CrudFaq extends Component
{
    public $page, $titlenya;
    public $faq, $action, $method;

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
        return view('livewire.crud-faq');
    }

    public function setPage($page, $id = null)
    {
        if($page == 'index') {
            $this->page = 'index';
            $this->titlenya = 'faq List';
            $this->dispatchBrowserEvent('initTableNya', ['message' => 'initated']);
            $this->cleanForm();
        }
        if($page == 'create') {
            $this->page = 'create';
            $this->titlenya = 'Add New faq';
            $this->action = route('faq.store');
            $this->method = 'POST';
        }
        if($page == 'edit') {
            $this->page = 'edit';
            $this->titlenya = 'Edit faq';
            $this->action = route('faq.update', $this->id);
            $datafaq = Faq::find($id);
            foreach($datafaq->getAttributes() as $key => $value) {
                $this->faq[$key] = $value;
            }
            $this->method = 'POST';
        }
    }

    public function cleanForm()
    {
        $this->faq = [
            'question' => '',
            'answer' => '',
        ];
    }
}
