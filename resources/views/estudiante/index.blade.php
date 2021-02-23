@extends('layouts.app')

@section('content')
<div class="container">

@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{ Session::get('Mensaje')}}
</div>
@endif

<a href="{{url('estudiante/create')}}" class="btn btn-success"> Agregar estudiante </a>
<a href="{{route('descargarPDFEstudiantes')}}" class="btn btn-info"> Imprimir estudiantes </a>
<br/>
<br/>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Id estudiante</th>
            <th>Nombre</th>
            <th>Rut</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($estudiantes as $estudiante)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$estudiante->id}}</td>
            <td>{{$estudiante->nombre}} {{$estudiante->A_paterno}} {{$estudiante->A_materno}}</td>
            <td>{{$estudiante->rut}}</td>
            <td>{{$estudiante->correo}}</td>
            <td>
            <a class="btn btn-warning" href="{{url('/estudiante/'.$estudiante->id.'/edit')}}">
            Editar
            </a>

            <form method="post" action="{{url('/estudiante/'.$estudiante->id)}}" style="display:inline">
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
{{ $estudiantes->links() }}
@endsection