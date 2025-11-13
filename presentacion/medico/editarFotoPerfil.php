<?php
if($_SESSION["rol"] != "medico"){
    header("Location: ?pid=" . base64_encode("presentacion/noAutorizado.php"));
}
$error = 0;
if(isset($_POST["editar"])){
    $foto = $_FILES["foto"]["name"];
    $tam = $_FILES["foto"]["size"];
    $rutaLocal = $_FILES["foto"]["tmp_name"];
    $nuevoNombre = time() . ".png";
    $rutaServidor = "imagenes/" . $nuevoNombre;
    copy($rutaLocal, $rutaServidor);
    $medico = new Medico($_SESSION["id"]);
    $medico -> consultar();
    if($medico -> getFoto() != ""){
        unlink($medico -> getFoto());
    }
    $medico = new Medico($_SESSION["id"], "", "", "", "", $rutaServidor);
    $medico -> editarFoto();
}
?>
<body>
<?php 
include ("presentacion/encabezado.php");
include ("presentacion/menuMedico.php");
?>

<div class="container">
		<div class="row">
			<div class="col-4"></div>
			<div class="col-4">
				<div class="card">
					<div class="card-header bg-primary">
						<h4>Editar Foto</h4>
					</div>
					<div class="card-body">
						<?php 
    					if (isset($_POST["editar"]) && $error == 0){
    					    echo "<div class='alert alert-success mt-3' role='alert'>Foto editada</div>";
    					}
    					?>
						<form action="?pid=<?php echo base64_encode("presentacion/medico/editarFotoPerfil.php") ?>" method="post" enctype="multipart/form-data">
							<div class="mb-3">								
								<input type="file" class="form-control" name="foto" placeholder="Foto">
							</div>
							<button type="submit" class="btn btn-primary" name="editar">Editar Foto</button>
						</form>
					</div>
				</div>
			</div>
		</div>

</div>



</body>

