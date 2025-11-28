<?php

if ($_SESSION["rol"] != "admin") {
    header("Location: ?pid=" . base64_encode("presentacion/noAutorizado.php"));
}

$error = 0;

/* 
   El formulario envía: name="idPiloto"
   Por lo tanto debe recibirse con el mismo nombre.
*/
//$idPiloto = isset($_POST['idPiloto']) ? $_POST['idPiloto'] : "";


if (isset($_POST['actualizar'])) {

    $nombres          = $_POST['nombres'];
    $apellidos        = $_POST['apellidos'];
    $correo           = $_POST['correo'];
    $telefono         = $_POST['telefono'];
    $idEstadoPersona  = $_POST['idEstadoPersona'];
    $fecha_nac        = $_POST['fecha_nac'];

    /*
     * Constructor Piloto:
     * (id, nombre, apellido, correo, clave, edad, fecha_nac, foto, idEstadoPersona, telefono)
     * 
     * Como no estás modificando la clave, edad ni la foto, se envían como:
     * clave = ""
     * edad = ""
     * foto = ""
     */

    $piloto = new Piloto(
        $idPiloto,
        $nombres,
        $apellidos,
        $correo,
        "",          // clave
        "",          // edad
        $fecha_nac,  // fecha_nac
        "",          // foto
        $idEstadoPersona,
        $telefono
    );

    $piloto->actualizarPiloto();
}

?>

<body>
    <?php
    include('presentacion/encabezado.php');
    include('presentacion/menuAdmin.php');

    // Consultar piloto nuevamente para mostrar datos actualizados
    $piloto = new Piloto($idPiloto);
    $piloto->consultar();
    ?>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow">
                    <div class="card-body">

                        <h4 class="card-title mb-3">Editar Piloto</h4>

                        <form action="?pid=<?php echo base64_encode('presentacion/piloto/actualizarPiloto.php'); ?>" method="post">

                            <!-- ID oculto -->
                            <input type="hidden" name="idPiloto" value="<?php echo $piloto->getId(); ?>">

                            <label>Nombres</label>
                            <input
                                type="text"
                                name="nombres"
                                class="form-control mb-2"
                                value="<?php echo $piloto->getNombre(); ?>"
                                required>

                            <label>Apellidos</label>
                            <input
                                type="text"
                                name="apellidos"
                                class="form-control mb-2"
                                value="<?php echo $piloto->getApellido(); ?>"
                                required>

                            <label>Correo</label>
                            <input
                                type="email"
                                name="correo"
                                class="form-control mb-2"
                                value="<?php echo $piloto->getCorreo(); ?>"
                                required>

                            <label>Teléfono</label>
                            <input
                                type="text"
                                name="telefono"
                                class="form-control mb-2"
                                value="<?php echo $piloto->getTelefono(); ?>"
                                required>

                            <label class="mt-2">Fecha de nacimiento:</label>
                            <input
                                type="date"
                                name="fecha_nac"
                                class="form-control mb-3"
                                value="<?php echo $piloto->getFecha_nac(); ?>"
                                required>

                            <label>Estado</label>
                            <select name="idEstadoPersona" class="form-select mb-3" required>
                                <option value="1" <?php echo ($piloto->getIdEstadoPersona() == 1 ? "selected" : ""); ?>>Activo</option>
                                <option value="2" <?php echo ($piloto->getIdEstadoPersona() == 2 ? "selected" : ""); ?>>Inactivo</option>
                            </select>

                            <button type="submit" name="actualizar" class="btn btn-success w-100">Guardar Cambios</button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
