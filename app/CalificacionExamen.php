<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuario;
use App\Vacante;
use App\Postulacion;

class CalificacionExamen extends Model
{
    //
    public $table = 'calificacion_examen';
    public $primaryKey = 'cod_cae';


    protected $fillable = ['cod_po','cod_e','nota_cae','fecha_hora_comienzo_cae','fecha_hora_final_cae','estado_examen_tiempo_cae','estado_terminado_cae'];

    public function postulacion(){
        return $this->belongsTo('App\Postulacion','cod_po');
    }
    public function examen(){
        return $this->belongsTo('App\Examen','cod_e');
    }

    public function scopeBuscar($query, $nombre){
        return $query->where('nom_u', 'ilike', "%$nombre%")
                    ->orWhere('tipo', 'ilike', "%$nombre%");
    }

}