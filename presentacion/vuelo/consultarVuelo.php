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
        <div class="col-lg-12 col-md-12">
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
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>



</body>