<?php

require_once "conexion.php";


class ModeloCitas{

  //CREAR CITA

  static public function mdlIngresarCitas($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, primer_apellido,
    segundo_apellido, fecha_hora, tratamiento)
    VALUES(:nombre, :primer_apellido, :segundo_apellido, :fecha_hora, :tratamiento)");

    $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":primer_apellido", $datos["primer_apellido"], PDO::PARAM_STR);
    $stmt->bindParam(":segundo_apellido", $datos["segundo_apellido"], PDO::PARAM_STR);
    $stmt->bindParam(":fecha_hora", $datos["fecha_hora"], PDO::PARAM_STR);
    $stmt->bindParam(":tratamiento", $datos["tratamiento"], PDO::PARAM_STR);


    if ($stmt->execute()) {
      return "ok";
    }else {
      return "error";
    }

    $stmt->close();
    $stmt = null;
  }

  //MOSTRAR CITAS

static public function mdlMostrarCitas($tabla, $item, $valor){
  if ($item != null) {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = $valor");
    
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

//EDITAR CITAS

static public function mdlEditarCitas($tabla, $datos){

  $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fecha_hora = :fecha_hora, tratamiento = :tratamiento WHERE id = :id");

    $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
    $stmt->bindParam(":fecha_hora", $datos["fecha_hora"], PDO::PARAM_STR);
    $stmt->bindParam(":tratamiento", $datos["tratamiento"], PDO::PARAM_STR);

    if ($stmt->execute()) {
      return "ok";
    }else {
      return "error";

    }

    $stmt->close();
    $stmt = null;

  }
}

?>
