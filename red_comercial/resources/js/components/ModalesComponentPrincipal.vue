

<template>


    <div class="modale">
        <!--Inicio del modal ingresar -->
          <div class="modal fade" id="modalIngresar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Ingresar</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body" style="margin-left:250px;">
                    <div class="login100-pic js-tilt" data-tilt>
                        <img src="images/img-01.png" alt="IMG">
                    </div>

                    <form class="login100-form validate-form" method="POST" action="this.post-route">

                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input v-model="email" class="input100" type="text" name="email" placeholder="Email">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
    
                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input v-model="password" class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" data-dismiss="modal">
                                Aceptar
                            </button>
                        </div>
                        
                    </form>    

                        </div>
                  
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

     
          <!--Inicio modal reigstrarme-->
          <div class="modal fade" id="modalRegistrarme" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Registro</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body" style="margin-left:200px;">
                    <div class="login100-pic js-tilt" data-tilt>
                        <img src="images/img-01.png" alt="IMG">
                    </div>
                    <form class="login100-form validate-form">
                     
                        <div class="nombresYapellidos">
                            
                            <div class="wrap-input100 validate-input" data-validate = "Email invalido ">
                                <input class="input100" type="text" name="Nombres" placeholder="Nombres" style="width: 200px;">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                                </span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate = "Email invalido ">
                                <input class="input100" type="text" name="Apellidos" placeholder="Apellidos" style="width: 200px;">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-id-card" aria-hidden="true"></i>
                                </span>
                            </div>


                        </div>


                        <div class="wrap-input100 validate-input" data-validate = "Email invalido ">
                            <input class="input100" type="text" name="email" placeholder="Email" style="width: 400px;">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
    
                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="password" name="pass" placeholder="Password" style="width: 400px;">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        
                        <div class="container-login100-form-btn" style="margin-left: 50px;">
                            <button class="login100-form-btn">
                                Registrarme
                            </button>
                        </div>
    
                    </form>
                        </div>
                  
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            


     
    
    
    
    
    </div>


</template>





<script>

    export default {
        mounted() {
            console.log('Componente Modales montado');
             props: ['post-route']
        },
        data(){
            return{
                email:"", // esta en el input como "v-mode=nombre"
                password:"", // esta en el input como "v-mode=descripcion"
            }
        },  
        methods:{
            ingresar(){
                alert("Ingreso de usuario" + this.email + this.password);
                
                let url = '/api/ingresoUsuario' //Ruta hecha en api.php (routes)
                //alert(this.)

                
                
                axios.get(url,{ //nombres y descripción se envian para que crear el nuevo producto
                    'email':this.email,
                    'password':this.password,
                    
                }).then(function(response){
                    
                 
                    
                    // if (response.){
                    //     alert("Response is true"); 
                    // }else{
                    //     alert("Response is false"); 
                    // }
                    //document.getElementById('btnCerrar').click(); // Cierra el modal
                })
                .catch(function (error) {
                    console.log(error);
                }); 
                


            },
        }

    }


</script>

