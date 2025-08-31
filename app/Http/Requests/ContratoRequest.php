<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratoRequest extends FormRequest
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
            'monto' => ['required', 'numeric', 'min:1'],
            'fecha_inicio' => ['required'],
            'cliente_id' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'monto.required' => 'Ingresa monto',
            'monto.numeric' => 'El monto debe ser numero',
            'monto.min' => 'El monto no puede ser menor a 0',
            'fecha_inicio.required' => 'Ingresa una fecha',
            'cliente_required' => 'error en id'

        ];
    }
}
