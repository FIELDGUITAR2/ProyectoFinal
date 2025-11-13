<?php 
require ("logica/Cita.php");
$idCita = $_GET["idCita"];
$idNuevoEstadoCita = $_GET["idNuevoEstadoCita"];
$valorNuevoEstadoCita = $_GET["valorNuevoEstadoCita"];
$cita = new Cita($idCita);
$cita -> actualizarEstado($idNuevoEstadoCita);
echo $valorNuevoEstadoCita;
?>
