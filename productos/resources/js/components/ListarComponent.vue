
<template>
  
  <!-- Contenido Principal -->
        <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Productos
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalNuevo">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" id="opcion" name="opcion">
                                      <option value="nombre">Nombre</option>
                                      <option value="descripcion">Descripción</option>
                                    </select>
                                    <input type="text" id="texto" name="texto" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                       <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- v-for para ciclar hasta terminar todos los productos existentes en la bd -->
                                <tr v-for="producto in arrayProductos" :key="producto.id">
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#modalNuevo">
                                            <i class="icon-pencil"></i>
                                        </button> &nbsp;
                                        <button type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#modalEliminar">
                                            <i class="icon-trash"></i>
                                        </button>
                                    </td>
                                    <!-- v-text's extraídos de la bd con ayuda del array-->
                                    <td v-text="producto.nombre"></td>
                                    <td v-text="producto.descripcion"></td>
                                    <td>
                                        <span class="badge badge-success">Activo</span>
                                    </td>
                                </tr>
                               
                            </tbody>
                        </table>

                    
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>

        </main>


</template>



<script>


export default {

    mounted() {
        console.log('Component LISTAR.');
         this.getProductos();
    },
      data(){
            return{
                arrayProductos:[], //Este array contendrá los productos (nombre, descripción, id)
            }
        },
         methods:{
            getProductos(){
                let me = this;
                let url = '/api/obtenerProductos' //Ruta creada en api.php 
                axios.get(url).then(function (response) {
                    //Se obitenen todos los datos de los productos en este array
                    me.arrayProductos = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
        }
}


</script>

