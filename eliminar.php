<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link type="text/css" rel="stylesheet" href="css/estilos.css"/>
<link type="text/css" rel="stylesheet" href="js/jquery-ui/jquery-ui.css"/>
<meta charset="utf-8">
<style type="text/css">
.seccion{width:auto;}
#buscar{width:90px; padding:8px;}
#colorletra{ color:rgb(255,255,255); text-shadow:none;}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Eliminar Factura</title>
</head>
<?php
include('include/conexion.php');


	if(isset($_POST["num11"]))//evalua el estado del campo
	{		
$documento11=$_POST["num11"];
	}


if(isset($_REQUEST['reg1'], $_REQUEST['num11']))//evalua el estado del checkbox y el campo de texto
{
// Borrado de los registros en todas las tablas
	$borrado1= "DELETE FROM facturas WHERE numero_factura=$documento11";
	mysql_query($borrado1,$conexion) or die("Error en borrado1". mysql_error());

		$borrado2= "DELETE FROM tabla_relacional WHERE numero_factura=$documento11";
		mysql_query($borrado2,$conexion) or die("Error en borrado2". mysql_error());


$documento11="";// esto es para dejar Vacio otra vez el checkbox	
$b=1;
	}

if($documento11!==''){
$consul= "SELECT * FROM facturas where numero_factura=$documento11";
$datos=mysql_query($consul,$conexion);

}

	
		
		

 ?>
<body>
 <div align="center" id="div2">
<h1 align="left">Eliminar Factura</h1>
<hr size="2">
<h5 align="left">
<section id="section2">
<form id="form2" name="form2" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
    <table width="1089" height="126" align="center">
      <tr align="center" id="colorletra">
        <td width="20" height="37">&nbsp;</td>
        <td width="90" bgcolor="#f25724">Numero de Factura</td>
        <td width="67" bgcolor="#f25724">Prefijo de la Factura</td>
        <td width="80" bgcolor="#f25724">Indicador de Actualizacion</td>
        <td width="87" bgcolor="#f25724">Valor de la Factura</td>
        <td width="96" bgcolor="#f25724">Fecha de Emision de la Factura</td>
        <td width="83" bgcolor="#f25724">Fecha de Prestacion de la Factura</td>
        <td width="87" bgcolor="#f25724">Fecha de Devolucion</td>
        <td width="81" bgcolor="#f25724">Valor de los Pagos de Aplicados</td>
        <td width="68" bgcolor="#f25724">Valor Glosa</td>
        <td width="62" bgcolor="#f25724">Glosa Respuesta</td>
        <td width="85" bgcolor="#f25724">Saldo Factura</td>
        <td width="54" bgcolor="#f25724">Estado Juridico</td>
        <td width="69" bgcolor="#f25724">Etapa del Proceso</td>
      </tr>
      <tr>
        <td height="34" align="center"><input <?php if ($documento11!=="") {echo "checked=\"checked\"";/* esto chekea la casilla mediante una condision*/} ?> name="reg1" type="checkbox" /></td>
        
        <td><input name="num11" type="text"  id="buscar" value="<?php echo $documento11//muestra el valor sin ser reseteado?>" title="Digite el numero de la factura"/></td>
     
        <?php if($datos!==NULL){
		while ($reg = mysql_fetch_array($datos)){?>
        <td><?php echo $reg['prefijo_factura'] ?></td>
        <td><?php echo $reg['indicador_actualizacion'] ?></td>
        <td><?php echo $reg['valor_factura'] ?></td>
        <td><?php echo $reg['fecha_emision_factura'] ?></td>
        <td><?php echo $reg['fecha_prestacion_factura'] ?></td>
        <td><?php echo $reg['fecha_devolucion'] ?></td>
        <td><?php echo $reg['valor_pagos_aplic'] ?></td>
        <td><?php echo $reg['valor_glosa'] ?></td>
        <td><?php echo $reg['glosa_respuesta'] ?></td>
        <td><?php echo $reg['saldo_factura'] ?></td>
        <td><?php echo $reg['estado_juridico'] ?></td>
        <td><?php echo $reg['etapa_proceso'] ?></td>
      </tr>
       <?php }
	
	mysql_free_result($datos);
	mysql_close();
		}
	?>
      <tr align="center">
        <td colspan="14"><input type="submit" name="borrar" class="btn-primario" value="Eliminar Factura" /></td>
          
      </tr>
      </table>
      </section>
      <br />
      <br />
      </h5>
<h5>
<hr width="95%" />
    <section style="font-style:italic" align="center"><?php
 if($borrado1!==NULL){echo "La Factura fue Borrada Exitosamente";}
 	?></section></h5>   
</form>
</div>
 </h5>
</body>
</html>
