<?php
	include '../connection.php';
	if(isset($_POST['submit'])){
		$categoria = $_POST['categoria'];
		$subcategoria = $_POST['subcategoria'];
		$marca = $_POST['marca'];
		$modelo = $_POST['modelo'];
		if(isset($_POST['crearSub'])){
			$descripcion = $_POST['descripcion'];
			$precio_nuevo = $_POST['precio_nuevo'];
			$precio_usado = $_POST['precio_usado'];
			$vida = $_POST['vida'];
			$proveedor = $_POST['proveedor'];
			$ciudad = $_POST['ciudad'];
			$telefono = $_POST['telefono'];
			$comentario_activo = $_POST['comentariosActivo'];
		}
		$cod_barras = $_POST['cod_barras'];
		$serial = $_POST['serial'];
		$pais = $_POST['pais'];
		$departamento = $_POST['departamento'];
		$responsable = $_POST['responsable'];
		$fecha_compra = $_POST['fechaCompra'];
		$fecha_garantia = $_POST['fechaGarantia'];
		$tipo_garantia = $_POST['tipo_garantia'];
		$fecha_ingreso = $_POST['fechaIngreso'];
		$fecha_egreso = $_POST['fechaEgreso'];
		$comentarios = $_POST['comentarios'];
		
		
		if(isset($_POST['crearSub'])){
			$insertActivo = "insert into activo (categoria, subcategoria, descripcion, marca, modelo, precio_nuevo, precio_usado, vida, proveedor, ciudad_prov, tel_prov, comentario) values ('$categoria', '$subcategoria', '$descripcion', '$marca', '$modelo', '$precio_nuevo', '$precio_usado', '$vida', '$proveedor', '$ciudad', '$telefono', '$comentario_activo')";
			mysql_query($insertActivo) or die(mysql_error());
			echo "<h2>La Subcategor&iacute;a ha sido creada exitosamente</h2>";
		}
		
		$id = mysql_fetch_array(mysql_query("select id from activo where categoria = '$categoria' and subcategoria = '$subcategoria' and marca = '$marca' and modelo = '$modelo'"));
		
		$id_Activo = $id['id'];
		
		$insertInventario = "insert into inventario (activo, barcode, serial, pais, departamento, responsable, fecha_compra, fecha_garantia, tipo_garantia, fecha_ingreso, fecha_egreso, comentario_inventario) Values ('$id_Activo', '$cod_barras', '$serial', '$pais', '$departamento', '$responsable', '$fecha_compra', '$fecha_garantia', '$tipo_garantia', '$fecha_ingreso', '$fecha_egreso', '$comentarios')";
		mysql_query($insertInventario) or die(mysql_error());
		
		echo "<h2>El Item ha sido creado exitosamente</h2>";
	}
?>
<script>
	setTimeout(function countredirect(){window.location = 'AgregarItem.php'},4000);
</script>