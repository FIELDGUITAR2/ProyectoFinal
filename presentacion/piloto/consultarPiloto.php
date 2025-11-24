<?php
if ($_SESSION["rol"] != "admin") {
    header("Location: ?pid=" . base64_encode("presentacion/noAutorizado.php"));
}
$error = 0;
?>

<body>
    <?php
    include("presentacion/encabezado.php");
    include("presentacion/menuAdmin.php");
    ?>

    <div class="container mt-4">

        <div class="card shadow-lg border-0">

            <!-- Encabezado -->
            <div class="card-header text-white"
                style="background: linear-gradient(90deg, #0b6623, #c9b200);">
                <h4 class="mb-0"><i class="fa-solid fa-user-tie"></i> Pilotos</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-hover align-middle">
                        <thead class="text-white"
                            style="background-color: #0b6623;">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $piloto = new Piloto();
                            $listaPilotos = $piloto->consultarPilotos();

                            foreach ($listaPilotos as $p) {
                                echo "<tr>";
                                echo "<td>" . $p->getId() . "</td>";
                                echo "<td><img src='" . $p->getFoto() . "' alt='Foto' 
                                      class='rounded-circle' 
                                      style='height:55px; width:55px; object-fit:cover;'></td>";
                                echo "<td>" . $p->getNombre() . "</td>";
                                echo "<td>" . $p->getApellido() . "</td>";
                                echo "<td>" . $p->getCorreo() . "</td>";
                                echo "<td>" . $p->getTelefono() . "</td>";

                                // Estado con badge de color
                                $estado = $p->getIdEstadoPersona();
                                $color = ($estado == 1) ? "success" : "danger";

                                echo "<td><span class='badge bg-$color'>" . $estado . "</span></td>";
                                echo "<td>
                                        <button class='btn btn-warning btn-sm editarBtn'
                                            data-id='" . $p->getId() . "'
                                            data-nombre='" . $p->getNombre() . "'
                                            data-apellido='" . $p->getApellido() . "'
                                            data-correo='" . $p->getCorreo() . "'
                                            data-telefono='" . $p->getTelefono() . "'
                                            data-estado='" . $p->getIdEstadoPersona() . "'
                                            data-foto='" . $p->getFoto() . "'
                                            data-bs-toggle='modal'
                                            data-bs-target='#modalEditar'>
                                            Editar
                                        </button>
                                      </td>";
                                echo "</tr>";
                                
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
    <!-- Modal Editar Piloto -->
<div class="modal fade" id="modalEditar" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header" style="background:#0b6623; color:white;">
                <h5 class="modal-title">Editar Piloto</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <form action="controlador/piloto/actualizarPiloto.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body row g-3">

                    <input type="hidden" name="idPiloto" id="editId">

                    <div class="col-md-6">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombres" id="editNombre" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="apellidos" id="editApellido" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Correo</label>
                        <input type="email" class="form-control" name="correo" id="editCorreo" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" id="editTelefono" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Estado</label>
                        <select class="form-select" name="idEstadoPersona" id="editEstado">
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>

                    <div class="col-md-6 text-center">
                        <label class="form-label">Foto</label>
                        <input class="form-control" type="file" name="foto">
                        <img id="editFotoPreview" src="" 
                             class="img-thumbnail mt-2"
                             style="height:80px; width:80px; object-fit:cover; border-radius:50%;">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar Cambios</button>
                </div>

            </form>

        </div>
    </div>
</div>
<script>
document.querySelectorAll('.editarBtn').forEach(btn => {
    btn.addEventListener('click', () => {

        document.getElementById('editId').value = btn.dataset.id;
        document.getElementById('editNombre').value = btn.dataset.nombre;
        document.getElementById('editApellido').value = btn.dataset.apellido;
        document.getElementById('editCorreo').value = btn.dataset.correo;
        document.getElementById('editTelefono').value = btn.dataset.telefono;
        document.getElementById('editEstado').value = btn.dataset.estado;

        // Foto previa
        document.getElementById('editFotoPreview').src = btn.dataset.foto;
    });
});
</script>

</body>