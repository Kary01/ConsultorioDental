<?php
class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=127.0.0.1;dbname=consultorio",
			            "root");

		$link->exec("set names utf8");

		return $link;

	}

}
?>
