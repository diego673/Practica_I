<template>
    <div>
        <h1 class="text-center">Registro academicos</h1>
        <hr>

        <!-- Button to Open the Modal -->
<button @click="modificar=false; abrirModal();" type="button" class="btn btn-primary my-4" >
  Agregar registro academico
</button>

<!-- The Modal -->
<div class="modal" :class="{mostrar:modal}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">{{tituloModal}}</h4>
        <button @click="cerrarModal();" type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <div class="my-4">
            <label for="id_estudiante">Id del estudiante</label>
            <input v-model="registroAcademico.id_estudiante" type="text" class="form-control" id=id_estudiante placeholder="...">
          </div >
          <div class="my-4">
            <label for="rut">Rut del estudiante</label>
            <input v-model="registroAcademico.rut" type="text" class="form-control" id=rut placeholder="...">
          </div>
          <div class="my-4">
            <label for="nombre">Nombre del estudiante</label>
            <input v-model="registroAcademico.nombre" type="text" class="form-control" id=nombre placeholder="...">
          </div >
          <div class="my-4">
            <label for="A_paterno">Apellido paterno</label>
            <input v-model="registroAcademico.A_paterno" type="text" class="form-control" id=A_paterno placeholder="...">
          </div>
          <div class="my-4">
            <label for="A_materno">Apellido materno</label>
            <input v-model="registroAcademico.A_materno" type="text" class="form-control" id=A_materno placeholder="...">
          </div>
          <div class="my-4">
            <label for="fecha_inscripcion">Fecha de inscripcion</label>
            <input v-model="registroAcademico.fecha_inscripcion" type="date" class="form-control" id=fecha_inscripcion placeholder="...">
          </div>
          <div class="my-4">
            <label for="promedio">Promedio del estudiante</label>
            <input v-model="registroAcademico.promedio" type="decimal" class="form-control" id=promedio placeholder="...">
          </div>
          <div class="my-4">
            <label for="observaciones">Observacion</label>
            <input v-model="registroAcademico.observaciones" type="text" class="form-control" id=observaciones placeholder="...">
          </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button @click="cerrarModal();" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button @click="guardar();" type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
      </div>

    </div>
  </div>
</div>

<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id del estudiante</th>
      <th scope="col">Rut</th>
      <th scope="col">Nombre</th>
      <th scope="col">Fecha inscripcion</th>
      <th scope="col">Promedio</th>
      <th scope="col">Observaciones</th>
      <th scope="col" colspan="2" class="text-center">Accion</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="registroAcademico in registroAcademicos" :key="registroAcademico.id_estudiante">
      <td>{{registroAcademico.id_estudiante}}</td>
      <td>{{registroAcademico.rut}}</td>
      <td>{{registroAcademico.nombre}} {{registroAcademico.A_paterno}} {{registroAcademico.A_materno}}</td>
      <td>{{registroAcademico.fecha_inscripcion}}</td>
      <td>{{registroAcademico.promedio}}</td>
      <td>{{registroAcademico.observaciones}}</td>
      <td>
          <button @click="modificar=true; abrirModal(registroAcademico);" class="btn btn-warning">Editar</button>
      </td>
      <td>
          <button @click="borrar(registroAcademico.id_estudiante)" class="btn btn-danger">Borrar</button>
      </td>
    </tr>

  </tbody>
</table>
    </div>
    
</template>

<script>
export default {
    data(){
        return{
          registroAcademico:{
            id_estudiante:null,
            rut:'r',
            nombre:'n',
            A_paterno: 'ap',
            A_materno:'am',
            fecha_inscripcion:'f',
            promedio:'p',
            observaciones:'o'
          },
          id:0,
          modificar:true,
          registroAcademicos:[],
          tituloModal:'',
          modal:0,
        }

    },
    methods:{
        async listar(){
            const res=await axios.get('/registro_Academico')
            this.registroAcademico=res.data;
        },

        async borrar(id_estudiante){
            const res=await axios.delete('/registro_Academico/'+this.id_estudiante)
            this.listar();
        },

        async guardar(){
          if(this.modificar){
            const res=await axios.put('/registro_Academico/' +this.id_estudiante, this.registroAcademico)

          }else{

            const res=await axios.post('/registro_Academico/', this.registroAcademico)
          }
          this.cerrarModal();
          this.listar();
        },

        abrirModal(data={}){
          this.modal=1;
          if(this.modificar){
            this.tituloModal="Modificar registro academico";
            this.registroAcademico.id_estudiante=data.id_estudiante;
            this.registroAcademico.rut=data.rut;
            this.registroAcademico.nombre=data.nombre;
            this.registroAcademico.A_paterno=data.A_paterno;
            this.registroAcademico.A_materno=data.A_materno;
            this.registroAcademico.fecha_inscripcion=data.fecha_inscripcion;
            this.registroAcademico.promedio=data.promedio;
            this.registroAcademico.observaciones=data.observaciones;

          }else{
            this.tituloModal="Crear registro academico";
            this.registroAcademico.id_estudiante=0;
            this.registroAcademico.rut='';
            this.registroAcademico.nombre='';
            this.registroAcademico.A_paterno='';
            this.registroAcademico.A_materno='';
            this.registroAcademico.fecha_inscripcion=null;
            this.registroAcademico.promedio=0;
            this.registroAcademico.observaciones='';

          }

        },

        cerrarModal(){
          this.modal=0;

        },

    },
    created(){
        this.listar();
    },
    
}
</script>

<style>
  .mostrar{
    display: list-item;
    opacity: 1;
    background: rgba(136, 136, 143, 0.137);
  }

</style>