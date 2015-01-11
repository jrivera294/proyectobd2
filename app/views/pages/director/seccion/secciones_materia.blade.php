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
                    <th>Horarios</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($seccion as $secciones)
                <tr class="odd gradeX">
                    <td>{{ $secciones->id }}</td>
                    <td>Prof. {{ $secciones->nombre}} {{ $secciones->apellido }}    </td>
                    <td> {{ $secciones->fecha_ini}} - {{ $secciones->fecha_fin }}   </td>
                    <td class="center">
                        <a href="{{URL::to('director/secciones/'.$secciones->id.'/horario')}}" class="btn btn-primary btn-xs btn-block" role="button">
                        <span class="glyphicon glyphicon-list-alt"></span>
                    </td>
                    <td class="center">
                        <a href="{{URL::to('director/secciones/'.$secciones->id.'/eliminar')}}" class="btn btn-danger btn-xs btn-block" role="button">
                        <span class="glyphicon glyphicon-remove"></span>
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

    function setEliminarSeccion(idSeccion){
        window.location = "{{route('director.eliminarSeccion','');}}"+'/'+idSeccion;
    }
    


</script>
@stop
