<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeoSettingController extends Controller
{
    public function index()
    {
        return view('seo_setting.form');
    }
}
