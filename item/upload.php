<?php
	include ('../connection.php');
	if(!is_dir("../imagenes/")) 
		mkdir("../imagenes/", 0777);
		
    $name = $_POST['nom'].'.'.$_POST['ext'];
    
	if(move_uploaded_file($_FILES['images']['tmp_name'], '../imagenes/' . $name)){
		$update = "update ".$_POST['tabla']." set imagen ='../imagenes/".$name."' where ".$_POST['tabla']." = '".$_POST['nom']."'";
		mysql_query($update) or die(mysql_error());
		echo "Subio";
	}else{
		echo "No Subio";
	}
?>