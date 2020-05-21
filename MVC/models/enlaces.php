
<?php
    // Modelo de enlaces WEB

    class Paginas{

        public function enlacesPaginasModel($enlaces){
            if ($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "productos" || $enlaces == "registrarProducto" || $enlaces == "editar" || $enlaces == "editarProducto" || $enlaces == "salir"){
                $module = "views/modules/".$enlaces;
                
            }else if ($enlaces == "fallo"){
                $module = "views/modules/ingresar.php";

            }else if ($enlaces == "cambio"){
                $module = "views/modules/cambio.php";

            }else{
                $module = "views/modules/registro.php";
            }

        }






    }


?>
