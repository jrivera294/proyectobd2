@extends('layouts.master')
@section ('title') Asistencias3000 - Materias @stop
@section('content')
    <!-- Page Content -->
           <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <h3>Materias asignadas</h3>
                    <hr>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <table class="table table-bordered">
                        <tr>
                            <th>Carrera</th>
                            <th>Materia</th>
                            <th>Sección</th>
                            <th>Asistencias</th>
                        </tr>
                        @foreach ($materias as $materia)
                        <tr>
                            <td>{{$materia[0]}}</td>
                            <td>{{$materia[1]}}</td>
                            <td>{{$materia[2]}}</td>
                            <td>
                                <a href="{{URL::to('profesor/materias/'.$materia[2].'/asistencias')}}" class="btn btn-primary btn-sm btn-block" role="button">Ver</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col-md-1"></div>
            </div>
@stop

@section('page_scripts')

@stop
