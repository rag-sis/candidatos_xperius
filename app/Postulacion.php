<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuario;
use App\Vacante;

class Postulacion extends Model
{
    //
    public $table = 'postulacion';
    public $primaryKey = 'cod_po';


    protected $fillable = ['cod_u','cod_v','invitado_po','entrevistado_po','puntaje_cu_po','puntaje_ex_po','puntaje_en_po','estado_po'];

    public function usuario(){
        return $this->belongsTo('App\Usuario','cod_u');
    }
    public function vacante(){
        return $this->belongsTo('App\Vacante','cod_v');
    }
   

    public function scopeBuscar($query, $nombre){
        return $query->where('nom_u', 'ilike', "%$nombre%")
                    ->orWhere('tipo', 'ilike', "%$nombre%");
    }

}

