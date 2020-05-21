
<!-- El index mostraremos la salida de la vista al usuario
y a traves .... -->

<?php
    // Invocación a los métodos

    require_once "models/enlaces.php";
    require_once "models/crud.php";
    require_once "models/crudProd.php";
    
    // Controlador
    // Creación de los objetos (lógica de negocio)
    require_once "controllers/controller.php";

    // Muestra la función método "pagina" que se encuentra en controllers/controller.php
    $mvc->pagina();

?>
