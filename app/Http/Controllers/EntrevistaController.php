<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Entrevista;
use \Session;
use Auth;

class EntrevistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('autenticado');

       Session::flash('menu','entrevista');
    }

   	public function almacenar(Request $peticion){
   		$cod_eva_en=Auth::user()->cod_u;
   		$cod_po=(int)$peticion['postulacion'];
   		$fecha_en=$peticion['fecha'];
   		$descripcion_en=$peticion['descripcion'];
   		$cod_v=(int)($peticion['vacante']);
   		$entrevista=Entrevista::create([ 
                        'cod_po_en'=>$cod_po,
                        'cod_eva_en'=>$cod_eva_en,
                        'fecha_en'=>$fecha_en, 
                        'descripcion_en'=>$descripcion_en,
                        'invitado_en'=>1,
                        


                    ]);
   		
        return redirect('/resultados/examenes/'.$cod_v);



   	}

   	public function lista(Request $peticion){

   		$tipo_u=Auth::user()->tipo;
        Session::flash('tipo_u', $tipo_u);
        //$titulo_v = $peticion->input('titulo_v');
        $lista = Entrevista::where('invitado_en',1)
            ->orderBy('cod_en')
            ->paginate(10);
        $parametros = ['entrevistas' => $lista];
        Session::flash('menu','entrevista');
        return view('entrevista.lista', $parametros);
   	}
    
  }