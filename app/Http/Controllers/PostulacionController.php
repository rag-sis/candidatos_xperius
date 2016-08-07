<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Postulacion;
use App\Invitacion;
use App\Usuario;
use App\Vacante;
use \Session;
use Mail;
use Auth;

class PostulacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('autenticado');

       Session::flash('menu','postulacion');
    }
    
    public function lista(Request $peticion){
        $tipo_u=Auth::user()->tipo;
        $cod_u=Auth::user()->cod_u;
        if($tipo_u == 'can'){
            $lista=Postulacion::where('estado_po', 1)
                                ->where('cod_u',$cod_u)
                            ->paginate(10);
        }else{
            $lista = Postulacion::where('estado_po', 1)
            ->paginate(10);
            
        }
            
        $parametros = ['postulacion' => $lista];
        return view('postulacion.lista', $parametros);
    }

    
    public function getPostulacion($id){
        $postulacion = Postulacion::where('cod_po', $id)
            ->where('estado_po', 1)->first();
        if($postulacion === null)
            abort(500);
        else return $postulacion;
    }

    public function lista_vacantes(Request $peticion){

        $tipo_u=Auth::user()->tipo;
        Session::flash('tipo_u', $tipo_u);
        $titulo_v = $peticion->input('titulo_v');
        $lista = Vacante::buscar($titulo_v)
            ->orderBy('cod_v')
            ->paginate(10);
        $parametros = ['vacantes' => $lista];
        Session::flash('menu','vacante');
        return view('reporte.reporte_vacante', $parametros);
    }

    public function resultados_examenes(Request $peticion,$id){
            $tipo_u=Auth::user()->tipo;
        Session::flash('tipo_u', $tipo_u);
        $titulo_v = $peticion->input('titulo_v');
        $lista = Postulacion::where('cod_v',$id)
            ->orderBy('cod_v')
            ->paginate(10);
        $vac=$this->getVacante($id);

        $parametros = ['postulacion' => $lista, 'vacante' => $vac];
        Session::flash('menu','postulacion');
        return view('reporte.resultados_examenes', $parametros);
        
    }

    public function getVacante($id){
        $vac = \App\Vacante::where('cod_v', $id)
            ->where('estado_v', 1)->first();
        if($vac === null)
            abort(500);
        else return $vac;
    }

    public function crear_entrevista($id){
        //Recibe id de postulacion 
        $pos=$this->getPostulacion($id);
        $parametros = ['postulacion' => $pos];
        return view('entrevista.crear', $parametros);

    }
     public function editar_entrevista($id){
        //Recibe id de postulacion 
        
        $ent=\App\Entrevista::where('cod_en',$id)
                              ->first();

        $parametros = ['entrevista' => $ent];
        return view('entrevista.editar', $parametros);

    }

}