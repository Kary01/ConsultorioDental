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

        static public function mdlMostrarPacientes($tabla){

            $stmt = Conexion::conectar()->prepare("SELECT COUNT(CASE WHEN MONTH (fecha_registro)=1 THEN nombre END) AS ENE, COUNT(CASE WHEN MONTH (fecha_registro)=2 THEN nombre END) AS FEB, COUNT(CASE WHEN MONTH (fecha_registro)=3 THEN nombre END) AS MAR, COUNT(CASE WHEN MONTH (fecha_registro)=4 THEN nombre END) AS ABR, COUNT(CASE WHEN MONTH (fecha_registro)=5 THEN nombre END) AS MAY, COUNT(CASE WHEN MONTH (fecha_registro)=6 THEN nombre END) AS JUN, COUNT(CASE WHEN MONTH (fecha_registro)=7 THEN nombre END) AS JUL, COUNT(CASE WHEN MONTH (fecha_registro)=8 THEN nombre END) AS AGO, COUNT(CASE WHEN MONTH (fecha_registro)=9 THEN nombre END) AS SEP, COUNT(CASE WHEN MONTH (fecha_registro)=10 THEN nombre END) AS OCT, COUNT(CASE WHEN MONTH (fecha_registro)=11 THEN nombre END) AS NOV, COUNT(CASE WHEN MONTH (fecha_registro)=12 THEN nombre END) AS DIC FROM pacientes GROUP BY YEAR(fecha_registro)");
            $stmt -> execute();
              
            return $stmt -> fetchAll();
            
            $stmt -> close();
            $stmt = null;
              
        }
    }

 ?>
