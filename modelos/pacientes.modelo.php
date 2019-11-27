<?php

require_once "conexion.php";

class ModeloPacientes{

  //CREAR Pacientes

  static public function mdlIngresarPacientes($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, primer_apellido,
    segundo_apellido, edad, telefono, correo, tratamiento, fecha_registro)
    VALUES(:nombre, :primer_apellido, :segundo_apellido, :edad, :telefono, :correo, :tratamiento, :fecha_registro)");

      $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
      $stmt->bindParam(":primer_apellido", $datos["primer_apellido"], PDO::PARAM_STR);
      $stmt->bindParam(":segundo_apellido", $datos["segundo_apellido"], PDO::PARAM_STR);
      $stmt->bindParam(":edad", $datos["edad"], PDO::PARAM_INT);
      $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
      $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
      $stmt->bindParam(":tratamiento", $datos["tratamiento"], PDO::PARAM_STR);
      $stmt->bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);

      if ($stmt->execute()) {
        return "ok";
      }else {
        return "error";

      }

      $stmt->close();
      $stmt = null;

  }



  //MOSTRAR PACIENTE

static public function mdlMostrarPacientes($tabla, $item, $valor){
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

  //EDITAR PACIENTE

  static public function mdlEditarPacientes($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, primer_apellido = :primer_apellido, segundo_apellido = :segundo_apellido,
    edad = :edad, telefono = :telefono, correo = :correo, tratamiento = :tratamiento, fecha_registro = :fecha_registro
    WHERE id = :id");

      $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
      $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
      $stmt->bindParam(":primer_apellido", $datos["primer_apellido"], PDO::PARAM_STR);
      $stmt->bindParam(":segundo_apellido", $datos["segundo_apellido"], PDO::PARAM_STR);
      $stmt->bindParam(":edad", $datos["edad"], PDO::PARAM_INT);
      $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
      $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
      $stmt->bindParam(":tratamiento", $datos["tratamiento"], PDO::PARAM_STR);
      $stmt->bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);

      if ($stmt->execute()) {
        return "ok";
      }else {
        return "error";

      }

      $stmt->close();
      $stmt = null;

  }

  //ELIMINAR PACIENTE
  static public function mdlEliminarPacientes($tabla, $id){


    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

    $stmt->bindParam(":id", $id, PDO::PARAM_STR);

    if ($stmt->execute()) {
      return "ok";
    }else {
      return "error";

    }

    $stmt->close();
    $stmt = null;

  }

  // CONSULTA GRAFICA TRATAMIENTOS
static public function mdlMostrarTratamientos($tabla){

  $stmt = Conexion::conectar()->prepare("SELECT tratamiento, COUNT(tratamiento) AS Total FROM pacientes GROUP BY tratamiento ORDER BY tratamiento ASC");
  $stmt -> execute();

  return $stmt -> fetchAll();

  $stmt -> close();
  $stmt = null;

  }

}

 ?>
