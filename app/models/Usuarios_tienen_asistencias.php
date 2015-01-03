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

    protected $fillable = array('user_id','asistencia','seccion_id','horario_id');
    protected $guarded = array('id');
    public $errors;

    
    public function isValid($data)
    {
        $rules = array(
            'user_id' => 'required',
            'asistencia' => 'required',
            'seccion_id' => 'required',
            'horario_id' => 'required'
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
