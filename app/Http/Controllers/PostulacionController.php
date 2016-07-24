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
        $lista = Postulacion::where('estado_po', 1)
            ->where('invitado_po',0)
            ->paginate(10);
            
        $parametros = ['postulaciones' => $lista];
        return view('postulacion.lista', $parametros);
    }

    
    public function getPostulacion($id){
        $postulacion = Postulacion::where('cod_po', $id)
            ->where('estado_po', 1)->first();
        if($postulacion === null)
            abort(500);
        else return $postulacion;
    }

}