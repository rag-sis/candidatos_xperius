<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Route;

class FormCrearCiudad extends Request
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
    public function rules()
    {
        if($this->route()->uri() === 'ciudad/almacenar')
           
        return [
            'nom_c' => 'required|String',
            
        ];
    }

    public function messages(){
        return [
            
            'nom_c.required' => 'El campo Nombre de Ciudad es obligatorio ',
            'nom_c.String' => 'El campo Nombre de Ciudad es debe ser solo letras y numeros',

        ];
    }
}
