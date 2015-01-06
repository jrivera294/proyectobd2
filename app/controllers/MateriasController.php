<?php

class MateriasController extends BaseController {

    public function index()
	{   
                $materia = Materia::all();
		return View::make('pages/director/materias/tablaMaterias')->with('materia',$materia);
	}

}
