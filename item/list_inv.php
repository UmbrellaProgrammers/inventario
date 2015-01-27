<?php
	include "../connection.php";
	
	$query = mysql_query("SELECT distinct activo.subcategoria FROM activo inner join inventario on activo.id = inventario.activo where ".$_POST['tabla']." = '".$_POST['categoria']."'");
	
	$i = 0;
	$data = array();
	while($row = mysql_fetch_array($query)){
		$data[$i] = $row['subcategoria'];
		$i++;
	}
	
	$resultado = "";
	for($j=0;$j<$i;$j++){
		if($j<$i-1){
			$resultado .= $data[$j].';';
		}else{
			$resultado .= $data[$j];
		}
	}
	echo $resultado;
?>