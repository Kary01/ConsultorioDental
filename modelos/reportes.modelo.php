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

        static public function mdlMostrarCitas($tabla){

            $stmt = Conexion::conectar()->prepare("SELECT COUNT(CASE WHEN MONTH (fecha)=1 THEN id END) AS ENE, COUNT(CASE WHEN MONTH (fecha)=2 THEN id END) AS FEB, COUNT(CASE WHEN MONTH (fecha)=3 THEN id END) AS MAR, COUNT(CASE WHEN MONTH (fecha)=4 THEN id END) AS ABR, COUNT(CASE WHEN MONTH (fecha)=5 THEN id END) AS MAY, COUNT(CASE WHEN MONTH (fecha)=6 THEN id END) AS JUN, COUNT(CASE WHEN MONTH (fecha)=7 THEN id END) AS JUL, COUNT(CASE WHEN MONTH (fecha)=8 THEN id END) AS AGO, COUNT(CASE WHEN MONTH (fecha)=9 THEN id END) AS SEP, COUNT(CASE WHEN MONTH (fecha)=10 THEN id END) AS OCT, COUNT(CASE WHEN MONTH (fecha)=11 THEN id END) AS NOV, COUNT(CASE WHEN MONTH (fecha)=12 THEN id END) AS DIC FROM citas GROUP BY YEAR(fecha) ");
            $stmt -> execute();
              
            return $stmt -> fetchAll();
            
            $stmt -> close();
            $stmt = null;
              
        }
    }

 ?>
