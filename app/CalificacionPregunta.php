<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuario;
use App\Vacante;
use App\Postulacion;

class CalificacionPregunta extends Model
{
    //
    public $table = 'calificacion_pregunta';
    public $primaryKey = 'cod_cap';


    protected $fillable = ['cod_cae','cod_p','nota_cap','estado_terminado_cap'];

    

    public function scopeBuscar($query, $nombre){
        return $query->where('nom_u', 'ilike', "%$nombre%")
                    ->orWhere('tipo', 'ilike', "%$nombre%");
    }

}