<?php

class AuthController extends BaseController {

	public function login()
	{
		return View::make('pages/login');
	}

    public function loginPost()
	{
        $email = Input::get('email');
        $password = Input::get('password');

        if(Auth::attempt(array('email' => $email, 'password' => $password), Input::get('rememberme', 0)))
        {
            return Redirect::to('ejemplo');
        }else{
            return Redirect::to('/login')
                ->with('tipo_error', 'danger')
                ->with('mensaje_error', 'Tu dirección de e-mail o contraseña son incorrectos.')
                ->withInput(Input::except('password'))
                ->with('error_flag',"true");
        }
	}

    public function register()
	{
		return View::make('pages/register');
	}

    public function storeRegister(){
        $user = new User;

        // Obtener los campos ingresados en la vista
        $data = Input::all();

        if ($user->isValid($data,false)){
            $data['password'] = Hash::make($data['password']);

            // Si la data es valida se la asignamos al usuario
            $user->fill($data);

            // Guardamos el usuario
            $user->save();

            // Vamos a la página de login
            return Redirect::to('login')
                        ->with('mensaje_error', 'Registro completado exitosamente, ahora puedes iniciar sesión.')
                        ->with('tipo_error', 'success');
        }else{
            return Redirect::route('register')
                ->withInput()
                ->withErrors($user->errors)
                ->with('error_flag',true);
        }
    }

}
