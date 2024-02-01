<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsignaturaRequest extends FormRequest
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
            'nombre' => ['required', 'string', 'max:255'],
            'tipo' => ['required', 'string', 'max:50'], 
            'codigo' => ['required', 'string', 'max:20'], 
            'escuela' => ['required', 'string', 'max:100'], 
            'categoria' => ['required', 'string', 'max:50'], 
            'creditos' => ['required', 'integer', 'min:2'],
        ];
    }
}
