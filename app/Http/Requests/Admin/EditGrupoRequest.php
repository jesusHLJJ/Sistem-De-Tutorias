<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditGrupoRequest extends FormRequest
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
        $grupo = $this->route('grupo');

        return [
            'carrera' => 'required|exists:carreras,id_carrera',
            'semestre' => 'required|exists:semestres,id_semestre',
            'turno' => 'required|exists:turnos,id_turno',
            'profesor' => 'required|exists:profesores,id_profesor',
            'salon' => 'required|exists:salones,id_salon',
            'id_periodo' => [
                'required',
                Rule::unique('periodos')->ignore($grupo->periodo->id_periodo, 'id_periodo')
            ],
            'clave_grupo' => [
                'required',
                Rule::unique('grupos')->ignore($grupo->id_grupo, 'id_grupo'),
            ],
        ];
    }
}
