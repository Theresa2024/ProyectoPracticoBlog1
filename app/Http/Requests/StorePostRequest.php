<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePostRequest extends FormRequest
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

    //Reglas de validación
    public function rules(): array
    {
        return [           
            'title' => 'required|string|max:25',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',      
        ];
    }

    //Mensajes de error personalizados
     public function messages()
    {
        return [
            'title.required' => 'El título es obligatorio.',
            'title.max' => 'El título no puede superar los 255 caracteres.',
            'content.required' => 'El contenido es obligatorio.',
            'user_id.required' => 'Debe asignarse un usuario al post.',
            'user_id.exists' => 'El usuario seleccionado no existe.',
        ];
    }

    // El flujo de ejecución se detiene aquí si la validación falla (no cumple con las reglas) 
    //y se devuelve una respuesta JSON con los errores que están en el metodo messages()
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errores' => $validator->errors()
        ], 422));
    }


}
