<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Materias\EditMateriaRequest;
use App\Http\Requests\Admin\Materias\StoreMateriaRequest;
use App\Models\Grupo;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class MateriasController extends Controller
{
    public function show()
    {
        // Obtener grupos con el conteo de materias relacionadas
        $grupos = Grupo::withCount('materias')->get();
        $materias = Materia::all();

        //dd($grupos, $materias);

        return view('admin.materias.dashboard', compact(
            'grupos',
            'materias'
        ));
    }

    public function api()
    {
        $query = Grupo::select([
            'grupos.*',
            DB::raw('(SELECT COUNT(*) FROM grupo_materia WHERE grupo_materia.id_grupo = grupos.id_grupo) as materias_count')
        ]);

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('materias_count', function ($grupo) {
                // Verificación adicional para asegurar el conteo
                return $grupo->materias_count ?? $grupo->materias()->count();
            })
            ->toJson();
    }

    public function getGruposData(Request $request)
    {
        $query = Grupo::with('materias');

        if ($request->has('carrera_id')) {
            $query->where('id_carrera', $request->carrera_id);
        }

        return response()->json([
            'query'
        ]);
    }

    public function store(StoreMateriaRequest $request)
    {
        try {
            $grupo = Grupo::findOrFail($request->grupo);
            $grupo->materias()->syncWithoutDetaching($request->materia);

            return redirect()
                ->route('admin.materias.dashboard', $grupo->id_grupo)
                ->with(
                    'success',
                    count($request->materia) . ' materias asignadas correctamente al grupo ' .
                        $grupo->clave_grupo
                );
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'Error al asignar materias: ' . $e->getMessage()]);
        }
    }

    public function edit($clave_grupo)
    {
        // Cambia findOrFail($clave_grupo) por where('clave_grupo', $clave_grupo)->firstOrFail()
        $grupo = Grupo::with('materias')->where('clave_grupo', $clave_grupo)->firstOrFail();

        return response()->json([
            'materias' => $grupo->materias->pluck('id_materia')->toArray()
        ]);
    }

    public function update(Request $request, $clave_grupo)
    {
        $request->validate([
            'materia' => 'required|array|max:6',
            'materia.*' => 'exists:materias,id_materia'
        ]);

        $grupo = Grupo::where('clave_grupo', $clave_grupo)->firstOrFail();
        $grupo->materias()->sync($request->materia);

        return redirect()->route('admin.materias.dashboard')
            ->with('success', 'Materias del grupo actualizadas exitosamente');
    }

    public function destroy($clave_grupo)
    {
        $grupo = Grupo::where('clave_grupo', $clave_grupo)->firstOrFail();
        $grupo->materias()->detach();

        return response()->json([
            'success' => true,
            'message' => 'Todas las materias han sido desasignadas del grupo ' . $grupo->clave_grupo
        ]);
    }
}