<?php
	include '../connection.php';
	
	if($_POST['lala'] == "lal"){
		$query = mysql_query("Select barcode from inventario");
		
		$flag = true;
		while($row = mysql_fetch_array($query)){
			if($flag && $row['barcode'] != ""){
				if($_POST['codebar'] == $row['barcode']){
					$flag = false;
				}
			}
		}
		
		if($flag){
			echo "true";
		}else{
			echo "false";
		}
	
	}elseif($_POST['lala'] == "lel"){
		$id = mysql_fetch_array(mysql_query("select id from activo where categoria = '".$_POST['categoria']."' and subcategoria = '".$_POST['subcategoria']."' and marca = '".$_POST['marca']."' and modelo = '".$_POST['modelo']."'"));
		
		if($id == ""){
			echo "false";
		}else{
			echo "true";
		}
	}
	
?>