<?php

namespace App\Http\Livewire;

use App\Models\ContactInformation;
use App\Models\KursRate;
use App\Models\MetodePembayaran;
use App\Models\SimcardProvider;
use Evdigi\Generalhelper\MataUang;
use Livewire\Component;

class WidgetKalkulatorConvert extends Component
{
    public $simcardproviderwithkurs = [];
    public $metodepembayaran = [];
    public $timestampnya;

    public $pulsa_dimiliki, $asal_provider, $tujuantempatcair, $convertResult;

    public function mount($simcardproviderwithkurs, $metodepembayaran) {
        $this->simcardproviderwithkurs = $simcardproviderwithkurs ?? [];
        $this->metodepembayaran = $metodepembayaran ?? [];
        $this->timestampnya = date('YmdHis');
    }

    public function render()
    {
        return view('livewire.widget-kalkulator-convert');
    }

    public function calculateConvertResult() {
        $kursnya = KursRate::where('simcard_provider_id', $this->asal_provider)->get()->toArray();

        $pulsadimiliki = explode(' ', $this->pulsa_dimiliki)[1];
        $pulsa_dimiliki_removed_dots = str_replace('.', '', $pulsadimiliki);
        $pulsa_dimiliki_converted_data = (float) $pulsa_dimiliki_removed_dots;
        $asalprovider = $this->asal_provider;
        $tujuantempatcair = $this->tujuantempatcair;
        $ratenya = 0;
        $operatornya = '';
        $resultnya = 0;
        $nominalnya = '';
        $p = [];
        foreach ($kursnya as $key => $value) {
            $splitnominalvalue = explode(' ', $value['nominal']);
            $operandnya = is_numeric($splitnominalvalue[0]) ? $splitnominalvalue[1] : $splitnominalvalue[0];
            // dd($operandnya);
            $apakahkenarateini = false;
            $resultnya = 0;
            if($operandnya == '<=') {
                if($pulsa_dimiliki_converted_data <= $splitnominalvalue[1]) {
                    $apakahkenarateini = true;
                }
            } else if($operandnya == '>=') {
                if($pulsa_dimiliki_converted_data >= $splitnominalvalue[1]) {
                    $apakahkenarateini = true;
                }
            } else if($operandnya == '<') {
                if($pulsa_dimiliki_converted_data < $splitnominalvalue[1]) {
                    $apakahkenarateini = true;
                }
            } else if($operandnya == '>') {
                if($pulsa_dimiliki_converted_data > $splitnominalvalue[1]) {
                    $apakahkenarateini = true;
                }
            } else {
                if($pulsa_dimiliki_converted_data >= $splitnominalvalue[0] && $pulsa_dimiliki_converted_data <= $splitnominalvalue[2]) {
                    $apakahkenarateini = true;
                }
            }

            if($apakahkenarateini == true) {
                $ratenya = $value['rate'];
                $nominalnya = $value['nominal'];
                $operatornya = SimcardProvider::find($value['simcard_provider_id'])->simcard_provider_name;
                $resultnya = $pulsa_dimiliki_converted_data * $ratenya;
                break;
            }
        }

        $this->timestampnya = date('YmdHis');

        $metodepembayaran = MetodePembayaran::find($this->tujuantempatcair);

        $this->convertResult = [
            'pulsa_dimiliki' => $pulsadimiliki,
            'asal_provider_input_id' => $asalprovider,
            'tujuan_tempat_cair_input_id' => $tujuantempatcair,
            'asal_provider' => SimcardProvider::find($asalprovider)->simcard_provider_name,
            'tujuan_tempat_cair' => 'akun '.$metodepembayaran->jenis_metode_pembayaran. ' ('.$metodepembayaran->nama_metode_pembayaran.')',
            'kena_rate' => $ratenya,
            'operator' => $operatornya,
            'kena_nominal' => $nominalnya,
            'result_without_biaya_admin' => $resultnya,
            'biaya_admin' => $metodepembayaran->biaya_admin,
            'result_with_biaya_admin' => MataUang::rupiah($resultnya - $metodepembayaran->biaya_admin),
            'whatsapp_number' => ContactInformation::where('type', 'whatsapp')->first()->value ?? 'not_set',
            'timestamp' => $this->timestampnya,
        ];
    }
}
