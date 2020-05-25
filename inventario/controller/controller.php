
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

            if ($respuesta["usuario"]) == $_POST["txtUser"] && password_verify($_POST["txtPassword"],$respuesta["contraseña"])

        }

    }

}

// public function ingresoUsuarioController(){
//     if (isset($_POST["txtUser"]) && isset($_POST["txtPassword"])){

//     }

// }


?>

