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
                                    foreach ($aviones as $a) {
                                        echo "<tr>";
                                        echo "<td>" . $a->getId() . "</td>";
                                        echo "<td>" . $a->getNombreAvion() . "</td>";
                                        echo "<td>" . $a->getTipoAvion() . "</td>";
                                        echo "<td>" . $a->getCantCombustible() . "</td>";
                                        echo "<td>" . $a->getCapPasajeros() . "</td>";
                                    ?>
                                        <td class="text-center">
                                            <button
                                                class="btn btn-warning btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalEditar<?= $a->getId(); ?>">
                                                Editar
                                            </button>
                                        </td>
                                        <div class="modal fade" id="modalEditar<?= $a->getId(); ?>" tabindex="-1">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <div class="modal-header bg-warning">
                                                        <h5 class="modal-title">Editar avión #<?= $a->getId(); ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <form method="POST" action="?pid=<?= base64_encode('presentacion/avion/consultarAvion.php'); ?>">
                                                        <div class="modal-body">

                                                            <input type="hidden" name="idAvion" value="<?= $a->getId(); ?>">

                                                            <div class="row g-3">

                                                                <div class="col-md-6">
                                                                    <label>Nombre</label>
                                                                    <input type="text"
                                                                        name="nombreAvion"
                                                                        value="<?= $a->getNombreAvion(); ?>"
                                                                        class="form-control">
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label>Capacidad Pasajeros</label>
                                                                    <input type="text"
                                                                        name="capPasajeros"
                                                                        value="<?= $a->getCapPasajeros(); ?>"
                                                                        class="form-control">
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label>Cantidad combustible</label>
                                                                    <input type="text"
                                                                        name="cantCombustible"
                                                                        value="<?= $a->getCantCombustible(); ?>"
                                                                        class="form-control">
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                            <button type="submit" name="actualizarVuelo" class="btn btn-success">Guardar cambios</button>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

    </div>
</body>