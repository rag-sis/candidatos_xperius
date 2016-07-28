<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuario;

class Examen extends Model
{
    //

    public $table = 'examen';
    public $primaryKey = 'cod_e';


    protected $fillable = ['codigo_evaluador','titulo_e','descripcion_e', 'puntaje_maximo_e','tiempo_minutos_e','num_preguntas_e'];

    public function evaluador(){
        return $this->belongsTo('App\Usuario','codigo_evaluador');
    }
    
    
    public function scopeBuscar($query, $titulo_e){
        return $query->where('titulo_e', 'ilike', "%$titulo_e%");
    }
}
