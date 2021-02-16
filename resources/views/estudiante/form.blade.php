
<div class="form-group">
<label for="id" class="control-label">{{'Id del estudiante'}}</label>
<input type="int" class="form-control" name="id" id="id" value="{{ isset($estudiantes-> id)?$estudiantes-> id:''}}">
</div>

<div class="form-group">
<label for="nombre" class="control-label">{{'Nombre'}}</label>
<input type="text" class="form-control"name="nombre" id="nombre" value="{{ isset($estudiantes-> nombre)?$estudiantes-> nombre:''}}">
</div>

<div class="form-group">
<label for="A_Paterno" class="control-label">{{'Apellido paterno'}}</label>
<input type="text" class="form-control" name="A_Paterno" id="A_Paterno" value="{{ isset($estudiantes-> A_paterno)?$estudiantes-> A_paterno:''}}">
</div>

<div class="form-group">
<label for="A_Materno" class="control-label">{{'Apellido Materno'}}</label>
<input type="text" class="form-control" name="A_Materno" id="A_Materno" value="{{ isset($estudiantes-> A_materno)?$estudiantes-> A_materno:''}}">
</div>

<div class="form-group">
<label for="rut" class="control-label">{{'Rut'}}</label>
<input type="text" class="form-control" name="rut" id="rut" value="{{ isset($estudiantes-> rut)?$estudiantes-> rut:''}}">
</div>

<div class="form-group">
<label for="correo" class="control-label">{{'Correo'}}</label>
<input type="email" class="form-control" name="correo" id="correo" value="{{ isset($estudiantes-> correo)?$estudiantes-> correo:''}}">
</div>

<input type="submit" class="btn btn-success" value="{{$Modo=='crear' ? 'Agregar ' : 'Modificar '}}">

<a class="btn btn-primary" href="{{url('estudiante')}}"> Regresar </a>
