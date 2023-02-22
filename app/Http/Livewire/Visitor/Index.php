<?php

namespace App\Http\Livewire\Visitor;

use App\Models\About;
use App\Models\SimcardProvider;
use Livewire\Component;

class Index extends Component
{
    public $page_title = 'Home';
    public $page_slug = 'home';
    public $simcardproviderwithkurs = [];
    public $about_text;

    public function mount()
    {
        $this->page_title = 'Home';
        $this->page_slug = 'home';
        $this->simcardproviderwithkurs = SimcardProvider::with('kurs_rate')->get()->toArray();
        $this->about_text = About::first()->about_text;
    }

    public function render()
    {
        return view('livewire.visitor.index');
    }
}
