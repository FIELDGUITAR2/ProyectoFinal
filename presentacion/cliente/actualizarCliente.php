<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

if ($_SESSION["rol"] != "pasajero") {
    header("Location: ?pid=" . base64_encode("presentacion/noAutorizado.php"));
}

$error = 0;
?>

<body>
    <?php
    include("presentacion/encabezado.php");
    include("presentacion/sesionPasajero.php");
    ?>
    <div
        class="container">
        <div
            class="row justify-content-center align-items-center g-2">
            <div class="col">Column</div>
            <div class="col">Column</div>
            <div class="col">Column</div>
        </div>

    </div>

</body>