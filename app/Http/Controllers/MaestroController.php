<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaestroController extends Controller
{
    public function show()
    {
        return view('maestro.dashboard');
    }
}