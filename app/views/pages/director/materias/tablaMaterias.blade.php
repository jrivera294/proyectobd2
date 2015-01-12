@extends('layouts.master')
@section ('title') Asistencias3000 - Ejemplo @stop
@section('content')
    <!-- Page Content -->
    
    <div class="row">
        <div class="col-md-1"></div>
            <div class="col-md-7">
                 <h2 class="page-header" id="titulo_registrar_curso">Materias</h2>
                 {{ Form::open(array('route' => 'asignar_materia', 'method' => 'POST'), array('role' => 'form', 'id' => 'Horario')) }}
                 {{ Form::hidden('carrera_id',$carrera, array('id' => 'id')) }}
                <table WIDTH="100" class="table table-condensed table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>CRN</th>
                            <th>Numero de clases</th>
                            <th>Historial</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materia as $materias)
                        <tr class="odd gradeX">
                            <td>{{ $materias->id }}</td>
                            <td>{{ $materias->nombre }}</td>
                            <td>{{ $materias->crn }}</td>
                            <td>{{ $materias->nro_clases }}</td>
                            <td>{{ $materias->Historial }}
                                <a href="{{URL::to('director/materias/'.$materias->id.'/secciones')}}" class="btn btn-primary btn-sm btn-block" role="button">
                                <span class="glyphicon glyphicon-list-alt"></span>
                            </td>
                            <td class="center">
                                <a href="{{URL::to('director/materias/'.$materias->id.'/eliminar')}}" class="btn btn-danger btn-xs btn-block" role="button">
                                <span class="glyphicon glyphicon-remove"></span>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>Nuevo</td>
                            <td>{{ Form::text('nombre', null, array('class' => 'form-control')) }}</td>
                            <td>{{ Form::text('crn', null, array('class' => 'form-control')) }}</td>
                            <td>{{ Form::text('nro_clases', null, array('class' => 'form-control')) }}</td>
                            <td>{{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn btn-success btn-block', 'id' => 'boton_guardar')) }}</td>
                        </tr>
                    </tbody>
                 </table>
                 {{ Form::close() }}
            </div>
        <div class="col-md-1"></div>
    </div>


            
@stop

@section('page_scripts')

@stop
