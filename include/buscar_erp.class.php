<?php
include('include/conexion.php');
class erp 
{
	public function buscar_erp($nombre_erp){
		$datos= array();
		$sql= "select * from erp where nombre_erp like '%$nombre_erp%'";
		$resultado= mysql_query($sql);
		
		while ($row= mysql_fetch_array($resultado,MYSQL_ASSOC)){
			
			$datos[]= array("value"=> $row['nombre_erp'],"ident_erp"=>$row['num_ident_erp']);
			}
		return $datos;
		
		}
	
}
?>