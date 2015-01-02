@extends('layouts.login')
@section ('title') Asistencias3000 - Login @stop
@section('content')
    <!-- Page Content --><br>
<div class="col-md-4"></div>
            <div class="col-md-4">
                {{ Form::open(array('route' => 'loginPost', 'method' => 'POST', 'id' => 'laravel_form'), array('role' => 'form')) }}
                    <h2 class="form-signin-heading">Ingrese sus datos de inicio de sesión</h2>

                    {{ Form::label('email', 'Email:') }}
                    {{ Form::text('email', null, array('placeholder' => '', 'class' => 'form-control')) }}
<br>
                    {{ Form::label('password', 'Contraseña:') }}
                    {{ Form::password('password', array('class' => 'form-control')) }}
<br>
                    {{ Form::label('lblRememberme', 'Recordar contraseña') }}
                    {{ Form::checkbox('rememberme', true) }}
<br><br>

                    <div class="row">
                        <div class="form-group col-md-6">
                            {{ Form::button('Iniciar sesión', array('type' => 'submit', 'class' => 'btn btn-primary btn-block')) }}
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-success btn-block" onClick="window.location='{{ route("register") }}'" >Regístrate</button>
                        </div>
                    </div>

                {{ Form::close() }}
            </div>
<div class="col-md-4"></div>
@stop

@section('page_scripts')

@stop
