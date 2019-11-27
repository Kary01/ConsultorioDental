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
                                "fecha_hora" => $_POST["date_start"],
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
