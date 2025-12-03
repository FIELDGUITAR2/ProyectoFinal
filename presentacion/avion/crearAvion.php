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
        class="container"
    >
        <div
            class="row justify-content-center align-items-center g-2"
        >
            <div class="col">
                <div class="card text-start">
                    <img class="card-img-top" src="holder.js/100px180/" alt="Title" />
                    <div class="card-body">
                        <h4 class="card-title">Insertar nuevo avion</h4>
                        <form action="?pid=<?php echo base64_encode('presentacion/avion/crearAvion.php'); ?>" method="post">
                            
                        </form>

                    </div>
                </div>
                
            </div>
            <div class="col">Column</div>
        </div>
        
    </div>
    

</body>