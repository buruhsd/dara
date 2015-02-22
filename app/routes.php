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
Route::get('logout', 'HomeController@logout');
Route::get('signup', array('as'=>'home.signup', 'uses'=>'TamuController@signup'));
Route::post('register', array('as'=>'tamu.register', 'uses'=>'TamuController@register'));
Route::get('activate', array('as'=>'user.activate', 'uses'=>'TamuController@activate'));