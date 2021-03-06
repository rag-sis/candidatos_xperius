<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Route;

class FormCrearExamen extends Request
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
        if($this->route()->uri() === 'examen/almacenar')
           
        return [
            'titulo_e' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/', // letras , numeros y espacios
            'tiempo_minutos_e'=>'required|integer',
            'num_preguntas_e' => 'required|integer',
            
        ];
    }

    public function messages(){
        return [
            
            'titulo_e.required' => 'El campo Titulo es obligatorio ',
            'tiempo_minutos_e.required' => 'El campo Tiempo es obligatorio',
            'num_preguntas_e.required'=>'El campo Preguntas es obligatorio',

            //'titulo.String' => 'El título debe ser solo letras',
            'tiempo_minutos_e.integer' => 'El campo tiempo debe ser solo números',
            'num_preguntas_e.integer' => 'El campo tiempodebe ser solo números',

        ];
    }
}
