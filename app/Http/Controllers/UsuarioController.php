<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Usuario;

use App\Http\Requests\FormCrearUsuario;

use \Session;

use Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('autenticado', ['except' => ['login', 'autenticar']]);
        $this->middleware('usuario', ['except' => ['login', 'autenticar', 'logout']]);
    }

    public function index()
    {
        //
    }

    public function login(){
        return view('login.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
    public function lista(Request $peticion){
        $nombre = $peticion->input('nombre');
        $lista = Usuario::where('activo', 1)
            ->buscar($nombre)
            ->orderBy('cod_u')
            ->paginate(5);
        $parametros = ['usuarios' => $lista];
        return view('usuario.lista', $parametros);
    }
    /*
     public function lista(){

        $lista= Usuario::all();
        //enviando parametros a una vista en un arreglo
        $parametros=['usuarios'=> $lista];
        return view('usuario.lista', $parametros);

    }*/

    public function crear(){
        return view('usuario.crear');
    }
     public function almacenar(FormCrearUsuario $peticion){
        if($peticion->input('password') === $peticion->input('rpassword'))
        {
            Usuario::create($peticion->all());
            Session::flash('usu_cre', 'Usuario creado');
            return redirect('/usuario/lista');
        }        
        else
        {
            return redirect('/usuario/crear')
               ->withErrors(['repetir' => 'Las contraseñas no coinciden',])
                ->withInput($peticion->all());
        }
    }

    public function eliminar($id){
        $usuario = $this->getUsuario($id);
        $usuario->activo = 0;
        $usuario->save();
        Session::flash('usu_eli', 'Usuario eliminado');
        return redirect('/usuario/lista');
    }
      public function getUsuario($id){
        $usuario = Usuario::where('cod_u', $id)
            ->where('activo', 1)->first();
        if($usuario === null)
            abort(500);
        else return $usuario;
    }
    public function editar($id){
        $usuario = $this->getUsuario($id);
        $parametros = ['usuario' => $usuario];
        return view('usuario.editar', $parametros);
    }
    public function actualizar($id, Request $peticion){
        $usuario = $this->getUsuario($id);
        $usuario->fill($peticion->all());
        $usuario->save();
        Session::flash('usu_edi', 'Usuario modificado');
        return redirect('/usuario/lista');
    }

    //Autentificación
    public function autenticar(Request $peticion){
        $credenciales = [
            'usuario' => $peticion->input('login'),
            'password' => $peticion->input('pass'),
            'activo' => 1,
        ];
        if(Auth::attempt($credenciales)){
            return redirect('/');
            
        }
        else{
            return redirect('/login/login')->withErrors([
                    'login' => 'Usuario y/o contraseña incorrectos',
                ])->withInput($peticion->only('usuario'));
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function listapdf(){
        $lista= Usuario::all();
        //enviando parametros a una vista en un arreglo
        $parametros=['usuarios'=> $lista];
        $pdf = \PDF::loadView('usuario/lista_candidatos_pdf',$parametros);
        return $pdf->download('lista_candidatos.pdf');
    }
}
