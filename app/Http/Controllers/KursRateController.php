<?php

namespace App\Http\Controllers;

use App\Models\SimcardProvider;
use App\Models\KursRate;
use Illuminate\Http\Request;

class KursRateController extends Controller
{
    public function index()
    {
        $data = [
            'simcard_providers' => SimcardProvider::all(),
        ];

        return view('kurs-rate.index', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        KursRate::where('simcard_provider_id', $id)->delete();
        foreach($data['nominal_1'] as $key => $value) {
            $nominal = '';

            if($data['operand'][$key] == 'FALSE') {
                $nominal = $data['nominal_1'][$key].' - '.$data['nominal_2'][$key];
            }

            if($data['operand'][$key] == '<' || $data['operand'][$key] == '>' || $data['operand'][$key] == '>=' || $data['operand'][$key] == '<=') {
                $nominal = $data['operand'][$key].' '.$data['nominal_1'][$key];
            }

            $datanya = [
                'simcard_provider_id' => $id,
                'nominal' => $nominal,
                'rate' => $data['rate'][$key],
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            KursRate::create($datanya);
        }
    }
}
