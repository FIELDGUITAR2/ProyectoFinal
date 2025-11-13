<?php 
$id = $_SESSION["id"];
$rol = $_SESSION["rol"];
?>
<body>
<?php 
include ("presentacion/encabezado.php");
include ("presentacion/menu" . ucfirst($rol) . ".php");
$cita = new Cita();
$citas = $cita -> consultar($rol, $id);
$estadoCita = new EstadoCita();
$estadosCitas = $estadoCita -> consultar();
?>
<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card">
				<div class="card-header"><h4>Citas</h4></div>
				<div class="card-body">
    				<?php 
    				echo count($citas). " citas encontradas";
    				echo "<table class='table table-striped table-hover'>";
    				echo "<tr><th>Id</th><th>Fecha</th><th>Hora</th>";
    				if($rol != "paciente"){
    				    echo "<th>Paciente</th>";
    				}
    				if($rol != "medico"){
    				    echo "<th>Medico</th>";
    				}
    				echo "<th>Consultorio</th>";
    				echo "<th>Estado</th>";
    				echo "<th>Accion</th></tr>";
    				foreach($citas as $cit){
    				    echo "<tr>";
    				    echo "<td>" . $cit -> getId() . "</td>";
    				    echo "<td>" . $cit -> getFecha() . "</td>";
    				    echo "<td>" . $cit -> getHora() . "</td>";
    				    if($rol != "paciente"){
        				    echo "<td>" . $cit -> getPaciente() -> getNombre() . " " . $cit -> getPaciente() -> getApellido() . "</td>";
    				    }
    				    if($rol != "medico"){
    				        echo "<td>" . $cit -> getMedico() -> getNombre() . " " . $cit -> getMedico() -> getApellido() . "</td>";
    				    }
                        echo "<td>" . $cit -> getConsultorio() -> getNombre() . "</td>";
                        echo "<td><div id='estadoCita" . $cit -> getId() . "'>" . $cit -> getEstadoCita() -> getValor() . "</div></td>";
                        if($rol == "admin"){
                            echo "<td>";
                            foreach ($estadosCitas as $est){
                                echo "<button " . (($cit -> getEstadoCita() -> getId() == $est -> getId())?"style=\"display: none;\"":"style") . " id='nuevoEstado" . $est -> getValor() . $cit -> getId()  . "' class='btn btn-link'>" . $est -> getValor() . "</button> ";
                            }
                            echo "</td>";
                        }
                        echo "</tr>";
    				}
    				echo "</table>";
    				?>			
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	<?php 
	foreach($citas as $cit){
	    foreach ($estadosCitas as $estCit){
            echo "\t$(\"#nuevoEstado" . $estCit -> getValor() . $cit -> getId() . "\").click(function(){\n";
            echo "\t\tvar ruta = \"actualizarEstadoCitaAjax.php?idCita=" . $cit -> getId() . "&idNuevoEstadoCita=" . $estCit -> getId() . "&valorNuevoEstadoCita=" . $estCit -> getValor() . "\";\n";
            echo "\t\t$(\"#estadoCita" . $cit -> getId() . "\").load(ruta);\n";
            foreach ($estadosCitas as $est){
                if($estCit -> getId() != $est -> getId()){
                    echo "\t\t$(\"#nuevoEstado" . $est -> getValor() . $cit -> getId() . "\").show()\n";
                }else{
                    echo "\t\t$(\"#nuevoEstado" . $est -> getValor() . $cit -> getId() . "\").hide()\n";
                }
            }
            echo "\t});\n";
	    }
	}
	?>
	
});
</script>
</body>