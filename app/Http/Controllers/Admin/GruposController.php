<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EditGrupoRequest;
use App\Http\Requests\Admin\StoreGrupoRequest;
use App\Models\Carrera;
use App\Models\Grupo;
use App\Models\Periodos;
use App\Models\Profesor;
use App\Models\Salon;
use App\Models\Semestres;
use App\Models\Turno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GruposController extends Controller
{
    public function show()
    {
        $grupos = Grupo::with([
            'carrera',
            'profesor',
            'semestre',
            'turno',
            'periodo',
            'salon'
        ])
            ->get();

        $carreras = Carrera::get();
        $profesores = Profesor::get();
        $semestres = Semestres::get();
        $turnos = Turno::get();
        $periodos = Periodos::get();
        $salones = Salon::get();

        return view('admin.grupos.dashboard', compact(
            'grupos',
            'carreras',
            'profesores',
            'semestres',
            'turnos',
            'periodos',
            'salones'
        ));
    }

    public function store(StoreGrupoRequest $request)
    {
        // Validar unicidad de clave_grupo
        if (Grupo::where('clave_grupo', $request->clave_grupo)->exists()) {
            return back()->withErrors(['clave_grupo' => 'Esta clave de grupo ya está registrada'])->withInput();
        }

        DB::transaction(function () use ($request) {
            $grupo = Grupo::create([
                'id_carrera' => $request->carrera,
                'id_semestre' => $request->semestre,
                'id_turno' => $request->turno,
                'clave_grupo' => htmlspecialchars(trim($request->clave_grupo), ENT_QUOTES, 'UTF-8'),
                'id_profesor' => $request->profesor,
                'id_periodo' => $request->periodo,
                'id_salon' => $request->salon,
            ]);

            Log::channel('admin')->info('Grupo creado', [
                'admin_id' => Auth::id(),
                'grupo_id' => $grupo->id_grupo,
                'clave_grupo' => $grupo->clave_grupo
            ]);
        });

        return redirect()->route('admin.grupos.dashboard')
            ->with('success', 'Grupo creado exitosamente');
    }

    public function edit(Grupo $grupo)
    {
        $carreras = Carrera::all();
        $profesores = Profesor::all();
        $semestres = Semestres::all();
        $turnos = Turno::all();
        $periodos = Periodos::all();
        $salones = Salon::all();

        return response()->json([
            'grupo' => $grupo->load(
                'grupos',
                'carreras',
                'profesores',
                'semestres',
                'turnos',
                'periodos',
                'salones'
            ),
            'carreras' => $carreras,
            'profesores' => $profesores,
            'semestres' => $semestres,
            'turnos' => $turnos,
            'periodos' => $periodos,
            'salones' => $salones
        ]);
    }

    public function update(EditGrupoRequest $request, Grupo $grupo)
    {
        // Validar unicidad de clave_grupo excluyendo el actual
        if (Grupo::where('clave_grupo', $request->clave_grupo)
            ->where('id_grupo', '!=', $grupo->id_grupo)
            ->exists()
        ) {
            return back()->withErrors(['clave_grupo' => 'Esta clave de grupo ya está registrada'])->withInput();
        }

        $grupoData = [
            'clave_grupo' => htmlspecialchars(trim($request->clave_grupo), ENT_QUOTES, 'UTF-8'),
            'id_carrera' => $request->carrera,
            'id_semestre' => $request->semestre,
            'id_turno' => $request->turno,
            'id_profesor' => $request->profesor,
            'id_salon' => $request->salon
        ];

        DB::transaction(function () use ($request, $grupo, $grupoData) {
            $periodoData = [
                'periodo' => htmlspecialchars(trim($request->periodo), ENT_QUOTES, 'UTF-8')
            ];

            $grupo->periodo->update($periodoData);
            $grupo->update($grupoData);

            Log::channel('admin')->info('Grupo actualizado', [
                'admin_id' => Auth::id(),
                'grupo_id' => $grupo->id_grupo,
                'changes' => $grupo->getChanges()
            ]);
        });

        return redirect()->route('admin.grupos.dashboard')
            ->with('success', 'Grupo actualizado exitosamente');
    }

    public function destroy(Grupo $grupo)
    {
        // Verificar si el grupo tiene alumnos inscritos
        if ($grupo->alumnos()->exists()) {
            return back()->with('error', 'No se puede eliminar el grupo porque tiene alumnos inscritos');
        }

        DB::transaction(function () use ($grupo) {
            $grupoId = $grupo->id_grupo;
            $claveGrupo = $grupo->clave_grupo;

            $grupo->delete();

            Log::channel('admin')->info('Grupo eliminado', [
                'admin_id' => Auth::id(),
                'grupo_id' => $grupoId,
                'clave_grupo' => $claveGrupo
            ]);
        });

        return back()->with('success', 'Grupo eliminado exitosamente');
    }
}