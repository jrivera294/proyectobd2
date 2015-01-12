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
                </div>
            </div>
            <div class="row">
               <hr>
                <div class="col-md-1"></div>
                <div class="col-md-10">
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
                        @foreach ($alertas as $alerta)
                        <tr>
                            <td>{{$alerta->nombreUsuario}}</td>
                            <td>
                                @if($alerta->cod_alerta==1)
                                    Ha sobrepasado el 20% de inasistencias
                                @elseif($alerta->cod_alerta==2)
                                    Ha sobrepasado el 30% de inasistencias
                                @endif
                            </td>
                            <td>{{$profesor->nombreMateria}}</td>
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

@stop
