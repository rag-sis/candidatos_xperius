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

}
