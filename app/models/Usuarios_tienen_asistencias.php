<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Usuarios_tienen_asistencias extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuarios_tienen_asistencias';

    protected $fillable = array('user_id','asistencia');
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

}
