<?php
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
    <div
        class="container">
        <div
            class="row justify-content-center align-items-center g-2">
            <div class="col-9">
                <div class="card text-start">
                    <div class="card-body">
                        <h4 class="card-title">Aviones</h4>
                        <div
                            class="table-responsive">
                            <table
                                class="table table-primary">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre Avion</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Cant combustible</th>
                                        <th scope="col">Cant Pasajeros</th>
                                        <th scope="col">Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $avion = new Avion();
                                        $aviones = $avion->consultarAviones();
                                        foreach($aviones as $a)
                                        {
                                            echo "<tr>";
                                            echo "<td>".$a->getId()."</td>";
                                            echo "<td>".$a->getNombreAvion()."</td>";
                                            echo "<td>".$a->getTipoAvion()."</td>";
                                            echo "<td>".$a->getCantCombustible()."</td>";
                                            echo "<td>".$a->getCapPasajeros()."</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-3">
                <div class="card text-start">
                    <div class="card-body">
                        <h4 class="card-title">Editar Aviones</h4>
                        <form action="" method="post">

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</body>