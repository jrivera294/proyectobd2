<?php

class HorariosController extends BaseController {

    public function index($seccion_id)
	{
            $horario = Horarios::where('seccion_id', '=', $seccion_id)->get();
            $seccion = Seccion::find($seccion_id);
            $materia = Materia::find($seccion->materia_id);
            return View::make('pages/horario/horario_seccion')->with('horario',$horario)->with('materia',$materia)->with('seccion_id',$seccion_id);
	}


     public function store(){
        $horario = new Horarios;

        // Obtener los campos ingresados en la vista
        $data = Input::all();
        $seccion = Seccion::find(Input::get('seccion_id'));
        $materias_id = $seccion->materia_id;
        $data = array(
            'seccion_id' => $data['seccion_id'], 
            'fecha_hora' => $data['fecha_hora'].' '.$data['hora']
        );
        //return $data['fecha_hora'];
        if ($horario->isValid($data,false)){
            // Si la data es valida se la asignamos al Horario
            $horario->fill($data);

            // Guardamos el Horario
            $horario->save();

            // Vamos a la página de horarioMateria
             return Redirect::to('director/materias/'.$materias_id.'/secciones/'.Input::get('seccion_id').'/horario')
                        ->with('tipo_error', 'success');
        }else{
            return Redirect::to('director/materias/'.$materias_id.'/secciones/'.Input::get('seccion_id').'/horario')
                ->withInput()
                ->withErrors($horario->errors)
                ->with('error_flag',true);
        }
    }

    public function eliminarHorario($materias_id,$secciones_id,$id){
        $horario = Horarios::find($id);

        $horario->delete();

        return Redirect::to('director/materias/'.$materias_id.'/secciones/'.$secciones_id.'/horario');
    }

}
