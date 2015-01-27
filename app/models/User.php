<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Atributos de la tabla
	 *
	 */
	protected $hidden = array('password','password_confirmation', 'remember_token');

    protected $fillable = array('email','password','cedula','sexo','nombre','apellido','direccion','telefono','fecha_nac');
    protected $guarded = array('id');
    public $errors;
    /* PENDIENTE */
     public function Seccion()
    {
        return $this->belongsToMany('seccion');
    }
    /********/
    public function isValid($data)
    {
        $rules = array(
            'email' => 'required|email|confirmed|max:50|unique:users,email',
            'cedula' => 'required|unique:users,cedula',
            'password'  => 'required|min:6|max:30|confirmed',
            'nombre' => 'required|max:45',
            'apellido'  => 'required|max:45',
            'sexo' => 'required',
            'direccion' => 'required|max:150',
            'telefono' => "required|numeric"
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

    public static function getAlumnos($seccion){

        $results = DB::select(
            DB::raw("SELECT DISTINCT id, nombre, apellido, cedula
                     FROM users, alumno_cursa_materia
                     WHERE users.id NOT IN(SELECT DISTINCT id
					  FROM users, alumno_cursa_materia
					  WHERE alumno_cursa_materia.seccion_id = ".$seccion." AND
						    alumno_cursa_materia.alumno_id = users.id AND
							users.role = 1)
       AND users.role = 1;"));

        return $results;

    }


    public static function LuilloAlumnos($alumno, $seccion){

        DB::insert(
            DB::raw(" INSERT INTO alumno_cursa_materia (alumno_id,seccion_id)
                      VALUES (".$alumno.", ".$seccion.") "));


    }

    public static function porcentajeInasistencias($id){
        $results = DB::select(
            DB::raw("SELECT f_ina_total(".$id.") as porcentaje"));
        return $results;
    }



}
