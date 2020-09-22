<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->authorizeRoles(['admin']);
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
            'surnames' => 'required|min:5',
            'rfc' => 'min:18'
        ];
    }

    public function messages() {
        return [
            'names.required' => 'El nombre es requerido',
            'names.min' => 'El nombre al menos debe tener 5 caracteres de longitud.',
            'surnames.required' => 'Los apellidos son requeridos.',
            'surnames.min' => 'Los apellidos al menos deben de tener 5 caracteres de longitud.',
            'rfc.min' => 'El RFC debe de tener almenos 18 caracteres de longitud.'
        ];
    }
}
