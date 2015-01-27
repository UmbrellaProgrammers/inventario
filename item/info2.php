<?php
	include "../connection.php";
	
	$query = mysql_query("SELECT * FROM activo inner join inventario on activo.id = inventario.activo where subcategoria = '".$_POST['item']."' and ".$_POST['tabla']."= '".$_POST['categoria']."'");
	
	$i = 0;
	$data = array();
	while($row = mysql_fetch_array($query)){
		$data[$i] = $row;
		$i++;
	}
		
	//echo $resultado;
	echo json_encode($data);
?>

