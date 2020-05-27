
<?php

//Controladores de usuarios //

class MvcController{


    public function plantilla(){
        include ("views/template.php");
    }

    public function enlacesPaginasController(){

    }


    public function ingresoUsuarioController(){
        if (isset($_POST["txtUser"]) && isset($_POST["txtPassword"])){
            $datosController = array("user" =>$_POST["txtUser"],"password"=>$_POST["txtPassword"]);
            $respuesta = Datos::ingresoUsuarioModel($datosController,"users");

            // if ($respuesta["usuario"]) == $_POST["txtUser"] && password_verify($_POST["txtPassword"],$respuesta["contraseña"])){
            //     session_start();
            //     $_SESSION["validar"] = true;
            //     $_SESSION["nombre_usuario"] = $respuesta["nombre_usuario"];
            //     $_SESSION["id"] = $respuesta["id"];
            //     header("Location:index.php?action=tablero");
            // }else{
            //     header("Location:index.php?action=fallo&res=fallo");
            // }

        }

    }



    public function visitaUsersController(){
        $respuesta = Datos::visitaUsersModel("users");
        foreach ($respuesta as $row => $item){


        }

        echo '
            <tr>
                <td>
                    <a href="index.php?action=usuarios&idUserEditar='.$item["id"].'" class="btn
                    btn-warning btn-sn btn-icon" title="Editar" data-toggle="tooltip">

        
        ';

    }




    public function registrarUserController(){
        ?>

        <div class="col-md-6 mt-3">

            <div class="card-primay">

                <div class="card-header">
                    <h4><b>Registro</b> de Usuarios</h4>
                </div>
            
                <div class="card-body">
                
                    <form action="index.php?action=usuarios" method="post">

                        <div class="form-group">
                        <label for="nusuariotxt">Nombre:</label>
                            <input class="form-control" type="text" name="nusuariotxt" id="nusuariotxt" placeholder="ingrese el nombre" required>
                        </div>

                        <div class="form-group">
                            <label for="apellidotxt">Apellido:</label>
                            <input class="form-control" type="text" name="anusuariotxt" id="ausuariotxt" placeholder="ingrese el apellido" required>
                        
                        </div>                    
                    
                        <div class="form-group">
                            <label for="upellidotxt">Usuario:</label>
                            <input class="form-control" type="text" name="usuariotxt" id="usuariotxt" placeholder="ingrese el usuario" required>
                        
                        </div>                    
                    
                    
                        <div class="form-group">
                            <label for="upellidotxt">Contraseña:</label>
                            <input class="form-control" type="password" name="ucontratxt" id="ucontratxt" placeholder="ingrese la pass" required>
                        </div>                    

                        
                    
                        <div class="form-group">
                            <label for="upellidotxt">Correo electrónico:</label>
                            <input class="form-control" type="email" name="uemailtxt" id="uemailtxt" placeholder="ingrese la pass" required>
                        </div>                    
                    

                        <button class="btn btn-primary" type="submit">Agregar</button>

                    </form>
                
                </div>
            
            </div>
        
        </div>
    }
    

}

?>

