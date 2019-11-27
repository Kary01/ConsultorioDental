//EDITAR PACIENTE
$(document).ready(function($) {
    $('#citas tbody').on('click', '.btnEditarCita', function() {   //acción para el botón editar
       

      var idCitas = $(this).attr("idCitas");      //trae el id desde el botón
        console.log(idCitas);

      /* $.ajax({        //para traer todos los datos
            url: "ajax/citas.ajax.php",
            method: "POST",
            dataType: 'JSON',
            cache: false,
            data: { 'idmostrar': idCitas },
            success: function(result) {
                console.log(result);
            },
            error: function(jqXHR, textStatus, errorThrown) { //mostrar errores
                console.log("Error: " + errorThrown);
            }
        });*/

    });
});