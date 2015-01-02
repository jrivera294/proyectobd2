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

}
