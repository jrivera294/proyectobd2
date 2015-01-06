@extends('layouts.master')
@section ('title') Asistencias3000 - Ejemplo @stop
@section('content')
    <!-- Page Content -->
    
    <div class="row">
        <div class="col-md-1"></div>
            <div class="col-md-10">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>CRN</th>
                            <th>Profesor</th>
                            <th>Historial</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materia as $materias)
                        <tr class="odd gradeX">
                            <td>{{ $materias->id }}</td>
                            <td>{{ $materias->nombre }}</td>
                            <td>{{ $materias->crn }}</td>
                            
                            <td class="center" >{{ $materias->Profesor }}
                                <a href="{{URL::to('director/'.$materias->id.'/seleccionProfesores')}}" class="btn btn-primary btn-sm btn-block" role="button">
                                    <span class="glyphicon glyphicon-user"></span>
                                </a>
                                  
                            </td>
                                
                            <td class="center">{{ $materias->Historial }}
                                    <button type="button" class="btn btn-block btn-xs btn-info" onClick="">
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
