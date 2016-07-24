<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Examen;
use App\Vacante;
use App\CalificacionPregunta;
use \Session;
use Auth;
class CalificacionPreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



     public function __construct(){
        $this->middleware('autenticado');

       Session::flash('menu','examen');
    }
    

}
