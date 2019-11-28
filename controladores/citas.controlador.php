<?php

  class ControladorCitas{

    //CREAR CITAS

    static public function ctrCrearCitas($nombre_add, $ape_pat_add, $ape_mat_add, $fecha_add, $tratamiento_add){

          if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]|[\s]+$/', $nombre_add) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/', $ape_pat_add) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/', $ape_mat_add)){

                $tabla = "citas";

                $datos = array("nombre" => $nombre_add,
                                "primer_apellido" => $ape_pat_add,
                                "segundo_apellido" => $ape_mat_add,
                                "fecha_hora" => $fecha_add,
                                "tratamiento" => $tratamiento_add);

                  $respuesta = ModeloCitas::mdlIngresarCitas($tabla, $datos);

                  if($respuesta == 'Error'){
                    return "Error en la respuesta";
                  }else{
                    return $respuesta;
                  }

          }else {
            return 'Error en la validacion';
          }
      

    }

      //MOSTRAR CITAS

      static public function ctrMostrarCitas($item, $valor){

          $tabla = "citas";

          $respuesta = ModeloCitas::mdlMostrarCitas($tabla, $item, $valor);
          return $respuesta;

      }

      //EDITAR CITAS 


    static public function ctrEditarCitas(){

      if (isset($_POST["nombreEditar"])) {
        
                $tabla = "citas"; 
                $datos = array( "id" => $_POST["idCitas"],
                                "nombre" => $_POST["nombreEditar"],
                                "primer_apellido" => $_POST["primeroEditar"],
                                "segundo_apellido" => $_POST["segundoEditar"],
                                "fecha" => $_POST["fechaEditar"],
                                "hora" => $_POST["horaEditar"],
                                "tratamiento" => $_POST["tratamientoEditar"]);

                $respuesta = ModeloCitas::mdlEditarCitas($tabla, $datos);

                if ($respuesta == "ok") {

                  echo '<script>

                  Swal.fire({
                      type: "success",
                      title: "La cita se ha modificado correctamente...",
                      showConfirmButton: true,
                      ConfirmButtonText: "Cerrar",
                    }).then((result)=>{
                      if (result.value) {

                        window.location = "citas";
                      }
                    })

                        </script>';
                }else {


          echo '<script>

          Swal.fire({
              type: "error",
              title: "No se logro completar la modificación...",
              showConfirmButton: true,
              ConfirmButtonText: "Cerrar",
              closeOnConfirm: false
            }).then((result)=>{
              if (result.value) {

                window.location = "citas";
              }
            })

                </script>';
        }
      }
    }

  }

 ?>
