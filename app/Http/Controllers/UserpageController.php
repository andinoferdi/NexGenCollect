<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserpageController extends Controller
{
       public function index(Request $request)
{
    return view('userpage.index');
}
}
