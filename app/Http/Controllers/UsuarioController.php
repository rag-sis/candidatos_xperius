<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Usuario;
use App\Vacante;
use App\Invitacion;

use App\Http\Requests\FormCrearUsuario;
use App\Http\Requests\FormEditarUsuario;

use \Session;
use Illuminate\Http\Response;

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
        Session::flash('menu', 'usuario');
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
            ->paginate(10);
        $parametros = ['usuarios' => $lista];
        Session::flash('menu', 'usuario');
        return view('usuario.lista', $parametros);
    }
    
     

    public function crear(){
        return view('usuario.crear');
    }
     public function almacenar(FormCrearUsuario $peticion){
      $val_t=null;
      $val_c=null;
       $file = $peticion->file('curriculum');
       if ($file!=null){
            $nombre = $file->getClientOriginalName();
            $nombre=$peticion['usuario'].'_'.$nombre;
            \Storage::disk('local')->put($nombre,  \File::get($file));
            //$public_path = public_path();
            //$direccion_final=$public_path."/files/".$nombre;
       }else{
            $nombre=null;
       }
       
       

        if($peticion->input('password') === $peticion->input('rpassword'))
        {
          if($peticion['telefono_u'] != null){
            $val_t=$peticion['telefono_u'];
          }
          if($peticion['celular_u'] != null){
            $val_t=$peticion['celular_u'];
          }
            Usuario::create([
                'nom_u'=>$peticion['nom_u'], 
                'email_u'=>$peticion['email_u'], 
                'direccion_u'=>$peticion['direccion_u'],
                'telefono_u'=>$val_t,
                'celular_u'=>$val_c,
                'usuario'=>$peticion['usuario'], 
                'password'=>$peticion['password'],
                'curriculum'=>$nombre,
                'url_curriculum'=>$peticion['url_curriculum'],
                'tipo'=>$peticion['tipo'],

                ]);
            
            
            if ($peticion['tipo'] == 'can') {
                $cod_v=$peticion['vac'];
                $usuario_creado=$this->getUsuarioA($peticion['usuario']);
                $id_uc=$usuario_creado->cod_u;
                Invitacion::create([
                  'cod_u'=>$id_uc, 
                  'cod_v'=>$cod_v,
                ]);
            }
            
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
      public function getUsuarioA($nombre_usuario){
        $usuario = Usuario::where('usuario', $nombre_usuario)
            ->where('activo', 1)->first();
        if($usuario === null)
            abort(500);
        else return $usuario;
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
    public function actualizar($id, FormEditarUsuario $peticion){
        $file = $peticion->file('curriculum');
        $val_t=null;
        $val_c=null;
        if($peticion['telefono_u'] != null){
            $val_t=$peticion['telefono_u'];
          }
          if($peticion['celular_u'] != null){
            $val_t=$peticion['celular_u'];
          }

       if ($file!=null){
            $nombre = $file->getClientOriginalName();
            $nombre=$peticion['usuario'].'_'.$nombre;
            \Storage::disk('local')->put($nombre,  \File::get($file));

            $usuario = $this->getUsuario($id);
            $usuario->fill([
                'nom_u'=>$peticion['nom_u'], 
                'email_u'=>$peticion['email_u'], 
                'direccion_u'=>$peticion['direccion_u'],
                'telefono_u'=>$val_t,
                'celular_u'=>$val_c,
                'usuario'=>$peticion['usuario'], 
                'password'=>$peticion['password'],
                'curriculum'=>$nombre,
                'url_curriculum'=>$peticion['url_curriculum'],
                'tipo'=>$peticion['tipo'],
                ]);
            $usuario->save();
            
       }else{
                $usuario = $this->getUsuario($id);
                //$usuario->fill($peticion->all());
                $usuario->fill([
                'nom_u'=>$peticion['nom_u'], 
                'email_u'=>$peticion['email_u'], 
                'direccion_u'=>$peticion['direccion_u'],
                'telefono_u'=>$val_t,
                'celular_u'=>$val_c,
                'usuario'=>$peticion['usuario'], 
                'password'=>$peticion['password'],
                'url_curriculum'=>$peticion['url_curriculum'], 
                'tipo'=>$peticion['tipo'],
                ]);
                $usuario->save();
       }
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
            return redirect('/login')->withErrors([
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
    public function ver_informacion_usuario($id){
        $usuario = $this->getUsuario($id);
        $parametros = ['usuario' => $usuario];
        return view('usuario.ver_informacion_usuario',$parametros);
    }
    public function ver_curriculum($archivo){
        $storagePath  = \Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
        $file=$storagePath.$archivo;

        
        if (\Storage::exists($archivo))
        {
            return response()->download($file);
            
        }
        //si no se encuentra lanzamos un error 404.
        abort(404);

    }

    public function lista_vacantes(){
        $lista= Vacante::all();
        //$lista= Vacante::where('estado_v',1);
        //enviando parametros a una vista en un arreglo
        $parametros=['vacante'=> $lista];
        
        return json_encode($lista);

        
    }
}
