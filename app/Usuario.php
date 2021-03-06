<?php

namespace App;

use Illuminate\Foundation\Auth\User;

use Hash;
use App\Invitacion;
class Usuario extends User 
{
    //
    public $table = 'usuarios';
    protected $primaryKey = 'cod_u';
    


    protected $fillable = ['nom_u', 'email_u', 'direccion_u','telefono_u','celular_u','usuario', 'password','curriculum','url_curriculum','tipo'];

    public function invitacion(){
        return $this->hashOne('App\Invitacion','cod_u');
    }

    public function setPasswordAttribute($valor){
    	if($valor !== ''){
    		$this->attributes['password'] = Hash::make($valor);	
    	}
    }
    /*
    public function getNombreCompleto(){
    	return $this->attributes['nom_u'] . ' ' . $this->attributes['ape_pat_u'] . ' ' . $this->attributes['ape_mat_u'];
    }
*/
    public function scopeBuscar($query, $nombre){
        return $query->where('nom_u', 'ilike', "%$nombre%")
                    ->orWhere('tipo', 'ilike', "%$nombre%");
    }

    public function habilitado_asignacion(){

        $lista = \App\Postulacion::select(\DB::raw('count(*) as num'))
                                ->where('cod_u', $this->cod_u)
                                ->where('estado_po',1)
                                ->get();
        $nro= (int)($lista[0]->num);

        if($nro == 0){
            return true;
        }else{
            return false;
        }


    }
}
