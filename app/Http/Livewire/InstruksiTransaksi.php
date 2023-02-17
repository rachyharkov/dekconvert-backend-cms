<?php

namespace App\Http\Livewire;

use App\Models\InstruksiTransaksi as ModelsInstruksiTransaksi;
use Livewire\Component;

class InstruksiTransaksi extends Component
{
    public $instruksi_transaksi_text, $updated_at;

    protected $listeners = [
        'saveInstruksiStransaksi'
    ];

    public function mount()
    {
        $dataText = ModelsInstruksiTransaksi::first()->instruksi_transaksi_text;
        $this->updated_at = ModelsInstruksiTransaksi::first()->updated_at;
        $this->instruksi_transaksi_text = html_entity_decode($dataText);
    }
    public function render()
    {
        return view('livewire.instruksi-transaksi');
    }

    public function saveInstruksiStransaksi($data)
    {
        $data['instruksi_transaksi_text'] = htmlentities($data['instruksi_transaksi_text']);
        $data['updated_at'] = now();
        // dd($data);
        ModelsInstruksiTransaksi::updateOrCreate(
            ['id' => 1],
            $data
        );

        $this->updated_at = $data['updated_at'];

        $this->emit('instruksiTransaksiSaved', ['message' => 'Ketentuan Syarat has been saved!']);
    }
}
