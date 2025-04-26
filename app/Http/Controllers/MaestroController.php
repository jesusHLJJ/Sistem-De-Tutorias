<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Grupo;
use Illuminate\Http\Request;

class MaestroController extends Controller
{
    public function show()
    {
        $user = Auth::user();
    
        return view('maestro.dashboard', [
            'maestro' => $user->maestro,
            'rol' => $user->role_id
        ]);
    }

    public function grupos()
    {
        $user = Auth::user();
        $maestro = $user->maestro;
    
        // Asegúrate de que $maestro no es null y tiene el campo id_profesor
        $grupos = Grupo::where('id_profesor', $maestro->id_profesor)->get();
    
        return view('maestro.mis_grupos', compact('grupos'));
    }
    public function mostrarGrupo($grupoId)
    {
        $grupo = Grupo::findOrFail($grupoId);
        return view('maestro.detalle_grupo', compact('grupo'));
    }
    
}