<?php
include_once'include/buscar_erp.class.php';
$mostrar= new erp();
echo json_encode($mostrar->buscar_erp($_GET['term']));
?>