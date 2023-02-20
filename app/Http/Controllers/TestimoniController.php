<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestimoniRequest;
use App\Http\Requests\UpdateTestimoniRequest;
use App\Models\Testimoni;
use Yajra\DataTables\Facades\DataTables;

class TestimoniController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            $datanya = Testimoni::latest()->get();
            return DataTables::of($datanya)
                ->addIndexColumn()
                ->addColumn('action','testimoni._action')
                ->toJson();
        }
        return view('testimoni.index');
    }

    public function store(StoreTestimoniRequest $request)
    {
        Testimoni::create($request->validated());
        return response('success', 201);
    }

    public function update(UpdateTestimoniRequest $request)
    {
        Testimoni::find($request->id)->update($request->validated());
        return response('success', 200);
    }

    public function destroy($id)
    {
        Testimoni::find($id)->delete();
        return response('success', 200);
    }
}
