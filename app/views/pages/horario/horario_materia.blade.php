@extends('layouts.login')  <!-- Cambiar el layout -->
@section ('title') Asistencias3000 - {{$materia->nombre}} @stop
@section('content')
    <!-- Page Content -->
   <div class="row">
       <div class="col-md-3 " ></div>
       <div class="col-md-6"> 
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
                            <button type="button" class="btn btn-block btn-xs btn-info" onClick="">
                                <span class="glyphicon glyphicon-list-alt"></span>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
@stop

@section('page_scripts')

@stop
