@extends('layouts.master')
@section ('title') Asistencias3000 - {{$materia->nombre}} @stop
@section('content')
    <!-- Page Content -->
<div class="row">
   <div class="col-md-3 " > </div>
   <div class="col-md-6">
       <h2 class="page-header" id="titulo_registrar_curso">Alumnos de "{{$materia->nombre}}"</h2>
       <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre y Apellido</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                <tr class="odd gradeX">
                    <td>{{ $alumno->id }}</td>
                    <td> {{ $alumno->nombre}} {{ $alumno->apellido }}</td>
                    <td class="center">
                        <a href="{{URL::to('director/materias/'.$materia->id.'/secciones/'.$secciones->id.'/alumnos/'.$alumno->id.'/eliminar')}}" class="btn btn-danger btn-xs btn-block" role="button">
                        <span class="glyphicon glyphicon-remove"></span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-7"></div>
    <div class="col-md-2">
        <a href="{{URL::to('director/materias/'.$materia->id.'/secciones/'.$secciones->id.'/seleccionAlumnos')}}" class="btn btn-success btn-xs btn-block" role="button">
           Ingresar alumnos
        </a>
    </div>
</div>
@stop

@section('page_scripts')
@stop
