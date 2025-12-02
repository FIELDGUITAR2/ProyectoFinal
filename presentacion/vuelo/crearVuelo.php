<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

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
    
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Programar Nuevo Vuelo</h4>
                </div>

                <div class="card-body">

                    <form action="" method="post">

                        <!-- Avión -->
                        <div class="mb-3">
                            <label class="form-label">Avión</label>
                            <select class="form-select" name="avion" id="avion" required>
                                <option value="">Seleccione un avión</option>
                                <?php
                                    $avion = new Avion();
                                    $aviones = $avion->consultarAviones();
                                    foreach($aviones as $a)
                                    {
                                        echo "<option value = '".$a->getId()."'>".$a->getNombreAvion()."</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <!-- Origen -->
                        <div class="mb-3">
                            <label class="form-label">Origen</label>
                            <select class="form-select" name="origen" id="origen" required>
                                <option value="">Seleccione un origen</option>
                            </select>
                        </div>

                        <!-- Destino -->
                        <div class="mb-3">
                            <label class="form-label">Destino</label>
                            <select class="form-select" name="destino" id="destino" required>
                                <option value="">Seleccione un destino</option>
                            </select>
                        </div>

                        <!-- Piloto -->
                        <div class="mb-3">
                            <label class="form-label">Piloto</label>
                            <select class="form-select" name="piloto" id="piloto" required>
                                <option value="">Seleccione un piloto</option>
                            </select>
                        </div>

                        <!-- Copiloto -->
                        <div class="mb-3">
                            <label class="form-label">Copiloto</label>
                            <select class="form-select" name="copiloto" id="copiloto" required>
                                <option value="">Seleccione un copiloto</option>
                            </select>
                        </div>

                        <!-- Estado del vuelo -->
                        <div class="mb-3">
                            <label class="form-label">Estado del Vuelo</label>
                            <select class="form-select" name="estadoVuelo" id="estadoVuelo" required>
                                <option value="">Seleccione un estado</option>
                            </select>
                        </div>

                        <!-- Fecha -->
                        <div class="mb-3">
                            <label class="form-label">Fecha</label>
                            <input type="date" class="form-control" name="fecha" required>
                        </div>

                        <!-- Hora -->
                        <div class="mb-3">
                            <label class="form-label">Hora</label>
                            <input type="time" class="form-control" name="hora" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">
                            <i class="fa-solid fa-plus-circle"></i> Programar Vuelo
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
