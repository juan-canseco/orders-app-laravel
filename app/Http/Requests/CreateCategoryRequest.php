<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
           'name' => 'required|min:4'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'El nombre es requerido.',
            'name.min' => 'El nombre al menos debe tener 4 caracteres'
        ];
    }
}
