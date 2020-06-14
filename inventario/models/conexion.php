<?php

	// Conexión a la BD mediante PDO
	class Conexion{

		public function conectar(){
			$enlace = new PDO("mysql:host=localhost;dbname=inventario", "root", "");
			return $enlace;
		}

	}	

?>