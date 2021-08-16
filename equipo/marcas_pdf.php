<?php
require('../FPDF/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../logo/logo1.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','',13);
    // Movernos a la derecha
    $this->Cell(15);
    // Título
    $this->Cell(15,10,'Marcas',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    
 $this->Cell(10,10,'ID',1,0,'C',0);
 $this->Cell(30,10, utf8_decode('Marca'),1,1,'C',0);  
  
 
 
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10, utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
}
}


require '../dbconfig.php';
$sql = "SELECT * FROM inventario_it.marca";
$query = $conn->query($sql);
    
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->SetLeftMargin(65);
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

while($row = $query->fetch_assoc()){
    
    
    $pdf->Cell(10,10,$row['SECUENCIAL'],1,0,'C',0);
 $pdf->Cell(30,10, utf8_decode($row['NOMBRE']),1,1,'C',0);  
 
 
 
 
}

$pdf->Output();

