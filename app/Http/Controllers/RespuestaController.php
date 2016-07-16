<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Respuesta;
class RespuestaController extends Controller
{
    public function lista_respuestas($id)
    {
        $lista = Respuesta::where('cod_p', $id)->get();
        //enviando parametros a una vista en un arreglo
        $parametros=['respuesta'=> $lista];

     
        return json_encode($lista);
    }
}
