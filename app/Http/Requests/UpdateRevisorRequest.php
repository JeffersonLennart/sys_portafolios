<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRevisorRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],            
            'telefono' => ['sometimes', 'nullable', 'string', 'min:9', 'max:9'],
            'codigo' => ['sometimes', 'nullable', 'string', 'min:7', 'max:7'],
            'categoria' => ['sometimes', 'nullable', 'string', 'max:30'],
            'grado_academico' => ['sometimes', 'nullable', 'string', 'max:30'],
        ];
    }
}
