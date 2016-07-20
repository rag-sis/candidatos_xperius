<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FormLoginTemp;
//use \Session;
//use App\Pregunta;

class LoginTempController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function registrar_pwd($id)
    {
        //$lista = Pregunta::where('cod_e', $id)->get();
        //enviando parametros a una vista en un arreglo
        $parametros=['inv'=> $id];

     
        return view('registrar_pwd',$parametros);
    }

    public function almacenar(FormLoginTemp $peticion){
        $id_inv= (int)($peticion->input('inv'));
        $nom_us= $peticion->input('usuario');
        if($peticion->input('password') === $peticion->input('rpassword'))
        {   
            $inv1=$this->getInvitacion($id_inv);
            $nom_us_in=$inv1->usuario->usuario;
            $est_pwd=$inv1->usuario->act_pwd;
            $est_inv=$inv1->estado_i;
            
                if($nom_us == $nom_us_in ){

                if($est_pwd == 0){

                        $inv1->usuario->act_pwd=1;
                        $inv1->usuario->password=$peticion['password'];
                        $inv1->usuario->save();
                        return redirect('/login')->with('reg_ok', 'Se ha verificado y registrado sus datos exitosamente. Puede ingresar al sistema.');

                }else{
                        return redirect('/registrar_pwd/'.$id_inv)
                        ->withErrors(['error_pwd' => 'Este usuario ya esta verificado',]);
                }
                

            }else{
                return redirect('/registrar_pwd/'.$id_inv)
               ->withErrors(['error_user' => 'El usuario es incorrecto',]);
                //->withInput($peticion->all());
            }
          

        }else{
            return redirect('/registrar_pwd'.$id_inv)
               ->withErrors(['repetir' => 'Las contraseñas no coinciden',])
                ->withInput($peticion->all());
        }

    }

    public function getInvitacion($id){
        $invitacion = \App\Invitacion::where('cod_i', $id)
            ->where('estado_i', 1)->first();
        if($invitacion === null)
            abort(500);
        else return $invitacion;
    }
   

    
}