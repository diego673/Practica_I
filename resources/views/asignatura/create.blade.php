@extends('layouts.app')

@section('content')
<div class="container">


Seccion para crear asignaturas

<form action= "{{url('/asignatura')}}" method="post" enctype="multipart/form-data"> 
{{csrf_field()}}
@include('asignatura.form',['Modo'=>'crear'])


</form>

</div>
@endsection