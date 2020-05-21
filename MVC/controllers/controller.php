

<?php
  

  class MvcController{
    
    //   Llamada a la plantilla
    public function pagina(){
        include "views/template.php";
    }


    // Enlaces (navegaciones)
    public function enlacesPaginasController(){
        if (isset($_GET['action'])){
            $enlaces = $_GET['action'];
        }else{
            $enlaces = 'index';
        }


        // Es el momento en que el controlador invoca al modelo llamado enlacesPaginasModel para mostrar el listado de páginas
        $respuesta = Paginas::enlacesPaginasModel($enlaces);
        include $respuesta;
    
    }


    // Registro de usuarios
    public function registroUsuarioController(){
        //Recibe a traves del método post el name (html) de usuario, password y email, se almacenan los datos en una variable o propiedad de tipo array (asociativo) en el cual sus propiedades (usuario, password, email)
        if (isset($_POST['usuarioRegistro'])){
            $datosController = array(   "usuario"=>$_POST["usuarioRegistro"], 
                                        "password"=>$_POST["passwordRegistro"],
                                        "email" =>$_POST["emailRegistro"] );
            
            //Se le dice al modelo models/crud.php Datos::registroUsuariosModel, que el metodo registroUsuariosModel reciba en sus parametros los valores $datosController y el nombre de la tabla ala cual debe conectarse
            $respuesta = Datos::resgitrarUsuarioModel($datosController,"usuarios"); // usuarios = tabla
            
            //se imprime la respuesta en la vista
            if($respuesta == "success"){
                header("location:index.php?action=ok");
            }else{
                header("location:index.php?");
            }
            
        }

    }

    //Ingreso usuarios 
    public function ingresoUsuarioController(){
        if (isset($_POST["usuarioIngreso"])){
            $datosController = array ("usuario" => $_POST["usuarioIngreso"],
                                        "password"=> $_POST["passwordIngreso"]);

        $respuesta = Datos::ingresoUsuarioModel($datosController,"usuarios");

        if ($respuesta["usuarios"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){
            session_start();
            $_SESSION["validar"] = true;
            header("location:index.php?action=usuarios");
        }else{
            header("location:index.php?action=fallo");
        }

        }
    }


    public function vistaUsuariosController(){
        $respuesta = Datos::vistaUsuarioModel("usuarios");
        // Foreach para iterar un array e imprimir la consulta del modelo

        foreach($respuesta as $row => $item){
            echo '<tr>
            <td>'.$item["usuario"].'</td>
            <td>'.$item["password"].'</td>
            <td>'.$item["email"].'</td>
            <td><a href="index.php?action=editar&id='.$item["id"].'"><button>Borrar</button></a></td>
            </tr>'; 
        }

    }

    // Editar usuario

    public function editarUsuarioController(){
        $datosController = $_GET["id"];
        $respuesta=Datos::editarUsuarioModel($datosController,"usuarios");

        // Diseñar la estructura de un formulario para mostrar los datos de la consulta generada en el modelo

        echo '<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">
        <input type="text" value="'.$respuesta["usuario"].'" name="usuarioEditar" required>
        <input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required>
        <input type="email" value="'.$respuesta["email"].'" name="emailEditar" required>
        
        ';

    }

        //   Actualizar usuario controller

        public function actualizarUsuarioController(){
            if (isset($_POST["usuarioEditar"])){
                $datosController = array("id"=>$_POST["idEditar"],
                                         "usuario"=>$_POST["usuarioEditar"],
                                         "password"=>$_POST["usuarioPassword"],
                                         "email"=>$_POST["emailEditar"]);
                $respuesta = Datos::actualizarUsuarioModel($datosController,"usuarios");

                if ($respuesta == "success"){
                    header("location:index.php?=cambio");
                }else{
                    echo("error");
                }
            }
        }

        //Borrar usuario
        public function borrarUsuarioController(){
            if (isset($_GET["idBorrarProd"])){
                $datosController = $_GET["idBorrar"];
                $respuesta = Datos::borrarUsuarioModel($datosController,"usuarios");
                if ($respuesta == "success"){
                    header("location:index.php?action=usuarios");
                }
            }

        }

  }


            /** Lista de métodos de modelos por desarrollar:
             * 1.resgitrarUsuarioModel ok
             * 2.ingresoUsuarioModel 
             * 3.vistaUsuarioModel
             * 4.editarUsuarioModel
             * 5.actualizarUsuarioModel
             * 6.borrarUsuarioModel
             */


?>
