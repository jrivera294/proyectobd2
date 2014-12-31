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
