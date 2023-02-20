<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Models\Faq;
use Yajra\DataTables\Facades\DataTables;

class FaqController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            $datanya = Faq::latest()->get();
            return DataTables::of($datanya)
                ->addIndexColumn()
                ->addColumn('action','faq._action')
                ->toJson();
        }
        return view('faq.index');
    }

    public function store(StoreFaqRequest $request)
    {
        Faq::create($request->all());
        return response('success', 201);
    }

    public function update(UpdateFaqRequest $request)
    {
        Faq::find($request->id)->update($request->all());
        return response('success', 200);
    }

    public function destroy($id)
    {
        Faq::find($id)->delete();
        return response('success', 200);
    }
}
