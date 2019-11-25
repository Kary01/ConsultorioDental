<?php

require_once "conexion.php";


class ModeloCitas{

  //CREAR CITA

  static public function mdlIngresarCitas($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, primer_apellido,
    segundo_apellido, fecha, hora, tratamiento)
    VALUES(:nombre, :primer_apellido, :segundo_apellido, :fecha, :hora, :tratamiento)");

    $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":primer_apellido", $datos["primer_apellido"], PDO::PARAM_STR);
    $stmt->bindParam(":segundo_apellido", $datos["segundo_apellido"], PDO::PARAM_STR);
    $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
    $stmt->bindParam(":hora", $datos["hora"], PDO::PARAM_STR);
    $stmt->bindParam(":tratamiento", $datos["tratamiento"], PDO::PARAM_STR);


    if ($stmt->execute()) {
      return "ok";
    }else {
      return "error";
    }

    $stmt->close();
    $stmt = null;
  }

  //MOSTRAR Citas
  //MOSTRAR PACIENTE
static public function mdlMostrarCitas($tabla, $item, $valor){
  if ($item != null) {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
    $stmt -> bindParam(":", $item, $valor, PDO::PARAM_STR);
    $stmt -> execute();
    return $stmt -> fetch();
  }else {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
    $stmt -> execute();
    return $stmt -> fetchAll();
  }
  $stmt -> close();
  $stmt = null;
}

}

?>
