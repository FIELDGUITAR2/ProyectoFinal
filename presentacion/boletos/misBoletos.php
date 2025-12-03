<?php

if ($_SESSION["rol"] != "pasajero") {
    header("Location: ?pid=" . base64_encode("presentacion/noAutorizado.php"));
}

$error = 0;
?>

<body>
    <?php
    include('presentacion/encabezado.php');
    include('presentacion/menuPasajero.php');
    ?>
    <div
        class="container mt-5">
        <div
            class="row justify-content-center align-items-center g-2">
            <div class="col">

                <div class="card text-start">
                    <div class="card-body">
                        <h4 class="card-title">Mis Boletos</h4>
                        <div
                            class="table-responsive">
                            <table
                                class="table table-success">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Asiento</th>
                                        <th scope="col">Clase</th>
                                        <th scope="col">Hora</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $boleto = new Boleto();
                                        $boleto->setPasajero($_SESSION['id']);
                                        $boletos = $boleto->consultarBoleto();
                                        foreach($boletos as $b)
                                        {
                                            echo "<tr>";
                                            echo "<td>".$b->getIdBoleto()."</td>";
                                            echo "<td>".$b->getAsiento()."</td>";
                                            echo "<td>".$b->getClase()."</td>";
                                            echo "<td>".$b->getVuelo()->getHora()."</td>";
                                            echo "<td>".$b->getVuelo()->getFecha()."</td>";
                                            echo "<td>".$b->getPrecio()."</td>";
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