<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Seccion extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'seccion';

    protected $fillable = array('profesor_id','materia_id','periodo_id');
    protected $guarded = array('id');
    public $errors;

    public function horarios(){
            return $this->HasMany('Horarios');
    }
    /* PENDIENTE */
    public function User()
    {
        return $this->belongsToMany('User');
    }
    /*****/
    public function isValid($data)
    {
        $rules = array(
            'profesor_id' => 'required',
            'materia_id' => 'required',
            'periodo_id' => 'required'
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

    public static function getSeccionesProfesor($profesor_id){
        $results = DB::select(
            DB::raw("SELECT carrera.nombre AS nombreCarrera, materia.nombre AS nombreMateria, seccion.id
                FROM seccion
                    LEFT JOIN materia ON materia.id = seccion.materia_id
                    LEFT JOIN carrera ON carrera.id = materia.carrera_id
                WHERE seccion.profesor_id = ".$profesor_id));
        return $results;
    }

    public static function getAlumnosSeccion($seccion_id){
        $results = DB::select(
            DB::raw("SELECT users.id, users.cedula, users.nombre, users.apellido
                FROM alumno_cursa_materia
                    LEFT JOIN users ON alumno_cursa_materia.alumno_id = users.id
                WHERE alumno_cursa_materia.seccion_id = ".$seccion_id));
        return $results;
    }

}
