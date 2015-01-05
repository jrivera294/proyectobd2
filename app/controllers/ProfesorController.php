<?php

class ProfesorController extends BaseController {

    public function index()
	{
		return View::make('pages/profesor/profesorHome');
	}

    public function materias()
	{

        $materias = Seccion::getSeccionesProfesor(Auth::user()->id);

		return View::make('pages/profesor/materias')->with('materias', $materias);
	}

    public function asistencias($id,$fecha=null)
	{
        $alumnos = NULL;
        $fechas = Horarios::where('seccion_id','=',$id)->get();

        if($fecha!=null){
            $alumnos = Seccion::getAlumnosSeccion($id);
        }

        return View::make('pages/profesor/asistencias')
            ->with('alumnos', $alumnos)
            ->with('fechas', $fechas);
	}

}
