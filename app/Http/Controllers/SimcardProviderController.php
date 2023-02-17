<?php

namespace App\Http\Controllers;

use App\Models\SimcardProvider;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SimcardProviderController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            $datanya = SimcardProvider::latest()->get();
            return DataTables::of($datanya)
                ->addIndexColumn()
                ->addColumn('action','simcard-provider._action')
                ->toJson();
        }

        return view('simcard-provider.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'simcard_provider_name' => 'required',
        ]);

        // dd($request->all());

        $image_name = 'default.png';
        if($request->hasFile('simcard_provider_image')) {
            $image = $request->file('simcard_provider_image');
            $image_name = 'gambar_simcard_provider-'.date('Y-m-d').time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/img/simcard_provider'), $image_name);

        }

        SimcardProvider::create([
            'simcard_provider_name' => $request->simcard_provider_name,
            'simcard_provider_keterangan' => $request->simcard_provider_keterangan,
            'simcard_provider_image' => $image_name,
            'simcard_provider_status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return request()->json(200, 'success', [
            'id' => $request->simcard_provider_name,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'simcard_provider_name' => 'required',
        ]);

        // dd($request->all());
        $image_name = $request->simcard_provider_image_old;


        if($request->hasFile('simcard_provider_image')) {

            if(file_exists(public_path('/img/simcard_provider/'.$request->simcard_provider_image_old)) && $request->simcard_provider_image_old != 'default.png') {
                unlink(public_path('/img/simcard_provider/'.$request->simcard_provider_image_old));
            }
            $image = $request->file('simcard_provider_image');
            $image_name = 'gambar_simcard_provider-'.date('Y-m-d').time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/img/simcard_provider'), $image_name);
        }

        $data = [
            'simcard_provider_name' => $request->simcard_provider_name,
            'simcard_provider_keterangan' => $request->simcard_provider_keterangan,
            'simcard_provider_image' => $image_name,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $simcard_provider = SimcardProvider::find($request->simcard_provider_id);
        $simcard_provider->update($data);

        return request()->json(200, 'success', [
            'id' => $request->simcard_provider_name,
        ]);
    }

    public function destroy($id)
    {
        $simcard_provider = SimcardProvider::find($id);
        $simcard_provider->delete();

        return request()->json(200, 'success', [
            'id' => $id,
        ]);
    }
}
