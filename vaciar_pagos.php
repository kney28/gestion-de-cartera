<?php
require_once 'libs/ez_sql_core.php';
require_once 'libs/ez_sql_mysql.php';
$conn = new ezSQL_mysql('root', '', 'cartera');
$datos=$conn->get_var('SELECT count(*) FROM pagos');
$consul=mysql_query('truncate table pagos');
?>
<!doctype html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="css/estilos.css"/>
<meta charset="utf-8">
<title>Vaciar Pagos</title>
</head>

<body class="vaciar">
<div><section align="center" class="section">LOS DATOS DE LA TABLA PAGOS<br>FUERON ELIMINADOS SATISFACTORIAMENTE<br><br><?php echo "Registros Borrados ".$datos; ?><br>
<a href="index.html"><img src="Fondos/casa.jpg"></a>

</section></div>
</body>
</html>
