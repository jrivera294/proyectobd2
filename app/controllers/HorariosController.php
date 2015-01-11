<?php

class HorariosController extends BaseController {

    public function index($seccion_id)
	{
            /* Acomodar seccion_id */
            $horario = Horarios::where('seccion_id', '=', $seccion_id)->get();
            $seccion = Seccion::find($seccion_id);
            $materia = Materia::find($seccion->materia_id);
            return View::make('pages/horario/horario_seccion')->with('horario',$horario)->with('materia',$materia);
	}


     public function store(){
        $horario = new Horarios;

        // Obtener los campos ingresados en la vista
        $data = Input::all();

        if ($horario->isValid($data,false)){
            // Si la data es valida se la asignamos al Horario
            $horario->fill($data);

            // Guardamos el Horario
            $horario->save();

            // Vamos a la página de horarioMateria
            return Redirect::route('horarioMateria')
                        ->with('tipo_error', 'success');
        }else{
            return Redirect::route('horarioMateria')
                ->withInput()
                ->withErrors($horario->errors)
                ->with('error_flag',true);
        }
    }

    public function eliminarHorario($id){
        $horario = Horarios::find($id);

        $horario->delete();

        return Redirect::route('horarioMateria');
    }

}
