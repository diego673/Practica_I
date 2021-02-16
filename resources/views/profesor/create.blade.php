@extends('layouts.app')

@section('content')
<div class="container">


Seccion para crear profesores
<form action= "{{url('/profesor')}}" class="form-horizontal" method="post" enctype="multipart/form-data"> 
{{csrf_field()}}
@include('profesor.form',['Modo'=>'crear'])


</form>

</div>
@endsection