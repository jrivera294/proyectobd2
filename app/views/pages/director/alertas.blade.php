@extends('layouts.master')
@section ('title') Asistencias3000 - Alertas @stop
@section('content')
    <!-- Page Content -->
           <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <h3>Alertas</h3>
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                    <p>Mostrar alertas:</p>
                    <select id="tipo_alertas" class="form-control">
                        <option VALUE="{{ URL::action('alertas', [0]) }}"
                        @if($tipo_alertas == 0)
                            SELECTED
                        @endif
                        >Pendientes</option>
                        <option VALUE="{{ URL::action('alertas', [1]) }}"
                        @if($tipo_alertas == 1)
                            SELECTED
                        @endif
                        >Descartadas</option>
                    </select>
                </div>
            </div>
            <div class="row">
               <hr>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <table class="table table-bordered">
                        <tr>
                            <th>Tipo usuario</th>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Mensaje de alerta</th>
                            <th>Materia</th>
                            <th>Seccion</th>
                        </tr>
                        @if(!is_null($alertas))
                        @foreach ($alertas as $alerta)
                        @if($alerta->cod_alerta==1)
                        <tr class="warning">
                        @elseif($alerta->cod_alerta==2)
                        <tr class="danger">
                        @else
                        <tr>
                        @endif
                           @if($alerta->role==1)
                               <td>Alumno</td>
                           @elseif($alerta->role==2)
                               <td>Profesor</td>
                           @else
                               <td>Desconocido</td>
                           @endif
                            <td>{{$alerta->cedula}}</td>
                            <td>{{$alerta->nombre}}</td>
                            <td>{{$alerta->apellido}}</td>
                            <td>
                            @if($alerta->cod_alerta==1)
                                Ha sobrepasado el 20% de inasistencias
                            @elseif($alerta->cod_alerta==2)
                                Ha sobrepasado el 30% de inasistencias
                            @endif
                            </td>
                            <td>{{$alerta->materia}}</td>
                            <td>{{$alerta->seccion}}</td>
                            @if($alerta->leido == 0)
                            <td>
                                <a href="{{ URL::action('DirectorController@descartarAlerta', [$alerta->id]) }}" class="btn btn-danger btn-xs" role="button">X</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                        @endif
                    </table>
                    <div class="col-md-8"></div>
                    <div class="col-md-4">

                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
@stop

@section('page_scripts')
   <script>
    $(function(){
      $('#tipo_alertas').bind('change', function () {
          var url = $(this).val();
          if (url) {
              window.location = url;
          }
          return false;
      });
    });
   </script>
@stop
