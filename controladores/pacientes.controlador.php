<?php

  class ControladorPacientes{

    //CREAR PACIENTE

    static public function ctrPacientes(){

      if (isset($_POST["pacienteNuevo"])) {
        if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]|[\s]+$/', $_POST["pacienteNuevo"]) &&
              preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/', $_POST["primerNuevo"]) &&
              preg_match('/^[0-9]+$/', $_POST["edadNuevo"]) &&
              preg_match('/^[0-9\-]|[\+0-9]|[0-9\s]|[0-9()]+$/', $_POST["telefonoNuevo"])){


                $tabla = "pacientes";

                $datos = array("nombre" => $_POST["pacienteNuevo"],
                                "primer_apellido" => $_POST["primerNuevo"],
                                "segundo_apellido" => $_POST["segundoNuevo"],
                                "edad" => $_POST["edadNuevo"],
                                "telefono" => $_POST["telefonoNuevo"],
                                "correo" => $_POST["correoNuevo"],
                                "tratamiento" => $_POST["nuevoTratamiento"],
                                "fecha_registro" => $_POST["fechaNuevo"]);

                $respuesta = ModeloPacientes::mdlIngresarPacientes($tabla, $datos);

                if ($respuesta == "ok") {

                  echo '<script>

                  Swal.fire({
                      type: "success",
                      title: "El paciente se ha registrado correctamente...",
                      showConfirmButton: true,
                      ConfirmButtonText: "Cerrar",
                    }).then((result)=>{
                      if (result.value) {

                        window.location = "pacientes";
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

                window.location = "pacientes";
              }
            })

                </script>';
        }
      }
    }

    //MOSTRAR CLIENTES

    static public function ctrMostrarPacientes($item, $valor){

        $tabla = "pacientes";

        $respuesta = ModeloPacientes::mdlMostrarPacientes($tabla, $item, $valor);
        return $respuesta;

    }

    //EDITAR PACIENTE

    static public function ctrEditarPacientes(){

      if (isset($_POST["pacienteEditar"])) {
        if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]|[\s]+$/', $_POST["pacienteEditar"]) &&
              preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/', $_POST["primeroEditar"]) &&
              preg_match('/^[0-9]+$/', $_POST["edadEditar"]) &&
              preg_match('/^[0-9\-]|[\+0-9]|[0-9\s]|[0-9()]+$/', $_POST["telefonoEditar"])){

                $tabla = "pacientes";
                $datos = array( "id" => $_POST["idEditar"],
                                "nombre" => $_POST["pacienteEditar"],
                                "primer_apellido" => $_POST["primeroEditar"],
                                "segundo_apellido" => $_POST["segundoEditar"],
                                "edad" => $_POST["edadEditar"],
                                "telefono" => $_POST["telefonoEditar"],
                                "correo" => $_POST["correoEditar"],
                                "tratamiento" => $_POST["tratamientoEditar"],
                                "fecha_registro" => $_POST["fechaEditar"]);

                $respuesta = ModeloPacientes::mdlEditarPacientes($tabla, $datos);

                if ($respuesta == "ok") {

                  echo '<script>

                  Swal.fire({
                      type: "success",
                      title: "El paciente se ha modificado correctamente...",
                      showConfirmButton: true,
                      ConfirmButtonText: "Cerrar",
                    }).then((result)=>{
                      if (result.value) {

                        window.location = "pacientes";
                      }
                    })

                        </script>';
                }

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

                window.location = "pacientes";
              }
            })

                </script>';
        }
      }
    }

    //ELIMINAR PACIENTE

    static public function ctrEliminarPaciente($dato){
      $tabla = "pacientes";
      $id = $dato;

      $respuesta = ModeloPacientes::mdlEliminarPacientes($tabla, $id);

      return $respuesta;
    
  }

    static public function ctrMostrarTratamientos(){
      $tabla = "pacientes";
      $respuesta = ModeloPacientes::mdlMostrarTratamientos($tabla);
      return $respuesta;
    }
  }

 ?>
