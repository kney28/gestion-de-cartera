<!doctype html>
<html>
<head>
<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.11.2.custom/jquery-ui.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/estilos.css"/>
<link type="text/css" rel="stylesheet" href="js/jquery-ui/jquery-ui.css"/>
<style>
table tr:nth-child(even) td{ background:rgb(204,204,204); border-radius: 2px;}

</style>

<meta charset="utf-8">
<title>Importar Archivo Pagos</title>
<style type="text/css">
.seccion{width:auto;}
</style>
</head>

<body>
<div align="center" id="div">
<h1 align="left">Importar Pagos ERP</h1>
<hr size="2">
<h4 align="left"><section>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" name="form1">
 <p>
  <input name="importar" type="file" class="ui-widget-header" id="importar">
  <input type="checkbox" name="valido" id="valido" required>
   Validar</p>
 <p>
  <input name="enviar" type="submit" class="btn-primario" value="Importar">
   <input type="hidden" name="bandera" value="1">
   </section>
   </h4>
   <br>
 </p>
 <hr size="2" width="95%">
<?php

if (isset ($_POST['valido']))
$valido=$_POST['valido'];
include('include/conexion.php');
if(isset($valido)){
if (isset($_FILES['importar']['name'])) {
  //cargamos el archivo al servidor con el mismo nombre
  //solo le agregue el sufijo bak_ 
  $archivo = $_FILES['importar']['name'];
  $tmp = $_FILES['importar']['tmp_name'];
  $extexcel = pathinfo($archivo);
  $urlnueva="pagos.xlsx";
  $bandera=0;
     if (is_uploaded_file($tmp)){
		copy($tmp,$urlnueva);
        echo "Archivo Cargado Con Éxito";
		        }
     else{
        echo "Error Al Cargar el Archivo";}
		  }
	//class de excel para desglozar
if (isset($_FILES['importar']['name'])) {
	require_once 'Classes/PHPExcel/IOFactory.php';
 	$objphpexcel= PHPExcel_IOFactory::load('pagos.xlsx');
 	$objhoja=$objphpexcel->getActiveSheet()->toArray(true,true,true,true,true,true);
?>
<section class="seccion">
<table width="775" border="0" cellspacing="2">
  <tr bgcolor="#FF9933">
  	<th scope="col">Motivo</th>
    <th scope="col">Prefijo de la Factura</th>
    <th scope="col">Numero de la Factura</th>
    <th scope="col">Documento Aplicado</th>
    <th scope="col">Fecha de Documento</th>
    <th scope="col">Valor Abonado</th>
  </tr>
  
 <?php 
 foreach($objhoja as $iIndice=>$objcelda){
	echo' <tr>
    <td>'.$objcelda['A'].'</td>
    <td>'.$objcelda['B'].'</td>
    <td>'.$objcelda['C'].'</td>
    <td>'.$objcelda['D'].'</td>
    <td>'.$objcelda['E'].'</td>
	<td>'.$objcelda['F'].'</td>
  </tr>';
  $motivo=$objcelda['A'];
  $prefijo_factura=$objcelda['B'];
  $num_factura_pagos=$objcelda['C'];
  $documento_aplicado=$objcelda['D'];
  $fecha_documento=$objcelda['E'];
  $valor_abonado=$objcelda['F'];
  
  $subir= "insert into pagos (motivo,prefijo_factura,num_factura_pagos,documento_aplicado,fecha_documento,valor_abonado) values ('$motivo','$prefijo_factura','$num_factura_pagos','$documento_aplicado','$fecha_documento','$valor_abonado')";
  mysql_query($subir);
	 
	 }//forech
$ruta="pagos.xlsx";
unlink($ruta);	 
}
}
 ?>
 </table>
 </section>
 </div>
</form>


</body>
</html>