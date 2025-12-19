<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreGrupoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'carrera' => 'required|exists:carreras,id_carrera',
            'semestre' => 'required|exists:semestres,id_semestre',
            'turno' => 'required|exists:turnos,id_turno',
            'clave_grupo' => 'required|unique:grupos,clave_grupo',
            'profesor' => 'required|exists:profesores,id_profesor',
            'periodo' => 'required|exists:periodos,id_periodo',
            'salon' => 'required|exists:salones,id_salon',
        ];

        if ($this->isMethod('put')) {
            $grupo = $this->route('grupo');
            $rules['calve_grupo'] = 'required|unique:grupos,clave_grupo' . $grupo->id_grupo . ',id_grupo';
            $rules['periodo'] = 'required' . $grupo->id_periodo;
            $rules['carrera'] = 'required|exists:carreras,id_carrera';
            $rules['semestre'] = 'required|exists:semestres,id_semestre';
            $rules['turno'] = 'required|exists:turnos,id_turno';
            $rules['profesor'] = 'required|exists:profesores,id_profesor';
            $rules['salon'] = 'required|exists:salones,id_salon';
        }

        return $rules;
    }
}
