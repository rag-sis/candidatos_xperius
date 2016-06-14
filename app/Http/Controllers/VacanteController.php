<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Vacante;

use App\Http\Requests\FormCrearVacante;

use \Session;
use Mail;
use Auth;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('autenticado');
       
    }

    
     public function eliminar($id){
        Vacante::destroy($id);
        Session::flash('vac_eli', 'Vacante eliminado');
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
        return view('vacante.crear');
    }
     public function almacenar(FormCrearVacante $peticion){
        Vacante::create($peticion->all());
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
        return view('vacante.lista', $parametros);
    }

     public function listapdf(){
        $lista= Vacante::all();
        //enviando parametros a una vista en un arreglo
        $parametros=['vacantes'=> $lista];
        $pdf = \PDF::loadView('vacante/lista_pdf',$parametros);
        return $pdf->download('lista_vacantes.pdf');
    }

    public function enviar_email(){
        $data=['hola','mundo'];
        Mail::send('vacante.mensaje',$data,function($msg){
        $msg->subject('Mensaje de Xperius');
        $msg->to('goe.alcon@gmail.com');
        Session::flash('message','Mensaje enviado correctamente');
        });
        return redirect('/vacante/lista');
    }

     public function ver_informacion_vacante($id){
        $vacante = $this->getVacante($id);
        $parametros = ['vacante' => $vacante];
        return view('vacante.ver_informacion_vacante',$parametros);
    }


}
