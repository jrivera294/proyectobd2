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

            $seccion = new Seccion;

            // Obtener los campos ingresados en la vista
            $data = Input::all();

            if ($data->isValid($data,false)){

                // Si la data es valida se la asignamos al usuario
                $seccion->fill($data);

                // Guardamos el usuario
                $seccion->save();

                // Vamos a la página de login
                return Redirect::to('secciones_materias')
                            ->with('mensaje_error', 'Seccion creada exitosamente.')
                            ->with('tipo_error', 'success');
            }else{
                return Redirect::route('seleccionarProfesor')
                    ->withInput()
                    ->withErrors($seccion->errors)
                    ->with('error_flag',true);
            }

   }

        public function asistencias($fecha=null){
        $carrera_id = Carrera::getCarreraByDirector(Auth::user()->id)->id;

        $profesores = NULL;
        $fechas = Carrera::getFechasCarrera($carrera_id);

        //$fecha = new DateTime(Horarios::find($fecha)->fecha_hora);

        if($fecha!=null){
            $profesores = Seccion::getAsistenciasProfesores($fecha,$carrera_id);
            return $profesores;
        }

        return View::make('pages/director/asistencias')
            ->with('profesores', $profesores)
            ->with('fechas', $fechas)
            ->with('fecha_id',$fecha);
    }
        
}
