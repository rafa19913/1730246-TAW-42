<?php
//Se verifica ue exista una sesion, en caso de que no sea asi, se muestra el login
 if(!isset($_SESSION['validar'])){
	header("location:index.php?action=ingresar");
	exit();
}

$perfil = $_SESSION['perfil'];
$usuario = $_SESSION['nombre_usuario'];



/*Se llama al controlador que muestra las tarjetas con la informacion que se obtiene del sistema (# de ventas, # de usuarios, #productos, # categorias, # de movimientos en el stock, total de ganancias*/
	
	if ($perfil == "admin"){
		$tablero = new MvcController();
		$tablero -> contarFilas();
	}

?>