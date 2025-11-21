<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlumnoRequest extends FormRequest
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
            'grupo' => 'required|exists:grupos,id_grupo',
            'carrera' => 'required|exists:carreras,id_carrera',
            'matricula' => 'required|unique:alumnos,matricula',
            'nombre' => 'required'
        ];

        if ($this->isMethod('put')) {
            $alumno = $this->route('alumno');
            $rules['clave_grupo'] = 'required|exists:grupos,id_grupo';
            $rules['carrera'] = 'required|exists:carreras,id_carrera';
            $rules['matricula'] = 'required|unique:alumnos,matricula' . $alumno->id_alumno . 'id_alumno';
        }

        return $rules;
    }
}