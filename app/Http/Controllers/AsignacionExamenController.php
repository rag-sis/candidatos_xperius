<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Examen;
use App\Vacante;
use App\AsignacionExamen;
use \Session;
use Auth;
class AsignacionExamenController extends Controller
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
    
    public function asignar(Request $peticion,$id,$titulo){

        $titulo_e = $peticion->input('titulo_e');
        $id=(int)$id;
        //$id=4;
        //echo $id;
        
        $listaA=AsignacionExamen::where('cod_v',$id)->get();
        $listaAE[]=array();
        $listaB=Examen::all();
        $listaBR=Examen::where('titulo_e', 'ilike', "%$titulo_e%")
                        ->orderBy('cod_e')
                        ->paginate(10);
        //$listaC=null;
        $listaC[]=null;
        $cant_ae=sizeof($listaA);
        $cant_ex=sizeof($listaB);
        //echo $cant_ae;
        
        if($cant_ae >0){

            $k=0;
            $i=0;
            while($i < $cant_ae){// Lista A
                $j=0;
                while($j< $cant_ex){ //Lista B
                    if($listaA[$i]->cod_e != $listaB[$j]->cod_e ){
                        
                        $bus=false;
                        for ($a=0; $a < $cant_ae ; $a++) { 
                            if($listaA[$a]->cod_e == $listaB[$j]->cod_e){
                                
                                $a=$cant_ae;
                                $bus=true;
                            }
                        }
                        if($bus==false){
                            if (in_array($listaB[$j]->cod_e, $listaC) == false) {
                                //array_push($listaC,$listaB[$j]);
                                $listaC[$k]=$listaB[$j]->cod_e;
                                $k++;
                            }
                            
                        }
                    }
                    $j++;
                }   
                $i++;
            }

            $cant_ae=sizeof($listaC);
            //echo $cant_ae;
            $listaC=Examen::whereIn('cod_e', $listaC)
                ->where('titulo_e', 'ilike', "%$titulo_e%")
                ->orderBy('cod_e')
                ->paginate(10);
                

        }else{
            $listaC=$listaBR;
        }
        //$listaC=$listaC->paginate(10);
        //dd($listaC);

        //->whereIn('id', array(1, 2, 3))->get();
        //exit();
        /*
         $lista = \DB::table('examen')
                ->select('*','examen.cod_e as codigo_ex')
                ->leftJoin('asignacion_examen', 'examen.cod_e', '=', 'asignacion_examen.cod_e')
                ->where('examen.titulo_e', 'ilike', "%$titulo_e%")
                ->where('asignacion_examen.cod_v', '=', null)
                ->orWhere('asignacion_examen.cod_v', '<>', $id)
                ->orderBy('examen.cod_e')
                ->paginate(10);*/
                //->get();
        //enviando parametros a una vista en un arreglo
        $parametros=['examenes'=> $listaC];

        //dd($parametros);
        
        Session::flash('vacante_id',$id);
        Session::flash('vacante_titulo',$titulo);
        return view('examen.lista_asignacion', $parametros);
    }

    public function asignar_e(Request $peticion){

        $user_sesion=Auth::user()->cod_u;
            $vacante_id=(int)$peticion['vacante_id'];
            $titulo_vac=$peticion['vacante_ti'];
           
            $cant_items=(int)$peticion['cantidad_items'];

            $cont=0;
            for ($i=1; $i <= $cant_items ; $i++) { 
                # code...
                $examen_id='examen_id_'.$i;
                $valor_puntual='valor_puntual_'.$i;
                $examen_id=(int)$peticion[$examen_id];
                $valor_puntual=(int)$peticion[$valor_puntual];
                echo '<br />'.$examen_id;
                echo '<br />'.$valor_puntual;
                if($valor_puntual != 0 ){
                    $exam=AsignacionExamen::create([ 
                        'cod_v'=>$vacante_id, 
                        'cod_e'=>$examen_id,
                        'valor_puntaje_ae'=>$valor_puntual,

                    ]);
                    $cont++;
                    

                }
            }
            $vac=$this->getVacante($vacante_id);
                    $vac->nro_examenes_v=($vac->nro_examenes_v) +$cont;
                    $vac->save();
            
            
            return redirect('/asignacion_examen/asignar/'.$vacante_id.'/'.$titulo_vac);

    }

    public function desasignar_e($cod_e,$cod_v){
        $vac=$this->getVacante($cod_v);
        $asig=AsignacionExamen::where('cod_v',$cod_v)
                                ->where('cod_e',$cod_e)
                                ->first();
        $cod_ae=$asig->cod_ae;
        $nro_act=(int)($vac->nro_examenes_v);
        $nro_fin=$nro_act-1;
        $vac->nro_examenes_v=$nro_fin;
        $vac->save();
        AsignacionExamen::destroy($cod_ae);

         return redirect('/vacante/lista/');

    }

    public function getVacante($id){
        $vacante = Vacante::where('cod_v', $id)
            ->first();
        if($vacante === null)
            abort(500);
        else return $vacante;
    }
    

}
