@extends('layouts.app')

@section('content')
<div class="container">

Seccion para crear registros academicos
<form action= "{{url('/Registro_Academico')}}" method="post" enctype="multipart/form-data"> 
{{csrf_field()}}
@include('registro_Academico.form',['Modo'=>'crear'])

</form>

</div>
@endsection