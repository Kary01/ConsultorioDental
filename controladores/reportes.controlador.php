<?php

    class ControladorReportes{

        static public function ctrMostrarEdad(){
            $tabla = "pacientes";
            $respuestaedad = ModeloReportes::mdlMostrarEdad($tabla);
            return $respuestaedad;
        }
    }

 ?>
