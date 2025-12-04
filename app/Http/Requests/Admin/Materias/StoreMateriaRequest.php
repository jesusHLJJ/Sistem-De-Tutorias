<?php

namespace App\Http\Requests\Admin\Materias;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMateriaRequest extends FormRequest
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
        return [
            'grupo' => [
                'required',
                'integer',
                Rule::exists('grupos', 'id_grupo')
            ],
            'materia' => 'required|array|min:1|max:6',
            'materia.*' => [
                'integer',
                Rule::exists('materias', 'id_materia')
                // Eliminamos la regla unique para manejar esto en el controlador
            ]
        ];
    }

    public function messages()
    {
        return [
            'grupo.required' => 'Debe seleccionar un grupo',
            'grupo.integer' => 'El ID del grupo debe ser un número entero',
            'grupo.exists' => 'El grupo seleccionado no existe',
            'materia.required' => 'Debe seleccionar al menos una materia',
            'materia.array' => 'El formato de materias es incorrecto',
            'materia.min' => 'Debe seleccionar al menos una materia',
            'materia.max' => 'No puede seleccionar más de 6 materias',
            'materia.*.integer' => 'El ID de materia debe ser un número entero',
            'materia.*.exists' => 'Una o más materias seleccionadas no existen'
        ];
    }

    protected function prepareForValidation()
    {
        if (!is_array($this->materia)) {
            $this->merge([
                'materia' => array_filter([$this->materia])
            ]);
        }

        // Asegurar que todos los valores sean integers
        $this->merge([
            'grupo' => (int) $this->grupo,
            'materia' => array_map('intval', (array) $this->materia)
        ]);
    }
}