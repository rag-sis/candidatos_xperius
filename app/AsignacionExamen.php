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
}
