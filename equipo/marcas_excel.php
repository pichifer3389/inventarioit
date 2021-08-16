<?php session_start(); 

require '../vendor/autoload.php';
require '../dbconfig.php';

$array_secuencial = $_POST['secuencial'];
$array_nombres= $_POST['nombre'];




//$nombre_usuario_v=$_SESSION['user'];
 $fecha_actual= date('d/m/Y');
 
 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;




$documento = new Spreadsheet();

$marcas = $documento->getActiveSheet();
$marcas->setTitle("Marcas");

$styleArray = [
    
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
    ],
    'borders' => [
        'right' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        
         'left' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
         'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
         'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
   
];

$sheeti = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$sheeti->setName('name');
$sheeti->setDescription('description');
$sheeti->setPath('../png/vf.jpg');
$sheeti->setHeight(58);
$sheeti->setCoordinates("A1");
$sheeti->setOffsetX(1);
$sheeti->setOffsetY(1);
$sheeti->setWorksheet($marcas);


$encabezado = ["SECUENCIAL","NOMBRE"];


$marcas->fromArray($encabezado, null, 'B4');
$marcas->getStyle('B4:C4')->getFont()->setBold(true)->setSize(11);
$marcas->getStyle('B4:C4')->getAlignment()->setHorizontal('center');
$marcas->getStyle('B4:C4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FF5E00');
    $marcas->getStyle('B4:C4')->getFont()->getColor()->setRGB('FFFFFF');
    $marcas->getColumnDimension("B")->setAutoSize(true);
    $marcas->getColumnDimension("C")->setAutoSize(true);
    
     
     
    
   $marcas->setCellValue("C1", "VISION FUND HONDURAS");
   $marcas->setCellValue("C2", "MARCAS");
   $marcas->getStyle('C2')->getAlignment()->setHorizontal('center');
   //$marcas->setCellValue("C3", "Generado por: $nombre_usuario_v Fecha: $fecha_actual");
   

     
    
    $numeroDeFila = 5;
    foreach($array_secuencial as $i =>$secuencial){
        
        
                                           
                                           
                                           
        
    
    $marcas->setCellValueByColumnAndRow(2, $numeroDeFila, $secuencial);
    $marcas->setCellValueByColumnAndRow(3, $numeroDeFila, $array_nombres[$i]);
    
                  $numeroDeFila++;
        
    }


header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="marcas_inventario.xlsx"');
$writer = new Xlsx($documento);
//$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
ob_end_clean();
ob_start();
$writer->save('php://output');
//$writer->save('Exportado.xlsx');



