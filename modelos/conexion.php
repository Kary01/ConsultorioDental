<?php
class Conexion{

	public function conectar(){

		
		$link = new PDO("mysql:host=localhost;dbname=consultorio",
						"root",
						"RIkkqvUK88lBIF9v");

		$link->exec("set names utf8");

		return $link;

	}

}
?>
