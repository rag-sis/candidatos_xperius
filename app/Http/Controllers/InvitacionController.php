<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Invitacion;
use App\Usuario;
use App\Vacante;
use \Session;
use Mail;
use Auth;

class InvitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('autenticado');

       Session::flash('menu','invitacion');
    }
    
    public function lista(Request $peticion){
        //$tipo_u=Auth::user()->tipo;
        //Session::flash('tipo_u', $tipo_u);
        //$titulo_v = $peticion->input('titulo_v');
        //$lista = Invitacion::orderBy('cod_i','ASC')->paginate(10);
        $lista = Invitacion::where('estado_i', 1)
            ->where('invitado_i',0)
            ->paginate(10);
            
        $parametros = ['invitaciones' => $lista];
        //$usuario=$lista->usuario;
        //dd($usuario);
        //exit();
        return view('invitacion.lista', $parametros);
    }

    public function enviar_invitacion(Request $peticion){

        $checkbox=$peticion->invitacion;
        foreach ($checkbox as $cod_inv) {
          //  echo $value;
            $cod_u_c=$this->getIdUsuario($cod_inv);
            $email=$this->getEmailUsuario($cod_u_c);

            $invitacion = $this->getInvitacion($cod_inv);
            $cod_vac=$invitacion->cod_v;
            //$email=$peticion['select1'];
            //$data = $request->only('name', 'email', 'phone');
            /*
            $lista = Invitacion::where('estado_i', 1)
            ->where('invitado_i',0)
            ->paginate(10);*/
            $parametros = ['invitacion' => $invitacion];

            $data=['hola','mundo'];
            Mail::send('vacante.mensaje',$parametros,function($msg) use($email){
            $msg->subject('Mensaje de Xperius');
            $msg->to( $email );
            });

            //actualiza el enviado de invitacion
            
            $invitacion->invitado_i = 1;
            $invitacion->save();
        
        }
        //exit();

            
        Session::flash('message','Mensaje enviado correctamente');
        return redirect('/invitacion/lista');


    }
    public function getIdUsuario($id_i){

        
        $invitacion = Invitacion::where('cod_i', $id_i)
            ->where('estado_i', 1)->first();
        if($invitacion === null){
            abort(500);
        }else{
            $cod_u_c=$invitacion->cod_u;
            return $cod_u_c;
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

    public function getInvitacion($id){
        $invitacion = Invitacion::where('cod_i', $id)
            ->where('estado_i', 1)->first();
        if($invitacion === null)
            abort(500);
        else return $invitacion;
    }

}