<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Carrera extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'carrera';

    protected $fillable = array('nombre','director_id');
    protected $guarded = array('id');
    public $errors;

    public function materia(){
            return $this->HasMany('Materia');
    }
    
    public function isValid($data)
    {
        $rules = array(
            'nombre' => 'required',
            'director_id' => 'required'
        );

        $validator = Validator::make($data, $rules);

        if ($validator->passes())
        {
            return true;
        }else{
            $this->errors = $validator->errors();
            return false;
        }
    }

    public static function getCarreraByDirector($director_id){
        return Carrera::where('director_id','=',$director_id)->first();
    }

    public static function getFechasCarrera($carrera_id){
        $results = DB::select(
            DB::raw("SELECT horario.id, horario.fecha_hora, horario.seccion_id
                FROM materia
                    LEFT JOIN seccion ON seccion.materia_id = materia.id
                    LEFT JOIN horario ON horario.seccion_id = seccion.id
                WHERE materia.carrera_id = ".$carrera_id));
        return $results;
    }
}
