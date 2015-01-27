<?php

	$db_host = 'localhost';
	$db_username = 'root';
	$db_password = '';
	$db_name = 'inventario';

	//Se crea la conexi贸n al servidor de base de datos.
	$db = mysql_connect($db_host, $db_username, $db_password) or die("No se puede conectar.");
	//Si no se puede seleccionar la base de datos indicada.
	if(!mysql_select_db($db_name,$db))
 		echo "No hay base de datos seleccionada.";
		
	mysql_set_charset('utf8');
?>