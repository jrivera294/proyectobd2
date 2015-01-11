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
 
       public function secciones($materia_id) {
            $seccion = Seccion::getSeccionesMateria($materia_id); 
            $materia = Materia::find($materia_id);
            return View::make('pages/director/seccion/secciones_materia')->with('seccion',$seccion)->with('materia',$materia);	
        }
            
       public function eliminarSeccion($id){
            $seccion = Seccion::find($id);

            $seccion->delete();

            return Redirect::route('director.secciones');
       } 
}
