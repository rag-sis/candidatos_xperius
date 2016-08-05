<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuario;
use App\Vacante;

class Postulacion extends Model
{
    //
    public $table = 'postulacion';
    public $primaryKey = 'cod_po';


    protected $fillable = ['cod_u','cod_v','invitado_po','entrevistado_po','puntaje_cu_po','puntaje_ex_po','puntaje_en_po','estado_po'];

    public function usuario(){
        return $this->belongsTo('App\Usuario','cod_u');
    }
    public function vacante(){
        return $this->belongsTo('App\Vacante','cod_v');
    }
   

    public function scopeBuscar($query, $nombre){
        return $query->where('nom_u', 'ilike', "%$nombre%")
                    ->orWhere('tipo', 'ilike', "%$nombre%");
    }

    public function getNumeroExamenesTerminados(){

        $cant_ex=$this->vacante->nro_examenes_v;

        $cal_ex=\App\CalificacionExamen::where('cod_po',$this->cod_po)
                                         ->where('estado_terminado_cae',1)
                                         ->get();
        $cont=0;
        foreach ($cal_ex as $cal) {
                $cont++;
        }

        return $cont;
    }

    public function getNumeroExamenesPendientes(){

        $cant_ex=$this->vacante->nro_examenes_v;

        $cal_ex=\App\CalificacionExamen::where('cod_po',$this->cod_po)
                                         ->where('estado_terminado_cae',1)
                                         ->get();
        $cont=0;
        foreach ($cal_ex as $cal) {
                $cont++;
        }
        $cant_p=$cant_ex-$cont;

        return $cant_p;
    }

    public function getPuntajeTotal(){

        $cant_ex=$this->vacante->nro_examenes_v;

        $cal_ex=\App\CalificacionExamen::where('cod_po',$this->cod_po)
                                         ->where('estado_terminado_cae',1)
                                         ->get();
        $lista_ae=\App\AsignacionExamen::where('estado_ae', 1)
                ->where('cod_v',$this->cod_v)
                ->get();
        $suma_puntuacion=0; //100%
        foreach ($lista_ae as $asig) {
                $suma_puntuacion=$suma_puntuacion+($asig->valor_puntaje_ae);
        }


        
        $cont=0;
        $puntaje=0;
        foreach ($lista_ae as $asig) {
                $cod_e=$asig->cod_e;
                $por=((100*((int)($asig->valor_puntaje_ae)))/$suma_puntuacion);

                $cal_ex=\App\CalificacionExamen::where('cod_po',$this->cod_po)
                                        -> where('cod_e',$cod_e)
                                        ->first();
                if($cal_ex===null){
                    
                }else{
                //por=60*100/310=19.35
                //nota=20*19.35/100=3.87
                $nota_cae=$cal_ex->nota_cae;
                $nota=(($nota_cae*$por)/100);
                $puntaje=$puntaje+(int)($nota);   
            }
                $cont++;
        }

        return $puntaje;
    }

    public function getEstado(){

        $cod_u=$this->cod_u;
        $cod_v=$this->cod_v;
        $inv = \App\Invitacion::where('cod_u', $cod_u)
            ->where('cod_v',$cod_v)
            ->where('invitado_i', 1)->first();
        if($inv != null){
            return 'invitado';
        }else{
            return ' No invitado';
        }

        
    }

    public function getInvitado(){

        $inv = \App\Entrevista::where('cod_po_en', $this->cod_po)
            ->where('invitado_en', 1)->first();
        if($inv != null){
            return true;
        }else{
            return false;
        }

    }
   
}

