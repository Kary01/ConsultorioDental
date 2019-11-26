<?php

  class ControladorCitas{

    //CREAR CITAS

    static public function ctrCrearCitas(){

      if(isset($_POST["nombreCitas"])){
          if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]|[\s]+$/', $_POST["nombreCitas"]) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/', $_POST["primerCitas"]) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/', $_POST["segundoCitas"])){

                $tabla = "citas";

                $datos = array("nombre" => $_POST["nombreCitas"],
                                "primer_apellido" => $_POST["primerCitas"],
                                "segundo_apellido" => $_POST["segundoCitas"],
                                "fecha" => $_POST["fechaNuevo"],
                                "hora" => $_POST["horaNuevo"],
                                "tratamiento" => $_POST["nuevoTratamiento"]);

                  $respuesta = ModeloCitas::mdlIngresarCitas($tabla, $datos);

                  if ($respuesta == "ok") {

                    echo '<script>

                    Swal.fire({
                        type: "success",
                        title: "La cita se ha registrado correctamente...",
                        showConfirmButton: true,
                        ConfirmButtonText: "Cerrar",
                      }).then((result)=>{
                        if (result.value) {

                          window.location = "citas";
                        }
                      })

                          </script>';
                  }


          }else {
            echo '<script>

            Swal.fire({
                type: "error",
                title: "No se logro completar el registro...",
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

      //MOSTRAR CITAS

      static public function ctrMostrarCitas($item, $valor){

          $tabla = "citas";

          $respuesta = ModeloCitas::mdlMostrarCitas($tabla, $item, $valor);
          return $respuesta;

      }


  }

 ?>
