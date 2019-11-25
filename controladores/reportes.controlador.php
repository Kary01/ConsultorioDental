<?php

    class ControladorReportes{

        static public function ctrMostrarEdad(){
            $tabla = "pacientes";
            $respuestaedad = ModeloReportes::mdlMostrarEdad($tabla);
            return $respuestaedad;
        }

        static public function ctrMostrarPacientes(){
            $tabla = "pacientes";
            $respuestapac = ModeloReportes::mdlMostrarPacientes($tabla);
            return $respuestapac;
        }    
    }

 ?>
