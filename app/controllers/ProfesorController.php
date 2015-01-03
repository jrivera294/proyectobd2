<?php

class ProfesorController extends BaseController {

    public function index()
	{
		return View::make('pages/profesor/profesorHome');
	}

    public function materias()
	{
		return View::make('pages/profesor/materias');
	}

}
