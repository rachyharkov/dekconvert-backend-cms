<?php

namespace App\Http\Controllers;

use App\Models\MetodePembayaran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MetodePembayaranController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            $datanya = MetodePembayaran::latest()->get();
            return DataTables::of($datanya)
                ->addIndexColumn()
                ->addColumn('action','metode_pembayaran._action')
                ->toJson();
        }

        return view('metode_pembayaran.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_metode_pembayaran' => 'required',
            'jenis_metode_pembayaran' => 'required',
            'nomor_rekening' => 'required',
            'atas_nama' => 'required',
            'biaya_admin' => 'required',
        ]);

        // dd($request->all());

        $image_name = 'default.png';
        if($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $image_name = 'gambar_metode_pembayaran-'.date('Y-m-d').time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/img/metode_pembayaran'), $image_name);

        }

        MetodePembayaran::create([
            'nama_metode_pembayaran' => $request->nama_metode_pembayaran,
            'jenis_metode_pembayaran' => $request->jenis_metode_pembayaran,
            'nomor_rekening' => $request->nomor_rekening,
            'atas_nama' => $request->atas_nama,
            'biaya_admin' => $request->biaya_admin,
            'gambar' => $image_name,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return request()->json(200, 'success', [
            'id' => $request->nama_metode_pembayaran,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_metode_pembayaran' => 'required',
            'jenis_metode_pembayaran' => 'required',
            'nomor_rekening' => 'required',
            'atas_nama' => 'required',
            'biaya_admin' => 'required',
        ]);

        // dd($request->all());
        $image_name = $request->gambar_old;


        if($request->hasFile('gambar')) {

            if(file_exists(public_path('/img/metode_pembayaran/'.$request->gambar_old)) && $request->gambar_old != 'default.png') {
                unlink(public_path('/img/metode_pembayaran/'.$request->gambar_old));
            }
            $image = $request->file('gambar');
            $image_name = 'gambar_metode_pembayaran-'.date('Y-m-d').time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/img/metode_pembayaran'), $image_name);
        }

        $data = [
            'nama_metode_pembayaran' => $request->nama_metode_pembayaran,
            'jenis_metode_pembayaran' => $request->jenis_metode_pembayaran,
            'nomor_rekening' => $request->nomor_rekening,
            'atas_nama' => $request->atas_nama,
            'biaya_admin' => $request->biaya_admin,
            'gambar' => $image_name,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $metode_pembayaran = MetodePembayaran::find($request->metode_pembayaran_id);
        $metode_pembayaran->update($data);

        return request()->json(200, 'success', [
            'id' => $request->metode_pembayaran_name,
        ]);
    }

    public function destroy($id)
    {
        $metode_pembayaran = MetodePembayaran::find($id);
        $metode_pembayaran->delete();
        if(file_exists(public_path('/img/metode_pembayaran/'.$metode_pembayaran->gambar)) && $metode_pembayaran->gambar != 'default.png') {
            unlink(public_path('/img/metode_pembayaran/'.$metode_pembayaran->gambar));
        }
        return request()->json(200, 'success', [
            'id' => $id,
        ]);
    }
}
