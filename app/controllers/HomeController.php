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
		$user=Sentry::getUser();
		$admin=Sentry::findGroupByName('admin');
		$reguler=Sentry::findGroupByName('reguler');
	if ($user->inGroup($admin)) {
		$this->layout->content=View::make('dashboard.index')->withTitle('Dashboard');	
	}

	if ($user->inGroup($reguler)) {
		$this->layout->content=View::make('dashboard.reguler')->withTitle('Dashboard');
	}
		
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
	} catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
		return Redirect::back()->with('errorMessage','Password Anda Salah.');
	} catch (Exception $e) {
		return Redirect::back()->with('errorMessage',trans('Akun dengan email tersebut tidak terdaftar dalam sistem kami'));
	} 


	}

	public function logout()
	{
		Sentry::logout();
		return Redirect::to('login')->with('successMessage','Anda Berhasil Logout');
	}
}