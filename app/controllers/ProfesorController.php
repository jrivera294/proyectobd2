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
            $alumnos = Seccion::getAlumnosSeccion($id,$fecha);
        }

        return View::make('pages/profesor/asistencias')
            ->with('alumnos', $alumnos)
            ->with('fechas', $fechas)
            ->with('seccion_id',$id)
            ->with('fecha_id',$fecha);
	}

    public function asistenciasPost(){
        $asistencias = Input::except(array('_token', 'seccion_id','horario_id'));
        foreach ($asistencias as $user_id => $asistencia){
            if($asistencia!=(-1)){
                $data = Usuarios_tienen_asistencias::where('user_id','=',$user_id)
                    ->where('seccion_id','=',Input::get('seccion_id'))
                    ->where('horario_id','=',Input::get('horario_id'))->first();
                if(is_null($data)){
                    $alumno = new Usuarios_tienen_asistencias;
                    $data = array(
                        'user_id' => $user_id,
                        'asistencia' => $asistencia,
                        'seccion_id' => Input::get('seccion_id'),
                        'horario_id' => Input::get('horario_id')
                    );
                    $alumno->fill($data);
                }else{
                    $alumno = Usuarios_tienen_asistencias::find($data->id);
                    $alumno->asistencia = $asistencia;
                }
                $alumno->save();
            }
        }

        return Redirect::route('profesor.asistencias',array(Input::get('seccion_id'),Input::get('horario_id')))
            ->with('mensaje_error', 'Asistencias almacenadas correctamente')
            ->with('tipo_error', 'success');
    }

    public function asistenciasTodos($id,$fecha,$asistencia){
        return $asistencia;

        return Redirect::route('profesor.asistencias',array(Input::get('seccion_id'),Input::get('horario_id')))
            ->with('mensaje_error', 'Asistencias almacenadas correctamente')
            ->with('tipo_error', 'success');
    }
}
