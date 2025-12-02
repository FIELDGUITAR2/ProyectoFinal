<?php
if (isset($_GET["sesion"])) {
	if ($_GET["sesion"] == "false") {
		session_destroy();
	}
}

$error = false;

if (isset($_POST["autenticar"])) {

	$correo = $_POST["correo"];
	$clave = $_POST["clave"];

	// --- Intento de autenticación: ADMIN ---
	$admin = new Admin("", "", "", $correo, $clave);

	if ($admin->autenticar()) {
		$_SESSION["id"] = $admin->getId();
		$_SESSION["rol"] = "admin";
		header("Location: ?pid=" . base64_encode("presentacion/sesionAdmin.php"));
		exit();
	}

	// --- Intento de autenticación: PILOTO ---
	$piloto = new Piloto("", "", "", $correo, $clave);

	if ($piloto->autenticar()) {
		$_SESSION["id"] = $piloto->getId();
		$_SESSION["rol"] = "piloto";
		header("Location: ?pid=" . base64_encode("presentacion/sesionPiloto.php"));
		exit();
	}

	// --- Intento de autenticación: PASAJERO ---
	$pasajero = new Pasajero("", "", "", $correo, $clave);

	if ($pasajero->autenticar()) {
		$_SESSION["id"] = $pasajero->getId();
		$_SESSION["rol"] = "pasajero";
		header("Location: ?pid=" . base64_encode("presentacion/sesionPasajero.php"));
		exit();
	}

	// Si nadie autenticó
	$error = true;
}
?>


<!--

<body>
	<?php // include("presentacion/encabezado.php"); ?>
	<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
		<div class="d-flex justify-content-center mt-4">
			<div class="card border-0 shadow-sm p-4" style="max-width: 380px; width: 100%;">

				<img src="img/AltairAir.png" alt="Altair Air" class="img-fluid rounded mb-3">

				<div class="card-body">
					<h4 class="card-title text-center mb-3 text-success">Iniciar sesión</h4>

					<form action="?pid=<?php // echo base64_encode('presentacion/autenticar.php') ?>" method="POST">
						<div class="mb-3">
							<label for="email" class="form-label">Correo electrónico</label>
							<input type="email" class="form-control" id="email" name="email"
								placeholder="tucorreo@example.com" required>
						</div>

						<div class="mb-3">
							<label for="clave" class="form-label">Contraseña</label>
							<input type="password" class="form-control" id="clave" name="clave"
								placeholder="••••••••" required>
						</div>

						<button type="submit" class="btn w-100"
							style="background-color: #1B5E20; color: #FFFDE7;"
							name="autenticar">
							Ingresar
						</button>
					</form>
				</div>

			</div>
		</div>
	</div>
</body>
-->


<body class="bg-light">
	
	<?php include("presentacion/encabezado.php"); ?>

	<div class="container my-5">
		<div class="row">
			<div class="col-4"></div>
			<div class="col-4">
				<div class="card">
					<div class="card-header bg-success text-white">
						<h4>Autenticar</h4>
					</div>
					<div class="card-body">
						<form action="?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>" method="post">
							<div class="mb-3">								
								<input type="email" class="form-control" name="correo" placeholder="Correo">
							</div>
							<div class="mb-3">
								<input type="password" class="form-control" name="clave" placeholder="Clave">
							</div>							
							<button type="submit" class="btn btn-warning" name="autenticar">Autenticar</button>
						</form>
    					<?php
						if ($error) {
							echo "<div class='alert alert-danger mt-3' role='alert'>Credenciales incorrectas</div>";
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>