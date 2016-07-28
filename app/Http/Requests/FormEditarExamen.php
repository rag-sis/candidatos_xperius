<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Route;

class FormEditarExamen extends Request
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
        if($this->route()->uri() === 'examen/actualizar')
           
        return [
            'titulo_e' => 'required|alpha_num',
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
