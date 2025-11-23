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

    <div class="container">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">
                <div class="card text-start">
                    <!-- <img class="card-img-top" src="holder.js/100px180/" alt="Title" /> -->
                    <div class="card-body">
                        <h4 class="card-title">Pilotos</h4>
                        <div
                            class="table-responsive">
                            <table
                                class="table table-primary">
                                <thead>
                                    <tr>
                                        <th scope="col">Id Piloto</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Telefono</th>                                        
                                        <th scope="col">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td scope="row">R1C1</td>
                                        <td>R1C2</td>
                                        <td>R1C3</td>
                                        <td>otros</td>
                                        <td>otros</td>
                                        <td>otros</td>
                                        <td>otros</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
            
        </div>

    </div>

</body>