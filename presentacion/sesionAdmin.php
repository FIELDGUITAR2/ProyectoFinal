<?php
if ($_SESSION["rol"] != "admin") {
    header("Location: ?pid=" . base64_encode("presentacion/noAutorizado.php"));
}
?>

<body>
    <?php
    include("presentacion/encabezado.php");
    include("presentacion/menuAdmin.php");
    ?>

    <div class="container my-4">
    <div class="row justify-content-between align-items-center">
        <div class="col-md-8">
            <h1 class="fw-bold mb-0">Estadísticas del Administrador</h1>
            <p class="text-muted">Panel de control general</p>
        </div>

        <div class="col-md-4 text-end">
            <img src="img/admin.png" alt="Admin Image" class="img-fluid" style="max-width: 150px;">
        </div>
    </div>

    <hr>
</div>



</body>