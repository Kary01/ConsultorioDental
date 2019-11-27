<?php
require_once "../controladores/citas.controlador.php";
require_once "../modelos/citas.modelo.php";


class AjaxCitas{

    public function ajaxMostrarCitas($id_c){
        $item = "id";
        $valor = (string)$id_c;
        $respuesta = ControladorCitas::ctrMostrarCitas($item, $valor);
        echo json_encode($respuesta);
    }

    
}
if (isset($_POST['idmostrar'])) {
    $idmostrar = $_POST['idmostrar'];
    $c = new AjaxCitas();
    $c-> ajaxMostrarCitas($idmostrar);
  }else {
    echo json_encode("ha ocurrido un error en mostrar");
  }
  
?>