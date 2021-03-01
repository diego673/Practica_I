<template>
    <div>
        <h1 class="text-center">Asignaturas</h1>
        <hr>

        <!-- Button to Open the Modal -->
<button @click="modificar=false; abrirModal();" type="button" class="btn btn-primary my-4" >
  Agregar asignatura
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
            <label for="id">Id de la asignatura</label>
            <input v-model="asignatura.id" type="integer" class="form-control" id=id placeholder="...">
          </div >
          <div class="my-4">
            <label for="nombre_Asignatura">Nombre de la asignatura</label>
            <input v-model="asignatura.nombre_Asignatura" type="text" class="form-control" id=nombre_Asignatura placeholder="...">
          </div>
          <div class="my-4">
            <label for="descripcion">Descripcion de la asignatura</label>
            <input v-model="asignatura.descripcion" type="text" class="form-control" id=descripcion placeholder=" ...">
          </div>
          <div class="my-4">
            <label for="rut_profesor">Rut del profesor</label>
            <input v-model="asignatura.rut_profesor" type="text" class="form-control" id=rut_profesor placeholder="...">
          </div>
          <div class="my-4">
            <label for="id_estudiante">Id del estudiante</label>
            <input v-model="asignatura.id_estudiante" type="integer" class="form-control" id=id_estudiante placeholder="...">
          </div>
          <div class="my-4">
            <label for="num_estudiantes">N° de estudiantes</label>
            <input v-model="asignatura.num_estudiantes" type="integer" class="form-control" id=num_estudiantes placeholder="...">
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
      <th scope="col">Id asignatura</th>
      <th scope="col">Nombre asignatura</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Rut profesor</th>
      <th scope="col">Id estudiante</th>
      <th scope="col">numero de estudiantes</th>
      <th scope="col" colspan="2" class="text-center">Accion</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="asignatura in asignaturas" :key="asignatura.id">
      <td>{{asignatura.id}}</td>
      <td>{{asignatura.nombre_Asignatura}}</td>
      <td>{{asignatura.descripcion}}</td>
      <td>{{asignatura.rut_profesor}}</td>
      <td>{{asignatura.id_estudiante}}</td>
      <td>{{asignatura.num_estudiantes}}</td>
      <td>
          <button @click="modificar=true; abrirModal(asignatura);" class="btn btn-warning">Editar</button>
      </td>
      <td>
          <button @click="borrar(asignatura.id)" class="btn btn-danger">Borrar</button>
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
          asignatura:{
            id:null,
            nombre_Asignatura:'',
            descripcion:'',
            rut_profesor:'',
            id_estudiante:null,
            num_estudiantes:null,

          },
          id:0,
          modificar:true,
          asignaturas:[],
          tituloModal:'',
          modal:0,
        }

    },
    methods:{
        async listar(){
            const res=await axios.get('/asignatura')
            this.asignaturas=res.data;
        },

        async borrar(id){
            const res=await axios.delete('/asignatura/'+this.id)
            this.listar();
        },

        async guardar(){
          if(this.modificar){
            const res=await axios.put('/asignatura/' +this.id, this.asignatura)

          }else{

            const res=await axios.post('/asignatura', this.asignatura)
          }
          this.cerrarModal();
          this.listar();
        },

        abrirModal(data={}){
          this.modal=1;
          if(this.modificar){
            this.tituloModal="Modificar asignatura";
            this.asignatura.id=data.id;
            this.asignatura.nombre_Asignatura=data.nombre_Asignatura;
            this.asignatura.descripcion=data.descripcion;
            this.asignatura.rut_profesor=data.rut_profesor;
            this.asignatura.id_estudiante=data.id_estudiante;
            this.asignatura.num_estudiantes=data.num_estudiantes;

          }else{
            this.tituloModal="Crear asignatura";
            this.asignatura.id=1;
            this.asignatura.nombre_Asignatura='';
            this.asignatura.descripcion='';
            this.asignatura.rut_profesor='';
            this.asignatura.id_estudiante=0;
            this.asignatura.num_estudiantes=0;

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