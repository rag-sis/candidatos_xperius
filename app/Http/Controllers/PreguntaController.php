<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pregunta;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function lista_preguntas($id)
    {
        $lista = Pregunta::where('cod_e', $id)->get();
        //enviando parametros a una vista en un arreglo
        $parametros=['pregunta'=> $lista];

     
        return json_encode($lista);
    }
   

    
}
