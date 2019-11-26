//EDITAR PACIENTE
$(document).ready(function($) {
    $('#example tbody').on('click', '.btnEditarPaciente', function() {   //acción para el botón editar
       

      var idPaciente = $(this).attr("idPaciente");      //trae el id desde el botón
        console.log(idPaciente);

        $.ajax({        //para traer todos los datos
            url: "ajax/pacientes.ajax.php",
            method: "POST",
            dataType: 'JSON',
            cache: false,
            data: { 'idmostrar': idPaciente },
            success: function(result) {
                console.log(result);
                $('#idEditar').val(null);
                $('#idEditar').val(result['id']);
                $('#pacienteEditar').val(result['nombre']);
                $('#primeroEditar').val(result['primer_apellido']);
                $('#segundoEditar').val(result['segundo_apellido']);
                $('#edadEditar').val(result['edad']);
                $('#telefonoEditar').val(result['telefono']);
                $('#correoEditar').val(result['correoEditar']);
                $('#fechaEditar').val(result['fecha_registro']);
                $('#tratamientoEditar').val(result['tratamiento']);
            },
            error: function(jqXHR, textStatus, errorThrown) { //mostrar errores
                console.log("Error: " + errorThrown);
            }
        });

    });

    //ELIMINAR PACIENTE

    $('#example tbody').on('click', '.btnEliminarPaciente', function() { //acción para el botón editar

      var idPaciente = $(this).attr("idPaciente");      //trae el id desde el botón
      console.log(idPaciente);

      const swalWithBootstrapButtons = Swal.mixin({     //acciones en la alerta suave
          customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({       //alerta para confirmación de acciones
          title: '¿Estás seguro de eliminar el paciente?',
          text: "Si no lo está, puede cancelar la acción!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Sí, eliminar paciente',
          cancelButtonText: 'Cancelar!',
          reverseButtons: true
      }).then((result) => {
          if (result.value) {
              console.log("me quieren eliminar" + idPaciente);      //mensaje prueba en consola
              $.ajax({
                  url: "ajax/pacientes.ajax.php",                   //acción en bd
                  method: "POST",
                  dataType: 'JSON',
                  cache: false,
                  data: { 'ideliminar': idPaciente },
                  success: function(resultado) {                //confirmación de eliminar paciente
                      if (resultado == 'ok') {
                          Swal.fire({
                              type: "success",
                              title: "El paciente se ha eliminado correctamente...",
                              showConfirmButton: true,
                              ConfirmButtonText: "Cerrar",
                          }).then((result) => {
                              if (result.value) {
                                  window.location = "pacientes";
                              }
                          });
                      } else if (resultado == 'error') {    //error si no se logró eliminar
                          Swal.fire({
                              type: "error",
                              title: "No se logro eliminar...",
                              showConfirmButton: true,
                              ConfirmButtonText: "Cerrar",
                              closeOnConfirm: false
                          }).then((result) => {
                              if (result.value) {

                                  window.location = "pacientes";    //vuelve a la ventana de pacientes
                              }
                          });
                      }
                      console.log(resultado);
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                      console.log("Error: " + errorThrown);
                  }
              });
              //window.location = "pacientes";
          }
      })
  });

  $('#example tbody').on('click', '.btnAgregarCita', function() {   //acción para el botón editar
       

    var idPaciente = $(this).attr("idPaciente");      //trae el id desde el botón
      console.log(idPaciente);

      $.ajax({        //para traer todos los datos
          url: "ajax/pacientes.ajax.php",
          method: "POST",
          dataType: 'JSON',
          cache: false,
          data: { 'idmostrar': idPaciente },
          success: function(result) {
              console.log(result);
              $('#idCitas').val(null);
              $('#idCitas').val(result['id']);
              $('#nombreCitas').val(result['nombre']);
              $('#primerCitas').val(result['primer_apellido']);
              $('#segundoCitas').val(result['segundo_apellido']);
          },
          error: function(jqXHR, textStatus, errorThrown) { //mostrar errores
              console.log("Error: " + errorThrown);
          }
      });

  });
});

