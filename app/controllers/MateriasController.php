<?php

class MateriasController extends BaseController {

    public function index()
	{   
            $materia = Materia::all();
            $director_id = auth::User()->id;
            $carrera = Carrera::getCarreraByDirector($director_id);
            return View::make('pages/director/materias/tablaMaterias')->with('materia',$materia)->with('carrera',$carrera->id);
	}

        
    public function  asignar_materia()
        {
     
            $materia = new Materia;
            // Obtener los campos ingresados en la vista
            $data = Input::all();

            if ($materia->isValid($data,false)){
                
                
                
                // Si la data es valida se la asignamos al usuario
                $materia->fill($data);
                
                
                // Guardamos el usuario
                $materia->save();

                // Vamos a la página de login
                return Redirect::route('materias')
                            ->with('mensaje_error', 'Seccion creada exitosamente.')
                            ->with('tipo_error', 'success');
            }else{
                return Redirect::route('materias')
                    ->withInput()
                    ->withErrors($materia->errors)
                    ->with('error_flag',true);
            }
            
        }
        
         public function eliminarMateria($id){
            $materia = Materia::find($id);

            $materia->delete();

            return Redirect::route('materias');
       } 
}
