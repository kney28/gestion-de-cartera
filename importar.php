<!doctype html>
<html>
<head>
<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.11.2.custom/jquery-ui.min.js"></script>
<script type="text/javascript">
function alerta(url){
var respuesta= confirm('Seguro que desea borrar todos los datos de la tabla pagos');
var form2=document.getElementById('form2');
if (respuesta==true){
	//form2.action='vaciar_pagos.php';
	window.open(url,"Sucess","width=600,height=200, top=200,left=360");
}
else{form2.action='';}
}

function abrir(url){


}

</script>
<link type="text/css" rel="stylesheet" href="css/estilos.css"/>
<link type="text/css" rel="stylesheet" href="js/jquery-ui/jquery-ui.css"/>
<link type="text/css" rel="stylesheet" href="css2/zebra_pagination.css"/>
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
<form action="" id="form2" method="post" name="form2">
<div align="right"> 
<input name="enviar" type="submit" onClick="alerta('vaciar_pagos.php')" value="Vaciar Tabla Pagos">
</div>
</form>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" name="form1">

  <input name="importar" type="file" class="ui-widget-header" id="importar">
  <input type="checkbox" name="valido" id="valido" required>
   Validar
 <p>
  <input name="enviar" type="submit" class="btn-primario" value="Importar">
   <input type="hidden" name="bandera" value="1">
   </section>
   </h4>
   
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
  
 <?php 
 foreach($objhoja as $iIndice=>$objcelda){
	/*echo' <tr>
    <td>'.$objcelda['A'].'</td>
    <td>'.$objcelda['B'].'</td>
    <td>'.$objcelda['C'].'</td>
    <td>'.$objcelda['D'].'</td>
    <td>'.$objcelda['E'].'</td>
	<td>'.$objcelda['F'].'</td>
  </tr>';*/
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
$borrado1= "DELETE FROM pagos WHERE num_factura_pagos=1";
	mysql_query($borrado1,$conexion) or die("Error en borrado1". mysql_error()); 
}//if 2
}//if 1// ezSQL
require_once 'libs/ez_sql_core.php';
require_once 'libs/ez_sql_mysql.php';
// Zebra Pagination
require_once 'libs/Zebra_Pagination.php';

$conn = new ezSQL_mysql('root', '', 'cartera');

$total_pagos = $conn->get_var('SELECT count(*) FROM pagos');
$resultados   = 16;

$paginacion = new Zebra_Pagination();
$paginacion->records($total_pagos);
$paginacion->records_per_page($resultados);
// Quitar ceros en numeros con 1 digito en paginacion
$paginacion->padding(false);

$paises = $conn->get_results('SELECT * FROM pagos LIMIT ' . (($paginacion->get_page() - 1) * $resultados) . ', ' . $resultados);
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
if($paises!==NULL){
 foreach ($paises as $pais): ?>
					<tr>
						<td><?php echo $pais->motivo; ?></td>
						<td><?php echo $pais->prefijo_factura; ?></td>
						<td><?php echo $pais->num_factura_pagos; ?></td>
						<td><?php echo $pais->documento_aplicado; ?></td>
                        <td><?php echo $pais->fecha_documento; ?></td>
                        <td><?php echo $pais->valor_abonado; ?></td>
					</tr>
					<?php endforeach; ?>

 </table>
 <?php $paginacion->render(); echo"<br>".$total_pagos." Registros"; 
}
 ?>
 
 </form>
 </section>
 </div>
</form>


</body>
</html>