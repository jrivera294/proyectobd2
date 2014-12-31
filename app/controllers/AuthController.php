<?php

class AuthController extends BaseController {

	public function login()
	{
		return View::make('pages/login');
	}

    public function loginPost()
	{
		return View::make('pages/login');
	}

        public function register()
	{
		return View::make('pages/register');
	}

}
