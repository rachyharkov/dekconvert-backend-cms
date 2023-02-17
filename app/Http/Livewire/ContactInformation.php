<?php

namespace App\Http\Livewire;

use App\Models\ContactInformation as ModelsContactInformation;
use Livewire\Component;

class ContactInformation extends Component
{
    public $contacts;

    protected $listeners = [
        'saveContact'
    ];

    public function render()
    {
        return view('livewire.contact-information');
    }


    public function mount()
    {
        $this->contacts = ModelsContactInformation::all();
    }

    public function saveContact($data)
    {
        // dd($data);

        ModelsContactInformation::truncate();

        foreach ($data as $key => $value) {
            ModelsContactInformation::create([
                'id' => $value['urutan'],
                'type' => $value['type'],
                'value' => $value['value'],
                'created_at' => now()
            ]);
        }

        $this->contacts = ModelsContactInformation::all();

        $this->emit('contactSaved', ['message' => 'Contact information has been saved!']);
    }
}
