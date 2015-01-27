@extends('layouts.master')
@section ('title') Asistencias3000 - {{$materia->nombre}} @stop
@section('content')
    <!-- Page Content -->
<div class="row">
    <div class="col-md-3 " > </div>
   <div class="col-md-6">
       <h2 class="page-header" id="titulo_registrar_curso">Horario de "{{$materia->nombre}}"</h2>
       {{ Form::open(array('route' => 'storeHorario', 'method' => 'POST'), array('role' => 'form', 'id' => 'Horario')) }}
       {{ Form::hidden('seccion_id',$seccion_id, array('id' => 'id')) }}
       <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Fecha y Hora</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($horario as $horarios)
                <tr class="odd gradeX">
                    <td>{{ $horarios->id }}</td>
                    <td>{{ $horarios->fecha_hora }}</td>
                    <td class="center">
                        <a href="{{URL::to('director/materias/'.$materia->id.'/secciones/'.$seccion_id.'/horario/'.$horarios->id.'/eliminar')}}" class="btn btn-danger btn-xs btn-block" role="button">
                        <span class="glyphicon glyphicon-remove"></span>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td>Nuevo</td>
                    <td>
                        {{ Form::input('date', 'fecha_hora', null, ['class' => 'form-control', 'placeholder' => 'Date']) }}
                        {{ Form::text('hora', null, array('class' => 'form-control','placeholder' => '15:00:00')) }}
                    </td>
                    <td>{{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn btn-success btn-block', 'id' => 'boton_guardar')) }}</td>
                </tr>
            </tbody>
        </table>
       {{ Form::close() }}
    </div>
</div>

@stop

@section('page_scripts')

@stop
