<?php
require('fpdf3/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,utf8_decode('Reporte Por Matrícula'),0,0,'C');
    // Salto de línea
    $this->image('../../img/itselogo.png',10,10,40,15,'png');
    $this->image('../../img/renovables.png',170,10,20,15,'png');
    $this->Ln(20);
    $this->Cell(50, 10, 'Nombre',1, 0, 'C', 0);
    $this->Cell(20, 10,utf8_decode('Matrícula'),1, 0, 'C', 0);
    $this->Cell(17, 10,utf8_decode('Código'),1, 0, 'C', 0);
    $this->Cell(25, 10,utf8_decode('Artículo'),1, 0, 'C', 0);
    $this->Cell(15, 10, 'cantidad',1, 0, 'C', 0);
    $this->Cell(33, 10,utf8_decode('Fecha_préstamo'),1, 0, 'C', 0);
    $this->Cell(33, 10,utf8_decode('Fecha_devolución'),1, 1, 'C', 0);
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


$consulta="SELECT * FROM prestamos WHERE matricula='$fecha1'";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

while($row= $resultado->fetch_assoc()){
    $pdf->Cell(50, 10, utf8_decode($row['nombre']),1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['matricula'],1, 0, 'c', 0);
    $pdf->Cell(17, 10, $row['codigo_articulo'],1, 0, 'c', 0);
    $pdf->Cell(25, 10, utf8_decode($row['articulo']),1, 0, 'c', 0);
    $pdf->Cell(15, 10, $row['cantidad'],1, 0, 'C', 0);
    $pdf->Cell(33, 10, $row['fecha_prestamo'],1, 0, 'C', 0);
    $pdf->Cell(33, 10, $row['fecha_devolucion'],1, 1, 'C', 0);
}

$pdf->Output();
?>