<!-- SESIÓN DEL PANEL -->
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Administrador | Consultorio </title>

  <link rel="icon" href="vistas/dist/img/diente.png">

  <!-- Responsive to screen width -->
  <meta  name="viewport" content="width=device-width, initial-scale=1">

  <!--PLUGINS CSS-->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/datatable_into/datatables/datatables.min.css"/>
  <link rel="stylesheet" href="vistas/datatable_into/datatables/DataTables-1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">


  <!--PLUGINS JAVASCRIPT-->
  <!-- jQuery -->
  <script src="vistas/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="vistas/dist/js/demo.js"></script>
  <!-- jQuery, Popper.js, Bootstrap JS -->
  <script src="vistas/datatable_into/jquery/jquery-3.4.1.min.js"></script>
  <script src="vistas/datatable_into/popper/popper.min.js"></script>
  <script src="vistas/datatable_into/bootstrap/js/bootstrap.min.js"></script>
  <!-- FECHA Y APPI CALENDARIO-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
      <script src="vistas/calendario/Calendario/moment.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- datatables JS -->
  <script src="vistas/datatable_into/datatables/datatables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
  <!--MY JS-->
  <script src="vistas/js/main.js"></script>
  <script src="vistas/js/pacientes.js"></script>
  <script src="vistas/js/citas.js"></script>
  <script src="vistas/js/reportes.js"></script>
  <!-- Alertas suaves-->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script> 
  <!--CHARTS JS-->
  <script src="vistas/plugins/chart.js/Chart.min.js"></script>
</head>


<!--CUERPO DEL DOCUMENTO-->
<body class="hold-transition sidebar-collapse sidebar-mini">


<!--incluye todos los modulos -->
<?php

if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {


// Site wrapper
echo '<div class="wrapper">';

//CABECERA
include "modulos/cabecera.php";
//MENU
include "modulos/menu.php";

if (isset($_GET["ruta"])) {
  if( $_GET["ruta"] == "calendario" ||
      $_GET["ruta"] == "citas" ||
      $_GET["ruta"] == "pacientes" ||
      $_GET["ruta"] == "reportes" ||
      $_GET["ruta"] == "salir"){

    //Manda a llamar las categorias de las rutas
    include "modulos/".$_GET["ruta"].".php";

  }else {

    //si no encuentra la ruta mostrará error 404
    include "modulos/404.php";

  }
}else {

    //si la ruta está vacía mostrará el inicio
    include "modulos/calendario.php";
  }

//FOOTER
include "modulos/footer.php";

echo '</div>';
//wrapper
}else {
  include "modulos/ingresar.php";
}
?>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">

    </aside><!-- /.control-sidebar -->

  </body> <!-- ./body -->
</html> <!-- ./html -->
