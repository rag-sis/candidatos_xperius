<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrevista extends Model
{
    //
    public $table = 'entrevista';
    public $primaryKey = 'cod_en';


    protected $fillable = ['cod_po_en','cod_eva_en','descripcion_en','puntaje_en','fecha_en','invitado_en','entrevistado_en'];

     
    /*
    public function scopeBuscar($query, $titulo_p){
        return $query->where('titulo_p', 'ilike', "%$titulo_p%");
    }
    */
    public function postulacion(){
        return $this->belongsTo('App\Postulacion','cod_po_en');
    }
    public function evaluador(){
        return $this->belongsTo('App\usuario','cod_eva_en');
    }
    public function scopeBuscar($query, $cod_po){
        return $query->where('cod_po', '$cod_po');
    }
    public function estado_en(){

        if( ($this->entrevistado_en) == 1){
            return 'completado';

        }else{

            return 'pendiente';
        }
    }
}
