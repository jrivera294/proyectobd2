@extends('layouts.master')
@section ('title') Asistencias3000 - Asistencias @stop
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
                        <option VALUE="{{ URL::action('DirectorController@asistencias') }}"
                        @if($fecha==null)
                        SELECTED
                        @endif
                        >Seleccione una fecha</option>
                        @foreach ($fechas as $fechaFor)
                        <option VALUE="{{ URL::action('DirectorController@asistencias', [$fechaFor->fecha_hora]) }}"
                        @if($fecha == $fechaFor->fecha_hora)
                        SELECTED
                        @endif
                        >{{$fechaFor->fecha_hora}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">

                </div>
            </div>
            <div class="row">
               <hr>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    {{ Form::open(array('route' => 'asistenciasPostDir', 'method' => 'POST', 'id' => 'laravel_form'), array('role' => 'form')) }}

                    <table class="table table-bordered">
                        <tr>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Materia</th>
                            <th>Seccion</th>
                            <th>Asistencia</th>
                        </tr>
                        @if(!is_null($profesores))
                        <?php $i = 0; ?>
                        @foreach ($profesores as $profesor)
                        <?php if(is_null($profesor->asistencia)) $profesor->asistencia = (-1); ?>
                        <?php $i++; ?>
                        <tr>
                            <td>{{$profesor->cedula}}</td>
                            <td>{{$profesor->nombre}}</td>
                            <td>{{$profesor->apellido}}</td>
                            <td>{{$profesor->materia}}</td>
                            <td>{{$profesor->seccion}}</td>
                            <td>
                                {{ Form::select($i, array('-1' => '','0' => 'No asistió', '1' => 'Asistió', '2' => 'De permiso'), $profesor->asistencia, array('class' => 'form-control')) }}
                            </td>
                        </tr>
                        {{ Form::hidden('profesor_id[]', $profesor->id) }}
                        {{ Form::hidden('horario_id[]', $profesor->horario_id) }}
                        {{ Form::hidden('seccion_id[]', $profesor->seccion) }}

                        @endforeach
                        @endif
                    </table>
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        {{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn btn-primary btn-block')) }}
                    </div>
                    {{ Form::hidden('fecha', $fecha) }}
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
