<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
<?php
// ezSQL
require_once 'libs/ez_sql_core.php';
require_once 'libs/ez_sql_mysql.php';
// Zebra Pagination
require_once 'libs/Zebra_Pagination.php';

$conn = new ezSQL_mysql('root', '', 'cartera');

$total_reg = $conn->get_var('SELECT count(*) FROM pagos');
$resultados   = 6;

$paginacion = new Zebra_Pagination();
$paginacion->records($total_reg);
$paginacion->records_per_page($resultados);
// Quitar ceros en numeros con 1 digito en paginacion
$paginacion->padding(false);

$datos = $conn->get_results('SELECT * FROM pagos LIMIT ' . (($paginacion->get_page() - 1) * $resultados) . ', ' . $resultados);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>JV Software | Tutorial 13</title>
        <link rel="stylesheet" href="css2/zebra_pagination.css">
		<link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.4.0/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	</head>
	<body>
		<div class="ui-widget-header">
			<div class="ui-widget-header">
				<h1>Tutorial Paginaci&oacute;n en PHP</h1>
			</div>
			<div class="ui-widget-header">
				<h2>Lista de pa&iacute;ses</h2>
			</div>
			<table class="ui-widget-header">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre Corto</th>
						<th>Nombre Largo</th>
						<th>Abreviaci&oacute;n</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($datos as $dato): ?>
					<tr>
						<td><?php echo $dato->motivo; ?></td>
						<td><?php echo $dato->prefijo_factura; ?></td>
						<td><?php echo $dato->num_factura_pagos; ?></td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>

			<?php $paginacion->render(); ?>

			<footer>
				<p>
					 &copy; JV Software 2012
				</p>
			</footer>
		</div>
	</body>
</html>
<body>
</body>
</html>