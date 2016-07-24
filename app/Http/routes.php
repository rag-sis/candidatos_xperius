<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	Session::flash('menu', '');
	//Auth::user()->usuario;
	if(Auth::check()){


	$tipo=Auth::user()->tipo;

	if($tipo==='can'){
		//return view();
		return redirect('/candidato');
	}else{
		return view('inicio');
	}	


	}else{
		return view('inicio');
	}
	
    
});


Route::get('/usuario/lista', 'UsuarioController@lista');
Route::get('/usuario/crear','UsuarioController@crear');
Route::post('/usuario/almacenar','UsuarioController@almacenar');
Route::get('/usuario/eliminar/{id}', 'UsuarioController@eliminar');
Route::get('/usuario/editar/{id}', 'UsuarioController@editar');
Route::post('/usuario/actualizar/{id}', 'UsuarioController@actualizar');

//Codigo para loguearse
Route::get('/login', 'UsuarioController@login');
Route::post('/usuario/autenticar', 'UsuarioController@autenticar');
Route::get('/usuario/logout', 'UsuarioController@logout');
Route::get('/lista_usr_pdf', 'UsuarioController@listapdf');

//Rutas para vacantes
Route::get('/vacante/lista', 'VacanteController@lista');
Route::get('/vacante/eliminar/{id}', 'VacanteController@eliminar');
Route::get('/vacante/crear','VacanteController@crear');
Route::post('/vacante/almacenar','VacanteController@almacenar');
Route::get('/lista_v_pdf', 'VacanteController@listapdf');
Route::get('/vacante/editar/{id}', 'VacanteController@editar');
Route::post('/vacante/actualizar/{id}', 'VacanteController@actualizar');
Route::post('/vacante/enviar_email', 'VacanteController@enviar_email');
Route::get('/vacante/enviar_invitacion/{id}', 'VacanteController@enviar_invitacion');

Route::get('/usuario/ver_informacion_usuario/{id}', 'UsuarioController@ver_informacion_usuario');
Route::get('/usuario/ver_curriculum/{archivo}', 'UsuarioController@ver_curriculum');
Route::get('/vacante/ver_informacion_vacante/{id}', 'VacanteController@ver_informacion_vacante');
Route::get('/vacante/act_es/{id}/{val}','VacanteController@actualizar_estado_vacante');

Route::get('/ciudad/crear_ciudad','CiudadController@crear');
Route::post('/ciudad/almacenar','CiudadController@almacenar');

Route::get('/ciudad/lista_ciudades','CiudadController@lista_ciudades');
Route::get('/vacante/lista_vacantes','UsuarioController@lista_vacantes');
Route::get('/invitacion/lista','InvitacionController@lista');
Route::post('/invitacion/invitar','InvitacionController@enviar_invitacion');

Route::get('/examen/lista','ExamenController@lista');
Route::get('/examen/crear','ExamenController@crear');
Route::post('/examen/almacenar','ExamenController@almacenar');
Route::get('/examen/editar/{id}','ExamenController@editar');
Route::get('/examen/deshabilitar/{id}', 'ExamenController@deshabilitar');
Route::get('/pregunta/lista_preguntas/{id}','PreguntaController@lista_preguntas');
Route::get('/respuesta/lista_respuestas/{id}','RespuestaController@lista_respuestas');
Route::post('/examen/actualizar/{id}','ExamenController@actualizar');
Route::get('/examen/ver/{id}','ExamenController@ver');
Route::get('/examen/ver_examen/{id}','ExamenController@ver_examen');

Route::get('/asignacion_examen/asignar/{id}/{titulo}','AsignacionExamenController@asignar');
Route::post('/asignacion_examen/asignar_e','AsignacionExamenController@asignar_e');
Route::get('/registrar_pwd/{id}','LoginTempController@registrar_pwd');

Route::post('/registrar_pwd/almacenar','LoginTempController@almacenar');

Route::get('/candidato','CandidatoController@inicio');

Route::post('/candidato/rendir_examen','CandidatoController@rendir_examen');
Route::post('/candidato/terminar_examen','CandidatoController@terminar_examen');
