@extends('layouts.master')  
@section ('title') Asistencias3000 - {{$materia->nombre}} @stop
@section('content')
    <!-- Page Content -->
<div class="row">
    <div class="col-md-3 " > </div>
   <div class="col-md-6">
       <h2 class="page-header" id="titulo_registrar_curso">Horario de "{{$materia->nombre}}"</h2>
       {{ Form::open(array('route' => 'storeHorario', 'method' => 'POST'), array('role' => 'form', 'id' => 'Horario')) }}
       {{ Form::hidden('seccion_id',1, array('id' => 'id')) }}
       <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Fecha y Hora</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($horario as $horarios)
                <tr class="odd gradeX">
                    <td>{{ $horarios->id }}</td>
                    <td>{{ $horarios->fecha_hora }}</td>
                    <td class="center">
                        <button type="button" class="btn btn-block btn-xs btn-danger" data-target="#eliminar" onClick=" setEliminarHorario({{$horarios->id}}); ">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td>Nuevo</td>
                    <td>{{ Form::text('fecha_hora', null, array('class' => 'form-control')) }}</td>
                    <td>{{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn btn-success btn-block', 'id' => 'boton_guardar')) }}</td>
                </tr>
            </tbody>
        </table>
       {{ Form::close() }}
    </div>
</div>

@stop

@section('page_scripts')

<script>

    function setEliminarHorario(idHorario){
        window.location = "{{route('eliminarHorario','');}}"+'/'+idHorario; ;
    }

</script>
@stop
