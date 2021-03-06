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
            DB::raw("SELECT DISTINCT DATE(horario.fecha_hora) AS fecha_hora
                FROM materia
                    LEFT JOIN seccion ON seccion.materia_id = materia.id
                    LEFT JOIN horario ON horario.seccion_id = seccion.id
                WHERE materia.carrera_id = ".$carrera_id));
        return $results;
    }

    public static function getAlumnosByCarrera($carrera_id){
        $results = DB::select(
            DB::raw("SELECT users.id, users.cedula, users.nombre, users.apellido
                FROM materia
                    LEFT JOIN seccion ON seccion.materia_id = materia.id
                    LEFT JOIN alumno_cursa_materia ON alumno_cursa_materia.seccion_id = seccion.id
                    LEFT JOIN users ON users.id = alumno_cursa_materia.alumno_id
                WHERE materia.carrera_id =".$carrera_id."
                AND users.id IS NOT NULL"));
        return $results;
    }

    public static function getProfesoresByCarrera($carrera_id){
        $results = DB::select(
            DB::raw("SELECT users.id, users.cedula, users.nombre, users.apellido
                FROM materia
                    LEFT JOIN seccion ON seccion.materia_id = materia.id
                    LEFT JOIN users ON users.id = seccion.profesor_id
                WHERE materia.carrera_id =".$carrera_id."
                AND users.id IS NOT NULL"));
        return $results;
    }
}
