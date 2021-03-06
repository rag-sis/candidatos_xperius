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
Route::get('/vacante/lista_vac', 'VacanteController@lista_vacantes');
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
Route::get('/examen/lista_ex','ExamenController@lista_ex');//Lista vista candidatos
Route::get('/examen/crear','ExamenController@crear');
Route::post('/examen/almacenar','ExamenController@almacenar');
Route::get('/examen/editar/{id}','ExamenController@editar');
Route::get('/examen/editar_reutilizar/{id}','ExamenController@editar_reutilizar');
Route::get('/examen/deshabilitar/{id}', 'ExamenController@deshabilitar');
Route::get('/pregunta/lista_preguntas/{id}','PreguntaController@lista_preguntas');
Route::get('/respuesta/lista_respuestas/{id}','RespuestaController@lista_respuestas');
Route::post('/examen/actualizar/{id}','ExamenController@actualizar');
Route::post('/examen/guardar_nuevo/{id}','ExamenController@guardar_nuevo');
Route::get('/examen/ver/{id}','ExamenController@ver');
Route::get('/examen/ver_examen/{id}','ExamenController@ver_examen');

Route::get('/asignacion_examen/asignar/{id}/{titulo}','AsignacionExamenController@asignar');
Route::get('/desasignacion_examen/desasignar/{id_e}/{cod_v}','AsignacionExamenController@desasignar_e');

Route::post('/asignacion_examen/asignar_e','AsignacionExamenController@asignar_e');
Route::get('/registrar_pwd/{id}','LoginTempController@registrar_pwd');

Route::post('/registrar_pwd/almacenar','LoginTempController@almacenar');

Route::get('/candidato','CandidatoController@inicio');

Route::post('/candidato/rendir_examen','CandidatoController@rendir_examen');
Route::post('/candidato/terminar_examen','CandidatoController@terminar_examen');

Route::get('/examen/calificaciones_pendientes','CalificacionExamenController@calificaciones_pendientes');

Route::get('/examen/calificar/{cod_cae}','CalificacionExamenController@calificar_pendientes');

Route::post('/examen/calificar','CalificacionExamenController@calificar_examen');

Route::get('/resultados/lista','PostulacionController@lista_vacantes');
Route::get('/resultados/examenes/{id}','PostulacionController@resultados_examenes');
Route::get('/postulacion/lista','PostulacionController@lista');
Route::get('/entrevista/formulario_crear/{id}','PostulacionController@crear_entrevista');
Route::get('/entrevista/formulario_editar/{id}','PostulacionController@editar_entrevista');

Route::post('/entrevista/almacenar','EntrevistaController@almacenar');
Route::post('/entrevista/editar','EntrevistaController@editar');
Route::get('/entrevista/lista','EntrevistaController@lista');
Route::get('/entrevista/eliminar/{id}','EntrevistaController@eliminar');
Route::get('/entrevista/ver_datos/{id}','EntrevistaController@ver_datos');

Route::get('/candidato/ver_examen_terminado/{cal_e}/{exa}','CandidatoController@ver_examen_finalizado');

Route::get('/calificaciones/pregunta/{cod_cae}/{id_pregunta}','CandidatoController@calificacion_pregunta');

Route::get('/respuesta_correcta_fv/{id_pregunta}','CandidatoController@respuesta_correcta_fv');
Route::get('/respuesta_opcion_llenado/{cod_cae}/{id_pregunta}','CandidatoController@respuesta_opcion_llenado');

Route::get('/respuesta_opcion_simple/{cod_cae}/{id_pregunta}','CandidatoController@respuesta_opcion_simple');

Route::get('/respuesta_opcion_multiple/{cod_cae}/{id_pregunta}','CandidatoController@respuesta_opcion_multiple');

Route::get('/examen/lista_terminados/{id}','CalificacionExamenController@lista_terminados');
Route::get('/entrevista/lista_en','EntrevistaController@lista_en');
Route::get('/usuario/ver_asignar_vacante/{cod_u}','UsuarioController@ver_asignar_vacante');
Route::post('/usuario/asignar_vacante','UsuarioController@asignar_vacante');