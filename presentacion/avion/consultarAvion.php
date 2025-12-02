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
                                        <th scope="col">Column 1</th>
                                        <th scope="col">Column 2</th>
                                        <th scope="col">Column 3</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td scope="row">R1C1</td>
                                        <td>R1C2</td>
                                        <td>R1C3</td>
                                    </tr>
                                    <tr class="">
                                        <td scope="row">Item</td>
                                        <td>Item</td>
                                        <td>Item</td>
                                    </tr>
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