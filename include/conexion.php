<?php
$conexion =mysql_connect("localhost","root","")or die("<p>No se ha podido establecer la conexion con MySQL.</p>");
mysql_select_db("cartera",$conexion);
$tipo_actualizacion=0;
$documento11="";// esto es para dejar Vacio otra vez el checkbox	
$b=0;
$borrado1=NULL;
$datos=NULL;
$consul=NULL;
$t=0;// barra de carga
?>