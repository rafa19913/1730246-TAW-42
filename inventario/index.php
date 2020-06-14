<?php
	// -- Se activa el almacenamiento del buffer --
	ob_start();

	//  Llamada a los archivos que contienen los controladores y modelos necesarios
	require_once("controllers/controller.php");
 	require_once("models/enlaces.php");
 	require_once("models/crud.php");

 	$mvc = new MvcController();
 	$mvc -> plantilla();  // Llamada a la plantilla


?>