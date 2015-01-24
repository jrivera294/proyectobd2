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

            if ($seccion->isValid($data,false)){

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

        if($fecha!=null){
            $profesores = Seccion::getAsistenciasProfesores($fecha,$carrera_id);
            //return $profesores;
        }

        return View::make('pages/director/asistencias')
            ->with('profesores', $profesores)
            ->with('fechas', $fechas)
            ->with('fecha',$fecha);
    }

    public function asistenciasPost(){
        $asistencias = Input::except(array('_token', 'seccion_id','horario_id','profesor_id','fecha'));
        $profesor_id = Input::get('profesor_id');
        $seccion_id = Input::get('seccion_id');
        $horario_id = Input::get('horario_id');

        foreach ($asistencias as $i => $asistencia){

            if($asistencia!=(-1)){
                $data = Usuarios_tienen_asistencias::where('user_id','=',$profesor_id[$i-1])
                    ->where('seccion_id','=',$seccion_id[$i-1])
                    ->where('horario_id','=',$horario_id[$i-1])->first();
                if(is_null($data)){
                    $alumno = new Usuarios_tienen_asistencias;
                    $data = array(
                        'user_id' => $profesor_id[$i-1],
                        'asistencia' => $asistencia,
                        'seccion_id' => $seccion_id[$i-1],
                        'horario_id' => $horario_id[$i-1]
                    );
                    $alumno->fill($data);
                }else{
                    $alumno = Usuarios_tienen_asistencias::find($data->id);
                    $alumno->asistencia = $asistencia;
                }
                $alumno->save();
            }
        }

        return Redirect::route('director.asistencias',array(Input::get('fecha')))
            ->with('mensaje_error', 'Asistencias almacenadas correctamente')
            ->with('tipo_error', 'success');
    }

    public function alertas($leido=null){
        if($leido==null){
            $leido = 0;
        }if($leido == 0 || $leido == 1){

        }else{
            App::abort(404);
        }

        $alertas = Alerta::getAlertasByCarrera(Auth::user()->id,$leido);
        return View::make('pages/director/alertas')
            ->with('alertas',$alertas)
            ->with('tipo_alertas',$leido);
    }

    public function descartarAlerta($alerta_id){
        $alerta = Alerta::find($alerta_id);
        if (is_null ($alerta))
        {
            App::abort(404);
        }
        $alerta->leido = 1;
        $alerta->save();
        return Redirect::route('alertas')
            ->with('mensaje_error', 'Alerta descartada')
            ->with('tipo_error', 'success');
    }

         public function secciones($materia_id) {
            $seccion = Seccion::getSeccionesMateria($materia_id); 
            $materia = Materia::find($materia_id);
            return View::make('pages/director/seccion/secciones_materia')->with('seccion',$seccion)->with('materia',$materia);
         }
            
       public function eliminarSeccion($materias_id,$id){
            $seccion = Seccion::find($id);

            $seccion->delete();

            return Redirect::to('director/materias/'.$materias_id.'/secciones/');
       } 


    public function alumnosMateriasPerdidas(){
        $alumnos = Materia::getAlumnosConMateriasPerdidas();

        return View::make('pages/director/estadisticas/alumnosMatPer')
            ->with('alumnos',$alumnos);
    }

    public function porcentajeInasistenciasProfesores(){
        $profesores = Carrera::getProfesoresByCarrera(Carrera::getCarreraByDirector(Auth::user()->id)->id);

        foreach($profesores as $profesor){
            $profesor->porcentaje = User::porcentajeInasistencias($profesor->id);
        }

        return View::make('pages/director/estadisticas/porcentajeInaProf')
            ->with('profesores',$profesores);
    }

    public function porcentajeInasistenciasAlumnos(){
        $alumnos = Carrera::getAlumnosByCarrera(Carrera::getCarreraByDirector(Auth::user()->id)->id);

        foreach($alumnos as $alumno){
            $alumno->porcentaje = User::porcentajeInasistencias($alumno->id);
        }

        return View::make('pages/director/estadisticas/porcentajeInaAlu')
            ->with('alumnos',$alumnos);
    }

       public function alumnos_seccion($materia_id,$seccion_id){
           $seccion = Seccion::find($seccion_id);
           $alumnos = $seccion->getAlumnos($seccion_id);
           $materia = Materia::find($materia_id);
           return View::make('pages/director/seccion/alumnos_seccion')
                   ->with('alumnos',$alumnos)
                   ->with('materia',$materia)
                   ->with('secciones',$seccion);
       }
       public function eliminar_alumnoS($materias_id,$S_id,$alumno_id){
            Seccion::deleteAlumnos($S_id,$alumno_id);

            return Redirect::to('director/materias/'.$materias_id.'/secciones/'.$S_id.'/alumnos');
       }
       
         
       public function seleccionar_alumnos($materia,$seccion){
           
           $alumnos = User::getAlumnos($seccion);
           return View::make('pages/director/materias/tablaAlumnos')->with('alumnos',$alumnos)->with('id',$seccion);
           
       }
       
        public function  asignar_alumnos ()
        {

            // Obtener los campos ingresados en la vista
            $data = Input::all();
           // return $data ; 
            
            foreach ($data['alumno_id'] as $datos)
            {    
               User::agregar_Alumnos($datos, $data['seccion']);
            }
            $seccion = Seccion::find($data['seccion']);
            
            return Redirect::to('director/materias/'.$seccion->materia_id.'/secciones/'.$data['seccion'].'/alumnos');
        }
       

}
