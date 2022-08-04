<?php
include("include/conexion.php");
require_once"Classes/PHPExcel.php";

$objPHPExcel= new PHPExcel();
$archivo="Base de datos Cartera.xls";
//PROPIEDADES DEL ARCHIVO DE EXCEL
$objPHPExcel->getProperties()->setCreator("weblocalhost")
->setLastModifiedBy("weblocalhost")
->setTitle("reporte XLS")
->setSubject("reporte")
->setDescription("")
->setKeywords("")
->setCategory("");

//PROPIEDADES DE LA CELDA
$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial Narrow');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);

//CABECERA DE LA CONSULTA
$y=1;
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue("A".$y,"Tipo de Identificacion ERP")
->setCellValue("B".$y,"Numro de Identificacion ERP")
->setCellValue("C".$y,"Nombre ERP")
->setCellValue("D".$y,"Tipo de Registro")
->setCellValue("E".$y,"Tipo de Cobro")
->setCellValue("F".$y,"Prefijo de la Factura")
->setCellValue("G".$y,"Numero de la Factura")
->setCellValue("H".$y,"Indicador de Actualizacion")
->setCellValue("I".$y,"Valor de la Factura")
->setCellValue("J".$y,"Fecha de Emision de Factura")
->setCellValue("K".$y,"Fecha de Prestacion de Factura")
->setCellValue("L".$y,"Fecha de Devolucion")
->setCellValue("M".$y,"Valor Pagos Aplicados")
->setCellValue("N".$y,"Valor Glosa")
->setCellValue("O".$y,"Glosa Respuesta")
->setCellValue("P".$y,"Saldo de la Factura")
->setCellValue("Q".$y,"Estado Juridico")
->setCellValue("R".$y,"Etapa del Proceso")
->setCellValue("S".$y,"Fecha de Registro");
$objPHPExcel->getActiveSheet()
			->getStyle('A1:S1')
			->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('FFEEEEEE');
$borders= array(
		  'borders'=>array(
		  'allborders'=>array(
		  'style'=> PHPExcel_Style_Border::BORDER_THIN,
		  'color'=>array('argb'=>'FF000000'),
		  )
		 ),
		);
$objPHPExcel->getActiveSheet()
			->getStyle('A1:S1')
			->applyFromArray($borders);
			
//DETALLE DE LA CONSULTA

$consulta="select * from facturas A, erp B, tabla_relacional C where A.numero_factura=C.numero_factura and B.num_ident_erp=C.numero_ident_erp";
$sql=mysql_query($consulta,$conexion);

while($row=mysql_fetch_array($sql)){
$y++;
	//BORDE DE LA CELDA
	$objPHPExcel->setActiveSheetIndex(0)
				->getStyle('A'.$y.':R'.$y)
				->applyFromArray($borders);
	//MOSTRAMOS LOS VALORES
	$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.$y,$row['tipo_ident_erp'])
				->setCellValue('B'.$y,$row['num_ident_erp'])
				->setCellValue('C'.$y,$row['nombre_erp'])
				->setCellValue('D'.$y,$row['tipo_registro'])
				->setCellValue('E'.$y,$row['tipo_cobro'])
				->setCellValue('F'.$y,$row['prefijo_factura'])
				->setCellValue('G'.$y,$row['numero_factura'])
				->setCellValue('H'.$y,$row['indicador_actualizacion'])
				->setCellValue('I'.$y,$row['valor_factura'])
				->setCellValue('J'.$y,$row['fecha_emision_factura'])
				->setCellValue('K'.$y,$row['fecha_prestacion_factura'])
				->setCellValue('L'.$y,$row['fecha_devolucion'])
				->setCellValue('M'.$y,$row['valor_pagos_aplic'])
				->setCellValue('N'.$y,$row['valor_glosa'])
				->setCellValue('O'.$y,$row['glosa_respuesta'])
				->setCellValue('P'.$y,$row['saldo_factura'])
				->setCellValue('Q'.$y,$row['estado_juridico'])
				->setCellValue('R'.$y,$row['etapa_proceso'])
				->setCellValue('S'.$y,$row['fecha_registro'])
				;
}
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="'.$archivo.'"');
header('Cache-Control: max-age=0');
$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
$objWriter->save('php://output');

exit;			
?>
