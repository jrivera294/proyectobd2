<?php

class DirectorController extends BaseController {

    public function index()
	{
		return View::make('pages/director/directorHome');
	}


        public function  seleccion_de_profesor ($id)
            {
                $profesores = User::where('role', '=', 2)->get();;
                
                $periodo = Periodo::lists('Fecha_ini','id');
                
                
                
                return View::make('pages/director/materias/tablaProfesores')->with('profesores',$profesores)->with('id',$id)->with('periodo',$periodo);
            }
        
       public function  asignar_profesor ()
            {
                return Input::all();
            }
 
       public function secciones() {
             /* Acomodar materia_id */
            $seccion = Seccion::where('materia_id', '=', 1)->get();
            $materia = Materia::find(1);
            return View::make('pages/director/seccion/secciones_materia')->with('seccion',$seccion)->with('materia',$materia);	
        }
            
}
