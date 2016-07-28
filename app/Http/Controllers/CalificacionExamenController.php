<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Examen;
use App\Vacante;
use App\CalificacionExamen;
use \Session;
use Auth;
class CalificacionExamenController extends Controller
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


    public function calificaciones_pendientes(){

    	//$titulo_v = $peticion->input('titulo_v');
        $lista = CalificacionExamen::where('estado_terminado_cae',0)
              	->orderBy('cod_cae')
            	->paginate(10);
        $parametros = ['calificaciones' => $lista];
        
        return view('evaluador.lista_pendientes', $parametros);

    }

    public function calificar_pendientes($cod_cae){
    	$respuestas = \App\RegistroRespuesta::where('cod_cae',$cod_cae)
    			->where('cod_r',null)
              	->orderBy('cod_rr')
            	->paginate(10);
        $cal_ex=$this->getCalificacionExamen($cod_cae);
        $parametros = ['respuestas' => $respuestas , 'cal_ex' => $cal_ex];

    	return view('evaluador.calificar', $parametros);
    }
    public function getCalificacionExamen($id){
        $cal_ex = CalificacionExamen::where('cod_cae', $id)
            						->first();
        if($cal_ex === null)
            abort(500);
        else return $cal_ex;
    }

    public function calificar_examen(Request $peticion){

        $cant_pre=(int)($peticion['cant_pre']);
        $cod_cae=(int)($peticion['cae']);
        $cal_ex=$this->getCalificacionExamen($cod_cae);

        for ($i=0; $i < $cant_pre ; $i++) { 
                $name_n='puntaje_'.$i;
                $name_cod_p='pregunta_'.$i;
                $puntaje=(int)($peticion[$name_n]);
                $cod_p=(int)($peticion[$name_cod_p]);
                $pregunta=$this->getPregunta($cod_p);
                $puntaje_t=$pregunta->puntaje_p;
                $cal_preg=$this->getCalificacionPregunta($cod_cae,$cod_p);
                if ($puntaje == 0) {
                  $cal_preg->nota_cap=0;
                  $cal_preg->estado_terminado_cap=1;
                  $cal_preg->save();

                }elseif ($puntaje ==100) {
                  $cal_preg->nota_cap=$puntaje_t;
                  $cal_preg->estado_terminado_cap=1;
                  $cal_preg->save();
                  $cal_ex->nota_cae=(($cal_ex->nota_cae)+$puntaje_t);
                  $cal_ex->save();
                }else{
                      $puntaje_c=(int)(($puntaje*$puntaje_t)/100);
                      $cal_preg->nota_cap=$puntaje_c;
                      $cal_preg->estado_terminado_cap=1;
                      $cal_preg->save();
                      $cal_ex->nota_cae=(($cal_ex->nota_cae)+$puntaje_c);
                      $cal_ex->save();
                }

       }

       $cal_ex->estado_terminado_cae=1;
       $cal_ex->save();

        return redirect('/examen/calificaciones_pendientes');

    }
    public function getPregunta($cod_p){
        $preg = \App\Pregunta::where('cod_p', $cod_p)->first();
        if($preg === null)
            abort(500);
        else return $preg;
        
    }
    public function getCalificacionPregunta($cod_cae,$cod_p){
        $cal_preg = \App\CalificacionPregunta::where('cod_cae', $cod_cae)
                              ->where('cod_p', $cod_p)
                              ->where('estado_terminado_cap', 0)
                              ->first();
        if($cal_preg === null)
            abort(500);
        else return $cal_preg;
        
    }
    

}
