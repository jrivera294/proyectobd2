@extends('layouts.master')  
@section ('title') Asistencias3000 - {{$materia->nombre}} @stop
@section('content')
    <!-- Page Content -->
<div class="row">
    <div class="col-md-3 " > </div>
   <div class="col-md-6">
       <h2 class="page-header" id="titulo_registrar_curso">Secciones de "{{$materia->nombre}}"</h2>
       <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre y Apellido</th>
                    <th>Periodo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($seccion as $secciones)
                <tr class="odd gradeX">
                    <td>{{ $secciones->id }}</td>
                    <td>    </td>
                    <td>    </td>
                    <td class="center">
                        <button type="button" class="btn btn-block btn-xs btn-danger" data-target="#eliminar" onClick=" setEliminarHorario({{$secciones ->id}}); ">
                            <span class="glyphicon glyphicon-remove"></span>
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

<script>

    function setEliminarHorario(idHorario){
        window.location = "{{route('eliminarHorario','');}}"+'/'+idHorario; ;
    }

</script>
@stop
