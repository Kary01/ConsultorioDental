<?php

require_once "conexion.php";

    class ModeloReportes{

        static public function mdlMostrarEdad($tabla){

            $stmt = Conexion::conectar()->prepare("SELECT edad, COUNT(edad) AS TOTAL FROM pacientes GROUP BY edad ORDER BY edad ASC");
            $stmt -> execute();
          
            return $stmt -> fetchAll();
          
            $stmt -> close();
            $stmt = null;
          
            }
    }

 ?>
