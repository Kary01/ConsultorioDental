<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Reportes</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="calendario">Inicio</a></li>
            <li class="breadcrumb-item active">Reportes</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"></h3>
        <div class="card-tools">
        </div>
      </div>
      <div class="card-body">

          <!--  GRÁFICAS -->
          <div class="row">
            <div class="col-xs-12">
            
            <!-- MOSTRAR DATOS -->
              <?php
               include "reportes/graficos.php"
              ?>

            </div>
          </div>
      </div><!-- /.card-body -->
      <div class="card-footer">
      </div> <!-- /.card-footer-->
    </div> <!-- /.card -->
  </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
