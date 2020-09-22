<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'names' => 'required|min:5',
            'surnames' => 'required|min:5|',
            'email' => 'required',
            'username' => 'required|min:5',
            'role' => 'required|min:2',
            'password' => 'required|min:3',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }


    /**
     * Get the validation messages
     * @return array
     */
    public function messages() {
        return [
            'names.required' => 'El Nombre es requerido',
            'names.min' => 'El Nombre al menos debe de tener 5 caracteres de longitud.',
            'surnames.required' => 'Los Apellidos son requeridos.',
            'surnames.min' => 'Los apellidos almenos deben de tener 5 caracteres de longitud.',
            'email.required' => 'El Email es requerido.',
            'username.required' => 'El nombre de Usuario es requerido.',
            'role.min' => 'El Rol es requerido.',
            'password.required' => 'La Contraseña es requerida.',
            'password.min' => 'La Contraseña debe de tener al menos 5 caracteres de longitud.',
            'photo.required' => 'La foto de perfil es requerida.'
        ];
    }
}
