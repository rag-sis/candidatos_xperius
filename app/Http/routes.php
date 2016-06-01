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
    return view('inicio');
});

Route::get('/login/login', 'UsuarioController@login');
Route::get('/usuario/lista', 'UsuarioController@lista');
Route::get('/usuario/crear','UsuarioController@crear');
Route::post('/usuario/almacenar','UsuarioController@almacenar');
Route::get('/usuario/eliminar/{id}', 'UsuarioController@eliminar');