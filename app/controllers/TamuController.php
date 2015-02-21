<?php

class TamuController extends BaseController {

	protected $layout ='tampil.tamu';

	public function login()
	{
		$this->layout->content=View::make('tamu.login');
	}
}