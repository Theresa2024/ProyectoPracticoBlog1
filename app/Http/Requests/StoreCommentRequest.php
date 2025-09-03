<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'content' => 'required|string|max:10',
            'user_id' => 'required|exists:users,id',
            'post_id' => 'required|exists:posts,id',
        ];
    }


    public function messages()
    {
        return [
            'content.required' => 'El comentario no puede estar vacío.',
            'content.max' => 'El comentario debe tener un máx de 10 caracteres.',
            'content.string' => 'El comentario debe ser un string.',
            'user_id.required' => 'Debe asignarse un usuario al comentario.',
            'user_id.exists' => 'El usuario seleccionado no existe.',
            'post_id.required' => 'Debe asignarse un post al comentario.',
            'post_id.exists' => 'El post seleccionado no existe.',
        ];
    }


}
