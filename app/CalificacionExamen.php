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

    public function getPuntaje(){

        $estado_t=$this->estado_terminado_cae;
        if($estado_t == 1){
            $nota='Puntaje: '.$this->nota_cae.' / 100 %';
            return $nota;
        }else{

            $suma_terminados=$this->nota_cae;
            $total_puntaje_terminados=$this->getNotaTotalTerminados();
            $nota80=(($suma_terminados*80)/$total_puntaje_terminados);
            $nota80 =round($nota80 * 100) / 100;
            $nota80='Puntaje: '.$nota80.' / 80 %';
            return $nota80;
        }
        

    }

    public function getNotaTotalTerminados(){

        $lista=\App\CalificacionPregunta::where('cod_cae', $this->cod_cae)
                                          ->where('estado_terminado_cap',1)
                                          ->get();
        
        $puntaje_total_t=0;
        foreach ($lista as $cal) {
                
                $cod_p=$cal->cod_p;
                $pregunta=\App\Pregunta::where('cod_p',$cod_p)
                                     ->get();
                $nota=$pregunta[0]->puntaje_p;    
                $puntaje_total_t=$puntaje_total_t+$nota;

        }
        
        return $puntaje_total_t;
    }

}