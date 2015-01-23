<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Materia extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'materia';

    protected $fillable = array('carrera_id','nombre','crn','nro_clases');
    protected $guarded = array('id');
    public $errors;

    public function carrera(){
         return $this->belongsTo('Carrera');
    }
    
    public function isValid($data)
    {
        $rules = array(
            'carrera_id' => 'required',
            'nombre' => 'required',
            'crn' => 'required',
            'nro_clases' => 'required'
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
        
     public static function getIdCarrera($director_id){
        $results = DB::select(
            DB::raw("SELECT carrera.id 
                    FROM carrera 
                    WHERE carrera.director_id =  ".$director_id));
        return $results;
    }
    
    public static function getAlumnosConMateriasPerdidas(){
        $results = DB::select(
            DB::raw("SELECT *
                    FROM v_listado_alumnos"));
        return $results;
    }

}
