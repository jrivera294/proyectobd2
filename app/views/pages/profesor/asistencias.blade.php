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
                    <select id="fecha_select" class="form-control">
                        <option VALUE="{{ URL::action('ProfesorController@asistencias', [$seccion_id]) }}"
                        @if($fecha_id==null)
                        SELECTED
                        @endif
                        >Seleccione una fecha</option>
                        @foreach ($fechas as $fecha)
                        <option VALUE="{{ URL::action('ProfesorController@asistencias', [$seccion_id,$fecha->id]) }}"
                        @if($fecha_id == $fecha->id)
                        SELECTED
                        @endif
                        >{{$fecha->fecha_hora}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <p>Marcar todos como:</p>
                    <select id="marcar_asistencias" class="form-control">
                        <option VALUE="{{ URL::action('ProfesorController@asistenciasTodos', [$seccion_id,$fecha->id,'1']) }}">Asistieron</option>
                        <option VALUE="{{ URL::action('ProfesorController@asistenciasTodos', [$seccion_id,$fecha->id,'0']) }}">No asistieron</option>
                        <option VALUE="{{ URL::action('ProfesorController@asistenciasTodos', [$seccion_id,$fecha->id,'2']) }}">De permiso</option>
                    </select>
                </div>
            </div>
            <div class="row">
               <hr>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    {{ Form::open(array('route' => 'asistenciasPost', 'method' => 'POST', 'id' => 'laravel_form'), array('role' => 'form')) }}
                    <input type="hidden" name="horario_id" value="{{$fecha_id}}" >
                    <input type="hidden" name="seccion_id" value="{{$seccion_id}}">
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
                                {{ Form::select($alumno->id, array('-1' => '','0' => 'No asistió', '1' => 'Asistió', '2' => 'De permiso'), $alumno->asistencia, array('class' => 'form-control')) }}
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
   <script>
    $(function(){
      $('#fecha_select').bind('change', function () {
          var url = $(this).val();
          if (url) {
              window.location = url;
          }
          return false;
      });

      $('#marcar_asistencias').bind('change', function () {
          var url = $(this).val();
          if (url) {
              window.location = url;
          }
          return false;
      });
    });
   </script>
@stop
