<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    //
    public $table = 'vacante';
    public $primaryKey = 'cod_v';


    protected $fillable = ['titulo_v', 'lugar_v', 'posicion_v','tiempo_trabajo_v', 'tipo_trabajo_v', 'descripcion_v','tipo_examen_v','estado_v'];

    
    public function invitacion(){
        return $this->hashOne('App\Invitacion','cod_v');
    }

    public function scopeBuscar($query, $titulo_v){
        return $query->where('titulo_v', 'ilike', "%$titulo_v%");
    }
    
}
