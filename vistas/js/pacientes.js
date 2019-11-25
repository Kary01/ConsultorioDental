//EDITAR PACIENTE
$(document).ready(function($) {
    $('#example tbody').on('click', '.btnEditarPaciente', function() {
       

      var idPaciente = $(this).attr("idPaciente");
        console.log(idPaciente);

        $.ajax({
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
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Error: " + errorThrown);
            }
        });

    });

    $('#example tbody').on('click', '.btnEliminarPaciente', function() {

      var idPaciente = $(this).attr("idPaciente");
      console.log(idPaciente);

      const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
          title: '¿Estás seguro de eliminar el paciente?',
          text: "Si no lo está, puede cancelar la acción!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Sí, eliminar paciente',
          cancelButtonText: 'Cancelar!',
          reverseButtons: true
      }).then((result) => {
          if (result.value) {
              console.log("me quieren eliminar" + idPaciente);
              $.ajax({
                  url: "ajax/pacientes.ajax.php",
                  method: "POST",
                  dataType: 'JSON',
                  cache: false,
                  data: { 'ideliminar': idPaciente },
                  success: function(resultado) {
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
                      } else if (resultado == 'error') {
                          Swal.fire({
                              type: "error",
                              title: "No se logro eliminar...",
                              showConfirmButton: true,
                              ConfirmButtonText: "Cerrar",
                              closeOnConfirm: false
                          }).then((result) => {
                              if (result.value) {

                                  window.location = "pacientes";
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
});

