<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditAlumnoRequest extends FormRequest
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
        $alumno = $this->route('alumno');

        return [
            'carrera' => 'required|exists:carreras,id_carrera',
            'grupo' => 'required|exists:grupos,id_grupo',
            'matricula' => [
                'required',
                Rule::unique('alumnos')->ignore($alumno->id_alumno, 'id_alumno'),
            ],
        ];
    }
}
