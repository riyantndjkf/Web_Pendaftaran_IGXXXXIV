<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class R1Controller extends Controller
{
    public function index(Request $request)
    {

        return view('peserta.rally-1.index');
    }

}
