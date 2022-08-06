<?php
/*$conexion =mysql_connect("localhost","root","")or die("<p>No se ha podido establecer la conexion con MySQL.</p>");
mysql_select_db("cartera",$conexion);
$tipo_actualizacion=0;
$documento11="";// esto es para dejar Vacio otra vez el checkbox	
$b=0;
$borrado1=NULL;
$datos=NULL;
$consul=NULL;
$t=0;// barra de carga

mysqli_connect(
string $hosti= "containers-us-west-79.railway.app",
string $username= "root",
string $passwd= "pt0FWN1r4EyOpKTqNpVAr",
string $dbname= "railway",
int $port =ini_get("6777")
): mysqli
*/

$mysqli = new mysqli('containers-us-west-79.railway.app', '', 'pt0FWN1r4EyOpKTqNpVAr', 'railway',6777);

/*
 * Esta es la forma OO "oficial" de hacerlo,
 * AUNQUE $connect_error estaba averiado hasta PHP 5.2.9 y 5.3.0.
 */
if ($mysqli->connect_error) {
    die('Error de Conexión (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

/*
 * Use esto en lugar de $connect_error si necesita asegurarse
 * de la compatibilidad con versiones de PHP anteriores a 5.2.9 y 5.3.0.
 */
if (mysqli_connect_error()) {
    die('Error de Conexión (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

echo 'Éxito... ' . $mysqli->host_info . "\n";

$mysqli->close();
?>
