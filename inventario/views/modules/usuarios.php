<?php 
	//Se verifica que exista una sesion, en caso de que no sea asi, se muestra el login 
	if(!isset($_SESSION['validar'])){
		header("location:index.php?action=ingresar");
		exit();
	}
	//Llamada a los controladores para insertar/modificar/eliminar usuarios
	$usuarios = new MvcController();
	$usuarios-> insertarUserController();
	$usuarios-> actualizarUserController();
	$usuarios-> eliminarUserController();
	//Se verifica que el usuario haya pulsado sobre el boton de registrar o editar para mostrarle su respectivo formulario
		if(isset($_GET['registrar'])){
			$usuarios->registrarUserController();
		}else if (isset($_GET['idUserEditar'])) {
			$usuarios->editarUserController();
		}

?>
	<div class="container-fluid">
		<div class="row mb-3"> </div>
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Usuarios</h3>
			</div>

			<div class="card-body">
				<div class="row mb-4">
					<div class="col-sm-6">
						<a href="index.php?action=usuarios&registrar" class="btn btn-info">Agregar Nuevo Usuario</a>
					</div>
				</div>
				
				<div id="example2-wrapper" class="dataTables_wrapper dt-bootstrap4">
					<div class="row">
						<div class="col-sm-12">
							<table id="example1" class="table table-hover m-0 table-bordered table-striped">
								<thead class="table-info">
									<tr>
										<th>¿Editar?</th>
										<th>¿Eliminar?</th>
										<th>ID</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Nombre de usuario</th>
										<th>Correo Electrónico</th>
										<th>Perfil</th>
									</tr>
								</thead>
								<tbody>
									<?php
									//Se llama al controlador que muestra todas las categorias que exiten 
									$usuarios->vistaUsersController();
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!--/.container-fluid-->
		