<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	protected $layout='tampil.master';
	public function dashboard()
	{
		$this->layout->content=View::make('dashboard.index')->withTitle('Dashboard');
	}

	public function authenticate()
	{
	$credentials=array(
		'email'=> Input::get('email'),
		'password'=>Input::get('password'),
	);

	try {
		$user=Sentry::authenticate($credentials,false);
		
		return Redirect::to('dashboard');
	} catch (Exception $e) {
		return Redirect::back();
	}

}
}