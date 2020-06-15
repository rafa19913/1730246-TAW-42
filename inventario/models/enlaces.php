<?php

	class EnlacesPaginas{


		public function enlacesPaginasModel($enlacesModel){

			if ($enlacesModel =="ventas"|| $enlacesModel =="ingresar"|| $enlacesModel =="usuarios" || $enlacesModel =="inventario"|| $enlacesModel=="categorias"|| $enlacesModel =="tablero"|| $enlacesModel =="ventas"|| $enlacesModel=="salir"){
					$module = "views/modules/".$enlacesModel.".php";
				}
				 else if($enlacesModel=="index"){
					$module="views/modules/tablero.php";
				} else{
					$module="views/modules/tablero.php";
				}	
				return $module;	
		}


		
	}
?>