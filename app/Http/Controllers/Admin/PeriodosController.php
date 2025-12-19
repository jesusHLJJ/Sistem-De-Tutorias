<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Periodos;
use Illuminate\Http\Request;

class PeriodosController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'periodo' => 'required|string|max:255|unique:periodos,periodo',
        ], [
            'periodo.unique' => 'Este periodo ya existe.'
        ]);

        Periodos::create([
            'periodo' => htmlspecialchars(trim($request->periodo), ENT_QUOTES, 'UTF-8')
        ]);

        return redirect()->back()->with('success', 'Periodo creado exitosamente');
    }
}
