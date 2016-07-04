<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuario;
use App\Vacante;


class Invitacion extends Model
{
    //
    public $table = 'invitacion';
    public $primaryKey = 'cod_i';


    protected $fillable = ['cod_u', 'cod_v'	, 'invitado_i','estado_i'];

   
/*
    public function scopeBuscar($query, $titulo_v){
        return $query->where('titulo_v', 'ilike', "%$titulo_v%");
    }
*/
    public function getNombresUsuario($id){

        
        $usuario = Usuario::where('cod_u', $id)
            ->where('activo', 1)->first();
        if($usuario === null){
        	abort(500);
        }else{
        	$nombre_c=$usuario->nom_u;
        	return $nombre_c;
        } 
        	
    }
    
    public function getEmailUsuario($id){

        
        $usuario = Usuario::where('cod_u', $id)
            ->where('activo', 1)->first();
        if($usuario === null){
        	abort(500);
        }else{
        	$email_c=$usuario->email_u;
        	return $email_c;
        } 
        	
    }

    public function getTituloVacante($id){

        
        $vacante = Vacante::where('cod_v', $id)
            ->where('estado_v', 1)->first();
        if($vacante === null){
        	abort(500);
        }else{
        	$vacante_c=$vacante->titulo_v;
        	return $vacante_c;
        } 
        	
    }
}

