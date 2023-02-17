<?php

namespace App\Http\Livewire;

use App\Models\KetentuanSyarat as ModelsKetentuanSyarat;
use Livewire\Component;

class KetentuanSyarat extends Component
{

    public $ketentuan_syarat_text;

    protected $listeners = [
        'saveKetentuanSyarat'
    ];

    public function mount()
    {
        $dataText = ModelsKetentuanSyarat::first()->ketentuan_syarat_text;
        $this->ketentuan_syarat_text = html_entity_decode($dataText);
    }

    public function render()
    {
        return view('livewire.ketentuan-syarat');
    }

    public function saveKetentuanSyarat($data)
    {
        $data['ketentuan_syarat_text'] = htmlentities($data['ketentuan_syarat_text']);
        $data['updated_at'] = now();
        // dd($data);
        ModelsKetentuanSyarat::updateOrCreate(
            ['id' => 1],
            $data
        );

        $this->emit('ketentuanSyaratSaved', ['message' => 'Ketentuan Syarat has been saved!']);
    }
}
