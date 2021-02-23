<template>
    <div>
        <h1 class="text-center">Profesores</h1>
        <hr>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Rut</th>
      <th scope="col">Asignatura</th>
      <th scope="col">Correo</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="profesor in profesores" :key="profesor.rut">
      <th scope="row">{{profesor.rut}}</th>
      <td>{{profesor.nombre}} {{profesor.A_paterno}} {{profesor.A_materno}}</td>
      <td>{{profesor.rut}}</td>
      <td>@{{profesor.asignatura}}</td>
      <td>@{{profesor.correo}}</td>
    </tr>

  </tbody>
</table>
    </div>
    
</template>

<script>
export default {
    data(){
        return{
            profesores:[],
        }

    },
    methods:{
        async listar(){
            const res=await axios.get('profesor')
            this.profesores=res.data;
        }

    },
    created(){
        this.listar();
    },
    
}
</script>

<style>

</style>