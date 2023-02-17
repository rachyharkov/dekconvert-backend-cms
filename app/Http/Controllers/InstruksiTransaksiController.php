<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InstruksiTransaksiController extends Controller
{
    public function index()
    {
        return view('instruksi_transaksi.index');
    }

    public function upload_image(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $randomname = Str::random(10);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $randomname . '.' . $extension;

            $request->file('upload')->move(public_path('/img/instruksi_transaksi'), $randomname . '.' . $extension);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('img/instruksi_transaksi/'.$fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);
        }
    }
}
