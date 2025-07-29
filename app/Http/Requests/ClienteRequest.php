<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
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
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clientes,email,',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:500',
        ];
    }
    public function messages(): array
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'apellido.required' => 'El campo apellido es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El email debe ser una dirección de correo electrónico válida.',
            'email.max' => 'El email no puede exceder los 255 caracteres.',
            'email.unique' => 'Este email ya está registrado.',
            'telefono.max' => 'El teléfono no puede exceder los 20 caracteres.',
            'direccion.max' => 'La dirección no puede exceder los 500 caracteres.',
        ];
    }
}
