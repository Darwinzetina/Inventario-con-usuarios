<?php
require('fpdf1/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Reporte de Usuarios',0,0,'C');
    // Salto de línea
    $this->image('../../img/itselogo.png',10,10,40,15,'png');
    $this->image('../../img/renovables.png',170,10,20,15,'png');
    $this->Ln(20);
    $this->Cell(45, 10, 'Nombre',1, 0, 'C', 0);
    $this->Cell(20, 10,utf8_decode('Matrícula'),1, 0, 'C', 0);
    $this->Cell(55, 10, 'Carrera',1, 0, 'C', 0);
    $this->Cell(20, 10,utf8_decode('Teléfono'),1, 0, 'C', 0);
    $this->Cell(15, 10,utf8_decode('pass'),1, 0, 'C', 0);
    $this->Cell(30, 10, 'Fecha',1, 1, 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}
require 'cn.php';
$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];

$consulta="SELECT * FROM roluser WHERE fecha BETWEEN '$fecha1' AND '$fecha2'";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

while($row= $resultado->fetch_assoc()){
    $pdf->Cell(45, 10, utf8_decode($row['nombre']),1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['usuario'],1, 0, 'c', 0);
    $pdf->Cell(55, 10, utf8_decode($row['carrera']),1, 0, 'c', 0);
    $pdf->Cell(20, 10, $row['telefono'],1, 0, 'c', 0);
    $pdf->Cell(15, 10, utf8_decode($row['pass']),1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['fecha'],1, 1, 'C', 0);
}

$pdf->Output();
?>