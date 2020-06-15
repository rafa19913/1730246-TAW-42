<?php


/**
 * Clase: crear los controladores que utilizará el usuario mientras
 * navega en el sitio 
 */
class MvcController{


	public function plantilla(){
			include "views/template.php";
		}


		// Mostrar al usuario la pantalla correspondiente al momento de seleccionar algo
		public function enlacesPaginasController(){
			if(isset($_GET['action'])){
				$enlacesController = $_GET['action'];
			}else{
				$enlacesController = "index";
			}
			$respuesta = EnlacesPaginas::enlacesPaginasModel($enlacesController);
			include $respuesta;
		}


		// COMIENZA: -- controladores para usuarios --

		//ingresoUsuarioController: a partir de password_verify compara con hash
		// la contraseña ingresada con la que esta en la BD 
		// Si y sólo si es correcta: guarda en un arreglo los datos de la sesion
		// En caso contrario manda un error
		public function ingresoUsuarioController(){
			if(isset($_POST["txtUser"]) && isset($_POST["txtPassword"])){
				$datosController = array("user"=>$_POST["txtUser"],
				"password"=>$_POST["txtPassword"]);

				$respuesta = Datos::ingresoUsuarioModel($datosController,"users");

				
				
				if($respuesta["usuario"] == $_POST["txtUser"] && password_verify($_POST["txtPassword"],$respuesta["contrasena"])){
					session_start();
					$_SESSION["validar"]=true;
					$_SESSION["perfil"]=$respuesta["perfil"];
					$_SESSION["nombre_usuario"]=$respuesta["nombre_usuario"];
					$_SESSION["id"]=$respuesta["id"];
					$_SESSION["perfil"]=$respuesta["perfil"];

					header("Location:index.php?action=tablero");
				}else{
					header("Location:index.php?action=fallo&res=fallo");
				}
			}
		}

		// Cargar todos los datos del usuario a exepción de la contraseña porque esta encriptada
		public function vistaUsersController(){
			$respuesta=Datos::vistaUsersModel("users");
			foreach ($respuesta as $row => $item) {
				echo '
					<tr>
						<td>
							<a href="index.php?action=usuarios&idUserEditar='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
						</td>
						
						<td>
							<a href="index.php?action=usuarios&idBorrar='.$item["id"].'" class="btn btn-danger btn-sm btn-icon" title="Eliminar" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
						</td>
					
						<td>'.$item["id"].'</td>
						<td>'.$item["firstname"].'</td>
						<td>'.$item["lastname"].'</td>
						<td>'.$item["user_name"].'</td>
						<td>'.$item["user_email"].'</td>
						<td>'.$item["perfil"].'</td>	
					</tr>
					';
			}
		}

		// Muestra mediante un foreach todos los productos
		public function vistaProductsController(){
			
			$respuesta=Datos::vistaProductsModel("products");

			foreach ($respuesta as $row => $item) {
				echo '
					<tr>
						<td>
							<a href="index.php?action=inventario&idProductEditar='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
						</td>
						
						<td>
							<a href="index.php?action=inventario&idBorrar='.$item["id"].'" class="btn btn-danger btn-sm btn-icon" title="Eliminar" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
						</td>

							<td>'.$item["id"].'</td>
							<td>'.$item["codigo"].'</td>
							<td>'.$item["producto"].'</td>
							<td>$'.$item["precio"].'</td>
							<td>'.$item["stock"].'</td>
							<td>'.$item["categoria"].'</td>	
							
						<td>
							<a href="index.php?action=inventario&idProductAdd='.$item["id"].'" class="btn btn-primary btn-sn btn-icon" title="Quitar de Stock" data-toggle="tooltip"><i class="fa fa-plus" aria-hidden="true"></i></a>
						</td>
							
						<td>
							<a href="index.php?action=inventario&idProductDel='.$item["id"].'" class="btn btn-primary btn-sn btn-icon" title="Quitar de Stock" data-toggle="tooltip"><i class="fa fa-window-minimize" aria-hidden="true"></i></a>
						</td>


				</tr>
					';
				}
		}
		
		
		
		// Muestra mediante un foreach todos los productos
		public function agregarProductVentaController(){
			
			$respuesta=Datos::vistaProductsModel("products");

			foreach ($respuesta as $row => $item) {
				echo '
					<tr>
						<td>
							<a href="index.php?action=inventario&idProductEditar='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
						</td>
						
						<td>
							<a href="index.php?action=inventario&idBorrar='.$item["id"].'" class="btn btn-danger btn-sm btn-icon" title="Eliminar" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
						</td>

							<td>'.$item["id"].'</td>
							<td>'.$item["codigo"].'</td>
							<td>'.$item["producto"].'</td>
							<td>$'.$item["precio"].'</td>
							<td>'.$item["stock"].'</td>
							<td>'.$item["categoria"].'</td>	
							
						<td>
							<a href="index.php?action=inventario&idProductAdd='.$item["id"].'" class="btn btn-primary btn-sn btn-icon" title="Quitar de Stock" data-toggle="tooltip"><i class="fa fa-plus" aria-hidden="true"></i></a>
						</td>
							
						<td>
							<a href="index.php?action=inventario&idProductDel='.$item["id"].'" class="btn btn-primary btn-sn btn-icon" title="Quitar de Stock" data-toggle="tooltip"><i class="fa fa-window-minimize" aria-hidden="true"></i></a>
						</td>


				</tr>
					';
				}
        }


		// Muestra mediante un foreach todos los productos
		public function vistaProductsVentaController(){
			$respuesta=Datos::vistaProductsModel("products");


			foreach ($respuesta as $row => $item) {

				$id = $item["id"];


				$resp = Datos::obtenerNombreDelProductoPorId($id);



				$codigo = $item["codigo"];
				$precio = $item["precio"];
				$nombreProducto = $item["producto"];

				echo '
					<tr>
						<td>

							<button onClick="agregarProductoATablaAuxiliar('.$id.','.$precio.','.$codigo.');" class="btn btn-primary btn-sm btn-icon" title="Agregar" data-toggle="tooltip"><i class="fa fa-plus-square"></i></button>
		
						</td>
							<td>'.$item["codigo"].'</td>
							<td>'.$nombreProducto.'</td>
							<td>$'.$item["precio"].'</td>
							<td>'.$item["stock"].'</td>
							<td>'.$item["categoria"].'</td>	
						</tr>
					
					';
				}
        }




		// Muestra el formulario del registro de usuario 
		public function registrarUserController(){
			?>
				<div class="col-md-6 mt-3">
					<div class="card card-primary">
						<div class="card-header">
							<h4><b>Registro</b></h4>
						</div>
						<div class="card-body">
							<form method="post" action="index.php?action=usuarios">
								<div class="form-group">
									<label for="nusuariotxt">Nombre:</label>
									<input class="form-control" type="text" name="nusuariotxt" id="nusuariotxt" placeholder="Ingrese el nombre" required>
								</div>
								
								<div class="form-group">
									<label for="ausuariotxt">Apellido:</label>
									<input class="form-control" type="text" name="ausuariotxt" id="ausuariotxt" placeholder="Ingrese el apellido" required>
								</div>

								<div class="form-group">
									<label for="usuariotxt">Usuario:</label>
									<input class="form-control" type="text" name="usuariotxt" id="usuariotxt" placeholder="Ingrese el usuario" required>
								</div>

								<div class="form-group">
									<label for="ucontratxt">Contraseña:</label>
									<input class="form-control" type="password" name="ucontratxt" id="ucontratxt" placeholder="Ingrese la contraseña" required>
								</div>

								<div class="form-group">
									<label for="uemailtxt">Correo Electronico:</label>
									<input class="form-control" type="email" name="uemailtxt" id="uemailtxt" placeholder="Ingrese el correo electronico" required>
								</div>

								<div class="form-group">
									<label for="uperfilttxt">Perfil (rol):</label>
									<br>
									<select class="form-control" name="perfiltxt" id="perfiltxt" >

									<option value="admin">Administrador</option>
									<option value="cajero">Cajero</option>

									</select>

								</div>

								<button class="btn btn-primary" type="submit">Agregar</button>

							</form>
						</div>
					</div>
				</div>
				<?php
		}



		// Inserta el usuario que acaba de ignresar y notifica si existió algun problema
		// Se encripta mediante el algoritmo hash y password_hash se guarda para realizar la inserción 
		public function insertarUserController(){
					if(isset($_POST["nusuariotxt"])){
						
						// Encripta la contraseña 
						$_POST["ucontratxt"]=password_hash($_POST["ucontratxt"], PASSWORD_DEFAULT);
						
						// Almacena en un array los valores los valores de la función "registrarUserController"
						$datosController= array("nusuario"=>$_POST["nusuariotxt"], "ausuario"=>$_POST["ausuariotxt"], "usuario"=>$_POST["usuariotxt"], "contra"=>$_POST["ucontratxt"], "perfil"=>$_POST["perfiltxt"],"email"=>$_POST["uemailtxt"]);


						// Se envian los datos al modelo
						$respuesta=Datos::insertarUserModel($datosController, "users");
						
						if($respuesta =="success"){ // Respuesta del modelo 
							echo '
								<div class="col-md-6 mt-3">
                            		<div class="alert alert-success alert-dismissible">
                                		<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                		<h5>
                                    		<i class="icon fas fa-check"></i>
                                    		¡Éxito!
                                		</h5>
                                		Usuario agregado con éxito.
                            		</div>
                        		</div>
							';
						}else{
							echo '
								<div class="col-md-6 mt-3">
									<div class="alert alert-danger alert-dismissible">
										<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
										<h5>
											<i class="icon fas fa-ban"></i>
											¡Error!
										</h5>
										Se ha producido un error al momento de agregar el usuario, trate de nuevo.
									</div>
								</div>
							';
						}
					}
				}


		// Muestra el formulario para editar sus datos, la contraseña no se muestra porque esta encriptada
		public function editarUserController() {
			$datosController = $_GET["idUserEditar"];
			
			// Envio de datos al modelo
            $respuesta = Datos::editarUserModel($datosController,"users");
            ?>

            <div class="col-md-6 mt-3">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4><b>Editor</b> de Usuarios</h4>
                    </div>
                    <div class="card-body">

                        <form method="post" action="index.php?action=usuarios">
                            <div class="form-group">
                                <input type="hidden" name="idUserEditar" class="form-control" value="<?php echo $respuesta["id"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nusuariotxtEditar">Nombre: </label>
                                <input class="form-control" type="text" name="nusuariotxtEditar" id="nusuariotxtEditar" placeholder="Ingrese el nuevo nombre" value="<?php echo $respuesta["nusuario"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="ausuariotxtEditar">Apellido: </label>
                                <input class="form-control" type="text" name="ausuariotxtEditar" id="ausuariotxtEditar" placeholder="Ingrese el nuevo apellido" value="<?php echo $respuesta["ausuario"]; ?>" required>
                            </div>

                             <div class="form-group">
                                <label for="usuariotxtEditar">Usuario: </label>
                                <input class="form-control" type="text" name="usuariotxtEditar" id="usuariotxtEditar" placeholder="Ingrese el nuevo usuario" value="<?php echo $respuesta["usuario"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="contratxtEditar">Contraseña: </label>
                                <input class="form-control" type="password" name="contratxtEditar" id="contratxtEditar" placeholder="Ingrese la nueva contraseña" required>
                            </div>
							
							<div class="form-group">
                                <label for="uemailtxtEditar">Correo Electrónico: </label>
                                <input class="form-control" type="email" name="uemailtxtEditar" id="uemailtxtEditar" placeholder="Ingrese el nuevo correo electrónico" value="<?php echo $respuesta["email"]; ?>" required>
                            </div>
                            <button class="btn btn-primary" type="submit">Editar</button>
                        </form>
                    </div>
				</div>
            </div>
            <?php
		}
		


		// Actualiza el usuario que se acaba de ingresar y notifica si se realizó la acción u ocurrió algún error
        public function actualizarUserController(){
		if(isset($_POST["nusuariotxtEditar"])){
				$_POST["contratxtEditar"] = password_hash($_POST["contratxtEditar"], PASSWORD_DEFAULT);

				$datosController = array("id"=>$_POST["idUserEditar"],"nusuario"=>$_POST["nusuariotxtEditar"],"ausuario"=>$_POST
				["ausuariotxtEditar"],"usuario"=>$_POST["usuariotxtEditar"],"contra"=>$_POST["contratxtEditar"],"email"=>$_POST["uemailtxtEditar"]);

				// Enviar datos al modelo
				$respuesta=Datos::actualizarUserModel($datosController,"users");
				if($respuesta=="success"){
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									¡Exito!
								</h5>
								Usuario editado con exito.
							</div>
						</div>
					';
				}else{
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									¡Error!
								</h5>
								Se ha producido un error al momento de editar el usuario, trate de nuevo.
							</div>
						</div>
					';
				}
			}
		}



		// Elimina el usuario que acaba de ingresar y notifica si ocurrio algún error
        public function eliminarUserController() {
        	if(isset($_GET["idBorrar"])){
        		$datosController=$_GET["idBorrar"];
				
				// Manda los datos al modelo
				$respuesta=Datos::eliminarUserModel($datosController,"users");
				
				// Respuesta del modelo con parámetros
        		if($respuesta=="success"){
        			echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									¡Exito!
								</h5>
								Usuario eliminado con exito.
							</div>
						</div>
					';
       			}else{
       				echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									¡Error!
								</h5>
								Se ha producido un error al momento de eliminar el usuario, trate de nuevo.
							</div>
						</div>
					';
       			}
        	}
        }

		// Muestra el formulario de registro de producto
        public function registroProductController(){
        	?>
        	<div class="col-md-6 mt-3">
        		<div class="card card-primary">
        			<div class="card-header">
        				<h4><b>Registro</b> de Productos</h4>
        			</div>
        			<div class="card-body">
        				<form method="post" action="index.php?action=inventario">
        					<div class="form-group">
        						<label for="codigotxt">Código:</label>
        						<input class="form-control" name="codigotxt" id="codigotxt" type="text" required placeholder="Código del producto">
        					</div>

        					<div class="form-group">
        						<label for="nombretxt">Nombre:</label>
        						<input class="form-control" name="nombretxt" id="nombretxt" type="text" required placeholder="Nombre del producto">
        					</div>

        					<div class="form-group">
        						<label for="preciotxt">Precio:</label>
        						<input class="form-control" name="preciotxt" id="preciotxt" type="number" min="1" required placeholder="Precio del producto">
        					</div>

        					<div class="form-group">
        						<label for="ucontratxt">Stock:</label>
        						<input class="form-control" name="stocktxt" id="stocktxt" type="number" min="1" required placeholder="Cantidad de stock del producto">
        					</div>

        					<div class="form-group">
        						<label for="referenciatxt">Motivo:</label>
        						<input class="form-control" name="referenciatxt" id="referenciatxt" type="text" required placeholder="Referencia del producto">
        					</div>

        					<div class="form-group">
        						<label for="uemailtxt">Categoria:</label>
        						<select name="categoria" id="categoria" class="form-control">
        							<?php
        								$respuesta_categoria = Datos::obtenerCategoryModel("categories");
        								foreach ($respuesta_categoria as $row => $item) {
        							?>
        									<option value="<?php echo $item["id"]; ?>"><?php echo $item["categoria"]; ?></option>
        							<?php
        								}
        							?>
        						</select>
        					</div>
        					<button class="btn btn-primary" type="submit">Agregar</button>
        				</form>
        			</div>
        		</div>
        	</div>
        	<?php //se abre el php
        }

		// Inserta productos 
        public function insertarProductController(){
        	if(isset($_POST["codigotxt"])){
				$datosController = array("codigo"=>$_POST["codigotxt"], "precio"=>$_POST["preciotxt"], "stock"=>$_POST["stocktxt"], "categoria"=>$_POST["categoria"], "nombre"=>$_POST["nombretxt"]); 
				

        		$respuesta=Datos::insertarProductsModel($datosController,"products");
				
				if ($respuesta == "success"){
        			$respuesta3 = Datos::ultimoProductsModel("products");
        			$datosController2 = array("user"=>$_SESSION["id"], "cantidad"=>$_POST["stocktxt"], "producto"=>$respuesta3["id"],"note"=>$_SESSION["nombre_usuario"]." agrego/compro","reference"=>$_POST["referenciatxt"]);
					
					$respuesta2 = Datos::insertarHistorialModel($datosController2, "historial");
        			echo '
						<div class="col-md-6 mt-3">
                            <div class="alert alert-success alert-dismissible">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                	<h5>
                                    	<i class="icon fas fa-check"></i>
                                    		¡Éxito!
                                	</h5>
                                	Producto agregado con éxito.
                            </div>
                        </div>
							';
						}else{
							echo '
								<div class="col-md-6 mt-3">
									<div class="alert alert-danger alert-dismissible">
										<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
										<h5>
											<i class="icon fas fa-ban"></i>
											¡Error!
										</h5>
										Se ha producido un error al momento de agregar el producto, trate de nuevo.
									</div>
								</div>
        					';
        				}
        			}
        		}


		// Edita los datos de algun producto a seleccionar
        public function editarProductController(){
			$datosController = $_GET["idProductEditar"];
        	$respuesta = Datos::editarProductsModel($datosController, "products");
			   
			?>
       		<div class="col-md-6 mt-3">
        		<div class="card card-warning">
        			<div class="card-header">
        			<h4><b>Editor</b> de Productos</h4>
        		</div>
        		<div class="card-body">
        			<form method="post" action="index.php?action=inventario">
        				<div class="form-group">
        					<input type="hidden" name="idProductEditar" class="form-control" value="<?php echo $respuesta["id"]; ?>" required>
        				</div>

        				<div class="form-group">
        					<label for="codigotxtEditar">Código:</label>
        					<input class="form-control" name="codigotxteditar" id="codigotxteditar" type="text" value="<?php echo $respuesta["codigo"]; ?>" required placeholder="Codigo de producto">
        				</div>

        				<div class="form-group">
        					<label for="nombretxteditar">Nombre:</label>
        					<input class="form-control" name="nombretxteditar" id="nombretxteditar" type="text" value="<?php echo $respuesta["nombre"]; ?>" required placeholder="Nombre de producto">
        				</div>

        				<div class="form-group">
        					<label for="preciotxteditar">Precio:</label>
        					<input class="form-control" name="preciotxteditar" id="preciotxteditar" type="number" min="1" value="<?php echo $respuesta["precio"]; ?>" required placeholder="Precio de producto">
        				</div>
        				
        				<div class="form-group">
        					<label for="stocktxteditar">Stock:</label>
        					<input class="form-control" name="stocktxteditar" id="stocktxteditar" type="number" min="1" value="<?php echo $respuesta["stock"]; ?>" required placeholder="Cantidad de stock del producto">
        				</div>

        				<div class="form-group">
        					<label for="referenciatxteditar">Motivo:</label>
        					<input class="form-control" name="referenciatxteditar" id="referenciatxteditar" type="text" required placeholder="Referencia del producto">
        				</div>

        				<div class="form-group">
        					<label for="categoriaeditar">Categoria:</label>
        					<select name="categoriaeditar" id="categoriaeditar" class="form-control">
        						<?php
									$respuesta_categoria = Datos::obtenerCategoryModel("categories");
									foreach ($respuesta_categoria as $row => $item){
        						?>
        							<option value="<?php echo $item["id"]; ?>"><?php echo $item["categoria"]; ?></option>
        						<?php
        							}
        						?>
        					</select>
        				</div>
        				<button class="btn btn-primary" type="submit">Editar</button>
        			</form>
        		</div>
        	</div>
        </div>
        <?php
		
	}



	// Actualiza los productos seleccionados
	public function actualizarProductController(){
		if(isset($_POST["codigotxteditar"])){
			$datosController = array("id"=>$_POST["idProductEditar"], "codigo"=>$_POST["codigotxteditar"], "precio"=>$_POST["preciotxteditar"], "stock"=>$_POST["stocktxteditar"], "categoria"=>$_POST["categoriaeditar"], "nombre"=>$_POST["nombretxteditar"]);

			$respuesta = Datos::actualizarProductsModel($datosController, "products");
			
			if($respuesta == "success"){
				$datosController2 = array("user"=>$_SESSION["id"], "cantidad"=>$_POST["stocktxteditar"], "producto"=>$_POST["idProductEditar"], "note"=>$_SESSION["nombre_usuario"]."agrego/compro", "reference"=>$_POST["referenciatxteditar"]);

				$respuesta2 = Datos::insertarHistorialModel($datosController2, "historial");
				
				echo '
					<div class="col-md-6 mt-3">
						<div class="alert alert-success alert-dismissible">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							<h5>
								<i class="icon fas fa-check"></i>
								Exito!
							</h5>
							Producto actualizado con exito.
						</div>
					</div>
				';

				}else{
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
									<h5>
										<i class="icon fas fa-ban"></i>
										¡Error!
									</h5>
									Se ha producido un error al momento de actualizar el producto, trate de nuevo.
							</div>
						</div>
					';				
				} 
			}
		}

			
	public function eliminarProductController(){
		if(isset($_GET["idBorrar"])){
					$datosController=$_GET["idBorrar"];
					$respuesta=Datos::eliminarProductsModel($datosController,"products");
					if($respuesta=="success"){
						echo '
							<div class="col-md-6 mt-3">
								<div class="alert alert-success alert-dismissible">
									<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
									<h5>
										<i class="icon fas fa-check"></i>
										¡Exito!
									</h5>
									Producto eliminado con exito.
								</div>
							</div>
						';
					}else{
						echo '
							<div class="col-md-6 mt-3">
								<div class="alert alert-danger alert-dismissible">
									<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
									<h5>
										<i class="icon fas fa-ban"></i>
										¡Error!
									</h5>
									Se ha producido un error al momento de eliminar el Producto, trate de nuevo.
								</div>
							</div>
						';
					}
				}
			}


	public function addProductController(){
		$datosController=$_GET["idProductAdd"];
		$respuesta=Datos::editarProductsModel($datosController, "products");
		?>
		<div class="col-md-6 mt-3">
			<div class="card card-warning">
				<div class="card-header">
					<h4><b>Agregar</b> stock al producto</h4>
				</div>
			
				<div class="card-body">
					<form method="post" action="index.php?action=inventario">
						<div class="form-group">
							<input type="hidden" name="idProductAdd" class="form-control" value="<?php echo $respuesta ["id"]; ?>" required>
						</div>

					<div class="form-group">
						<label for="codigotxtEditar">Stock:</label>
						<input class="form-control" name="addstocktxt" id="addstocktxt" type="number" min="1" value="1" required placeholder="Stock del producto">
					</div>
					
					<div class="form-group">
						<label for="referenciatxtadd">Motivo:</label>
						<input class="form-control" name="refereciatxtadd" id="refereciatxtadd" type="text" required placeholder="Referencia del producto">
					</div>

					<button class="btn btn-primary" type="submit">Realizar Cambio</button>
					</form>
				</div>
			</div>
		</div
	<?php
	}




	public function actualizar1StockController(){
		if(isset($_POST["addstocktxt"])){
			$datosController = array("id"=>$_POST["idProductAdd"], "stock"=>$_POST["addstocktxt"]);
			$respuesta = Datos::pushProductsModel($datosController, "products");

			if($respuesta == "success"){
				$datosController2 = array("user"=>$_SESSION["id"], "cantidad"=>$_POST["addstocktxt"], "producto"=>$_POST["idProductAdd"], "note"=>$_SESSION["nombre_usuario"]."agrego/compro", "reference"=>$_POST["refereciatxtadd"]);

				$respuesta2 = Datos::insertarHistorialModel($datosController2, "historial");
				
				echo '
					<div class="col-md-6 mt-3">
						<div class="alert alert-success alert-dismissible">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							<h5>
								<i class="icon fas fa-check"></i>
								¡Exito!
							</h5>
							Stock modificado con exito.
						</div>
					</div>
					';
				}else{
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
									<h5>
										<i class="icon fas fa-ban"></i>
										¡Error!
									</h5>
									Se ha producido un error al momento de modificar el stock del producto, trate de nuevo.
							</div>
						</div>
					';				
				} 
			}
		}


	// actualiza el producto y a su vez inserta una nueva fila 
	// si la modificación sale correcto insertará la nueva actualización en el historial
	public function actualizar2StockController(){
	if(isset($_POST["delstocktxt"])){
		$datosController = array("id"=>$_POST["idProductDel"], "stock"=>$_POST["delstocktxt"]);
		$respuesta = Datos::pullProductsModel($datosController, "products");
		
		if($respuesta == "success"){
			$datosController2 = array("user"=>$_SESSION["id"], "cantidad"=>$_POST["delstocktxt"], "producto"=>$_POST["idProductDel"], "note"=>$_SESSION["nombre_usuario"]."quito", "reference"=>$_POST["referenciatxtdel"]);
			
			$respuesta2 = Datos::insertarHistorialModel($datosController2, "historial");
			
			echo '
				<div class="col-md-6 mt-3">
					<div class="alert alert-success alert-dismissible">
						<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
						<h5>
							<i class="icon fas fa-check"></i>
							¡Exito!
						</h5>
						Stock modificado con éxito.
					</div>
				</div>
			';
			}else {
				echo '
					<div class="col-md-6 mt-3">
						<div class="alert alert-danger alert-dismissible">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									¡Error!
								</h5>
								Se ha producido un error al momento de modificar el stock del producto, trate de nuevo.
						</div>
					</div>
        		';				
			} 
		}
	}

	//Esta funcion permite quitar productos al stock a traves del boton y un formulario para agregar dicha cantidad al producto se llama al modelo correspondiente para asi pasar al controlador que actualiza dicho modelo
	public function delProductController(){
		$datosController=$_GET["idProductDel"];
		$respuesta=Datos::editarProductsModel($datosController, "products");
		?>
		<div class="col-md-6 mt-3">
			<div class="card card-warning">
				<div class="card-header">
					<h4><b>Eliminar</b> stock al producto</h4>
				</div>
			
				<div class="card-body">
					<form method="post" action="index.php?action=inventario">
						<div class="form-group">
							<input type="hidden" name="idProductDel" class="form-control" value="<?php echo $respuesta["id"]; ?>" required>
						</div>

					<div class="form-group">
						<label for="codigotxtEditar">Stock:</label>
						<input class="form-control" name="delstocktxt" id="delstocktxt" type="number" min="1" max="<?php echo $respuesta ["stock"]; ?>" value="<?php echo $respuesta["stock"]; ?>" required placeholder="Stock del producto">
					</div>
					
					<div class="form-group">
						<label for="referenciatxtdel">Motivo:</label>
						<input class="form-control" name="referenciatxtdel" id="referenciatxtdel" type="text" required placeholder="Referencia del producto">
					</div>

					<button class="btn btn-primary" type="submit">Realizar Cambio</button>
					</form>
				</div>
			</div>
		</div
	<?php
	}


	//EMPIEZA: -- CONTROLADORES DE HISTORIAL --
	
	
	// Muestra los datos de la tabla historial
	public function vistaHistorialController(){
		$respuesta = Datos::vistaHistorialModel("historial");


		foreach ($respuesta as $row => $item) {
			echo '
				<tr>
					<td>'.$item["usuario"].'</td>
					<td>'.$item["producto"].'</td>
					<td>'.$item["nota"].'</td>
					<td>'.$item["cantidad"].'</td>
					<td>'.$item["referencia"].'</td>
					<td>'.$item["fecha"].'</td>
				</tr>
			';
		}
	}



	// Muestra las categorias mediante un for each
	public function vistaCategoriesController(){
		$respuesta = Datos::vistaCategoriesModel("categories");
		foreach ($respuesta as $row => $item){
			echo '
				<tr>
				<td>
					<a href="index.php?action=categorias&idCategoryEditar='.$item["idc"].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltipe"><i class="fa fa-edit"></i></a>
				</td>

				<td>
					<a href="index.php?action=categorias&idBorrar='.$item["idc"].'" class="btn btn-danger btn-sm btn-icon" title="Eliminar" data-toggle="tooltipe"><i class="fa fa-trash"></i></a>
				</td>

				<td>'.$item["idc"].'</td>
				<td>'.$item["ncategoria"].'</td>
				<td>'.$item["dcategoria"].'</td>
				<td>'.$item["fcategoria"].'</td>

			</tr>

			';


		}

	}

      //Este controlador permite mostrar un formulario para que el usuario pueda agregar una categoria a la base de datos
        public function registrarCategoryController(){
            ?>
            <div class="col-md-6 mt-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4><b>Registro</b> de categorias</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="index.php?action=categorias">
                            <div class="form-group">
                                <label for="ncategoriatxt">Nombre de la categoria: </label>
                                <input class="form-control" type="text" name="ncategoriatxt" id="ncategoriatxt" placeholder="Ingrese el nombre de la categoria">
                            </div>
                            <div class="form-group">
                                <label for="dcategoriatxt">Descripcion de la categoria: </label>
                                <input class="form-control" type="text" name="dcategoriatxt" id="dcategoriatxt" placeholder="Ingrese la descripcion de la categoria">
                            </div>
                            <button class="btn btn-primary" type="submit">Agregar</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
		}
		
		
        //Este controlador sirve para insertar la categoria que acaba de ingresar el usuario y notificar si se realizó dicha actividad o si hubo algun error
        public function insertarCategoryController(){
            if(isset($_POST["ncategoriatxt"]) && isset($_POST["dcategoriatxt"])){
                $datosController = array("nombre_categoria"=>$_POST["ncategoriatxt"],"descripcion_categoria"=>$_POST["dcategoriatxt"]);
                $respuesta = Datos::insertarCategoryModel($datosController,"categories");
                if ($respuesta == "success") {
            
                echo '
                    <div class="col-md-6 mt-3">
                        <div class="alert alert-success alert-dismissible>
                            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                            <h5>
                                <i class="icon fas fa-check"></i>
                                ¡Éxito!
                            </h5>
                            Stock modificado con éxito.
                        </div>
                    </div>
                ';
                } else {
                    echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-danger alert-dismissible>
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-check"></i>
                                    ¡Error!
                                </h5>
                                Error al modificar el stock
                            </div>
                        </div>
                    ';
                }
            }

        }

		// Muestra un formulario cargando los daots del producto a editar
		public function editarCategoryController(){
            $datosController = $_GET["idCategoryEditar"];
			$respuesta = Datos::editarCategoryModel($datosController,"categories");
			

            ?>
            <div class="col-md-6 mt-3">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4><b>Editor</b> de categorías</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="index.php?action=categorias">
                            <div class="form-group">
                                <input type="hidden" name="idCategoryEditar" class="form-control" value="<?php echo $respuesta["id"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="ncategoriatxt">Nombre de la categoría: </label>
                                <input type="text" name="ncategoriatxteditar" id="ncategoriatxt" class="form-control" value="<?php echo $respuesta["nombre_categoria"]; ?>" placeholder="Ingrese el nombre de la categoría" required>
                            </div>
                            <div class="form-group">
                                <label for="dcategoriatxt">Descripción de la categoría: </label>
                                <input type="text" name="dcategoriatxteditar" id="dcategoriatxt" class="form-control" value="<?php echo $respuesta["descripcion_categoria"]; ?>" placeholder="Ingresela descripción de la categoría" required>
                            </div>
                            <button class="btn btn-primary" type="submit">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
		}


		   
		   public function actualizarCategoryController(){
            if (isset($_POST["ncategoriatxteditar"]) && isset($_POST["dcategoriatxteditar"])) {
                $datosController = array("id"=>$_POST["idCategoryEditar"],"nombre_categoria"=>$_POST["ncategoriatxteditar"],"descripcion_categoria"=>$_POST["dcategoriatxteditar"]);
				
				$respuesta = Datos::actualizarCategoryModel($datosController,"categories");
				
				if ($respuesta == "success") {
                
                echo '
                    <div class="col-md-6 mt-3">
                        <div class="alert alert-success alert-dismissible>
                            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                            <h5>
                                <i class="icon fas fa-check"></i>
                                ¡Éxito!
                            </h5>
                            Categoría modificada con éxito.
                        </div>
                    </div>
                ';
                } else {
                    echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-danger alert-dismissible>
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-check"></i>
                                    ¡Error!
                                </h5>
                                Error al modificar la categoría
                            </div>
                        </div>
                    ';
                }
            }
        }

		

		public function eliminarCategoryController(){
            if(isset($_GET["idBorrar"])){
                $datosController = $_GET["idBorrar"];
                $respuesta = Datos::eliminarCategoryModel($datosController,"categories");
                if ($respuesta == "success") {
                echo '
                    <div class="col-md-6 mt-3">
                        <div class="alert alert-success alert-dismissible>
                            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                            <h5>
                                <i class="icon fas fa-check"></i>
                                ¡Éxito!
                            </h5>
                            categoría eliminada con éxito
                        </div>
                    </div>
                ';
                } else {
                    echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-danger alert-dismissible>
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-check"></i>
                                    ¡Error!
                                </h5>
                                Error al eliminar la categoría
                            </div>
                        </div>
                    ';
                }
            }
        }
		


		//EMPIEZA: -- CONTROLADORES DE CATEGORÍAS --
			// muestra al usuario productos, ventas registradas, y ganancias de las ventas
			public function contarFilas(){
				$respuesta_users = Datos::contarFilasModel("users");
				$respuesta_products = Datos::contarFilasModel("products");
				$respuesta_categories = Datos::contarFilasModel("categories");
				$respuesta_historial = Datos::contarFilasModel("historial");
				//$respuesta_ventas = Datos::contarFilasModel("sales");
				//$respuesta_totales = Datos::sumarGananciaModel("sales");
			
            //Muestra la cantidad de filas que hay en cada una de las tablas.
            echo '  
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>'.$respuesta_users["filas"].'</h3>
                            <p>Total de Usuarios</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-address-card"></i>
                        </div>
                        <a class="small-box-footer" href="index.php?action=usuarios">Más <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3>'.$respuesta_products["filas"].'</h3>
                            <p>Total de Productos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <a class="small-box-footer" href="index.php?action=inventario">Más <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-olive">
                        <div class="inner">
                            <h3>'.$respuesta_categories["filas"].'</h3>
                            <p>Total de Categorías</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-tag"></i>
                        </div>
                        <a class="small-box-footer" href="index.php?action=categorias">Más <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-gray">
                        <div class="inner">
                            <h3>'.$respuesta_historial["filas"].'</h3>
                            <p>Movimientos en el Inventario</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-archive"></i>
                        </div>
                        <a class="small-box-footer" href="index.php?action=inventario">Más <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                 ';
			}
		}
	?>




				<!--
						 -- AQUI VAN LAS DE VENTAS --
					<div class="col-lg-3 col-6">
											<div class="small-box bg-info">
												<div class="inner">
													<h3>'.$respuesta_ventas["filas"].'</h3>
													<p>Total de Ventas</p>
												</div>
												<div class="icon">
													<i class="far fa-address-card"></i>
												</div>
												<a class="small-box-footer" href="index.php?action=ventas">Más <i class="fas fa-arrow-circle-right"></i></a>
											</div>
										</div>
					
										<div class="col-lg-3 col-6">
											<div class="small-box bg-info">
												<div class="inner">
													<h3>' .$respuesta_totales["filas"].'</h3>
													<p>Total de Ganancia Ventas</p>
												</div>
												<div class="icon">
													<i class="far fa-address-card"></i>
												</div>
												<a class="small-box-footer" href="index.php?action=ventas&todas">Más <i class="fas fa-arrow-circle-right"></i></a>
											</div>
										</div>  -->

