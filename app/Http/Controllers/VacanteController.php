<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Vacante;

use App\Http\Requests\FormCrearVacante;

use \Session;
use Mail;
use Auth;
use App\Usuario;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('autenticado');

       Session::flash('menu','vacante');
    }

    
     public function eliminar($id){
        Vacante::destroy($id);
        Session::flash('vac_eli', 'Vacante eliminado');
        Session::flash('menu','vacante');
        return redirect('/vacante/lista');
    }
    public function getVacante($id){
        $vacante = Vacante::where('cod_v', $id)
            ->first();
        if($vacante === null)
            abort(500);
        else return $vacante;
    }

     public function crear(){
        Session::flash('menu','vacante');
        return view('vacante.crear');
    }
     public function almacenar(FormCrearVacante $peticion){
        Vacante::create($peticion->all());
        Session::flash('menu','vacante');
        return redirect('/vacante/lista')->with('vac_cre', 'Vacante creada');
    }

    public function editar($id){
        $vacante = $this->getVacante($id);
        $parametros = ['vacante' => $vacante];
        
        return view('vacante.editar', $parametros);
    }

    public function actualizar($id, Request $peticion){
        $vacante = $this->getVacante($id);
        $vacante->fill($peticion->all());
        $vacante->save();
        return redirect('/vacante/lista')->with('vac_edi', 'Vacante modificada');
    }

    public function lista(Request $peticion){
        $tipo_u=Auth::user()->tipo;
        Session::flash('tipo_u', $tipo_u);
        $titulo_v = $peticion->input('titulo_v');
        $lista = Vacante::buscar($titulo_v)
            ->orderBy('cod_v')
            ->paginate(10);
        $parametros = ['vacantes' => $lista];
        Session::flash('menu','vacante');
        return view('vacante.lista', $parametros);
    }

     public function listapdf(){
        $lista= Vacante::all();
        //enviando parametros a una vista en un arreglo
        $parametros=['vacantes'=> $lista];
        $pdf = \PDF::loadView('vacante/lista_pdf',$parametros);
        return $pdf->download('lista_vacantes.pdf');
    }

    public function enviar_email(Request $peticion){
        $email=$peticion['select1'];
        $data=['hola','mundo'];
        Mail::send('vacante.mensaje',$data,function($msg) use($email){
        $msg->subject('Mensaje de Xperius');
        $msg->to( $email );});
        Session::flash('message','Mensaje enviado correctamente');
        return redirect('/vacante/lista');

        
    }

    public function enviar_invitacion($id){

        $vacante = $this->getVacante($id);
        $parametros = ['vacante' => $vacante];
        $lista= Usuario::all();
        $parametros_u=['usuarios'=> $lista];
        Session::flash('id_vc', $id);
        return view('vacante.envio_invitacion',$parametros,$parametros_u);

    }

     public function ver_informacion_vacante($id){
        $vacante = $this->getVacante($id);
        $parametros = ['vacante' => $vacante];
        return view('vacante.ver_informacion_vacante',$parametros);
    }
    
    public function actualizar_estado_vacante($id, $val){
        
        $vacante = $this->getVacante($id);
        if($val==1){
            $vacante->estado_v = 1;    
        }else{
            $vacante->estado_v = 0;    
        }
        
        $vacante->save();
        return $val;
     }
   

}
