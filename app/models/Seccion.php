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

    public static function getAlumnosSeccion($seccion_id,$horario_id){
        $results = DB::select(
            DB::raw("SELECT users.id, users.cedula, users.nombre, users.apellido, usuarios_tienen_asistencias.asistencia
                FROM alumno_cursa_materia
                    LEFT JOIN users
                        ON alumno_cursa_materia.alumno_id = users.id
                    LEFT JOIN usuarios_tienen_asistencias
                        ON usuarios_tienen_asistencias.user_id = users.id
                            AND usuarios_tienen_asistencias.seccion_id = ".$seccion_id."
                            AND usuarios_tienen_asistencias.horario_id = ".$horario_id."
                WHERE alumno_cursa_materia.seccion_id = ".$seccion_id));
        return $results;
    }


    public static function getAsistenciasProfesores($fecha,$carrera_id){
        $results = DB::select(
            DB::raw("SELECT users.id, users.cedula, users.nombre, users.apellido, materia.nombre AS materia, seccion.id AS seccion, usuarios_tienen_asistencias.asistencia, horario.id as horario_id
                FROM materia
                    LEFT JOIN seccion ON seccion.materia_id = materia.id
                    LEFT JOIN users ON users.id = seccion.profesor_id
					LEFT JOIN horario ON horario.seccion_id = seccion.id
					LEFT JOIN usuarios_tienen_asistencias
                        ON usuarios_tienen_asistencias.user_id = users.id
                            AND usuarios_tienen_asistencias.seccion_id = seccion.id
                            AND usuarios_tienen_asistencias.horario_id = horario.id
                WHERE materia.carrera_id = ".$carrera_id)."
                    AND DATE(horario.fecha_hora) = '".$fecha."'");
        return $results;
    }
    public static function getSeccionesMateria($materia_id){
        $results = DB::select(
            DB::raw("SELECT sec.id, usr.nombre, usr.apellido, per.fecha_fin, per.fecha_ini
                     FROM users AS usr, seccion AS sec, periodo AS per
                     WHERE usr.id = sec.profesor_id AND per.id = sec.periodo_id AND sec.materia_id = ".$materia_id));
        return $results;
    }

    public static function marcarTodos($seccion_id,$fecha_id,$asistencia){
        DB::statement(DB::raw('CALL p_asis_completa('.$seccion_id.','.$fecha_id.','.$asistencia.');'));
    }

    public static function getAlumnos($seccion_id){
        $results = DB::select(
                DB::raw("SELECT usr.id, usr.nombre, usr.apellido
                               FROM users AS usr, alumno_cursa_materia
                               WHERE alumno_cursa_materia.alumno_id = usr.id AND
                                     alumno_cursa_materia.seccion_id = " .$seccion_id ));
        return $results;
    }

    public static function deleteAlumnos($seccion_id,$alumno_id){
        $results = DB::select(
                DB::raw("DELETE
                         FROM alumno_cursa_materia
                         WHERE alumno_cursa_materia.seccion_id =  " .$seccion_id. " AND
                               alumno_cursa_materia.alumno_id = " .$alumno_id));
        return $results;
    }
}
