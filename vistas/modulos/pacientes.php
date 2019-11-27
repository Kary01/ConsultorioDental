<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pacientes</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Pacientes</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Box -->
    <div class="card">
      <div class="card-header">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPaciente">
            Agregar paciente <i class="fa fa-user-plus" style="padding:5px"></i></button>
      </div>
      <div class="card-body" style="100%">
      
      <!-- TABLA PACIENTES -->
        <table id="example" class="table table-bordered table-striped display dt-responsive">
          <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Edad</th>
                    <th>Correo eléctronico</th>
                    <th>Teléfono</th>
                    <th>Tratamiento</th>
                    <th>Fecha de registro</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>

            <!-- LLENAR TABLA CON BASE DE DATOS -->
              <?php

                $item = null;
                $valor = null;

                $pacientes = ControladorPacientes::ctrMostrarPacientes($item, $valor);

                foreach ($pacientes as $key => $value) {

                  echo '<tr>
                        <th>'.($key+1).'</th>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["primer_apellido"].'</td>
                        <td>'.$value["segundo_apellido"].'</td>
                        <td>'.$value["edad"].'</td>
                        <td>'.$value["correo"].'</td>
                        <td>'.$value["telefono"].'</td>
                        <td>'.$value["tratamiento"].'</td>
                        <td>'.$value["fecha_registro"].'</td>

                        <td><button class="btn btn-warning btn-sm btnEditarPaciente" title="Editar" data-toggle="modal" data-target="#modalEditarPaciente" idPaciente="'.$value["id"].'"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger btn-sm btnEliminarPaciente" title="Eliminar" idPaciente="'.$value["id"].'"><i class="fas fa-trash-alt"></i></button>
                            <button class="btn btn-primary btn-sm btnAgregarCita" title="Nueva Cita" data-toggle="modal" data-target="#modalAgregarCita" idPaciente="'.$value["id"].'"><i class="fas fa-calendar-plus"></i></button>
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
                  <th>Edad</th>
                  <th>Correo eléctronico</th>
                  <th>Teléfono</th>
                  <th>Tratamiento</th>
                  <th>Fecha de registro</th>
                  <th>Acción</th>
                </tr>
            </tfoot>
        </table> <!-- /.table -->
      </div> <!-- /.card-body -->
    </div> <!-- /.card -->
  </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

<!-- VENTANAS MODAL -->

<!-- MODAL AGREGAR PACIENTE -->
<div class="modal" id="modalAgregarPaciente">
  <div class="modal-dialog">
    <div class="modal-content">
    
    <!-- FORMULARIO PACIENTES-->
    <form method="post">

      <!-- Modal Header -->
      <div class="modal-header" style="background:#2CB5F7">
        <h4 class="modal-title" style="color:white">NUEVO PACIENTE</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="box-body">
          <div class="form-group row">
            <label class="col-lg col-form-label">Nombre: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="pacienteNuevo" id="pacienteNuevo" required onkeypress="return soloLetras(event)">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg col-form-label">Primer Apellido: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="primerNuevo" id="primerNuevo" required onkeypress="return soloLetras(event)">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg col-form-label">Segundo Apellido: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="segundoNuevo" id="segundoNuevo" required onkeypress="return soloLetras(event)">
            </div>
          </div>

         <div class="form-group row">
            <label class="col-lg col-form-label">Edad: </label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="edadNuevo" min="1" max="99" required onkeypress="return soloNumeros(event)"> 
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg col-form-label">Teléfono: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="telefonoNuevo" id="telefonoNuevo" onkeypress="return soloNumeros(event)"
              data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask required>
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-lg col-form-label">Correo electrónico: </label>
            <div class="col-sm-8">
              <input type="email" class="form-control" name="correoNuevo" id="correoNuevo">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg col-form-label">Fecha de registro: </label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="fechaNuevo" required value="<?php echo date("Y-m-d"); ?>" 
            			required min=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
            </div>
          </div>

        <div class="form-group row">
            <label class="col-lg col-form-label">Tratamiento: </label>
            <div class="col-sm-6">
              <select class="form-control" name="nuevoTratamiento" required>
                <option value="">Seleccionar Tratamiento</option>
                <option value="Ortodoncia">Ortodoncia</option>
                <option value="Recina">Recina</option>
                <option value="Endodoncia">Endodoncia</option>
                <option value="Prótesis">Prótesis</option>
                <option value="Limpieza">Limpieza</option>
                <option value="Extracción">Extracción</option>
                <option value="Amalgama">Amalgama</option>
                <option value="Brackets">Brackets</option>
                <option value="Corona">Corona</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Guardar">
      </div>
      
      <!-- INSERTA DATOS EN BD -->
      <?php
      $crearPaciente = new ControladorPacientes();
      $crearPaciente -> ctrPacientes();
      ?>

      </form> <!-- ./form -->
    </div>
  </div>
</div>

<!--MODAL EDITAR PACIENTE-->
<!-- Modal -->
<div class="modal" id="modalEditarPaciente">
  <div class="modal-dialog">
    <div class="modal-content">
  
    <!-- FORMULARIO EDITAR -->
    <form method="post">

      <!-- Modal Header -->
      <div class="modal-header" style="background:#2CB5F7">
        <h4 class="modal-title" style="color:white">EDITAR PACIENTE</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="box-body">
          <div class="form-group row">
            <label class="col-lg col-form-label">Nombre: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="pacienteEditar" id="pacienteEditar" value="" required onkeypress="return soloLetras(event)">
              <input type="hidden" id="idEditar" name="idEditar">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg col-form-label">Primer Apellido: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="primeroEditar" id="primeroEditar" value="" required onkeypress="return soloLetras(event)">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg col-form-label">Segundo Apellido: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="segundoEditar" id="segundoEditar" value="" required onkeypress="return soloLetras(event)">
            </div>
          </div>

         <div class="form-group row">
            <label class="col-lg col-form-label">Edad: </label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="edadEditar" id="edadEditar" min="1" max="99" value="" required onkeypress="return soloNumeros(event)">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg col-form-label">Teléfono: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="telefonoEditar" id="telefonoEditar"
              data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask value="" required onkeypress="return soloNumeros(event)">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-lg col-form-label">Correo electrónico: </label>
            <div class="col-sm-8">
              <input type="email" class="form-control" name="correoEditar" id="correoEditar" value="">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg col-form-label">Fecha de registro: </label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="fechaEditar" id="fechaEditar" value="" required>
            </div>
          </div>

        <div class="form-group row">
            <label class="col-lg col-form-label">Tratamiento: </label>
            <div class="col-sm-6">
              <select class="form-control" name="tratamientoEditar" id="tratamientoEditar" value="" required>
                <option value="">Seleccionar Tratamiento</option>
                <option value="Ortodoncia">Ortodoncia</option>
                <option value="Recina">Recina</option>
                <option value="Endodoncia">Endodoncia</option>
                <option value="Prótesis">Prótesis</option>
                <option value="Limpieza">Limpieza</option>
                <option value="Extracción">Extracción</option>
                <option value="Amalgama">Amalgama</option>
                <option value="Brackets">Brackets</option>
                <option value="Corona">Corona</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Guardar cambios">
      </div>
    
    <!-- ATRAPA LA BD -->
    <?php
      $editarPaciente = new ControladorPacientes();
      $editarPaciente -> ctrEditarPacientes();
    ?>

    </form> <!-- ./form -->
   </div>
  </div>
</div>


<!-- MODAL AGREGAR CITA -->
<!-- Modal -->
<div class="modal" id="modalAgregarCita">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post">

      <!-- Modal Header -->
      <div class="modal-header" style="background:#2CB5F7">
        <h4 class="modal-title" style="color:white">NUEVA CITA</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="box-body">
          <div class="form-group row">
            <label for="nombreNuevo" class="col-lg col-form-label">Nombre: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nombreCitas" id="nombreCitas" required readonly>
              <input type="hidden" id="idCitas" name="idCitas">
            </div>
          </div>

          <div class="form-group row">
            <label for="nombreNuevo" class="col-lg col-form-label">Primer Apellido: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="primerCitas" id="primerCitas" required readonly>
            </div>
          </div>

          <div class="form-group row">
            <label for="nombreCitas" class="col-lg col-form-label">Segundo Apellido: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="segundoCitas" id="segundoCitas" required readonly>
            </div>
          </div>

          <div class="form-group row">
            <label for="nombreNuevo" class="col-lg col-form-label">Fecha: </label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="fechaNuevo" required value="<?php echo date("Y-m-d"); ?>" 
            			required min=<?php $hoy=date("Y-m-d"); echo $hoy;?>> 
            </div>
          </div>

          <div class="form-group row">
            <label for="nombreNuevo" class="col-lg col-form-label">Hora: </label>
            <div class="col-sm-6">
              <select class="form-control" name="horaNuevo" id="horaNuevo" required >
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
              <select class="form-control" name="nuevoTratamiento" required>
                <option value="">Seleccionar Tratamiento</option>
                <option value="Ortodoncia">Ortodoncia</option>
                <option value="Recina">Recina</option>
                <option value="Endodoncia">Endodoncia</option>
                <option value="Prótesis">Prótesis</option>
                <option value="Limpieza">Limpieza</option>
                <option value="Extracción">Extracción</option>
                <option value="Amalgama">Amalgama</option>
                <option value="Brackets">Brackets</option>
                <option value="Corona">Corona</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Guardar">
      </div>

      <?php
        $crearCita = new ControladorCitas();
        $crearCita -> ctrCrearCitas();
      ?>

    </form> <!-- -/form -->
   </div>
  </div>
</div>


<!-- SCRIPT VALIDACIÓN DE CAMPOS -->
<script>

//CAMPOS DE TEXTO
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37, 39, 46];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

//PARA CAMPOS NÚMERICOS
function soloNumeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key);
    letras = " 0123456789";
    especiales = [8, 37, 39, 46];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}
</script> <!-- ./script -->