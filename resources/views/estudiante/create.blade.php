@extends('layouts.app')

@section('content')
<div class="container">


Seccion para crear estudiantes

<form action= "{{url('/estudiante')}}" method="post" enctype="multipart/form-data"> 
{{csrf_field()}}
@include('estudiante.form',['Modo'=> 'crear'])


</form>

</div>
@endsection