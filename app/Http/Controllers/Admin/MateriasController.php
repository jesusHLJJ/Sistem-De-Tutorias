<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Materias\EditMateriaRequest;
use App\Http\Requests\Admin\Materias\StoreMateriaRequest;
use App\Models\Carrera;
use App\Models\Grupo;
use App\Models\Materias;
use App\Models\Semestres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class MateriasController extends Controller
{
    public function show()
    {
        // Obtener grupos con el conteo de materias relacionadas y la relación de materias cargada
        $grupos = Grupo::with('materias', 'carrera')->withCount('materias')->get();
        $materias = Materias::all();

        return view('admin.materias.dashboard', compact(
            'grupos',
            'materias'
        ));
    }

    public function index()
    {
        $materias = Materias::with('carrera')->get();
        $carreras = Carrera::all();
        $semestres = Semestres::all();
        return view('admin.materias.index', compact('materias', 'carreras', 'semestres'));
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

    public function storeMateria(Request $request)
    {
        $request->validate([
            'id_carrera' => 'required|exists:carreras,id_carrera',
            'id_semestre' => 'required|exists:semestres,id_semestre',
            'nombre' => 'required|string|max:255',
            'clave_materia' => 'required|string|max:50|unique:materias,clave_materia',
            'HRS_TEORICAS' => 'required|integer|min:0',
            'HRS_PRACTICAS' => 'required|integer|min:0',
            'creditos' => 'required|integer|min:0',
        ]);

        try {
            Materias::create($request->all());

            return redirect()->route('admin.materias.index')
                ->with('success', 'Materia registrada exitosamente');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'Error al registrar materia: ' . $e->getMessage()]);
        }
    }

    public function updateMateria(Request $request, $id)
    {
        $request->validate([
            'id_carrera' => 'required|exists:carreras,id_carrera',
            'id_semestre' => 'required|exists:semestres,id_semestre',
            'nombre' => 'required|string|max:255',
            'clave_materia' => 'required|string|max:50|unique:materias,clave_materia,' . $id . ',id_materia',
            'HRS_TEORICAS' => 'required|integer|min:0',
            'HRS_PRACTICAS' => 'required|integer|min:0',
            'creditos' => 'required|integer|min:0',
        ]);

        try {
            $materia = Materias::findOrFail($id);
            $materia->update($request->all());

            return redirect()->route('admin.materias.index')
                ->with('success', 'Materia actualizada exitosamente');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'Error al actualizar materia: ' . $e->getMessage()]);
        }
    }

    public function destroyMateria($id)
    {
        try {
            $materia = Materias::findOrFail($id);
            $materia->delete();

            return redirect()->route('admin.materias.index')
                ->with('success', 'Materia eliminada exitosamente');
        } catch (\Exception $e) {
            return back()
                ->withErrors(['error' => 'Error al eliminar materia: ' . $e->getMessage()]);
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

        return redirect()->route('admin.materias.dashboard')
            ->with('success', 'Todas las materias han sido desasignadas del grupo ' . $grupo->clave_grupo);
    }
}