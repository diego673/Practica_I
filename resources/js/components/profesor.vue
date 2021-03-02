<template>
    <div>
        <h1 class="text-center">Profesores</h1>
        <hr>

        <!-- Button to Open the Modal -->
<button @click="modificar=false; abrirModal();" type="button" class="btn btn-primary my-4" >
  Agregar profesor
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
            <label for="nombre">Nombre del profesor</label>
            <input v-model="profesor.nombre" type="text" class="form-control" id=nombre placeholder="...">
          </div >
          <div class="my-4">
            <label for="A_paterno">Apellido paterno</label>
            <input v-model="profesor.A_paterno" type="text" class="form-control" id=A_paterno placeholder="...">
          </div>
          <div class="my-4">
            <label for="A_materno">Apellido materno</label>
            <input v-model="profesor.A_materno" type="text" class="form-control" id=A_materno placeholder="...">
          </div>
          <div class="my-4">
            <label for="rut">Rut del profesor</label>
            <input v-model="profesor.rut" type="text" class="form-control" id=rut placeholder="...">
          </div>
          <div class="my-4">
            <label for="asignatura">asignatura del profesor</label>
            <input v-model="profesor.asignatura" type="text" class="form-control" id=asignatura placeholder="...">
          </div>
          <div class="my-4">
            <label for="correo">Correo del profesor</label>
            <input v-model="profesor.correo" type="text" class="form-control" id=correo placeholder="...">
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
      <th scope="col">Nombre</th>
      <th scope="col">Rut</th>
      <th scope="col">Asignatura</th>
      <th scope="col">Correo</th>
      <th scope="col" colspan="2" class="text-center">Accion</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="profesor in profesores" :key="profesor.rut">
      <td>{{profesor.nombre}} {{profesor.A_paterno}} {{profesor.A_materno}}</td>
      <td>{{profesor.rut}}</td>
      <td>{{profesor.asignatura}}</td>
      <td>{{profesor.correo}}</td>
      <td>
          <button @click="modificar=true; abrirModal(profesor);" class="btn btn-warning">Editar</button>
      </td>
      <td>
          <button @click="borrar(profesor.rut)" class="btn btn-danger">Borrar</button>
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
          profesor:{
            nombre:'n',
            A_paterno: 'ap',
            A_materno:'am',
            rut:'r',
            asignatura:'a',
            correo:'c'
          },
          rut:'',
          modificar:true,
          profesores:[],
          tituloModal:'',
          modal:0,
        }

    },
    methods:{
        async listar(){
            const res=await axios.get('/profesor')
            this.profesores=res.data;
        },

        async borrar(rut){
            const res=await axios.put('/profesor/eliminar'+this.rut)
            this.listar();
        },

        async guardar(){
          if(this.modificar){
            const res=await axios.put('/profesor/' +this.rut, this.profesor)

          }else{

            const res=await axios.post('/profesor/', this.profesor)
          }
          this.cerrarModal();
          this.listar();
        },

        abrirModal(data={}){
          this.modal=1;
          if(this.modificar){
            this.tituloModal="Modificar profesor";
            this.profesor.nombre=data.nombre;
            this.profesor.A_paterno=data.A_paterno;
            this.profesor.A_materno=data.A_materno;
            this.profesor.rut=data.rut;
            this.profesor.asignatura=data.asignatura;
            this.profesor.correo=data.correo;

          }else{
            this.tituloModal="Crear profesor";
            this.profesor.nombre='';
            this.profesor.A_paterno='';
            this.profesor.A_materno='';
            this.profesor.rut='';
            this.profesor.asignatura='';
            this.profesor.correo='';

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