<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Hash;
class Ciudad extends model 
{
    //
    public $table = 'ciudad';
    public $primaryKey = 'cod_c';


    protected $fillable = ['nom_c'];

    public function getNombreCiudad(){
    	return $this->attributes['nom_c'];
    }

}