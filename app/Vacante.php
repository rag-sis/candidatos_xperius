<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    //
    public $table = 'vacante';
    public $primaryKey = 'cod_v';


    protected $fillable = ['titulo_v', 'lugar_v', 'posicion_v','tiempo_trabajo_v', 'tipo_trabajo_v', 'descripcion_v','nro_examenes_v','estado_v'];

    
    public function invitacion(){
        return $this->hashOne('App\Invitacion','cod_v');
    }
    

    public function scopeBuscar($query, $titulo_v){
        return $query->where('titulo_v', 'ilike', "%$titulo_v%");
    }
    
    public function getCantidadCandidatos(){

         $lista = \App\Postulacion::select(\DB::raw('count(*) as num_can'))
                                ->where('cod_v', $this->cod_v)
                                ->where('estado_po',1)
                                ->get();
        $nro= $lista[0]->num_can;
        return $nro;
    }

   
}
