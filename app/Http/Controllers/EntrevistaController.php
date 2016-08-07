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


    public function editar(Request $peticion){
      $cod_eva_en=Auth::user()->cod_u;
      $cod_en=(int)$peticion['entre'];
      $fecha_en=$peticion['fecha'];
      $descripcion_en=$peticion['descripcion'];

      $cod_po=(int)$peticion['postulacion'];
      $cod_v=(int)($peticion['vacante']);


      $entrevista=$this->getEntrevista($cod_en);

      $entrevista->fecha_en=$fecha_en;
      $entrevista->descripcion_en=$descripcion_en;
      $entrevista->save();
        return redirect('/entrevista/lista/');



    }

    public function eliminar($id){
      Entrevista::destroy($id);
      return redirect('/entrevista/lista/');      
    }

     public function getEntrevista($id){
        $entre = Entrevista::where('cod_en', $id)
                ->first();
        if($entre === null)
            abort(500);
        else return $entre;
    }

    public function ver_datos($id){

        $entrevista=$this->getEntrevista($id);

        $parametros=['entrevista'=>$entrevista];

        return view('entrevista.ver_datos',$parametros);

    }

   	public function lista(Request $peticion){

   		$tipo_u=Auth::user()->tipo;
        Session::flash('tipo_u', $tipo_u);
        //$titulo_v = $peticion->input('titulo_v');
        $lista = Entrevista::where('estado_en',1)
            ->orderBy('cod_en')
            ->paginate(10);
        $parametros = ['entrevistas' => $lista];
        Session::flash('menu','entrevista');
        return view('entrevista.lista', $parametros);
   	}

    public function lista_en(Request $peticion){


      Auth::user()->usuario;
        $tipo=Auth::user()->tipo;
        $cod_u=Auth::user()->cod_u;
        if($tipo='can'){


            $postulacion = \App\Postulacion::where('estado_po', 1)
            ->where('cod_u',$cod_u)
            ->where('estado_po',1)
            ->first();
            
            //exit();
            if($postulacion === null){
              
                return view('candidato.inicio');
            }else{
                $cod_po=$postulacion->cod_po;
                $lista = Entrevista::where('estado_en',1)
                ->where('cod_po_en',$cod_po)
                ->orderBy('cod_en')
                ->paginate(10);
            }
           
      
        }else{
            return view('candidato.inicio');
        }



      
        Session::flash('tipo_u', $tipo);
        //$titulo_v = $peticion->input('titulo_v');
        /*
        $lista = Entrevista::where('estado_en',1)
            ->orderBy('cod_en')
            ->paginate(10);*/
        $parametros = ['entrevistas' => $lista];
        Session::flash('menu','entrevista');
        return view('entrevista.lista_can', $parametros);
    }


    
  }