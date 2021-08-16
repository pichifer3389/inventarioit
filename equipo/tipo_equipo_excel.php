<?php session_start(); 

require '../vendor/autoload.php';
require '../dbconfig.php';

$array_descripcion= $_POST['descripcion'];
$array_numero_inventario=$_POST['numero_inventario'];
$array_fecha_compra=$_POST['fecha_compra'];
$array_nombre_modelo=$_POST['nombre_modelo'];
$array_nombre_marca=$_POST['nombre_marca'];
$array_numero_factura=$_POST['numero_factura'];
$array_nombre_proveedor=$_POST['nombre_proveedor'];
$array_estado_equipo=$_POST['estado_equipo'];





//$nombre_usuario_v=$_SESSION['user'];
 $fecha_actual= date('d/m/Y');
 
 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;




$documento = new Spreadsheet();

$tipo_equipo = $documento->getActiveSheet();
$tipo_equipo->setTitle("Equipos");

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
$sheeti->setWorksheet($tipo_equipo);


$encabezado = ["DESCRIPCION","# INVENTARIO","FECHA COMPRA","MODELO","MARCA","# FACTURA","PROVEEDOR","ESTADO"];


$tipo_equipo->fromArray($encabezado, null, 'A4');
$tipo_equipo->getStyle('A4:H4')->getFont()->setBold(true)->setSize(11);
$tipo_equipo->getStyle('A4:H4')->getAlignment()->setHorizontal('center');
$tipo_equipo->getStyle('A4:H4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FF5E00');
    $tipo_equipo->getStyle('A4:H4')->getFont()->getColor()->setRGB('FFFFFF');
    $tipo_equipo->getColumnDimension("A")->setAutoSize(true);
    $tipo_equipo->getColumnDimension("B")->setAutoSize(true);
    $tipo_equipo->getColumnDimension("C")->setAutoSize(true);
    $tipo_equipo->getColumnDimension("D")->setAutoSize(true);
    $tipo_equipo->getColumnDimension("E")->setAutoSize(true);
    $tipo_equipo->getColumnDimension("F")->setAutoSize(true);
    $tipo_equipo->getColumnDimension("G")->setAutoSize(true);
    $tipo_equipo->getColumnDimension("H")->setAutoSize(true);
 
    
     
     
    
   $tipo_equipo->setCellValue("C1", "VISION FUND HONDURAS");
   $tipo_equipo->setCellValue("C2", "TIPO EQUIPO");
   $tipo_equipo->setCellValue("C3", "Generado a la fecha: $fecha_actual");
   $tipo_equipo->getStyle('C1')->getAlignment()->setHorizontal('center');
   $tipo_equipo->getStyle('C2')->getAlignment()->setHorizontal('center');
   $tipo_equipo->getStyle('C3')->getAlignment()->setHorizontal('center');
  
   

     
    
    $numeroDeFila = 5;
    foreach($array_descripcion as $i =>$descripcion){
        
        
                                           
                                           
                                           
        
    
    $tipo_equipo->setCellValueByColumnAndRow(1, $numeroDeFila, $descripcion);
    $tipo_equipo->setCellValueByColumnAndRow(2, $numeroDeFila, $array_numero_inventario[$i]);
    $tipo_equipo->setCellValueByColumnAndRow(3, $numeroDeFila, $array_fecha_compra[$i]);
    $tipo_equipo->setCellValueByColumnAndRow(4, $numeroDeFila, $array_nombre_modelo[$i]);
    $tipo_equipo->setCellValueByColumnAndRow(5, $numeroDeFila, $array_nombre_marca[$i]);
    $tipo_equipo->setCellValueByColumnAndRow(6, $numeroDeFila, $array_numero_factura[$i]);
    $tipo_equipo->setCellValueByColumnAndRow(7, $numeroDeFila, $array_nombre_proveedor[$i]);
    $tipo_equipo->setCellValueByColumnAndRow(8, $numeroDeFila, $array_estado_equipo[$i]);
    
                  $numeroDeFila++;
        
    }


header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="tipo_equipo_inventario.xlsx"');
$writer = new Xlsx($documento);
//$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
ob_end_clean();
ob_start();
$writer->save('php://output');
//$writer->save('Exportado.xlsx');




