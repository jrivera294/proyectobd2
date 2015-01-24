@extends('layouts.master')
@section ('title') Asistencias3000 - Ejemplo @stop
@section('content')
    <!-- Page Content -->

    <div class="row">
        <div class="col-md-1"></div>
            <div class="col-md-10">
                <h2 class="page-header" id="titulo_registrar_curso">Alumnos</h2>

                {{ Form::open(array('route' => 'asignar_alumnos', 'method' => 'POST', 'id' => 'laravel_form'), array('role' => 'form')) }}


                       {{ Form::hidden('seccion', $id) }}

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                       <thead>
                           <tr>
                               <th>Id</th>
                               <th>Nombre</th>
                               <th>Apellido</th>
                               <th>Cedula</th>
                               <th>Seleccion</th>
                           </tr>
                       </thead>
                       <tbody>
                          @foreach ($alumnos as $alumno)
                           <tr class="odd gradeX">
                               <td>{{ $alumno->id }}</td>
                               <td>{{ $alumno->nombre }}</td>
                               <td>{{ $alumno->apellido }}</td>
                               <td>{{ $alumno->cedula }}</td>
                               <td class="center">
                                     {{ Form::checkbox( 'alumno_id[]', $alumno->id ) }}
                               </td>
                           </tr>
                           @endforeach
                       </tbody>
                    </table>

                 <div class="center">
                            {{ Form::button('Aceptar', array('type' => 'submit', 'class' => 'btn btn-primary ')) }}
                        </div>


                {{ Form::close() }}



            </div>
        <div class="col-md-1"></div>
    </div>



@stop

@section('page_scripts')

@stop
