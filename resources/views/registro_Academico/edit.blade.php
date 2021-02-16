@extends('layouts.app')

@section('content')
<div class="container">


Seccion para editar registros academicos

<form action="{{url('/registro_Academico/'.$registro_academico->id_estudiante)}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}

@include('registro_Academico.form',['Modo'=>'editar'])

</form>

</div>
@endsection