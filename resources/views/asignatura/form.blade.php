
<div class="form-group">
<label for="id" class="control-label">{{'Id asignatura'}}</label>
<input type="int" class="form-control" name="id" id="id" value="{{ isset($asignatura->id)?$asignatura->id:''}}">
</div>

<div class="form-group">
<label for="nombre_Asignatura" class="control-label">{{'Nombre de la asignatura'}}</label>
<input type="text" class="form-control" name="nombre_Asignatura" id="nombre_Asignatura" value="{{ isset($asignatura->nombre_Asignatura)?$asignatura->nombre_Asignatura:''}}">
</div>

<div class="form-group">
<label for="descripcion" class="control-label">{{'Descripcion de la asignatura'}}</label>
<input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ isset($asignatura->descripcion)?$asignatura->descripcion:''}}">
</div>

<div class="form-group">
<label for="rut_profesor" class="control-label">{{'Rut del profesor'}}</label>
<input type="text" class="form-control" name="rut_profesor" id="rut_profesor" value="{{ isset($asignatura->rut_profesor)?$asignatura->rut_profesor:''}}">
</div>

<div class="form-group">
<label for="id_estudiante" class="control-label">{{'Id del estudiante'}}</label>
<input type="int" class="form-control" name="id_estudiante" id="id_estudiante" value="{{ isset($asignatura->id_estudiante)?$asignatura->id_estudiante:''}}">
</div>

<div class="form-group">
<label for="num_estudiantes" class="control-label">{{'Numero de estudiantes en la asignatura'}}</label>
<input type="int" class="form-control" name="num_estudiantes" id="num_estudiantes" value="{{ isset($asignatura->num_estudiantes)?$asignatura->num_estudiantes:''}}">
</div>

<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar': 'Modificar'}}">

<a class="btn btn-primary" href="{{url('asignatura')}}"> Regresar </a>