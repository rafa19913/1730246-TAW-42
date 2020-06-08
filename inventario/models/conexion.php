<?php

class Conexion{



	public function conectar(){
		$enlace = new PDO("mysql:host=localhost;dbname=simple_stock", "root", "root");
		return $enlace;
	}


	
}

?>