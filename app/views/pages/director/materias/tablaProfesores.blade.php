@extends('layouts.master')
@section ('title') Asistencias3000 - Ejemplo @stop
@section('content')
    <!-- Page Content -->
    
    <div class="row">
        <div class="col-md-1"></div>
            <div class="col-md-10">
                <h2 class="page-header" id="titulo_registrar_curso">Profesores</h2>
                
                {{ Form::open(array('route' => 'asignar_profesor', 'method' => 'POST', 'id' => 'laravel_form'), array('role' => 'form')) }}
                
                       {{ Form::select('Periodo', $periodo )}} 
                       
                       {{ Form::hidden('materia', $id) }}
                    
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
                          @foreach ($profesores as $profesor)
                           <tr class="odd gradeX">
                               <td>{{ $profesor->id }}</td>
                               <td>{{ $profesor->nombre }}</td>
                               <td>{{ $profesor->apellido }}</td>
                               <td>{{ $profesor->cedula }}</td>
                               <td class="center">
                                     {{ Form::radio( 'profesor_id', $profesor->id ) }}
                               </td>
                           </tr>
                           @endforeach
                       </tbody>
                    </table>
                
                 <div class="center">
                            {{ Form::button('Aceptar', array('type' => 'submit', 'class' => 'btn btn-primary btn-block')) }}
                        </div>
                
                
                {{ Form::close() }}
                
                
               
            </div>
        <div class="col-md-1"></div>
    </div>


            
@stop

@section('page_scripts')

@stop
