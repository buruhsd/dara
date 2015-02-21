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

	return View::make('tamu.index');
});

Route::get('/dashboard','HomeController@dashboard');
Route::get('login', array('tamu.login', 'uses'=>'TamuController@login'));
Route::post('authenticate', 'HomeController@authenticate');