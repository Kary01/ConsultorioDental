<?php
  require_once "controladores/plantilla.controlador.php";
  require_once "controladores/usuarios.controlador.php";
  require_once "controladores/calendario.controlador.php";
  require_once "controladores/citas.controlador.php";
  require_once "controladores/pacientes.controlador.php";
  require_once "controladores/reportes.controlador.php";

  require_once "modelos/plantilla.modelo.php";
  require_once "modelos/usuarios.modelo.php";
  require_once "modelos/calendario.modelo.php";
  require_once "modelos/citas.modelo.php";
  require_once "modelos/pacientes.modelo.php";
  require_once "modelos/reportes.modelo.php";


  $plantilla = new ControladorPlantilla();
  $plantilla -> ctrPlantilla();
?>
