<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormCrearExamen;
use App\Http\Requests\FormEditarExamen;
use App\Http\Requests;
use App\Examen;
use App\Pregunta;
use App\Respuesta;
use \Session;
use Auth;
class ExamenController extends Controller
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
    
    public function lista(Request $peticion){
        $titulo_e = $peticion->input('titulo_e');
        $lista = Examen::where('estado_e', 1)
            ->buscar($titulo_e)
            ->orderBy('cod_e')
            ->paginate(10);
            
        $parametros = ['examenes' => $lista];
        return view('examen.lista', $parametros);
    }
    public function crear(){
        
        return view('examen.crear');
    }
    public function almacenar(FormCrearExamen $peticion /*Request $peticion*/){
            $user_sesion=Auth::user()->cod_u;
            echo $user_sesion.'<br />';
            echo $peticion['titulo_e'];
            echo $peticion['descripcion_e'];
            echo $peticion['tiempo_minutos_e'];
            $cant_pre= (int) $peticion['num_preguntas_e'];
            $exam=Examen::create([
                'codigo_evaluador'=>$user_sesion, 
                'titulo_e'=>$peticion['titulo_e'], 
                'descripcion_e'=>$peticion['descripcion_e'],
                'tiempo_minutos_e'=>$peticion['tiempo_minutos_e'],
                'num_preguntas_e'=>$cant_pre,

                ]);
            
            $cod_e=$exam->cod_e;
            $cant_pre=50;
            

            
            if($cant_pre >0){
                for($i=1;$i<=$cant_pre;$i++){
                //echo '<br /> hola'.$cant_pre;

                $tipo_pre='n_preg'.$i;
                $tipo_opc=$peticion[$tipo_pre];
                echo '<br />'.$peticion[$tipo_pre];
                if( $tipo_opc != 'opc0'){
                    
                    switch ($tipo_opc) {
                        case 'opc1':
                            $n_preg_inp='n_preg_inp'.$i;
                            $n_res_inp='n_res_inp'.$i;
                            echo '<br />Pregunta:'.$peticion[$n_preg_inp];
                            echo '<br />Respuesta:'.$peticion[$n_res_inp];
                            echo '<br />creando la Pregunta'.$i;
                            echo '<br />creando la Respuesta'.$i;
                            $preg=Pregunta::create([
                            'cod_e'=>$cod_e, 
                            'tipo_p'=>'Falso o Verdadero',
                            'valor_p'=>$peticion[$n_preg_inp], 
                            'puntaje_p'=>10,
                            ]);
                            $cod_pre=$preg->cod_p;
                            $res=Respuesta::create([
                            'cod_p'=>$cod_pre, 
                            'valor_r'=>$peticion[$n_res_inp],
                            'result_r'=>'correcto',
                            ]);
                            break;
                        case 'opc2':
                            $n_preg_inp='n_preg_inp'.$i;
                            echo '<br />Pregunta:'.$peticion[$n_preg_inp];
                            echo '<br />creando la Pregunta'.$i;
                            echo '<br />la respuesta sera revisada por un evaluador<br />';
                            //Registrando en BD
                            $preg=Pregunta::create([
                            'cod_e'=>$cod_e, 
                            'tipo_p'=>'Opcion de Llenado',
                            'valor_p'=>$peticion[$n_preg_inp], 
                            'puntaje_p'=>10,
                            ]);
                            break;
                        case 'opc3':
                            $n_preg_inp='n_preg_inp'.$i;
                            $n_res_opc='n_res_opc'.$i;

                            echo '<br />Pregunta:'.$peticion[$n_preg_inp];
                            echo '<br />creando la Pregunta'.$i;
                            
                            $preg=Pregunta::create([
                                    'cod_e'=>$cod_e, 
                                    'tipo_p'=>'Seleccion Simple',
                                    'valor_p'=>$peticion[$n_preg_inp], 
                                    'puntaje_p'=>10,
                                    ]);
                            $cod_pre=$preg->cod_p;

                            $opc_cont='opc_cont'.$i;
                            $opc_cont=(int)($peticion[$opc_cont]);
                            echo '<br />Nro de Opciones: '.$opc_cont;
                            $valor_res=(int)($peticion[$n_res_opc]);
                            echo '<br />'.$valor_res;
                            for($j=1;$j<=$opc_cont;$j++){

                                $opc_inp=$j.'_opc_inp'.$i;
                                
                                
                                if($j == $valor_res){
                                    echo '<br />Opc:'.$peticion[$opc_inp];
                                    echo 'respuesta creada correcto';
                                    
                                    
                                    $res=Respuesta::create([
                                    'cod_p'=>$cod_pre, 
                                    'valor_r'=>$peticion[$opc_inp],
                                    'result_r'=>'correcto',
                                    ]);
                                }else{
                                    echo '<br />Opc:'.$peticion[$opc_inp];
                                    echo 'respuesta creada incorrecta';
                                    $res=Respuesta::create([
                                    'cod_p'=>$cod_pre, 
                                    'valor_r'=>$peticion[$opc_inp],
                                    'result_r'=>'incorrecto',
                                    ]);
                                }

                            }
                            break;
                        case 'opc4':
                            $n_preg_inp='n_preg_inp'.$i;
                            $n_res_opc_m='n_res_opc_m'.$i;

                            echo '<br />Pregunta:'.$peticion[$n_preg_inp];
                            echo '<br />creando la Pregunta'.$i;

                            $preg=Pregunta::create([
                                    'cod_e'=>$cod_e, 
                                    'tipo_p'=>'Seleccion Multiple',
                                    'valor_p'=>$peticion[$n_preg_inp], 
                                    'puntaje_p'=>10,
                                    ]);
                            $cod_pre=$preg->cod_p;

                            $opc_contm='opc_contm'.$i;
                            $opc_contm=(int)($peticion[$opc_contm]);
                            echo '<br />Nro de Opciones: '.$opc_contm;
                            $valor_res=$peticion[$n_res_opc_m];
                            $cant_res=count($valor_res);
                            //echo '<br />'.$cant_res;
                            for($j=1;$j<=$opc_contm;$j++){
                                $crear=false;
                                $res='';
                                $opc_inp_m=$j.'_opc_inp_m'.$i;
                                echo '<br />Opc:'.$peticion[$opc_inp_m];
                                for($k=0;$k<$cant_res;$k++){

                                        if($j == $valor_res[$k]){
                                            $res=$valor_res[$k];
                                            $k=$cant_res;
                                            $crear=true;
                                        }
                                }
                                if($crear == true){
                                    echo '<br />'.$res;
                                    echo ' respuesta creada correcto';
                                    $res=Respuesta::create([
                                    'cod_p'=>$cod_pre, 
                                    'valor_r'=>$peticion[$opc_inp_m],
                                    'result_r'=>'correcto',
                                    ]);
                                }else{
                                    echo '<br />respuesta creada incorrecto';
                                    $res=Respuesta::create([
                                    'cod_p'=>$cod_pre, 
                                    'valor_r'=>$peticion[$opc_inp_m],
                                    'result_r'=>'incorrecto',
                                    ]);
                                }
                                

                            }
                            break;
                        default:
                            echo 'error'.$i;
                            break;
                    }



                }else{
                    echo 'Pregunta Incompleta';
                }

                


                }    
            }
            

            //dd($peticion);
            
            Session::flash('exa_cre', 'Examén creado');
            return redirect('/examen/lista');
    }

    public function deshabilitar($id){
        $examen = $this->getExamen($id);
        $examen->estado_e = 0;
        $examen->save();
        Session::flash('exa_des', 'Examén Deshabilitado');
        return redirect('/examen/lista');
    }

    public function getExamen($id){
        $examen = Examen::where('cod_e', $id)
            ->where('estado_e', 1)->first();
        if($examen === null)
            abort(500);
        else return $examen;
    }

    public function editar($id){
        $examen = $this->getExamen($id);
        $parametros = ['examen' => $examen];
        return view('examen.editar', $parametros);
    }

    public function actualizar($id, Request $peticion){
        
        $examen = $this->getExamen($id);
        $examen->fill($peticion->all());
        //$examen->save();
        
        $user_sesion=Auth::user()->cod_u;
        $examen->codigo_evaluador = $user_sesion;
        $examen->save();

        $preguntas=$this->eliminar_preguntas($id);
        
            
        $cant_pre= (int) $peticion['num_preguntas_e'];
        $cant_pre=50;
        $cod_e=(int)$id;
            

            
            if($cant_pre >0){
                for($i=1;$i<=$cant_pre;$i++){
                //echo '<br /> hola'.$cant_pre;

                $tipo_pre='n_preg'.$i;
                $tipo_opc=$peticion[$tipo_pre];
                echo '<br />'.$peticion[$tipo_pre];
                if( $tipo_opc != 'opc0'){
                    
                    switch ($tipo_opc) {
                        case 'opc1':
                            $n_preg_inp='n_preg_inp'.$i;
                            $n_res_inp='n_res_inp'.$i;
                            echo '<br />Pregunta:'.$peticion[$n_preg_inp];
                            echo '<br />Respuesta:'.$peticion[$n_res_inp];
                            echo '<br />creando la Pregunta'.$i;
                            echo '<br />creando la Respuesta'.$i;
                            $preg=Pregunta::create([
                            'cod_e'=>$cod_e, 
                            'tipo_p'=>'Falso o Verdadero',
                            'valor_p'=>$peticion[$n_preg_inp], 
                            'puntaje_p'=>10,
                            ]);
                            $cod_pre=$preg->cod_p;
                            $res=Respuesta::create([
                            'cod_p'=>$cod_pre, 
                            'valor_r'=>$peticion[$n_res_inp],
                            'result_r'=>'correcto',
                            ]);
                            break;
                        case 'opc2':
                            $n_preg_inp='n_preg_inp'.$i;
                            echo '<br />Pregunta:'.$peticion[$n_preg_inp];
                            echo '<br />creando la Pregunta'.$i;
                            echo '<br />la respuesta sera revisada por un evaluador<br />';
                            //Registrando en BD
                            $preg=Pregunta::create([
                            'cod_e'=>$cod_e, 
                            'tipo_p'=>'Opcion de Llenado',
                            'valor_p'=>$peticion[$n_preg_inp], 
                            'puntaje_p'=>10,
                            ]);
                            break;
                        case 'opc3':
                            $n_preg_inp='n_preg_inp'.$i;
                            $n_res_opc='n_res_opc'.$i;

                            echo '<br />Pregunta:'.$peticion[$n_preg_inp];
                            echo '<br />creando la Pregunta'.$i;
                            
                            $preg=Pregunta::create([
                                    'cod_e'=>$cod_e, 
                                    'tipo_p'=>'Seleccion Simple',
                                    'valor_p'=>$peticion[$n_preg_inp], 
                                    'puntaje_p'=>10,
                                    ]);
                            $cod_pre=$preg->cod_p;

                            $opc_cont='opc_cont'.$i;
                            $opc_cont=(int)($peticion[$opc_cont]);
                            echo '<br />Nro de Opciones: '.$opc_cont;
                            $valor_res=(int)($peticion[$n_res_opc]);
                            echo '<br />'.$valor_res;
                            for($j=1;$j<=$opc_cont;$j++){

                                $opc_inp=$j.'_opc_inp'.$i;
                                
                                
                                if($j == $valor_res){
                                    echo '<br />Opc:'.$peticion[$opc_inp];
                                    echo 'respuesta creada correcto';
                                    
                                    
                                    $res=Respuesta::create([
                                    'cod_p'=>$cod_pre, 
                                    'valor_r'=>$peticion[$opc_inp],
                                    'result_r'=>'correcto',
                                    ]);
                                }else{
                                    echo '<br />Opc:'.$peticion[$opc_inp];
                                    echo 'respuesta creada incorrecta';
                                    $res=Respuesta::create([
                                    'cod_p'=>$cod_pre, 
                                    'valor_r'=>$peticion[$opc_inp],
                                    'result_r'=>'incorrecto',
                                    ]);
                                }

                            }
                            break;
                        case 'opc4':
                            $n_preg_inp='n_preg_inp'.$i;
                            $n_res_opc_m='n_res_opc_m'.$i;

                            echo '<br />Pregunta:'.$peticion[$n_preg_inp];
                            echo '<br />creando la Pregunta'.$i;

                            $preg=Pregunta::create([
                                    'cod_e'=>$cod_e, 
                                    'tipo_p'=>'Seleccion Multiple',
                                    'valor_p'=>$peticion[$n_preg_inp], 
                                    'puntaje_p'=>10,
                                    ]);
                            $cod_pre=$preg->cod_p;

                            $opc_contm='opc_contm'.$i;
                            $opc_contm=(int)($peticion[$opc_contm]);
                            echo '<br />Nro de Opciones: '.$opc_contm;
                            $valor_res=$peticion[$n_res_opc_m];
                            $cant_res=count($valor_res);
                            //echo '<br />'.$cant_res;
                            for($j=1;$j<=$opc_contm;$j++){
                                $crear=false;
                                $res='';
                                $opc_inp_m=$j.'_opc_inp_m'.$i;
                                echo '<br />Opc:'.$peticion[$opc_inp_m];
                                for($k=0;$k<$cant_res;$k++){

                                        if($j == $valor_res[$k]){
                                            $res=$valor_res[$k];
                                            $k=$cant_res;
                                            $crear=true;
                                        }
                                }
                                if($crear == true){
                                    echo '<br />'.$res;
                                    echo ' respuesta creada correcto';
                                    $res=Respuesta::create([
                                    'cod_p'=>$cod_pre, 
                                    'valor_r'=>$peticion[$opc_inp_m],
                                    'result_r'=>'correcto',
                                    ]);
                                }else{
                                    echo '<br />respuesta creada incorrecto';
                                    $res=Respuesta::create([
                                    'cod_p'=>$cod_pre, 
                                    'valor_r'=>$peticion[$opc_inp_m],
                                    'result_r'=>'incorrecto',
                                    ]);
                                }
                                

                            }
                            break;
                        default:
                            echo 'error'.$i;
                            break;
                    }



                }else{
                    echo 'Pregunta Incompleta';
                }

                


                }    
            }
        return redirect('/examen/lista')->with('exa_edi', 'Exámen modificado');
    }

    public function eliminar_preguntas($id)
    {
        $lista = Pregunta::where('cod_e', $id)->get();
        //enviando parametros a una vista en un arreglo
        $parametros=['pregunta'=> $lista];
        foreach ($lista as $preg) {
            //echo $preg->valor_p;
            $id_pre=$preg->cod_p;
            $respuestas=$this->eliminar_respuestas($id_pre);
            Pregunta::destroy($id_pre);
        }
        
        return true;
    }

    public function eliminar_respuestas($id)
    {
        $lista = Respuesta::where('cod_p', $id)->get();
        //enviando parametros a una vista en un arreglo
        $parametros=['respuesta'=> $lista];
        foreach ($lista as $res) {
            //echo $res->valor_r;
            $id_res=$res->cod_r;
            Respuesta::destroy($id_res);
        }
        return true;
    }

}
