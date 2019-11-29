<?php

    //LLAMANDO A LOS CAMPOS

    $tratamiento = $_POST['tratamiento'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $telefono = $_POST['telefono'];

    //DATOS PARA EL CORREO

    $destinatario = "Consultorio.Dental0001@gmail.com";
    $asunto = "Citas desde Web";

    $carta = "De: $nombre \n";
    $carta .= "Correo: $email \n";
    $carta .= "Teléfono: $telefono \n";
    $carta .= "Fecha: $fecha \n";
    $carta .= "Hora: $hora \n";
    $carta .= "Tratamiento: $tratamiento";

    //ENVIANDO MENSAJE

    mail($destinatario, $asunto, $carta);

?>

