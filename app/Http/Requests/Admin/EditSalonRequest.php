<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditSalonRequest extends FormRequest
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
        $salon = $this->route('salon');
        
        return [
            'clave_salon' => 'required|string|max:25|unique:salones,clave_salon,' . $salon->id_salon . ',id_salon',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'clave_salon.required' => 'La clave del salón es obligatoria.',
            'clave_salon.max' => 'La clave del salón no puede exceder 25 caracteres.',
            'clave_salon.unique' => 'Esta clave de salón ya está registrada.',
        ];
    }
}
