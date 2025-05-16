<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResenyaRequest extends FormRequest
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
            'estrellas' => 'required|numeric|min:0|max:5',
            'descripcion' => 'required|string|max:250',
        ];
    }

    public function messages(){

        return [
            'descripcion.required' => 'La descripcion tiene que ser obligatoria',
            'estrellas.required' => 'La valoración debe de ser obligatoria',
            'descripcion.max' => 'No se pueden escribir más de 250 carácteres',
            'estrellas.max' => 'La valoración no puede ser superior a 5',
            'estrellas.min' => 'La valoración no puede ser menor que 0'
            
    ];

    }
}
