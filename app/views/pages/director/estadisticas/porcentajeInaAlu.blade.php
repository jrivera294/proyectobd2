@extends('layouts.master')
@section ('title') Asistencias3000 - Estadisticas @stop
@section('content')
    <!-- Page Content -->
           <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <h3>Porcentaje inasistencias de alumnos</h3>
                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-3">

                </div>
            </div>
            <div class="row">
               <hr>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <table class="table table-bordered">
                        <tr>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Porcentaje asistencia</th>
                        </tr>
                        @if(!is_null($alumnos))
                        @foreach ($alumnos as $alumno)
                        <tr>
                            <td>{{$alumno->cedula}}</td>
                            <td>{{$alumno->nombre}}</td>
                            <td>{{$alumno->apellido}}</td>
                            <td>{{$alumno->porcentaje*100}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                    <div class="col-md-8"></div>
                    <div class="col-md-4"></div>
                </div>
                <div class="col-md-1"></div>
            </div>
@stop

@section('page_scripts')
@stop
