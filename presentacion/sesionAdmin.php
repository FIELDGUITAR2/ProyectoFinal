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

    <div
        class="container">
        <div
            class="row justify-content-center align-items-center g-2">
            <div class="col-9">
                <h1>
                    Estadisticas Administrador
                </h1>
            </div>
            <div class="col-3">
                <img
                    src="img/admin.png"
                    alt="Admin Image"
                    class="img-fluid" />
            </div>
        </div>

    </div>


</body>