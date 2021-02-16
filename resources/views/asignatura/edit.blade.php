@extends('layouts.app')

@section('content')
<div class="container">


Seccion para editar profesores

<form action="{{url('/asignatura/'.$asignatura->id)}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}

@include('asignatura.form',['Modo'=>'editar'])

</form>

</div>
@endsection