<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientesRequest extends FormRequest
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
        $clienteId = $this->route('cliente');
        return [
            'name' => ['required'],
            'email' => [
                'required',
                'email',
                Rule::unique('clientes', 'email')->ignore($clienteId)
            ],

            'phone' => [
                'required',
                'numeric',
                'digits:10',
                Rule::unique('clientes', 'phone')->ignore($clienteId)
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'email.required' => 'El correo es obligatorio',
            'email.email' => 'El correo no es válido',
            'email.unique' => 'El correo ya se encuentra registrado',
            'phone.required' => 'El numero es obligatorio',
            'phone.unique' => 'El numero ya se encuentra registrado',
            'phone.digits' => 'El numero de telefono debe tener 10 digitos',
            'phone.numeric' => 'el numero de telefono no debe llevar letras',
        ];
    }
}
