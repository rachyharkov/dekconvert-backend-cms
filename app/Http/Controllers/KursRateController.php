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
        // dd($request->all());

        $data = $request->all();

        KursRate::where('simcard_provider_id', $id)->delete();

        foreach($data['nominal'] as $key => $value) {
            KursRate::create([
                'simcard_provider_id' => $id,
                'nominal' => $value,
                'rate' => $data['rate'][$key],
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }


        // return redirect()->route('kurs-rate.index')->with('success', 'Kurs Rate updated successfully');
    }
}
