@extends('layouts.master')
@section ('title') Asistencias3000 - Materias @stop
@section('content')
    <!-- Page Content -->
           <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <h3>Marcar asistencias</h3>

                </div>
                <div class="col-md-3">
                    <p>Fecha:</p>
                    <select class="form-control">
                        <option>Seleccione una fecha</option>
                        @foreach ($fechas as $fecha)
                        <option>{{$fecha->fecha_hora}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <p>Marcar todos como:</p>
                    <select class="form-control">
                        <option>Asistieron</option>
                        <option>No asistieron</option>
                        <option>De permiso</option>
                    </select>
                </div>
            </div>
            <div class="row">
               <hr>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    {{ Form::open(array('route' => 'loginPost', 'method' => 'POST', 'id' => 'laravel_form'), array('role' => 'form')) }}
                    <table class="table table-bordered">
                        <tr>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Asistencia</th>
                        </tr>
                        @if(!is_null($alumnos))
                        @foreach ($alumnos as $alumno)
                        <tr>
                            <td>{{$alumno->cedula}}</td>
                            <td>{{$alumno->nombre}}</td>
                            <td>{{$alumno->apellido}}</td>
                            <td>
                                {{ Form::select($alumno->id, array('0' => 'No asistió', '1' => 'Asistió', '2' => 'De permiso'), null, array('class' => 'form-control')) }}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        {{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn btn-primary btn-block')) }}
                    </div>
                    {{ Form::close() }}
                </div>
                <div class="col-md-1"></div>
            </div>
@stop

@section('page_scripts')

@stop
