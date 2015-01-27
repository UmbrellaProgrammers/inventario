<?php
	include "../connection.php";
	$query = mysql_query("select ".$_POST['tabla']." from ".$_POST['tabla']." where ".$_POST['tabla']." = '".$_POST['categoria']."'") or die("Error en: ".mysql_error());
	
	while($row = mysql_fetch_array($query)){
		$resultado = $row[$_POST['tabla']];
	}
/*	
	if($_POST['tabla'] == "categoria"){
		$query2 = mysql_query("select count(*) as total from activo where categoria = '".$_POST['categoria']."'");
		$query3 = mysql_query("select sum(precio_usado) as suma, sum(precio_nuevo) as suma2 from activo where categoria = '".$_POST['categoria']."'");
	}else{*/
		$query2 = mysql_query("select count(*) as total from inventario inner join activo on inventario.activo = activo.id where ".$_POST['tabla']." = '".$_POST['categoria']."'");
		$query3 = mysql_query("select sum(activo.precio_usado) as suma, sum(precio_nuevo) as suma2 from inventario inner join activo on inventario.activo = activo.id where ".$_POST['tabla']." = '".$_POST['categoria']."'");
	//}
	
	while($row = mysql_fetch_array($query2)){
		$cantidad = $row['total'];
	}
	
	
	while($row = mysql_fetch_array($query3)){
		$valor = $row['suma'];
		$total = $row['suma2'];
		if($row['suma'] == ""){
			$valor = 0;
		}
		if($row['suma2'] == ""){
			$total = 0;
		}
	}
	
	echo $resultado.';Cantidad: '.$cantidad.';<br />Costo Total: $'.$total.';<br />Precio ahora: $'.$valor;
?>