<?php

namespace App;

use Illuminate\Foundation\Auth\User;
use Hash;
class Usuario extends User
{
    //
    public $table = 'usuarios';
    public $primaryKey = 'cod_u';


    protected $fillable = ['nom_u', 'ape_pat_u', 'ape_mat_u','ci_u', 'email_u', 'direccion_u','telefono_u','celular_u','usuario', 'password','curriculum','url_curriculum','tipo'];

    public function setPasswordAttribute($valor){
    	if($valor !== ''){
    		$this->attributes['password'] = Hash::make($valor);	
    	}
    }

    public function getNombreCompleto(){
    	return $this->attributes['nom_u'] . ' ' . $this->attributes['ape_pat_u'] . ' ' . $this->attributes['ape_mat_u'];
    }

    public function scopeBuscar($query, $nombre){
        return $query->where('nom_u', 'ilike', "%$nombre%")
                    ->orWhere('ape_pat_u', 'ilike', "%$nombre%")
                    ->orWhere('ape_mat_u', 'ilike', "%$nombre%")
                    ->orWhere('tipo', 'ilike', "%$nombre%");
    }
}
