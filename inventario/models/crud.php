<?php

	// llamada a la conexión de la BD
	include "conexion.php";



	/**
	 * Clase para realizar consultas a la BD
	 */
	class Datos extends Conexion{

		// EMPIEZA: MODELOS PARA LOS USUARIOS 

		// Inició de sesión de los usuario 
		public function ingresoUsuarioModel($datosModel, $tabla){
			// Preparar las sentencias PDO para ejecutar la consulta de validación de usuario
			$stmt=Conexion::conectar()->prepare("SELECT CONCAT(firstname, ' ',lastname) AS 'nombre_usuario', user_name AS 'usuario', user_password AS 'contrasena', user_id AS 'id' FROM $tabla WHERE user_name = :usuario");
			$stmt->bindParam(":usuario", $datosModel["user"], PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
			$stmt->close();
		
		}


		// Muestra la información de los usuarios existentes
		public function vistaUsersModel($tabla){

			$stmt=Conexion::conectar()->prepare("SELECT user_id AS 'id', firstname, lastname, user_name, user_password, user_email, perfil FROM $tabla");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();

		}


	// Inserta un nuevo usuario a la BD
	public function insertarUserModel($datosModel, $tabla){
		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (firstname, perfil,lastname, user_name, user_password, user_email) VALUES (:perfil,:nusuario,:ausuario,:usuario,:contra,:email)");
		$stmt->bindParam(":nusuario",$datosModel["nusuario"],PDO::PARAM_STR);
		$stmt->bindParam(":ausuario",$datosModel["ausuario"],PDO::PARAM_STR);
		$stmt->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
		$stmt->bindParam(":contra",$datosModel["contra"],PDO::PARAM_STR);
		$stmt->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
		$stmt->bindParam(":perfil",$datosModel["perfil"],PDO::PARAM_STR);
		
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();

	}

	// Carga la información del usuario para ser modificada
	public function editarUserModel($datosModel, $tabla){
		
		$stmt=Conexion::conectar()->prepare("SELECT user_id AS 'id', firstname AS 'nusuario', lastname AS 'ausuario', user_name AS 'usuario', user_password AS 'contra', user_email AS 'email' FROM $tabla WHERE user_id=:id");

		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	// guarda los cambios de un usuario editado en la BD 
	public function actualizarUserModel($datosModel, $tabla){
		
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET firstname = :nusuario, lastname = :ausuario, user_name = :usuario, user_password = :contra, user_email = :email WHERE user_id = :id");
		
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


	// Elimina un usuario de la BD
	public function eliminarUserModel($datosModel, $tabla){
		$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE user_id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}





	public function vistaProductsModel($tabla){
		$stmt=Conexion::conectar()->prepare("SELECT p.id_product as id, p.code_product as codigo, p.name_product as producto, p.price_product as precio, p.stock as stock, c.name_category as categoria FROM $tabla p inner join categories c on p.id_category = c.id_category");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}
	


public function insertarProductsModel($datosModel, $tabla){

	$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (code_product, name_product , date_added , price_product, stock, id_category) VALUES (:codigo, :nombre, sysdate(), :precio, :stock, :categoria)");
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
	$stmt=Conexion::conectar()->prepare("SELECT id_product AS 'id', code_product AS 'codigo', name_product AS 'nombre', price_product AS 'precio', stock FROM $tabla WHERE id_product=:id");
	$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
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
	$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET code_product=:codigo, name_product=:nombre, price_product=:precio, id_category=:categoria, stock=:stock  WHERE id_product=:id");
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

        //Este modelo permite eliminar los datos a travez del arreglo anterior que trae el id en el cual en la siguiente sentencia solo elimina a partir del id recibido
        public function eliminarProductsModel($datosModel,$tabla){
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_product = :id");
            $stmt->bindParam(":id",$datosModel,PDO::PARAM_INT);
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            $stmt->close();
        }

 		//MODELOS PARA CATEGORIAS
        //muestra la información de cada categoría.
        public function vistaCategoriesModel($tabla){
        	$stmt = Conexion::conectar()->prepare("SELECT id_category AS 'idc', name_category AS 'ncategoria', description_category AS 'dcategoria', date_added AS 'fcategoria' FROM $tabla");
        	$stmt -> execute();
        	return $stmt->fetchAll();
        	$stmt -> close();
        }

		//insertar una nueva categoría 
        public function insertarCategoryModel($datosModel, $tabla){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (name_category, description_category,date_added) VALUES (:ncategoria, :dcategoria, sysdate())");
            $stmt->bindParam(":ncategoria",$datosModel["nombre_categoria"],PDO::PARAM_STR);
            $stmt->bindParam(":dcategoria",$datosModel["descripcion_categoria"],PDO::PARAM_STR);
        	if($stmt->execute()){
        		return "success";
        	}else{
        		return "error";
        	}
        	$stmt->close();
		}
		
        //cargar los datos de la categoria para ser modificados
        public function editarCategoryModel($datosModel, $tabla){
        	$stmt = Conexion::conectar()->prepare("SELECT id_category AS 'id', name_category AS 'nombre_categoria', description_category AS 'descripcion_categoria' FROM categories WHERE id_category = :id");
        	$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
        	$stmt -> execute();
        	return $stmt->fetch();
        	$stmt -> close();
		}
		

        //modifica una categoria
        public function actualizarCategoryModel($datosModel,$tabla){
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET name_category = :nombre_categoria, description_category = :descripcion_categoria WHERE id_category = :id");
            $stmt->bindParam(":nombre_categoria",$datosModel["nombre_categoria"],PDO::PARAM_STR);
            $stmt->bindParam(":descripcion_categoria",$datosModel["descripcion_categoria"],PDO::PARAM_STR);
            $stmt->bindParam(":id",$datosModel["id"],PDO::PARAM_INT);
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            $stmt->close();
		}
		

        //Elimina una categoría
        public function eliminarCategoryModel($datosModel,$tabla){
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_category = :id");
            $stmt->bindParam(":id",$datosModel,PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "success";
            } else {
                return "error";
            }
            $stmt->close();
        }


		
		public function obtenerCategoryModel($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id_category AS 'id', name_category AS 'categoria' FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }



		//Este modelo permite mostrar las ventas realizadas, los detalles de la venta y el insertar una nueva tabla a partir del PDO
        public function vistaVentanasModel($tabla){


		}






        //Este modelo sirve para insertar un la BD una nueva venta verificando que no exista otra con el mismo folio y guardando el total a pagar de la misma
        public function insertarVentasModel($datosModel,$ta
        ){
            $stmt = Conexion::conectar()->prepare("INSERT INTO (folio,amount) VALUES(:folio,total)");
            $stmt->bindParam(":price",$datosModel["price"],PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "success";
            } else {
                return "error";
            }
            $stmt->close();
        }
        //Este modelo sirve para asociar los productos a una venta determinada, este modelo solo se usa para las ventas realizadas durante el dia
        public function insertarDetallesVentasModel($datosModel,$tabla){
            $stmt = Conexion::conectar()->prepare("INSERT INTO (id_sales,id_product,quantity,price_count) VALUES(:idv,:idp,:cant,:price *:cant)");
            $stmt->bindParam(":idv",$datosModel["idv"],PDO::PARAM_INT);
            $stmt->bindParam(":idp",$datosModel["idp"],PDO::PARAM_INT);
            $stmt->bindParam(":cant",$datosModel["cant"],PDO::PARAM_INT);
            $stmt->bindParam(":price",$datosModel["price"],PDO::PARAM_INT);
            //... ------------------------------------------------------------------------------------------------------------------
            $stmt->close();
        }
        //Este modelo sirve para eliminar toda la venta de la BD
        public function eliminarVentasModel($datosModel,$tabla){
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_sales = :id");
            $stmt->bindParam(":id",$datosModel,PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "success";
            } else {
                return "error";
            }
            $stmt->close();
        }
        //Este modelo sirve para obtener un producto del detalle de la venta y poder...
        public function traerdetallesmodel($datosModel,$tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id_product, quantity FROM $tabla WHERE id_salesp = :id");
            $stmt->bindParam(":id",$datosModel,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }
        //Este modelo se utiliza para traer todos y cada uno de los productos que se tienen en la base de datos con stock superior a 1
        public function traerProductosVentasModel($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT p.id_product AS 'idp', p.code_producto AS 'codigo', p.name_product AS 'producto', p.price_product AS 'precio', p.stock AS 'stock', c.name_category AS 'categoria' FROM $tabla p INNER JOIN categories c ON p.id_category = c.id_category WHERE p.stock > 1 ORDER BY c.id_category");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
        }
        //Este modelo se utiliza para modificar la ganancia de la venta, se utiliza cada qeu se agrega un producto
        public function updateGananciaVentasModel($datosModel,$tabla){
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET amount = :total WHERE id_sales = :id");
            $stmt->bindParam(":total",$datosModel["Total"],PDO::PARAM_INT);
            $stmt->bindParam(":id",$datosModel[":id"],PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "success";
            } else {
                return "error";
            }
            $stmt->close();
        }
        //Este modelo sirve para obtener el stock que se tiene de un determinado producto para saber si debe o no estar disponible para una venta
        public function obtenerStockModel($datosModel,$tabla){
            $stmt = Conexion::conectar()->prepare("SELECT stock, price_products AS 'precio' FROM $tabla WHERE id_product = :id");
            $stmt->bindParam(":id",$datosModel["idp"],PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }
        //Este modelo sirve para conocer la ganancia total que se tiene de todas las ventas
        public function obtenerGananciasModel($datosModel,$tabla){
            $stmt = Conexion::conectar()->prepare("SELECT SUM(price_count) AS 'total' FROM $tabla WHERE id_sales = :id");
            $stmt->bindParam(":id",$datosModel["id"],PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }



        /*-- Este modelo permite conocer cuantos productos existen en la base de datoscon stock superior a 1
        public function obtenerProductsModel($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id_product AS 'id',name_producto AS cantidad");
        }--*/


	public function contarFilasModel($tabla) {
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) AS 'filas' FROM $tabla");
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	// Permite saber cuantas gananacias se han obtenido de acuerdo a las ventas hechas 
	public function sumarGananciaModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT SUM(amount) AS total FROM $tabla");
		$stmt ->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	public function obtenerProductsModel($tabla){

	}        


	   //Este modelo permite recolectar el ultimo id del registro que permite usar para insertar en la tabla de historial los datos necesarios siendo el id del producto uno de ellos
	   public function ultimoProductsModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_product AS 'id' FROM $tabla ORDER BY id_product DESC LIMIT 1");
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	//Recibe la tabla por el parametro y en los select recolectamos los datos que necesita la tabla historial de la vista a partir del PDO
	public function vistaHistorialModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT u.user_name AS 'usuario', p.name_product AS 'producto', h.date AS 'fecha', h.reference AS 'referencia', h.note AS 'nota', h.quantity AS 'cantidad' FROM historial h INNER JOIN products p ON h.id_producto = p.id_product INNER JOIN users u ON h.user_id = u.user_id");
		$stmt -> execute();
		return $stmt->fetchAll();
		$stmt -> close();
	}

	//Recibe la tabla por parámetro al igual que los datos necesarios para el INSERT recolectados de los formularios anteriores los datos que necesita la tabla historial de al instertar apartir de PDO
	public function insertarHistorialModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_producto, user_id , date , note, reference, quantity) VALUES(:producto, :user, sysdate(), :note, :reference, :cantidad)");
		
		$stmt -> bindParam(":user", $datosModel["user"], PDO::PARAM_INT);
		$stmt -> bindParam(":cantidad", $datosModel["cantidad"], PDO::PARAM_INT);
		$stmt -> bindParam(":producto", $datosModel["producto"], PDO::PARAM_INT);
		$stmt -> bindParam(":note", $datosModel["note"], PDO::PARAM_STR);
		$stmt -> bindParam(":reference", $datosModel["reference"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}


	
}  // Fin de la clase



?>