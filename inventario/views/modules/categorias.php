<?php 
//Se verifica que exista una sesion, en caso de que no sea asi, se muestra el login 
if(!isset($_SESSION['validar'])){
	header("location:index.php?action=ingresar");
	exit();
}
//Llamada a los controladores para insertar/modifica/
$categorias=new MvcController();
$categorias->insertarCategoryController();
$categorias->actualizarCategoryController();
$categorias->eliminarCategoryController();

//se verifica que el usuario haya pulsado sobre el boton 
	if(isset($_GET['registrar'])){
		$categorias->registrarCategoryController();
	}else if(isset($_GET['idCategoryEditar'])){
		$categorias->editarCategoryController();
	}
	