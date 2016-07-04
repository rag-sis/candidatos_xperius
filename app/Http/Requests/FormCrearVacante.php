<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Route;

class FormCrearVacante extends Request
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
        if($this->route()->uri() === 'vacante/almacenar')
           
        return [
            'titulo_v' => 'required|regex:/^[\pL\s\-]+$/u',
            'lugar_v' => 'required|String',
            'posicion_v' => 'required|regex:/^[\pL\s\-]+$/u',
            'tiempo_trabajo_v'=>'required|String',
            'tipo_trabajo_v' => 'required|String',
            'descripcion_v' => 'required|String',
            'estado_v' => 'required|integer',
            
        ];
    }

    public function messages(){
        return [
            
            'titulo_v.required' => 'El campo Titulo es obligatorio ',
            'lugar_v.required' => 'El campo Lugar es obligatorio',
            'posicion_v.required' => 'El campo Posición es obligatorio',
            'tiempo_trabajo_v.required'=>'El campo Tiempo de trabajo es obligatorio',
            'tipo_trabajo_v.required' => 'El campo Tipo de trabajo es obligatorio',
            'descripcion_v.required' => 'El campo Descripcion es obligatorio',
            'estado_v.required' => 'El campo Estado es obligatorio',

            'titulo_v.String' => 'El título debe ser solo letras y números',
            'lugar_v.String' => 'Seleccione un lugar',
            'posicion_v.String' => 'El campo posición debe se solo letras y números',
            'descripcion_v.String' => 'La descripción debe ser solo letras y números',

        ];
    }
}
