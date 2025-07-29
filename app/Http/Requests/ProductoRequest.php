<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
            'cantidad' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2MB
        ];
    }
    public function messages(): array
    {
        return [
            'marca.required' => 'El campo marca es obligatorio.',
            'modelo.required' => 'El campo modelo es obligatorio.',
            'descripcion.max' => 'La descripción no puede exceder los 1000 caracteres.',
            'cantidad.required' => 'El campo cantidad es obligatorio.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'precio.required' => 'El campo precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número válido.',
            'categoria_id.required' => 'Debe seleccionar una categoría válida.',
            'imagen.image' => 'El archivo debe ser una imagen válida.',
            'imagen.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg, gif o svg.',
            'imagen.max' => 'La imagen no puede exceder los 2MB.',
        ];
    }
}
