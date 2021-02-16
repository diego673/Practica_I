@extends('layouts.app')

@section('content')
<div class="container">


Seccion para editar profesores

<form action="{{url('/profesor/'.$profesor->rut)}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}

@include('profesor.form',['Modo'=>'editar'])

</form>

</div>
@endsection