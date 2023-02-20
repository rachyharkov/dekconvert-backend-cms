<?php

namespace App\Http\Livewire;

use App\Models\About as ModelsAbout;
use Livewire\Component;

class About extends Component
{

    public $about_text, $updated_at;

    protected $listeners = [
        'saveAbout'
    ];

    public function mount()
    {
        $dataText = ModelsAbout::first()->about_text;
        $this->updated_at = ModelsAbout::first()->updated_at;
        $this->about_text = html_entity_decode($dataText);
    }

    public function render()
    {
        return view('livewire.about');
    }

    public function saveAbout($data)
    {
        $data['about_text'] = $data['about_text'];
        $data['updated_at'] = now();
        // dd($data);
        ModelsAbout::updateOrCreate(
            ['id' => 1],
            $data
        );

        $this->updated_at = $data['updated_at'];

        $this->emit('AboutTextSaved', ['message' => 'About has been saved!']);
    }
}
