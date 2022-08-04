<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cruzar Base de Datos</title>
<link type="text/css" rel="stylesheet" href="css/estilos.css"/>
<link type="text/css" rel="stylesheet" href="js/jquery-ui/jquery-ui.css"/>
<style>
table tr:nth-child(even) td{ background:rgb(204,204,204);}

</style>
</head>

<body>
<div align="center" id="div">
<h1 align="left">Cruzar Base de Datos</h1>
<hr size="2">
<h4 align="left"><section>
<form name="form1" method="post" action="">
  <input type="submit" name="button" value="Cruzar Base de Datos" class="btn-primario" id="habilita">
  <input type="checkbox" name="validar" id="selector" required title="Marque para cruzar la base de datos"> 
  Validar
  </section>
</h4>
<br>
 <hr size="2" width="95%">
  <?php
include('include/conexion.php');
//(isset ($_POST['validar']));
//$validar=$_POST['validar'];
$consulta="select A.numero_factura,A.valor_factura,A.valor_pagos_aplic,A.valor_glosa,B.motivo,B.num_factura_pagos,B.valor_abonado from facturas A,pagos B where A.numero_factura=B.num_factura_pagos";
$datos= mysql_query($consulta);
$c=0;
$cont=0;
$mensaje=0;
?>


<section>
<table width="669" height="67" border="0" cellspacing="2">
  <tr bgcolor="#FF9933">
    <th width="58" bgcolor="#FF9933" scope="col">Motivo</th>
    <th width="141" scope="col">Numero de la Factura</th>
    <th width="100" scope="col">Valor de la Factura</th>
    <th width="100" scope="col">Valor pagos Aplicados</th>
    <th width="100" scope="col">Valor Glosa</th>
    <th width="100" scope="col">Saldo</th>
  </tr>
  </div>
  <?php
$bandera=1;
$bandera2=1;
if (isset ($_POST['validar'])){  
  //esto es para no imprima tantos comentarios en el case 1
  while (($reg = mysql_fetch_array($datos))&& ($bandera==1)){

  $motivo=$reg['motivo'];//esta es mi bandera para saber si es un registro nuevo o es una modificacion  
  $a=$reg['valor_factura'];
  $glosa=$reg['valor_glosa'];
  $b=$reg['valor_abonado'];
  $d=$reg['numero_factura'];
  $e=$reg['num_factura_pagos'];
  $c=$a-($b+$glosa);
   echo '<tr>
   	<td>'.$reg['motivo'].'</td>
   	<td>'.$reg['numero_factura'].'</td>
    <td>'.$reg['valor_factura'].'</td>
    <td>'.$reg['valor_abonado'].'</td>
	<td>'.$reg['valor_glosa'].'</td>
	<td>'.$c.'</td>
  </tr>';
  if ($datos==NULL){$bandera2=1;}
  else{
switch ($motivo){
	
	case 0:{	
				
	 //0 es un archivo nuevo, 1 es una actualiacion o modificacion es la suma del valor nuevo (1) con el valor viejo (0) 
  	$consulta2="update facturas set valor_pagos_aplic='$b',saldo_factura='$c' where numero_factura='$e'";
  	mysql_query($consulta2,$conexion)or ('corregir centencia');
	$borrado1= "DELETE FROM pagos WHERE num_factura_pagos=$d";
	mysql_query($borrado1,$conexion) or die("Error en borrado1". mysql_error());
	$bandera2=2;
	break;
		}
	case 1:{
	$sum1=$reg['valor_pagos_aplic'];
	$sum2=$reg['valor_glosa'];
	$valor_pagos_aplic=$sum1+$b;
	$resultado=$a-($valor_pagos_aplic+$sum2);
	if($valor_pagos_aplic<=$a){
		$cont=$cont+1;
		$bandera=1;
	$consulta3="update facturas set valor_pagos_aplic='$valor_pagos_aplic',saldo_factura='$resultado' where numero_factura='$e'";
  	mysql_query($consulta3,$conexion)or ('corregir centencia');
	$borrado1= "DELETE FROM pagos WHERE num_factura_pagos=$d";
	mysql_query($borrado1,$conexion) or die("Error en borrado1". mysql_error());
	$bandera2=3;
	}
	else{$bandera=2;
		 $color="#993366";//esto es para identificar el registro con problemas
	$mensaje=$cont+1;
			}
			break;
	}//case
	}//Else
 	}//cierro switch
	
  }//cierro while
if ($bandera==2){echo"La suma de los pagos aplicados supera el valor de la factura. Error en el registro ";echo $mensaje;echo" de la tabla Pagos.xlsx<br>";}
if($bandera2==1){echo "No se encontraron facturas relacionadas";}
if($bandera2==2) {echo "Se ha realizado el Cruce<br>Satisfactoriamente Motivo(Registro Nuevo)";}
if($bandera2==3){echo "Se ha realizado el Cruce<br>Satisfactoriamente Motivo(Abono a Factura)";}
}//Cierro if
  mysql_free_result($datos);
	mysql_close();


  ?>
</table>
</section>
</form>
</body>
</html>