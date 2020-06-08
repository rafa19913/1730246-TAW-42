<?php
include "conexion.php";


class Datos extends Conexion{


	
	public function ingresoUsuarioModel($datosModel, $tabla){
		$stmt=Conexion::conectar()->prepare("SELECT CONCAT (firstname, ' ', lastname) AS 'nombre_usuario', user_name AS 'usuario', user_password AS 'contrasena', user_id AS 'id' FROM $tabla WHERE user_name=:usuario");
		$stmt->bindParam(":usuario", $datosModel["user"], PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}


	public function vistaUsersModel($tabla){

	$stmt=Conexion::conectar()->prepare("SELECT user_id AS 'id', firstname, lastname, user_name, user_password, user_email, date_addeed FROM $tabla");
	$stmt->execute();
	return $stmt->fetchAll();
	$stmt->close();
}



public function insertarUserModel($datosModel, $tabla){
	$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (firstname, lastname, user_name, user_password, user_email) VALUES (:nusuario,:ausuario,:usuario,:contra,:email)");
	$stmt->bindParam(":nusuario",$datosModel["nusuario"],PDO::PARAM_STR);
	$stmt->bindParam(":ausuario",$datosModel["ausuario"],PDO::PARAM_STR);
	$stmt->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
	$stmt->bindParam(":contra",$datosModel["contra"],PDO::PARAM_STR);
	$stmt->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
	if($stmt->execute()){
		return "success";
	}else{
		return "error";
	}
	$stmt->close();
}


public function editarUserModel($datosModel, $tabla){
	
	$stmt=Conexion::conectar()->prepare("SELECT user_id AS 'id', firstname AS 'nusuario', lastname AS 'ausuario', user_name AS 'usuario', user_password AS 'contra', user_email AS 'email' FROM $tabla WHERE user_id=:id");

	$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
	$stmt->execute();
	return $stmt->fetch();
	$stmt->close();
}


public function actualizarUserModel($datosModel, $tabla){
	
	$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET firstname=:nusuario, lastname=:ausuario, user_name=:usuario, user_password=:contra, user_email=:email WHERE user_id=:id");
	$stmt->bindParam(":nusuario",$datosModel["nusuario"],PDO::PARAM_STR);
	$stmt->bindParam(":ausuario",$datosModel["ausuario"],PDO::PARAM_STR);
	$stmt->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
	$stmt->bindParam(":contra",$datosModel["contra"],PDO::PARAM_STR);
	$stmt->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
	$stmt->bindParam(":id",$datosModel["id"],PDO::PARAM_INT);
	if($stmt->execute()){
		return "success";
	}else{
		return "error";
	}
	$stmt->close();
}



public function eliminarUserModel($datosModel, $tabla){
	$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE user_id=:id");
	$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
	if($stmt->execute()){
		return "success";
	}else{
		return "error";
	}
	$stmt->close();
}





public function vistaProductsModel($tabla){
	$stmt=Conexion::conectar()->prepare("SELECT p.id_product AS 'id',p.code_producto AS 'codigo', p.name_product AS 'producto', p.date_added AS 'fecha', p.price_product AS 'precio', p.stock AS 'stock', c.name_category AS 'categoria' FROM $tabla p INNER JOIN categories c ON p.id_category= c.id_category");
	$stmt->execute();
	return $stmt->fetchAll();
	$stmt->close();
}




public function insertarProductsModel($datosModel, $tabla){
	$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (code_producto, name_product, price_product, stock, id_category) VALUES (:codigo, :nombre,:precio, :stock, :categoria)");
	$stmt->bindParam(":codigo",$datosModel["codigo"],PDO::PARAM_STR);
	$stmt->bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);
	$stmt->bindParam(":precio",$datosModel["precio"],PDO::PARAM_STR);
	$stmt->bindParam(":stock",$datosModel["stock"],PDO::PARAM_INT);
	$stmt->bindParam(":categoria",$datosModel["categoria"],PDO::PARAM_INT);
	if($stmt->execute()){
		return "success";
	}else{
		return "error";
	}
	$stmt->close();
}



public function editarProductsModel($datosModel, $tabla){
	$stmt=Conexion::conectar()->prepare("SELECT id_product AS 'id', code_producto AS 'codigo', name_product AS 'nombre', price_product AS 'precio', stock FROM $tabla WHERE id_product=:id");
	$stmt->bindParam(":id", datosModel, PDO::PARAM_INT);
	$stmt->execute();
	return $stmt->fetch();
	$stmt->close();
}



public function pushProductsModel($datosModel, $tabla){
	$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET stock=stock +:stock WHERE id_product=:id");
	$stmt->bindParam(":stock",$datosModel["stock"],PDO::PARAM_INT);
	$stmt->bindParam(":id",$datosModel["id"],PDO::PARAM_INT);
	if($stmt->execute()){
		return "success";
	}else{
		return "error";
	}
	$stmt->close();
}



public function pullProductsModel($datosModel, $tabla){
	$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET stock=stock -:stock WHERE id_product=:id AND stock>=:stock");
	$stmt->bindParam(":stock",$datosModel["stock"],PDO::PARAM_INT);
	$stmt->bindParam(":id",$datosModel["id"],PDO::PARAM_INT);
	if($stmt->execute()){
		return "success";
	}else{
		return "error";
	}
	$stmt->close();
}


public function actualizarProductsModel($datosModel, $tabla){
	$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET code_producto=:codigo, name_product=:nombre, price_product=:precio, id_category=:categoria, stock=:stock  WHERE id_product=:id");
	$stmt->bindParam(":codigo",$datosModel["codigo"],PDO::PARAM_STR);
	$stmt->bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);
	$stmt->bindParam(":precio",$datosModel["precio"],PDO::PARAM_INT);
	$stmt->bindParam(":categoria",$datosModel["categoria"],PDO::PARAM_INT);
	$stmt->bindParam(":stock",$datosModel["stock"],PDO::PARAM_INT);
	$stmt->bindParam(":id",$datosModel["id"],PDO::PARAM_INT);
	if($stmt->execute()){
		return "success";
	}else{
		return "error";
	}
	$stmt->close();
}


public function contarFilasModel($tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) AS 'filas' FROM $tabla");
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
}



public function sumarGananciaModel($tabla){


}

public function obtenerProductsModel($tabla){

}        

}
?>