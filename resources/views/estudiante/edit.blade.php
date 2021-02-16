@extends('layouts.app')

@section('content')
<div class="container">

Seccion para editar estudiantes

<form action="{{ url('/estudiante/'. $estudiantes->id)}}" method="post" enctype="mutipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}

@include('estudiante.form',['Modo'=>'editar'])

</form>

</div>
@endsection