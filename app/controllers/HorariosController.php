<?php

class HorariosController extends BaseController {

    public function index()
	{
            /* Acomodar seccion_id */
            $horario = Horarios::where('seccion_id', '=', 1)->take(35)->get();
            $seccion = Seccion::find(1);
            $materia = Materia::find($seccion->materia_id);
            return View::make('pages/horario/horario_materia')->with('horario',$horario)->with('materia',$materia);
	}

}
