<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Ciudad;

use App\Http\Requests\FormCrearCiudad;

use \Session;
use Illuminate\Http\Response;

use Auth;

class CiudadController extends Controller
{

	public function __construct(){
        $this->middleware('autenticado', ['except' => ['login', 'autenticar']]);
        $this->middleware('usuario', ['except' => ['login', 'autenticar', 'logout']]);
    }

    public function crear(){
        return view('admin.crear_ciudad');
    }
    public function almacenar(FormCrearCiudad $peticion){
        Ciudad::create($peticion->all());
        return redirect('/vacante/lista')->with('vac_cre', 'Ciudad creada');
    }

    public function lista_ciudades(){
        $lista= Ciudad::all();
        //enviando parametros a una vista en un arreglo
        $parametros=['ciudades'=> $lista];

     
        return json_encode($lista);
    }



}