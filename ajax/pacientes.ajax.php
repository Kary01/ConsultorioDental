<?php
require_once "../controladores/pacientes.controlador.php";
require_once "../modelos/pacientes.modelo.php";


class AjaxPacientes{

    public function ajaxMostrarPaciente($id_b){
        $item = "id";
        $valor = (string)$id_b;
        $respuesta = ControladorPacientes::ctrMostrarPacientes($item, $valor);
        echo json_encode($respuesta);
    }

    public function ajaxEliminarPaciente($id_b){
      $dato = (string)$id_b;
      $respuesta = ControladorPacientes::ctrEliminarPaciente($dato);
      echo json_encode($respuesta);
  }

    
}
if (isset($_POST['idmostrar'])) {
    $idmostrar = $_POST['idmostrar'];
    $a = new AjaxPacientes();
    $a-> ajaxMostrarPaciente($idmostrar);
  }else if(isset($_POST['ideliminar'])){
    $ideliminar = $_POST['ideliminar'];
    $b = new AjaxPacientes();
    $b-> ajaxEliminarPaciente($ideliminar);
  }else {
    echo json_encode("ha ocurrido un error en mostrar");
  }
  
?>