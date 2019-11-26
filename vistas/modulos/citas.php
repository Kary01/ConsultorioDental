<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Citas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Citas</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- BOX -->
    <div class="card">
      <div class="card-header">
      </div>
      <div class="card-body" style="100%">

      <!--TABLA DE CITAS -->
        <table id="example" class="table table-bordered table-striped display" style="100%">
          <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre: </th>
                    <th>Primer Apellido: </th>
                    <th>Segundo Apellido: </th>
                    <th>Fecha: </th>
                    <th>Hora: </th>
                    <th>Tratamiento: </th>
                    <th>Acción: </th>
                </tr>
            </thead>
            
            <tbody>
            <!-- MUESTRA LA BD EN LA TABLA -->
              <?php
                $item = null;
                $valor = null;

                $citas = ControladorCitas::ctrMostrarCitas($item, $valor);

                foreach ($citas as $key => $value) {
                  echo '<tr>
                      <td>'.$value["id"].'</td>
                      <td>'.$value["nombre"].'</td>
                      <td>'.$value["primer_apellido"].'</td>
                      <td>'.$value["segundo_apellido"].'</td>
                      <td>'.$value["fecha"].'</td>
                      <td>'.$value["hora"].'</td>
                      <td>'.$value["tratamiento"].'</td>
                      <td><button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
                  </tr>';
                }
              ?>
            </tbody>
            <tfoot>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Primer Apellido</th>
                  <th>Segundo Apellido</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Tratamiento</th>
                  <th>Acción</th>
                </tr>
            </tfoot>
        </table> <!-- ./table -->
        
      </div><!-- /.card-body -->
    </div><!-- /.card -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
