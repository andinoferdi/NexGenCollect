<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationSettingController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.application_settings');
    }
}
