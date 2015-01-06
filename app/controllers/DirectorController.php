<?php

class DirectorController extends BaseController {

    public function index()
	{
		return View::make('pages/director/directorHome');
	}

        public function secciones() {
             /* Acomodar materia_id */
            $seccion = Seccion::where('materia_id', '=', 1)->get();
            $materia = Materia::find(1);
            return View::make('pages/director/seccion/secciones_materia')->with('seccion',$seccion)->with('materia',$materia);
	
        }
}
