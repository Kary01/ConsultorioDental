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
        <table id="citas" class="table table-bordered table-striped display dt-responsive" style="100%">
          <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre: </th>
                    <th>Primer Apellido: </th>
                    <th>Segundo Apellido: </th>
                    <th>Fecha - Hora: </th>
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
                      <td>'.$value["fecha_hora"].'</td>
                      <td>'.$value["tratamiento"].'</td>
                      <td><button class="btn btn-warning btn-sm btnEditarCita" title="Editar" data-toggle="modal" data-target="#modalEditarCita" idCitas="'.$value["id"].'"><i class="fas fa-edit"></i></button>

                      </td>
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
                  <th>Fecha - Hora</th>
                  <th>Tratamiento</th>
                  <th>Acción</th>
                </tr>
            </tfoot>
        </table> <!-- ./table -->
        
      </div><!-- /.card-body -->
    </div><!-- /.card -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<!-- VENTANAS MODALES-->

<!-- MODAL EDITAR CITA -->
<!-- Modal -->
<div class="modal" id="modalEditarCita">
  <div class="modal-dialog">
    <div class="modal-content">
  
    <!-- FORMULARIO EDITAR -->
    <form method="post">

      <!-- Modal Header -->
      <div class="modal-header" style="background:#2CB5F7">
        <h4 class="modal-title" style="color:white">EDITAR CITA</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="box-body">
          <div class="form-group row">
            <label class="col-lg col-form-label">Nombre: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nombreEditar" id="nombreEditar" value="" required readonly>
              <input type="hidden" id="citaIdEditar" name="citaIdEditar">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg col-form-label">Primer Apellido: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="primeroEditar" id="primeroEditar" value="" required readonly>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg col-form-label">Segundo Apellido: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="segundoEditar" id="segundoEditar" value="" required readonly>
            </div>
          </div>

          <div class="form-group row">
            <label for="nombreNuevo" class="col-lg col-form-label">Fecha: </label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="fechaEditar" id="fechaEditar" required value="<?php echo date("Y-m-d"); ?>" 
            			required min=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
            </div>
          </div>

          <div class="form-group row">
            <label for="nombreNuevo" class="col-lg col-form-label">Hora: </label>
            <div class="col-sm-6">
              <select class="form-control" name="horaEditar" id="horaEditar" required >
                <option value="">Seleccionar Hora</option>
                <option value="8:30 AM">8:30 AM</option>
                <option value="9:00 AM">9:00 AM</option>
                <option value="9:30 AM">9:30 AM</option>
                <option value="10:00 AM">10:00 AM</option>
                <option value="10:30 AM">10:30 AM</option>
                <option value="11:00 AM">11:00 AM</option>
                <option value="11:30 AM">11:30 AM</option>
                <option value="12:00 PM">12:00 AM</option>
                <option value="12:30 PM">12:30 AM</option>
                <option value="1:00 PM">1:00 PM</option>
                <option value="1:30 PM">1:30 PM</option>
                <option value="2:00 PM">2:00 PM</option>
                <option value="2:30 PM">2:30 PM</option>
                <option value="3:00 PM">3:00 PM</option>
                <option value="3:30 PM">3:30 PM</option>
                <option value="4:00 PM">4:00 PM</option>
                <option value="4:30 PM">4:30 PM</option>
                <option value="5:00 PM">5:00 PM</option>
                <option value="5:30 PM">5:30 PM</option>
                <option value="6:00 PM">6:00 PM</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="nombreNuevo" class="col-lg col-form-label">Tratamiento: </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="tratamientoEditar" id="tratamientoEditar" value="" required readonly>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Guardar cambios">
      </div>

      <?php
       
      ?>

    </form> <!-- -/form -->
   </div>
  </div>
</div>