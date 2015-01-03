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

}
