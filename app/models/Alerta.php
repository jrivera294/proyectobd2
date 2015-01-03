<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Alerta extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'alerta';

    protected $fillable = array('user_id','cod_alerta','leido','seccion_id');
    public $errors;

    public function isValid($data)
    {
        $rules = array(
            'user_id' => 'required',
            'cod_alerta' => 'required',
            'leido' => 'required',
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
