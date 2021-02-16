@extends('layouts.app')

@section('content')

<div class="container">

@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{ Session::get('Mensaje')}}
</div>
@endif

<a href="{{url('registro_Academico/create')}}" class="btn btn-success"> Agregar registro academico </a>
<a href="{{route('descargarPDFRegistrosAcademicos')}}" class="btn btn-info"> Imprimir registros academicos </a>
<br/>
<br/>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Id estudiante</th>
            <th>Rut</th>
            <th>Nombre</th>
            <th>Fecha inscripcion</th>
            <th>Promedio</th>
            <th>Observaciones</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
    @foreach($registros_academicos as $registro_academico)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$registro_academico->id_estudiante}}</td>
            <td>{{$registro_academico->rut}}</td>
            <td>{{$registro_academico->nombre}} {{$registro_academico->A_paterno}} {{$registro_academico->A_materno}}</td>
            <td>{{$registro_academico->fecha_inscripcion}}</td>
            <td>{{$registro_academico->promedio}}</td>
            <td>{{$registro_academico->observaciones}}</td>
            <td>
            
            <a class="btn btn-warning" href="{{url('/registro_Academico/'.$registro_academico->id_estudiante.'/edit')}}">
            Editar
            </a>

            <form method="post" action="{{url('/registro_Academico/'.$registro_academico->id_estudiante) }}"style="display:inline">
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