<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    //
    public $table = 'respuesta';
    public $primaryKey = 'cod_r';


    protected $fillable = ['cod_p','valor_r','result_r'];

    
    /*
    public function scopeBuscar($query, $titulo_p){
        return $query->where('titulo_p', 'ilike', "%$titulo_p%");
    }
    */
}
