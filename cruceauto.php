  <?php
include('include/conexion.php');
$consulta="select A.numero_factura,A.valor_factura,A.valor_pagos_aplic,A.valor_glosa,B.motivo,B.num_factura_pagos,B.valor_abonado from facturas A,pagos B where A.numero_factura=B.num_factura_pagos";
$datos= mysql_query($consulta);
$c=0;
$cont=0;
$mensaje=0;

$bandera=1;
$bandera2=1;
  while (($reg = mysql_fetch_array($datos))&& ($bandera==1)){

  $motivo=$reg['motivo'];//esta es mi bandera para saber si es un registro nuevo o es una modificacion  
  $a=$reg['valor_factura'];
  $glosa=$reg['valor_glosa'];
  $b=$reg['valor_abonado'];
  $d=$reg['numero_factura'];
  $e=$reg['num_factura_pagos'];
  $c=$a-($b+$glosa);
   
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

  mysql_free_result($datos);
	mysql_close();


  ?>