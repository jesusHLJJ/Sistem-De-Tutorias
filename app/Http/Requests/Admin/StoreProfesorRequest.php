<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfesorRequest extends FormRequest
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
            'clave' => 'required|unique:profesores,clave',
            'nombre' => 'required|string|max:100',
            'ap_paterno' => 'required|string|max:100',
            'ap_materno' => 'nullable|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ];

        if ($this->isMethod('put')) {
            $profesor = $this->route('profesor');
            $rules['clave'] = 'required|unique:profesores,clave,' . $profesor->id_profesor . ',id_profesor';
            $rules['email'] = 'required|email|unique:users,email,' . $profesor->user_id;
            $rules['password'] = 'nullable|confirmed|min:8';
            $rules['carrera'] = 'required|exists:carreras,id_carrera';
        }

        return $rules;
    }
}
