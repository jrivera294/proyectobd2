<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('pages/ejemplo');
});

/* Autenticacion */
Route::get('/login', array('uses'=>'AuthController@login','as' => 'login'));
Route::post('/loginPost', array('uses'=>'AuthController@loginPost','as' => 'loginPost'));
Route::get('/register', array('uses'=>'AuthController@register','as' => 'register'));
Route::post('/storeRegister', array('uses'=>'AuthController@storeRegister','as' => 'storeRegister'));

/* Páginas autorizadas para usuarios con rol Profesor */
Route::group(array('before' => 'auth|roleProfesor', 'prefix' => 'profesor'), function()
{
    Route::get('/profesorHome', array('uses'=>'ProfesorController@index','as' => 'profesorHome'));
    Route::get('/materias', array('uses'=>'ProfesorController@materias','as' => 'profesor.materias'));
    Route::get('/materias/{id}/asistencias', array('uses'=>'ProfesorController@asistencias','as' => 'profesor.asistencias'));
});

/* Páginas autorizadas para usuarios con rol Director */
Route::group(array('before' => 'auth|roleDirector', 'prefix' => 'director'), function()
{
    Route::get('/directorHome', array('uses'=>'DirectorController@index','as' => 'directorHome'));
    /* Cambiar la ruta a /materias/{id}/secciones */
    Route::get('/secciones', array('uses'=>'DirectorController@secciones','as' => 'director.secciones'));
});

/* Páginas autorizadas para cuadlquier usuario */
Route::group(array('before' => 'auth'), function()
{
    Route::get('/logout', array('uses'=>'AuthController@logOut','as' => 'logout'));
});

/* Horario */
Route::get('/horario', array('uses'=>'HorariosController@index','as' => 'horarioMateria'));
Route::post('/horario/storeHorario', array('uses'=>'HorariosController@store','as' => 'storeHorario'));
Route::get('/horario/storeHorario/{id}', array('uses'=>'HorariosController@eliminarHorario','as' => 'eliminarHorario'));