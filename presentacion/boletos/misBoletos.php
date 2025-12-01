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
        class="container">
        <div
            class="row justify-content-center align-items-center g-2">
            <div class="col">

            <div class="card text-start">
                <img class="card-img-top" src="holder.js/100px180/" alt="Title" />
                <div class="card-body">
                    <h4 class="card-title">Mis Boletos</h4>
                    <p class="card-text">Body</p>
                </div>
            </div>
            

            </div>

        </div>

    </div>

</body>