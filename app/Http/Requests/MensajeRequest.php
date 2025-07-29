<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MensajeRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'mensaje' => 'required|string|max:1000',
            'telefono' => 'nullable|string',
        ];
    }
}
