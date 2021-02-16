
@extends('layouts.app')

@section('content')

<div class="container">

@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{ Session::get('Mensaje')}}
</div>
@endif

<a href="{{url('profesor/create')}}" class="btn btn-success"> Agregar profesor </a>
<a href="{{route('descargarPDFProfesores')}}" class="btn btn-info"> Imprimir profesores </a>
<br/>
<br/>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Rut</th>
            <th>Asignatura</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($profesores as $profesor)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$profesor->nombre}} {{$profesor->A_paterno}} {{$profesor->A_materno}}</td>
            <td>{{$profesor->rut}}</td>
            <td>{{$profesor->asignatura}}</td>
            <td>{{$profesor->correo}}</td>
            <td>
            
            <a class="btn btn-warning" href="{{url('/profesor/'.$profesor->rut.'/edit')}}">
            Editar
            </a>
            
            <form method="post" action="{{url('/profesor/'.$profesor->rut) }}" style="display:inline">
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