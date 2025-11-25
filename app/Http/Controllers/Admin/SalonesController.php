<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EditSalonRequest;
use App\Http\Requests\Admin\StoreSalonRequest;
use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SalonesController extends Controller
{
    public function index()
    {
        $salones = Salon::orderBy('clave_salon', 'asc')->get();
        
        return view('admin.salones.dashboard', compact('salones'));
    }

    public function store(StoreSalonRequest $request)
    {
        DB::transaction(function () use ($request) {
            $salon = Salon::create([
                'clave_salon' => htmlspecialchars(trim($request->clave_salon), ENT_QUOTES, 'UTF-8')
            ]);

            Log::channel('admin')->info('Salón creado', [
                'admin_id' => Auth::id(),
                'salon_id' => $salon->id_salon,
                'clave_salon' => $salon->clave_salon
            ]);
        });

        return redirect()->route('admin.grupos.dashboard')
            ->with('success', 'Salón creado exitosamente');
    }

    public function edit(Salon $salon)
    {
        return response()->json([
            'salon' => $salon
        ]);
    }

    public function update(EditSalonRequest $request, Salon $salon)
    {
        DB::transaction(function () use ($request, $salon) {
            $salon->update([
                'clave_salon' => htmlspecialchars(trim($request->clave_salon), ENT_QUOTES, 'UTF-8')
            ]);

            Log::channel('admin')->info('Salón actualizado', [
                'admin_id' => Auth::id(),
                'salon_id' => $salon->id_salon,
                'changes' => $salon->getChanges()
            ]);
        });

        return redirect()->route('admin.grupos.dashboard')
            ->with('success', 'Salón actualizado exitosamente');
    }

    public function destroy(Salon $salon)
    {
        // Verificar si el salón está siendo usado en algún grupo
        if ($salon->grupos()->exists()) {
            return back()->with('error', 'No se puede eliminar el salón porque está asignado a uno o más grupos');
        }

        DB::transaction(function () use ($salon) {
            $salonId = $salon->id_salon;
            $claveSalon = $salon->clave_salon;

            $salon->delete();

            Log::channel('admin')->info('Salón eliminado', [
                'admin_id' => Auth::id(),
                'salon_id' => $salonId,
                'clave_salon' => $claveSalon
            ]);
        });

        return back()->with('success', 'Salón eliminado exitosamente');
    }
}
