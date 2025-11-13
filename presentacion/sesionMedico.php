<?php
if($_SESSION["rol"] != "medico"){
    header("Location: ?pid=" . base64_encode("presentacion/noAutorizado.php"));
}
$medico = new Medico($_SESSION["id"]);
$medico -> consultar();
?>
<body>
<?php 
include ("presentacion/encabezado.php");
include ("presentacion/menuMedico.php");
?>

<div class="container">
	<div class="row">
		<div class="col text-center">
		<?php 
		if($medico -> getFoto() != ""){
		    echo "<img src='" . $medico -> getFoto() . "' height='200' />";  
		}else{
		    echo "No hay foto";
		}
		
		?>
		</div>
	</div>

</div>



</body>

