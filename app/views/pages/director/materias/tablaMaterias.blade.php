@extends('layouts.master')
@section ('title') Asistencias3000 - Ejemplo @stop
@section('content')
    <!-- Page Content -->
    
    <div class="row">
        <div class="col-md-1"></div>
            <div class="col-md-7">
                 <h2 class="page-header" id="titulo_registrar_curso">Materias</h2>
                <table WIDTH="100" class="table table-condensed table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>CRN</th>
                            <th>Historial</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materia as $materias)
                        <tr class="odd gradeX">
                            <td WIDTH="80">{{ $materias->id }}</td>
                            <td WIDTH="100 " >{{ $materias->nombre }}</td>
                            <td WIDTH="50">{{ $materias->crn }}</td>
                            
                            
                                
                            <td WIDTH="50"  class="center">{{ $materias->Historial }}
                                    <a href="{{URL::to('director/materias/'.$materias->id.'/secciones')}}" class="btn btn-primary btn-sm btn-block" role="button">
                                    <span class="glyphicon glyphicon-list-alt"></span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                 </table>
            </div>
        <div class="col-md-1"></div>
    </div>


            
@stop

@section('page_scripts')

@stop
