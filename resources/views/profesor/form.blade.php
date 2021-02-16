
<div class="form-group">
<label for="nombre" class="control-label"> {{'Nombre'}}</label>
<input type="text" class="form-control" name="nombre" id="nombre" value="{{ isset($profesor->nombre)?$profesor->nombre:''}}">
</div>

<div class="form-group">
<label for="A_Paterno" class="control-label">{{'Apellido paterno'}}</label>
<input type="text" class="form-control" name="A_Paterno" id="A_Paterno" value="{{ isset($profesor->A_paterno)?$profesor->A_paterno:''}}">
</div>

<div class="form-group">
<label for="A_Materno" class="control-label">{{'Apellido Materno'}}</label>
<input type="text" class="form-control" name="A_Materno" id="A_Materno" value="{{ isset($profesor->A_materno)?$profesor->A_materno:''}}">
</div>

<div class="form-group">
<label for="rut" class="control-label">{{'Rut'}}</label>
<input type="text" class="form-control" name="rut" id="rut" value="{{ isset($profesor->rut)?$profesor->rut:''}}">
</div>

<div class="form-group">
<label for="asignatura" class="control-label">{{'Asignatura'}}</label>
<input type="text" class="form-control" name="asignatura" id="asignatura" value="{{ isset($profesor->asignatura)?$profesor->asignatura:''}}">
</div>

<div class="form-group">
<label for="correo" class="control-label">{{'Correo'}}</label>
<input type="email" class="form-control" name="correo" id="correo" value="{{ isset($profesor->correo)?$profesor->correo:''}}">
</div>

<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar': 'Modificar'}}">

<a class="btn btn-primary" href="{{url('profesor')}}"> Regresar </a>
