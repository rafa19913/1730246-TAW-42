


<?php
    require_once('bd/conexion.php');
    require_once('controlador/estudiante_controller.php');
    require_once('controlador/carrera_controller.php');
    require_once('controlador/universidad_controller.php');
    

    include ("vistas/header.php");
    include ("funciones.php");

    $controlador = ""; // Variable global para crear el controlador
    $ruta = ""; // Variable global para almacenar la ruta seleccionada

    if (!empty($_REQUEST['m'])){
        compararSeccionSeleccionada();
    }

    
 
    

?>


