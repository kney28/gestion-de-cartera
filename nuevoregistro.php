<?php 
include('include/conexion.php');
isset($_POST["tipo_actualizacion"]);
$tipo_actualizacion=$_POST["tipo_actualizacion"];
$fecha_registro=date('y/m/d');
$tipo_registro=$_POST["tipo_registro"];
$numero_ident_ips="8919010411";
$nombre_erp=$_POST["nombre_erp"];
$numero_ident_erp=$_POST["numero_ident_erp"];
$tipo_cobro=$_POST["tipo_cobro"];
$prefijo_factura=$_POST["prefijo_factura"];
$numero_factura=$_POST["numero_factura"];
$indicador_actualizacion=$_POST["indicador_actualizacion"];
$valor_factura=$_POST["valor_factura"];
$fecha_emision_factura=$_POST["fecha_emision_factura"];
$fecha_prestacion_factura=$_POST["fecha_prestacion_factura"];
$fecha_devolucion=$_POST["fecha_devolucion"];
$glosa_respuesta=$_POST["glosa_respuesta"];
$valor_glosa=$_POST["valor_glosa"];
$estado_juridico=$_POST["estado_juridico"];
$etapa_procesos=$_POST["etapa_procesos"];


if ($tipo_actualizacion==0){

$consulta="INSERT INTO facturas values('$tipo_registro','$tipo_cobro','$prefijo_factura','$numero_factura','$indicador_actualizacion',
'$valor_factura','$fecha_emision_factura','$fecha_prestacion_factura','$fecha_devolucion','','$valor_glosa','$glosa_respuesta','',
'$estado_juridico','$etapa_procesos','$fecha_registro')"; //esto va a la tabla idcursos
mysql_query($consulta,$conexion)or die ("<p>No se ha podido conectar la consulta<p>. ".mysql_error());

 

$consulta2 = "INSERT INTO tabla_relacional (numero_ident_erp, numero_ident_ips, numero_factura) values ('$numero_ident_erp', '$numero_ident_ips','$numero_factura')";
mysql_query($consulta2,$conexion) or die ("<p>No se ha podido conectar la consulta 2<p>. ".mysql_error());
}

elseif($tipo_actualizacion==1){
$update1="update facturas set prefijo_factura='$prefijo_factura',indicador_actualizacion='$indicador_actualizacion',valor_factura='$valor_factura',fecha_emision_factura='$fecha_emision_factura',fecha_prestacion_factura='$fecha_prestacion_factura',fecha_devolucion='$fecha_devolucion',valor_glosa='$valor_glosa',glosa_respuesta='$glosa_respuesta',estado_juridico='$estado_juridico',etapa_proceso='$etapa_procesos' where numero_factura='$numero_factura'";
  	mysql_query($update1,$conexion)or die ('corregir centencia'.mysql_error());
	
$update2="update tabla_relacional set numero_ident_erp='$numero_ident_erp' where numero_factura='$numero_factura'";
  	mysql_query($update2,$conexion)or die ('corregir centencia'.mysql_error());	
		
	}
include('cruceauto.php');	
include ('formulariobase.php');
//echo "<center>La Factura ha sido guardada con exito<br></center>";


//mysql_close();
?>