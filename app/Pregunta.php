<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    //
    public $table = 'pregunta';
    public $primaryKey = 'cod_p';


    protected $fillable = ['cod_e','valor_p','tipo_p','puntaje_p'];

    
    /*
    public function scopeBuscar($query, $titulo_p){
        return $query->where('titulo_p', 'ilike', "%$titulo_p%");
    }
    */
    public function scopeBuscar_cod_examen($query, $cod_e){
        return $query->where('cod_e', '$cod_e');
    }
}
