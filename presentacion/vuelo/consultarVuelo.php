<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

if ($_SESSION["rol"] != "admin") {
    header("Location: ?pid=" . base64_encode("presentacion/noAutorizado.php"));
}

$error = 0;

?>

<body>
    <?php
    include('presentacion/encabezado.php');
    include('presentacion/menuAdmin.php');
    ?>
    <div class="container-fluid mt-4">

    <div class="row justify-content-center g-4">

        <!-- SECCIÓN DE VUELOS -->
        <div class="col-lg-11 col-md-12">
            <div class="card shadow">

                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Vuelos</h4>
                </div>

                <div class="card-body">
                    <p class="text-muted">Próximos vuelos programados:</p>

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th scope="col">Id vuelo</th>                                    
                                    <th scope="col">Avion</th>
                                    <th scope="col">Piloto</th>
                                    <th scope="col">Copiloto</th>
                                    <th scope="col">Origen</th>
                                    <th scope="col">Destino</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Cantidad de pasajeros</th>
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $vuelo = new Vuelo();
                                    $vuelos = $vuelo->consultarVuelos();
                                    foreach($vuelos as $v)
                                    {
                                        echo "<tr>";
                                        echo "<td>".$v->getIdVuelo()."</td>";
                                        echo "<td>".$v->getAvion()."</td>";
                                        echo "<td>".$v->getPiloto()."</td>";
                                        echo "<td>".$v->getCopiloto()."</td>";
                                        echo "<td>".$v->getOrigen()."</td>";
                                        echo "<td>".$v->getDestino()."</td>";
                                        echo "<td>".$v->getEstado()."</td>";
                                        echo "<td>".$v->getHora()."</td>";
                                        echo "<td>".$v->getFecha()."</td>";
                                        echo "<td>".$v->getCantidadPasajeros()."</td>";
                                        echo "</tr>";
                                        echo '
<!-- Modal -->
<div class="modal fade" id="modalEditar'.$v->getIdVuelo().'" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header bg-warning">
        <h5 class="modal-title">Editar vuelo #'.$v->getIdVuelo().'</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form method="POST" action="modificarVuelo.php">
        <div class="modal-body">

          <input type="hidden" name="idVuelo" value="'.$v->getIdVuelo().'">

          <div class="row g-3">
              <div class="col-md-6">
                  <label>Avión:</label>
                  <input type="text" class="form-control" name="avion" value="'.$v->getAvion().'" required>
              </div>

              <div class="col-md-6">
                  <label>Piloto:</label>
                  <input type="text" class="form-control" name="piloto" value="'.$v->getPiloto().'" required>
              </div>

              <div class="col-md-6">
                  <label>Copiloto:</label>
                  <input type="text" class="form-control" name="copiloto" value="'.$v->getCopiloto().'" required>
              </div>

              <div class="col-md-6">
                  <label>Estado:</label>
                  <select name="estado" class="form-control">
                    <option '.$this->selected($v->getEstado(),"Programado").'>Programado</option>
                    <option '.$this->selected($v->getEstado(),"En curso").'>En curso</option>
                    <option '.$this->selected($v->getEstado(),"Finalizado").'>Finalizado</option>
                  </select>
              </div>

              <div class="col-md-6">
                  <label>Hora:</label>
                  <input type="time" class="form-control" name="hora" value="'.$v->getHora().'" required>
              </div>

              <div class="col-md-6">
                  <label>Fecha:</label>
                  <input type="date" class="form-control" name="fecha" value="'.$v->getFecha().'" required>
              </div>
          </div>

        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-success" type="submit">Guardar cambios</button>
        </div>

      </form>

    </div>
  </div>
</div>';

                                        echo "<td class='text-center'>
                                                <button class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#modalEditar".$v->getIdVuelo()."'>
                                                    Editar
                                                </button>
                                              </td>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <?php /*
        <!-- SECCIÓN EDITAR -->
        <div class="col-lg-3 col-md-12">
            <div class="card shadow">

                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Editar</h4>
                </div>

                <div class="card-body">
                    <p class="text-muted">Aquí podrás editar la información de los vuelos seleccionados.</p>

                    <!-- Aquí puedes colocar el formulario de edición -->
                    <button class="btn btn-success w-100">Editar vuelo</button>
                </div>

            </div>
        </div>
        */ ?>

    </div>

</div>



</body>