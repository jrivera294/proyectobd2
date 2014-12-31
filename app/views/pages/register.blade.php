@extends('layouts.login')
@section ('title') Asistencias3000 - Register @stop
@section('content')
    <!-- Page Content --><br>
<div class="col-md-2"></div>
            <div class="col-md-8">
                <h2>Formulario de registro:</h2><hr>
                {{ Form::open(array('route' => 'register', 'method' => 'POST', 'id' => 'laravel_form'), array('role' => 'form')) }}
                    <div class="row">
                        <div class="form-group col-md-6">
                            {{ Form::label('nombre', 'Nombre:') }}
                            {{ Form::text('nombre', null, array('placeholder' => '', 'class' => 'form-control')) }}
                        </div>
                        <div class="form-group col-md-6">
                            {{ Form::label('apellido', 'Apellido:') }}
                            {{ Form::text('apellido', null, array('placeholder' => '', 'class' => 'form-control')) }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            {{ Form::label('ci', 'Cédula:') }}
                            {{ Form::text('ci', null, array('placeholder' => 'Ejemplo: V-12345678', 'class' => 'form-control')) }}
                        </div>
                        <div class="col-md-6">
                            {{ Form::label('sexo', 'Sexo:') }}
                            {{ Form::select('sexo', array('M' => 'Masculino', 'F' => 'Femenino', 'O' => 'Otro'), null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            {{ Form::label('telefono', 'Teléfono:') }}
                            {{ Form::text('telefono', null, array('placeholder' => '', 'class' => 'form-control')) }}
                        </div>
                        <div class="form-group col-md-6">
                            {{ Form::label('fecha_nac', 'Fecha de nacimiento:') }}
                            {{ Form::input('date', 'fecha_nac', null, ['class' => 'form-control', 'placeholder' => 'Date']) }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            {{ Form::label('direccion', 'Dirección:') }}
                            {{ Form::text('direccion', null, array('placeholder' => '', 'id' => 'direccion','class' => 'form-control')) }}
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="form-group col-md-6">
                            {{ Form::label('email', 'E-mail:') }}
                            {{ Form::text('email', null, array('placeholder' => '', 'class' => 'form-control')) }}
                        </div>
                        <div class="form-group col-md-6">
                            {{ Form::label('email_confirmation', 'Confirmar E-mail:') }}
                            {{ Form::text('email_confirmation', null, array('placeholder' => '', 'class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            {{ Form::label('password', 'Contraseña:') }}
                            {{ Form::password('password', array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group col-md-6">
                            {{ Form::label('password_confirmation', 'Confirmar contraseña:') }}
                            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            {{ Form::button('Registrar', array('type' => 'submit', 'class' => 'btn btn-success btn-block')) }}
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-danger btn-block" onClick="window.history.back();" >Cancelar</button>
                        </div>
                    </div>


                {{ Form::close() }}
            </div>
<div class="col-md-2"></div>
@stop

@section('page_scripts')

@stop
