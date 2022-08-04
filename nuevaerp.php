<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registro ERP</title>
</head>
<?php
include('include/conexion.php');

$num_ident_erp=$_POST['num_ident_erp'];
$nombre_erp=$_POST['nombre_erp'];
$nit="NI";
$consul="insert into erp values ('$nit','$num_ident_erp','$nombre_erp')" or die(mysql_error());
$datos=mysql_query($consul,$conexion);
?>
<div align="center">
<?php
echo "Registro Exitoso:<br>NIT: ".$num_ident_erp."<br>Razon Social: ".$nombre_erp;
include('nuevaerp.html');
?>
</div>

<body>
</body>
</html>