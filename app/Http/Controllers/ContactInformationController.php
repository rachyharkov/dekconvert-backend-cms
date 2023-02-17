<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactInformationController extends Controller
{
    public function index()
    {
        return view('contact_information.index');
    }
}
