<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8|',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El nombre es requerido.',
            'email.required' => 'El email es requerido.',
            'password.required' => 'La contraseña es requerida.',
            'password_confirmation.required' => 'La confirmacion de la contraseña es requerida.',
        ];
    }
}
