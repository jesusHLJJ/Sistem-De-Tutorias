<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditProfesorRequest extends FormRequest
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
        $profesor = $this->route('profesor');

        return [
            'carrera' => 'required|exists:carreras,id_carrera',
            'clave' => [
                'required',
                Rule::unique('profesores')->ignore($profesor->id_profesor, 'id_profesor'),
            ],
            'nombre' => 'required|string|max:100',
            'ap_paterno' => 'required|string|max:100',
            'ap_materno' => 'nullable|string|max:100',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($profesor->user_id),
            ],
            'password' => 'nullable|confirmed|min:8',
        ];
    }
}
