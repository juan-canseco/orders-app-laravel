<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'category' => 'integer',
            'supplier' => 'integer',
            'name' => 'required|min:5',
            'price' => 'required|numeric|min:1'
        ];
    }

    public function messages() {
        return [
            'category.integer' => 'Selecciona una categoría.',
            'supplier.integer' => 'Selecciona un Proveedor.',
            'name.required' => 'El nombre es olbligatorio',
            'name.min' => 'El nombre debe de tener almenos 5 caracteres de longitud.',
            'price.required' => 'El Precio es obligatorio'

        ];
    }
}
