<template>
    <div>
        <h1 class="text-center">Estudiantes</h1>
        <hr>

        <!-- Button to Open the Modal -->
<button @click="modificar=false; abrirModal();" type="button" class="btn btn-primary my-4" >
  Agregar estudiante
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
            <label for="id">Id del estudiante</label>
            <input v-model="estudiante.id" type="integer" class="form-control" id=id placeholder="...">
          </div >
          <div class="my-4">
            <label for="nombre">Nombre del estudiante</label>
            <input v-model="estudiante.nombre" type="text" class="form-control" id=nombre placeholder="...">
          </div >
          <div class="my-4">
            <label for="A_paterno">Apellido paterno</label>
            <input v-model="estudiante.A_paterno" type="text" class="form-control" id=A_paterno placeholder="...">
          </div>
          <div class="my-4">
            <label for="A_materno">Apellido materno</label>
            <input v-model="estudiante.A_materno" type="text" class="form-control" id=A_materno placeholder="...">
          </div>
          <div class="my-4">
            <label for="rut">Rut del estudiante</label>
            <input v-model="estudiante.rut" type="text" class="form-control" id=rut placeholder="...">
          </div>
          <div class="my-4">
            <label for="correo">Correo del estudiante</label>
            <input v-model="estudiante.correo" type="text" class="form-control" id=correo placeholder="...">
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
      <th scope="col">Id estudiante</th>
      <th scope="col">Nombre</th>
      <th scope="col">Rut</th>
      <th scope="col">Correo</th>
      <th scope="col" colspan="2" class="text-center">Accion</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="estudiante in estudiantes" :key="estudiante.id">
      <td>{{estudiante.id}}</td>
      <td>{{estudiante.nombre}} {{estudiante.A_paterno}} {{estudiante.A_materno}}</td>
      <td>{{estudiante.rut}}</td>
      <td>{{estudiante.correo}}</td>
      <td>
          <button @click="modificar=true; abrirModal(estudiante);" class="btn btn-warning">Editar</button>
      </td>
      <td>
          <button @click="borrar(estudiante.id)" class="btn btn-danger">Borrar</button>
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
          estudiante:{
            id:0,
            nombre:'n',
            A_paterno: 'ap',
            A_materno:'am',
            rut:'r',
            correo:'c'
          },
          id:0,
          modificar:true,
          estudiantes:[],
          tituloModal:'',
          modal:0,
          
        }

    },
    methods:{
        async listar(){
            const res=await axios.get('/estudiante')
            this.estudiantes=res.data;
        },

        async borrar(id){
            const res=await axios.delete('/estudiante/'+ this.id)
            this.listar();
        },

        async guardar(){
          if(this.modificar){
            const res=await axios.put('/estudiante/' +this.id, this.estudiante)

          }else{

            const res=await axios.post('/estudiante/', this.estudiante)
          }
          this.cerrarModal();
          this.listar();
        },

        abrirModal(data={}){
          this.modal=1;
          if(this.modificar){
            this.tituloModal="Modificar estudiante";
            this.estudiante.id=data.id;
            this.estudiante.nombre=data.nombre;
            this.estudiante.A_paterno=data.A_paterno;
            this.estudiante.A_materno=data.A_materno;
            this.estudiante.rut=data.rut;
            this.estudiante.correo=data.correo;

          }else{
            this.tituloModal="Crear estudiante";
            this.estudiante.id=0;
            this.estudiante.nombre='';
            this.estudiante.A_paterno='';
            this.estudiante.A_materno='';
            this.estudiante.rut='';
            this.estudiante.correo='';

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