<?php

class ProfesorController extends BaseController {

    public function index()
	{
		return View::make('pages/profesor/profesorHome');
	}

    public function materias()
	{
        $materias = [
['Informática','Bases de datos 2','1'],
['Informática','Computación Gráfica','2']
        ];

		return View::make('pages/profesor/materias')->with('materias', $materias);
	}

    public function asistencias($id)
	{
        $alumnos = [
['1234','Jose','Rivera','1'],
['1235122','Yanir','Castillo','2']
        ];

        $fechas = ['fecha1','fecha2'];

		return View::make('pages/profesor/asistencias')
            ->with('alumnos', $alumnos)
            ->with('fechas', $fechas);
	}

}
