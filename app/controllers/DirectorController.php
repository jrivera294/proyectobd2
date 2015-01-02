<?php

class DirectorController extends BaseController {

    public function index()
	{
		return View::make('pages/director/directorHome');
	}


}
