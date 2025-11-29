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

        <div class="row justify-content-center g-4">

            <!-- Card Izquierda -->
            <div class="col-12 col-md-7">
                <div class="card shadow-lg border-0 rounded-4 card-hover">

                    <div class="text-center pt-4">
                        <img src="img/AltairAir.png" class="img-fluid" style="max-width: 180px;">
                    </div>

                    <div class="card-body text-center">
                        <h4 class="card-title fw-bold mb-3">Agregar pilotos nuevos</h4>
                        <p class="card-text text-muted">
                            pon los datos del piloto y dale en agregar.
                        </p>
                        <form action="" method="post">
                            
                        </form>
                    </div>
                </div>
            </div>

            <!-- Card Derecha -->
            <div class="col-12 col-md-5">
                <div class="card shadow-lg border-0 rounded-4 card-hover">

                    <div class="text-center pt-4">
                        <img src="img/AltairAir.png" class="img-fluid" style="max-width: 150px;">
                    </div>

                    <div class="card-body text-center">
                        <h4 class="card-title fw-bold mb-3">Agregar Foto Piloto</h4>
                        <p class="card-text text-muted">
                            Seccion para agregar la foto del piloto nuevo.
                        </p>
                        <form action="" method="post">

                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>