<?php
require('fpdf/fpdf.php');
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
    $this->Cell(30,10,utf8_decode('Reporte de artículos'),0,0,'C');
    // Salto de línea
    $this->image('../../img/itselogo.png',10,10,40,15,'png');
    $this->image('../../img/renovables.png',170,10,20,15,'png');
    $this->Ln(20);
    $this->Cell(15, 10,utf8_decode('Código'),1, 0, 'C', 0);
    $this->Cell(70, 10,utf8_decode('Artículo'),1, 0, 'C', 0);
    $this->Cell(35, 10, 'Marca',1, 0, 'C', 0);
    $this->Cell(25, 10, 'Modelo',1, 0, 'C', 0);
    $this->Cell(20, 10, 'Cantidad',1, 0, 'C', 0);
    $this->Cell(22, 10, 'Fecha',1, 1, 'C', 0);
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

$consulta="SELECT * FROM productos WHERE fecha BETWEEN '$fecha1' AND '$fecha2'";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

while($row= $resultado->fetch_assoc()){
    $pdf->Cell(15, 10, $row['codigo'],1, 0, 'C', 0);
    $pdf->Cell(70, 10, utf8_decode($row['articulo']),1, 0, 'C', 0);
    $pdf->Cell(35, 10, utf8_decode($row['marca']),1, 0, 'C', 0);
    $pdf->Cell(25, 10, utf8_decode($row['color']),1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['cantidad'],1, 0, 'C', 0);
    $pdf->Cell(22, 10, $row['fecha'],1, 1, 'C', 0);
}



$pdf->Output();
?>