<?php
session_start();
include("phpqrcode/qrlib.php");

require ("fpdf/fpdf.php");
require ("logica/Cita.php");
require ("logica/Paciente.php");
require ("logica/Medico.php");
require ("logica/Consultorio.php");
require ("logica/EstadoCita.php");


$id = $_SESSION["id"];

$cita = new Cita();
$citas = $cita -> consultar("admin", $id);


$pdf = new FPDF('P', 'mm', 'Letter');
$pdf -> AddPage();
$ancho = 50;
$pdf -> Image("img/logo.png", 10, 10, $ancho, $ancho*0.692);

$pdf -> SetY(40);
$pdf -> SetFont("Times", "BI", 18);
$pdf -> Cell(195,20,"REPORTE DE CITAS", 0, 1, "C");
$pdf -> SetFont("Times", "B", 12);
$pdf -> Cell(30,10,"Fecha", 1, 0, "C");
$pdf -> Cell(25,10,"Hora", 1, 0, "C");
$pdf -> Cell(60,10,"Paciente", 1, 0, "C");
$pdf -> Cell(50,10,"Medico", 1, 0, "C");
$pdf -> Cell(30,10,"Consultorio", 1, 1, "C");
$pdf -> SetFont("Times", "", 12);

foreach($citas as $cit){
    $pdf -> Cell(30,10, $cit -> getFecha(), 1, 0, "C");
    $pdf -> Cell(25,10, $cit -> getHora(), 1, 0, "C");
    $pdf -> Cell(60,10, $cit -> getPaciente() -> getNombre() . " " . $cit -> getPaciente() -> getApellido(), 1, 0, "L");
    $pdf -> Cell(50,10, $cit -> getMedico() -> getNombre() . " " . $cit -> getMedico() -> getApellido(), 1, 0, "L");
    $pdf -> Cell(30,10, $cit -> getConsultorio() -> getNombre(), 1, 1, "C");
    
    
}

QRcode::png("Hola curso de aplicaciones para internet", "img/qr.png");
$anchoQR = 40;
$pdf -> Image("img/qr.png", 165, 10, $anchoQR, $anchoQR);


$pdf -> Output();
