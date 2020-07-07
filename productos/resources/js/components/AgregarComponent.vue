<template>
                 <!--Inicio del modal agregar/actualizar-->
            <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar producto</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                    <div class="col-md-9">
                                        <input v-model="nombre" type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre de producto">
                                        <span class="help-block">(*) Ingrese el nombre de la producto</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Descripción</label>
                                    <div class="col-md-9">
                                        <input v-model="descripcion" type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Descripcion de producto">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="btnCerrar" data-dismiss="modal">Cerrar</button>
                            <button @click="guardarProducto()" class="btn btn-success">Añadir</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

</template>


<script>


    export default {
        mounted() {
            console.log('COMPONENTE AGREGAR!!.');
        },
        data(){
            return{
                nombre:"", // esta en el input como "v-mode=nombre"
                descripcion:"", // esta en el input como "v-mode=descripcion"
            }
        },  
        methods:{
            guardarProducto(){
                console.log("Nombre: " + nombre.value);
                console.log("Desc: " + descripcion.value);
                let me = this;
                let url = '/api/crearProducto' //Ruta hecha en api.php (routes)
                axios.post(url,{ //nombres y descripción se envian para que crear el nuevo producto
                    'nombre':this.nombre,
                    'descripcion':this.descripcion,
                }).then(function (response) {
                    //this.actualizarRegistros(); -- No terminado
                    alert("Agregado correctamente, por favor hacer un refresh a la pagina para ver el nuevo producto agregado!"); 
                    document.getElementById('btnCerrar').click(); // Cierra el modal
                })
                .catch(function (error) {
                    console.log(error);
                }); 
            },

            actualizarRegistros(){
                // No terminado
            },

        }

    }


</script>
