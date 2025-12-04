<?php

namespace App\Http\Requests\Admin\Materias;

use Illuminate\Foundation\Http\FormRequest;

class EditMateriaRequest extends FormRequest
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
            'materia' => 'required|array|max:6',
            'materia.*' => 'exists:materias,id_materia'
        ];
    }
}