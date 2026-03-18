<?php
require 'fpdf186/fpdf.php';
include "conexion.php";

$id = $_GET['id'];

$sql = "SELECT servicios.*, clientes.nombre AS cliente, clientes.empresa,
tecnicos.nombre AS tecnico
FROM servicios
INNER JOIN clientes ON servicios.id_cliente = clientes.id_cliente
INNER JOIN tecnicos ON servicios.id_tecnico = tecnicos.id_tecnico
WHERE servicios.id_servicio='$id'";

$resultado = $conexion->query($sql);
$servicio = $resultado->fetch_assoc();

$pdf = new FPDF();
$pdf->AddPage();

# LOGO
//$pdf->Image('logo.png',10,8,30);

# Titulo
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Reporte de Servicio Tecnico',0,1,'C');

$pdf->Ln(5);
# FECHA
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,10,'Fecha del servicio: '.date("d/m/Y", strtotime($servicio['fecha'])),0,1,'R');

$pdf->SetFont('Arial','',12);

$pdf->Cell(50,10,'Cliente:',0,0);
$pdf->Cell(100,10,$servicio['cliente'],0,1);

#$pdf->Cell(50,10,'Empresa:',0,0);
#$pdf->Cell(100,10,$servicio['empresa'],0,1);

$pdf->Cell(50,10,'Realizo el servicio:',0,0);
$pdf->Cell(100,10,$servicio['tecnico'],0,1);

$pdf->Cell(50,10,'Solicito el servicio:',0,0);
$pdf->Cell(100,10,$servicio['solicitante'],0,1);

# STATUS
#$pdf->Cell(50,10,'Status:',0,0);
#$pdf->Cell(100,10,$servicio['estatus'],0,1);

$pdf->Ln(5);

# DESCRIPCION
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Descripcion del problema reportado:',0,1);

$pdf->SetFont('Arial','',12);
$pdf->MultiCell(0,8,$servicio['descripcion']);

$pdf->Ln(5);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Solucion aplicada:',0,1);

$pdf->SetFont('Arial','',12);
$pdf->MultiCell(0,8,$servicio['solucion']);

# COMENTARIOS
#$pdf->SetFont('Arial','B',12);
#$pdf->Cell(0,10,'Comentarios:',0,1);

#$pdf->SetFont('Arial','',12);
#$pdf->MultiCell(0,8,$servicio['comentarios']);

$pdf->Ln(15);

# FIRMAS
$pdf->Cell(80,10,'_______________________',0,0,'C');
$pdf->Cell(30);
$pdf->Cell(80,10,'_______________________',0,1,'C');

$pdf->Cell(80,10,'Conformidad del cliente',0,0,'C');
$pdf->Cell(30);
#$pdf->Cell(50,10,'Tecnico ',0,1,'C');
#Muestra el nombre del tecnico que realizo el servicio
$pdf->Cell(80,10,$servicio['tecnico'],0,1,'C');

$pdf->Output();
?>