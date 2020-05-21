
<?php


require_once "conexion.php";

//Heredar la clase conexion.php para accesar y utilizar la conexión a la BD, se extiende cuando se requiere manipular una función o método, en este caso manipular la función "conectar" de models/conexión.php
class Datos extends Conexion{
    //Registro de usuarios

    /** Registro de usuarios */
    public function registroUsuarioModel($datosModel, $tabla){
        //prepare() = prepara la sentencia SQL para ser ejecutada por el método POStantement. La sentencia se puede contener desde 0 para ejecutar más parametros
        
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario, password, email) VALUES (:usuario,:password,:email)");


        //bindParam() vincula una variable php a un parametro pde sustitución con nombre correspondiente a ña sentencia sql que fue usada para preparar la setnencia
        $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datosModel["password"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datosModel["email"], PDO::PARAM_STR);
        
        //Regresar una respuesta satisfactoria o no

        if ($stmt->execute())
            return "success";
        else
            return "error";
        
        $stmt->close();

    }

    
    // Modelo vista usuarios
    public function vistaUsuarioModel($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $tabla");
        $stmt = execute();

        //fetchAll(): Obtiene todas las filas de un conjunto de resultados asociados al objeto PDO statmente (stmt)
        return $stmt->fetchAll();
        $stmt->close();
    }

    //Modelo Editar Usuario

    public function editarUsuarioModel($datosModel, $tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id",$datosModel, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt-fetch();
        $stmt->close();      
    }


    // Modelo actualizar usuario

    public function actualizarUSuarioModel($datosModel, $tabla){
        $stm = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, password = :password, email = :email WHERE id = :id");

        $stmt->bindParam(":usuario",$datosModel["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password",$datosModel["password"], PDO::PARAM_STR);
        $stmt->bindParam(":email",$datosModel["email"], PDO::PARAM_STR);
        $stmt->bindParam(":id",$datosModel["id"], PDO::PARAM_STR);
    }


    // Modelo borrar usuario

    public function borrarUsuarioModel($datosModel,$tabla){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id,$datosModel, PDO::PARAM_INT");

        if ($stmt->execute()){
            return "success";
        }else{
            return "error";
        }

        $stmt->close();

    }

    //Modelo ingresoUsuarioModel 

    public function ingresoUsuarioModel($datos, $tabla){
        $stmt = Conexion::conectar()->prepare("SELECT usuario, password FROM $tabla WHERE usuario = :usuario");
        $stmt = bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
        $stmt = execute();
        return $stmt->fetch();
        $stmt->close();
    }


}


?>