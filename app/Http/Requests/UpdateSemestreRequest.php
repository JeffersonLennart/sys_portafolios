<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSemestreRequest extends FormRequest
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
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|before:fecha_inicio',
            'estado' => 'required|in:Activo,Terminado,Suspendido',
        ];
    }

    public function messages(){
        return[
            'fecha_fin.before' => 'La fecha de fin no puede ser menor que la fecha de inicio',
            'estado.in' => 'El estado solo puede ser Activo, Terminado o Suspendido',
        ];
    }
}
