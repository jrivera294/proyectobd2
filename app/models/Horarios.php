<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Horarios extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'horario';

    protected $fillable = array('fecha_hora','seccion_id');
    protected $guarded = array('id');
    public $errors;

    public function seccion(){
         return $this->belongsTo('Seccion');
    }
    
    public function isValid($data)
    {
        $rules = array(
            'fecha_hora' => 'required',
            'seccion_id' => 'required'
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
