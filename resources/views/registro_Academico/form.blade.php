
<div class="form-group">
<label for="id_estudiante " class="control-label">{{'Id del estudiante'}}</label>
<input type="int" class="form-control" name="id_estudiante" id="id_estudiante" value="{{ isset($registro_academico->id_estudiante)?$registro_academico->id_estudiante:''}}">
</div>

<div class="form-group">
<label for="nombre" class="control-label">{{'Nombre'}}</label>
<input type="text" class="form-control" name="nombre" id="nombre" value="{{ isset($registro_academico->nombre)?$registro_academico->nombre:''}}">
</div>

<div class="form-group">
<label for="A_paterno" class="control-label">{{'Apellido paterno'}}</label>
<input type="text" class="form-control" name="A_paterno" id="A_paterno" value="{{ isset($registro_academico->A_paterno)?$registro_academico->A_paterno:''}}">
</div>

<div class="form-group">
<label for="A_materno" class="control-label">{{'Apellido Materno'}}</label>
<input type="text" class="form-control" name="A_materno" id="A_materno" value="{{ isset($registro_academico->A_materno)?$registro_academico->A_materno:''}}">
</div>

<div class="form-group">
<label for="fecha_inscripcion" class="control-label">{{'Fecha de inscripcion'}}</label>
<input type="date" class="form-control" name="fecha_inscripcion" id="fecha_inscripcion" value="{{ isset($registro_academico->fecha_inscripcion)?$registro_academico->fecha_inscripcion:''}}">
</div>

<div class="form-group">
<label for="promedio" class="control-label">{{'promedio del estudiante'}}</label>
<input type="decimal" class="form-control" name="promedio" id="promedio" value="{{ isset($registro_academico->promedio)?$registro_academico->promedio:''}}">
</div>

<div class="form-group">
<label for="observaciones" class="control-label">{{'Observaciones'}}</label>
<input type="text" class="form-control" name="observaciones" id="observaciones" value="{{ isset($registro_academico->observaciones)?$registro_academico->observaciones:''}}">
</div>

<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar': 'Modificar'}}">

<a class="btn btn-primary" href="{{url('registro_Academico')}}"> Regresar </a>
