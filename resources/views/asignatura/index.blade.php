
@extends('layouts.app')

@section('content')

<div class="container">

@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{ Session::get('Mensaje')}}
</div>
@endif

<a href="{{url('asignatura/create')}}" class="btn btn-success"> Agregar asignatura </a>
<a href="{{route('descargarPDFAsignaturas')}}" class="btn btn-info"> Imprimir asignaturas </a>
<br/>
<br/>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Id asignatura</th>
            <th>Nombre asignatura</th>
            <th>Descripcion</th>
            <th>Rut del profesor</th>
            <th>Id del estudiante</th>
            <th>Numero de estudiantes</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($asignaturas as $asignatura)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$asignatura->id}}</td>
            <td>{{$asignatura->nombre_Asignatura}}</td>
            <td>{{$asignatura->descripcion}}</td>
            <td>{{$asignatura->rut_profesor}}</td>
            <td>{{$asignatura->id_estudiante}}</td>
            <td>{{$asignatura->num_estudiantes}}</td>
            <td>

            <form method="post" action="{{url('/asignatura/'.$asignatura->id) }}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');"> Borrar</button>
                
            </form>
            
            </td>
        </tr>
    @endforeach
    </tbody>

</table>

</div>
@endsection