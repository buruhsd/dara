<?php

class MemberController extends BaseController {

public function __construct()
{
	$this->beforeFilter('regulerUser');
}
public function profil()
{
	$user=Sentry::getUser();
	return View::make('profil.show')->withTitle('Profil')->withUser($user);
}

?>