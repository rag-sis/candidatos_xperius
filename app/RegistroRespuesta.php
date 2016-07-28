<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pregunta;
use App\Vacante;
use App\Postulacion;

class RegistroRespuesta extends Model
{
    //
    public $table = 'registro_respuesta';
    public $primaryKey = 'cod_rr';


    protected $fillable = ['cod_cae','cod_p','cod_r','valor_rr'];

    public function pregunta(){
    	return $this->belongsTo('App\Pregunta','cod_p');
    }

    

}