<?php


require_once "conexion.php";
class Datos2 extends Conexion {

	public static function registroProductoModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, descripcion, pv, pc, inventario) VALUES (:nombre, :descripcion, :pv, :pc, :inventario)");
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":pv", $datosModel["pv"], PDO::PARAM_INT);
		$stmt->bindParam(":pc", $datosModel["pc"], PDO::PARAM_INT);
		$stmt->bindParam(":inventario", $datosModel["inventario"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}

		$stmt->close();
	}

	public static function registroCategoriaModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}

		$stmt->close();
	}

	public static function vistaProductosModel($tabla){
		$stmt=Conexion::conectar()->prepare("SELECT id, nombre, descripcion, pv, pc, inventario FROM $tabla");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	public static function vistaCategoriasModel($tabla){
		$stmt=Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla");
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

	public static function editarProductoModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id, nombre, descripcion, pv, pc, inventario FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}


	public static function editarCategoriaModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	public static function actualizarProductoModel($datosModel, $tabla){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, descripcion = :descripcion, pv = :pv, pc = :pc, inventario = :inventario WHERE id = :id ");
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":pv", $datosModel["pv"], PDO::PARAM_INT);
		$stmt->bindParam(":pc", $datosModel["pc"], PDO::PARAM_INT);
		$stmt->bindParam(":inventario", $datosModel["inventario"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();

	}


	public static function actualizarCategoriaModel($datosModel, $tabla){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id = :id ");
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();

	}


	public static function borrarProductoModel($datosModel, $tabla){
		$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}



	public static function borrarCategoriaModel($datosModel, $tabla){
		$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}


}

?>