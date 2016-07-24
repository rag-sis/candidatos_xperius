<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Invitacion;
use App\Usuario;
use App\Vacante;
use App\Examen;
use App\AsignacionExamen;
use \Session;
use Mail;
use Auth;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('autenticado');

       Session::flash('menu','candidato');
    }

    public function inicio(){

        

        Auth::user()->usuario;
        $tipo=Auth::user()->tipo;
        $cod_u=Auth::user()->cod_u;
        if($tipo='can'){


            $invitacion = Invitacion::where('estado_i', 1)
            ->where('cod_u',$cod_u)
            ->where('invitado_i',1)
            ->first();
            
            //exit();
            if($invitacion === null){
                return view('candidato.inicio');
            }else{
                $cod_v=$invitacion->cod_v;
                $lista_ae=AsignacionExamen::where('estado_ae', 1)
                ->where('cod_v',$cod_v)
                ->get();
                $suma_puntuacion=0;
                foreach ($lista_ae as $asig) {
                    $suma_puntuacion=$suma_puntuacion+($asig->valor_puntaje_ae);
                }
                $parametros = ['invitacion' => $invitacion , 'asignaciones' => $lista_ae,'suma_p_e'=>$suma_puntuacion];
                //dd($parametros);
            }
            
            //dd($parametros);

            return view('candidato.inicio',$parametros);    
      
        }else{
        
        }
        return view('candidato.inicio',$parametros);



    }

    public function rendir_examen(Request $peticion){

            $exa=(int)($peticion['exa']);
            $inv=(int)($peticion['inv']);
            
            $examen = $this->getExamen($exa);
            $min_add=(int)($examen->tiempo_minutos_e);
            $min_totales=$min_add;
            
            
            $cal_exa=$this->getCalificacionExamen($exa,$inv);
            
            $time= date("Y-m-d H:i:s");
            if($cal_exa === null){
                $min_add='PT'.$min_add.'M';
                $fecha= new \DateTime($time);
                $fecha->add(new \DateInterval($min_add));
                $time_final= $fecha->format('Y-m-d H:i:s');
                \App\CalificacionExamen::create([
                    'cod_po'=>$inv, 
                    'cod_e'=>$exa,
                    'nota_cae'=>0,
                    'fecha_hora_comienzo_cae'=>$time,
                    'fecha_hora_final_cae'=>$time_final,
                    'estado_examen_tiempo_cae'=>1,
                    ]);
            }else{
                $time_act=$time;
                $time=$cal_exa->fecha_hora_comienzo_cae;
                $time_final=$cal_exa->fecha_hora_final_cae;
                
                $fecha_inicio = new \DateTime($time_final);
                $fecha_final    = new \DateTime($time_act);
                
                if($fecha_final > $fecha_inicio){

                    echo "FINALIZO EL EXAMEN";
                    exit();
                }else{
                    $fecha_ini= $fecha_inicio->format('Y-m-d H:i:s');
                    $fecha_fin= $fecha_final->format('Y-m-d H:i:s');

                     $dteDiff=$fecha_inicio->diff($fecha_final);
                     //echo $dteDiff->format("%H:%I:%S");
                     $min_totales= (int)($dteDiff->format("%I"));
                     
                }

                

            }

            
            $parametros = ['examen' => $examen, 'tiempo_comienzo'=>$time , 'tiempo_final'=>$time_final,'min_total'=>$min_totales,'cod_inv'=>$inv];
            
            
            return view('candidato.rendir_examen',$parametros);        

    }

    public function getCalificacionExamen($exa,$inv){
        $cal_exa = \App\CalificacionExamen::where('cod_e', $exa)
            ->where('cod_po', $inv)
            ->where('estado_examen_tiempo_cae',1)
            ->first();
        
        return $cal_exa;
    }

    public function getExamen($id){
        $examen = Examen::where('cod_e', $id)
            ->where('estado_e', 1)->first();
        if($examen === null)
            abort(500);
        else return $examen;
    }

    public function terminar_examen(Request $peticion){
          
          $cod_inv=$peticion['cod_inv'];
          $cod_ex=$peticion['cod_ex'];
          $cal_ex=$this->getCalificacionExamen($cod_ex,$cod_inv);
          $cod_cal_ex=$cal_ex->cod_cae;



          $examen=$this->getExamen($cod_ex);
          $nro_pre=$examen->num_preguntas_e;
          $preguntas=$this->getPregutas($cod_ex);
          $j=1;
          foreach ($preguntas as $pregunta) {
              $cod_p=$pregunta->cod_p;
              $tipo_p=$pregunta->tipo_p;
              $puntaje_p=$pregunta->puntaje_p;

              switch ($tipo_p) {
                case 'Falso o Verdadero':
                      # code...
                      $existe=false;
                      $name_var=$cod_p.'_res_1';

                      if(isset($peticion[$name_var])){
                        $res=$peticion[$name_var];
                        echo "<br>Pregunta  ".$j;
                        echo "<br>Respuesta:".$res;
                        $existe=true;
                        //REGISTRARA LA RESPUESTA
                      }else{
                        echo "<br>Pregunta  ".$j;
                        echo "<br>Respuesta : No contestada";
                        $existe=false;
                      }
                      
                      if($existe){ ///Si la respuesta ha sido respondida
                            $response_ok=$this->getRespuesta($cod_p);
                            $response_ok_val=$response_ok[0]->valor_r;
                            $response_ok_val_cod=$response_ok[0]->cod_r;
                            if ($response_ok_val == $res) {
                             echo "<br>Respuesta : CORRECTA";
                             //Guardando la calificacion de la Pregunta
                             \App\CalificacionPregunta::create([
                                          'cod_cae'=>$cod_cal_ex, 
                                          'cod_p'=>$cod_p,
                                          'nota_cap'=>$puntaje_p,
                                          'estado_terminado_cap'=>1,
                              ]);
                             //Guardamos el registro de la respuesta Respondida
                             \App\RegistroRespuesta::create([
                                          'cod_cae'=>$cod_cal_ex, 
                                          'cod_p'=>$cod_p,
                                          'cod_r'=>$response_ok_val_cod,
                                          
                              ]);

                            }else{
                                echo "<br>Respuesta : INCORRECTA";
                                //Guardando la calificacion de la Pregunta
                             \App\CalificacionPregunta::create([
                                          'cod_cae'=>$cod_cal_ex, 
                                          'cod_p'=>$cod_p,
                                          'nota_cap'=>0,
                                          'estado_terminado_cap'=>1,
                              ]);
                             //Guardamos el registro de la respuesta Respondida
                             \App\RegistroRespuesta::create([
                                          'cod_cae'=>$cod_cal_ex, 
                                          'cod_p'=>$cod_p,
                                          'cod_r'=>$response_ok_val_cod,  
                                          
                              ]);
                            }
                      }else{

                        //Guardando la calificacion de la Pregunta
                             \App\CalificacionPregunta::create([
                                          'cod_cae'=>$cod_cal_ex, 
                                          'cod_p'=>$cod_p,
                                          'nota_cap'=>0,
                                          'estado_terminado_cap'=>1,
                              ]);
                      }
                      echo "<br />";
                      

                      break;
                case 'Opcion de Llenado':
                      $name_var=$cod_p.'_res_2';
                      if(isset($peticion[$name_var])){
                        $res=$peticion[$name_var];
                        
                        if($res!=''){
                            echo "<br>Pregunta  ".$j;
                            echo "<br>Respuesta:".$res;
                            \App\CalificacionPregunta::create([
                                          'cod_cae'=>$cod_cal_ex, 
                                          'cod_p'=>$cod_p,
                                          'nota_cap'=>0,
                                          'estado_terminado_cap'=>0,
                              ]);
                            \App\RegistroRespuesta::create([
                                          'cod_cae'=>$cod_cal_ex, 
                                          'cod_p'=>$cod_p,
                                          'valor_rr'=>$res,
                              ]);
                        }else{
                        echo "<br>Pregunta  ".$j;
                        echo "<br>Respuesta : No contestada";
                        \App\CalificacionPregunta::create([
                                          'cod_cae'=>$cod_cal_ex, 
                                          'cod_p'=>$cod_p,
                                          'nota_cap'=>0,
                                          'estado_terminado_cap'=>1,
                              ]);
                      }
                    }
                      echo "<br />";
                      break;
                case 'Seleccion Simple':
                        $existe=false;
                      $name_var=$cod_p.'_res_3';
                      if(isset($peticion[$name_var])){
                        
                        $res=(int)($peticion[$name_var]);
                        if($res != 0){
                            $existe=true;

                            echo "<br>Pregunta  ".$j;
                            echo "<br>Respuesta:".$res;
                        }else{
                          $existe=false;
                            echo "<br>Pregunta  ".$j;
                            echo "<br>Respuesta : No contestada";    
                        }
                        
                      }

                      if($existe){
                            $response_ok=$this->getRespuestaCorrecta($cod_p);
                            $response_ok_val=(int)($response_ok[0]->cod_r);
                            if ($response_ok_val == $res) {
                             echo "<br>Respuesta : CORRECTA";
                             \App\CalificacionPregunta::create([
                                          'cod_cae'=>$cod_cal_ex, 
                                          'cod_p'=>$cod_p,
                                          'nota_cap'=>$puntaje_p,
                                          'estado_terminado_cap'=>1,
                              ]);
                             //Guardamos el registro de la respuesta Respondida
                             \App\RegistroRespuesta::create([
                                          'cod_cae'=>$cod_cal_ex, 
                                          'cod_p'=>$cod_p,
                                          'cod_r'=>$response_ok_val,  
                              ]);
                            }else{
                                echo "<br>Respuesta : INCORRECTA";
                                \App\CalificacionPregunta::create([
                                          'cod_cae'=>$cod_cal_ex, 
                                          'cod_p'=>$cod_p,
                                          'nota_cap'=>$puntaje_p,
                                          'estado_terminado_cap'=>1,
                              ]);
                             //Guardamos el registro de la respuesta Respondida
                                \App\RegistroRespuesta::create([
                                          'cod_cae'=>$cod_cal_ex, 
                                          'cod_p'=>$cod_p,
                                          'cod_r'=>(int)($res),  
                              ]);
                            }
                      }else{
                                \App\CalificacionPregunta::create([
                                          'cod_cae'=>$cod_cal_ex, 
                                          'cod_p'=>$cod_p,
                                          'nota_cap'=>0,
                                          'estado_terminado_cap'=>1,
                              ]);
                            
                      }

                        
                      echo "<br />";
                      break;
                case 'Seleccion Multiple':
                      
                      $name_var=$cod_p.'_res_4';
                      if(isset($peticion[$name_var])){
                        $res=$peticion[$name_var];

                        echo "<br>Pregunta  ".$j;
                        $response_ok=$this->getRespuestaCorrecta($cod_p);
                        $contador_correctos=0;
                        for($i=0; $i < count($res); $i++){
                            $resul=(int)($res[$i]);
                            echo "<br>Respuesta:".$resul;
                            $encontrado=false;
                            if(count($res) == count($response_ok)){
                                    
                                    for($k=0; $k < count($response_ok); $k++){
                                    $response_ok_val=(int)($response_ok[$k]->cod_r);
                                    if ($response_ok_val == $resul) {
                                    
                                        $encontrado=true;
                                        $k=count($response_ok);
                                    
                                        $contador_correctos++;
                                    }else{
                                        $encontrado=false;
                                    }

                                    }

                                    if($encontrado){
                                        echo "<br>Respuesta : CORRECTA";
                                      //Guardamos el registro de la respuesta Respondida
                                        \App\RegistroRespuesta::create([
                                          'cod_cae'=>$cod_cal_ex, 
                                          'cod_p'=>$cod_p,
                                          'cod_r'=>(int)($resul),  
                                        ]);
                                    }else{
                                        echo "<br>Respuesta : INCORRECTA";
                                        \App\RegistroRespuesta::create([
                                          'cod_cae'=>$cod_cal_ex, 
                                          'cod_p'=>$cod_p,
                                          'cod_r'=>(int)($resul),  
                                        ]);
                                    }

                            }else{

                                echo "<br>Respuesta : INCORRECTA";
                                \App\CalificacionPregunta::create([
                                          'cod_cae'=>$cod_cal_ex, 
                                          'cod_p'=>$cod_p,
                                          'nota_cap'=>0,
                                          'estado_terminado_cap'=>1,
                              ]);
                            }
                            
                           
                        }

                        if(($contador_correctos == count($res) )and ($contador_correctos == count($response_ok) ) ){
                            echo "<br>Respuesta : CORRECTAaaaaaaa";
                            \App\CalificacionPregunta::create([
                                          'cod_cae'=>$cod_cal_ex, 
                                          'cod_p'=>$cod_p,
                                          'nota_cap'=>$puntaje_p,
                                          'estado_terminado_cap'=>1,
                              ]);
                        }else{
                            echo "<br>Respuesta : INCORRECTAaaaaaaa";
                            \App\CalificacionPregunta::create([
                                          'cod_cae'=>$cod_cal_ex, 
                                          'cod_p'=>$cod_p,
                                          'nota_cap'=>0,
                                          'estado_terminado_cap'=>1,
                              ]);
                        }           
                     }else{
                            echo "<br>Pregunta  ".$j;
                            echo "<br>Respuesta : No contestada";
                            \App\CalificacionPregunta::create([
                                          'cod_cae'=>$cod_cal_ex, 
                                          'cod_p'=>$cod_p,
                                          'nota_cap'=>0,
                                          'estado_terminado_cap'=>1,
                              ]);
                      }
                      echo "<br />";
                      break;
                  
                  default:
                      # code...
                      break;
              }
              $j++;
          }
          
        //$cal_exa->estado_terminado_cae='1';
        //$cal_exa->save();
        //dd($peticion);
        return redirect('/');
    }
    public function getPregutas($cod_e){
        $lista = \App\Pregunta::where('cod_e', $cod_e)->get();
        //enviando parametros a una vista en un arreglo
        return $lista;
    }
    
    public function getRespuesta($cod_p){
        $lista = \App\Respuesta::where('cod_p', $cod_p)->get();
        return $lista;
    }
    public function getRespuestaCorrecta($cod_p){
        $lista = \App\Respuesta::where('cod_p', $cod_p)
                                 ->where('result_r','correcto')
                                 ->get();
        return $lista;
    }
   
    public function getIdUsuario($id_i){

        
        $invitacion = Invitacion::where('cod_i', $id_i)
            ->where('estado_i', 1)->first();
        if($invitacion === null){
            abort(500);
        }else{
            $cod_u_c=$invitacion->cod_u;
            return $cod_u_c;
        } 
            
    }
    public function getEmailUsuario($id){

        
        $usuario = Usuario::where('cod_u', $id)
            ->where('activo', 1)->first();
        if($usuario === null){
            abort(500);
        }else{
            $email_c=$usuario->email_u;
            return $email_c;
        } 
            
    }

    public function getInvitacion($id){
        $invitacion = Invitacion::where('cod_i', $id)
            ->where('estado_i', 1)->first();
        if($invitacion === null)
            abort(500);
        else return $invitacion;
    }

}