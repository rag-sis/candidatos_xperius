<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignacionExamen extends Model
{
    //
    public $table = 'asignacion_examen';
    public $primaryKey = 'cod_ae';


    protected $fillable = ['cod_v','cod_e','valor_puntaje_ae'];

    
    /*
    public function scopeBuscar($query, $titulo_p){
        return $query->where('titulo_p', 'ilike', "%$titulo_p%");
    }
    */
    public function scopeBuscar($query, $titulo_e){
        return $query->where('examen.titulo_e', 'ilike', "%$titulo_e%");
    }
    
    public function examen(){
        return $this->belongsTo('App\Examen','cod_e');
    }
    public function getCalificacionExamen($exa,$inv){
        $cal_exa = \App\CalificacionExamen::where('cod_e', $exa)
            ->where('cod_po', $inv)
            ->where('estado_examen_tiempo_cae',1)
            ->first();
        
        return $cal_exa;
    }

    public function nota_examen(){
        $cod_e=$this->cod_e;
        $cod_u=\Auth::user()->cod_u;
        $pos= \App\Postulacion::where('cod_u', $cod_u)
            ->where('cod_v', $this->cod_v)
            ->where('estado_po',1)
            ->first();
        $cod_po=$pos->cod_po;
        $cal_exa = \App\CalificacionExamen::where('cod_e', $cod_e)
            ->where('cod_po', $cod_po)
            ->where('estado_examen_tiempo_cae',1)
            ->first();

        if($cal_exa!=null){
            return $cal_exa->nota_cae;
        }else{
            return '0';
        }

        
    }

    public function estado_tiempo_terminado(){
        $cod_e=$this->cod_e;
        $cod_u=\Auth::user()->cod_u;
        $pos= \App\Postulacion::where('cod_u', $cod_u)
            ->where('cod_v', $this->cod_v)
            ->where('estado_po',1)
            ->first();
        $cod_po=$pos->cod_po;
        $cal_exa = \App\CalificacionExamen::where('cod_e', $cod_e)
            ->where('cod_po', $cod_po)
            ->where('estado_examen_tiempo_cae',1)
            ->first();

        if($cal_exa != null){
            return true;
        }else{
            return false;
        }

    }
    public function estado_terminado(){
        $cod_e=$this->cod_e;
        $cod_u=\Auth::user()->cod_u;
        $pos= \App\Postulacion::where('cod_u', $cod_u)
            ->where('cod_v', $this->cod_v)
            ->where('estado_po',1)
            ->first();
        $cod_po=$pos->cod_po;
        $cal_exa = \App\CalificacionExamen::where('cod_e', $cod_e)
            ->where('cod_po', $cod_po)
            ->where('estado_terminado_cae',1)
            ->first();

        if($cal_exa != null){
            return true;
        }else{
            return false;
        }

    }

    public function cod_invitacion(){

        
        $cod_u=\Auth::user()->cod_u;
        $inv= \App\invitacion::where('cod_u', $cod_u)
            ->where('cod_v', $this->cod_v)
            ->where('estado_i',1)
            ->first();

        return $inv->cod_i;
    }

}
