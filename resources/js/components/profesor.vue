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
            <input v-model="nombre" type="text" class="form-control" id=nombre placeholder="...">
          </div >
          <div class="my-4">
            <label for="A_paterno">Apellido paterno</label>
            <input v-model="A_paterno" type="text" class="form-control" id=A_paterno placeholder="...">
          </div>
          <div class="my-4">
            <label for="A_materno">Apellido materno</label>
            <input v-model="A_materno" type="text" class="form-control" id=A_materno placeholder="...">
          </div>
          <div class="my-4">
            <label for="rut">Rut del profesor</label>
            <input v-model="rut" type="text" class="form-control" id=rut placeholder="...">
          </div>
          <div class="my-4">
            <label for="asignatura">asignatura del profesor</label>
            <input v-model="asignatura" type="text" class="form-control" id=asignatura placeholder="...">
          </div>
          <div class="my-4">
            <label for="correo">Correo del profesor</label>
            <input v-model="correo" type="text" class="form-control" id=correo placeholder="...">
          </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button @click="cerrarModal();" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button @click="guardar(id);" type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
      </div>

    </div>
  </div>
</div>

<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Rut</th>
      <th scope="col">Asignatura</th>
      <th scope="col">Correo</th>
      <th scope="col" colspan="2" class="text-center">Accion</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="profesor in profesores" :key="profesor.id">
      <td>{{profesor.id}}</td>
      <td>{{profesor.nombre}} {{profesor.A_paterno}} {{profesor.A_materno}}</td>
      <td>{{profesor.rut}}</td>
      <td>{{profesor.asignatura}}</td>
      <td>{{profesor.correo}}</td>
      <td>
          <button @click="modificar=true; abrirModal(profesor);" class="btn btn-warning">Editar</button>
      </td>
      <td>
          <button @click.prevent="borrar(profesor.id)" class="btn btn-danger">Borrar</button>
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
            id:0,
            nombre:"",
            A_paterno: "",
            A_materno:"",
            rut:"",
            asignatura:"",
            correo:"",
          },
          id:0,
          modificar:true,
          profesores:[],
          tituloModal:"",
          modal:0,
        }

    },
    methods:{
        async listar(){
            const res=await axios.get('/profesor')
            this.profesores=res.data;
        },

        borrar(id){
          let me = this;
          alert(id);
            axios.put('/profesor/eliminar/', {id:id})
            .then(function(response){
              me.listar(); 
              alert(response.data);
              swal.fire(
                "Borrado",
              )
            }).catch(function(error){
              console.log(error);
            })
        },
        
        guardar(id){
          let me = this;
          if(this.modificar){
           alert(id);
           axios.put('/profesor/actualizar/', {
              id:id,
              nombre: this.nombre,
              A_paterno: this.A_paterno,
              A_materno: this.A_materno,
              rut: this.rut,
              asignatura: this.asignatura,
              correo: this.correo,
            })
            .then(function(response){
              me.cerrarModal();
              me.listar();
              swal.fire({
                icon: "success",
                title: "Informacion",
                text: "Profesor actualizado",
              });
            }).catch(function(error){
              console.log(error);
            })

          }else{
            axios.post('/profesor/registrar',{
              nombre: this.nombre,
              A_paterno: this.A_paterno,
              A_materno: this.A_materno,
              rut: this.rut,
              asignatura: this.asignatura,
              correo: this.correo,
            })
            .then(function(response){
              me.cerrarModal();
              me.listar();
            }).catch(function(error){
              console.log(error);
            })
          }
        },


        abrirModal(data=[]){
          this.modal=1;
          if(this.modificar){
            this.tituloModal="Modificar profesor";
            this.nombre=data["nombre"];
            this.A_paterno=data["A_paterno"];
            this.A_materno=data["A_materno"];
            this.rut=data["rut"];
            this.asignatura=data["asignatura"];
            this.correo=data["correo"];

          }else{
            this.tituloModal="Crear profesor";
            this.profesor.nombre="";
            this.profesor.A_paterno="";
            this.profesor.A_materno="";
            this.profesor.rut="";
            this.profesor.asignatura="";
            this.profesor.correo="";

          }

        },

        cerrarModal(){
          this.modal=0;
          this.tituloModal="";
          this.nombre="";
          this.A_paterno="";
          this.A_materno="";
          this.rut="";
          this.asignatura="";
          this.correo="";
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