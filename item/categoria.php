<html style="overflow:hidden;">
	<head>
		<link rel="stylesheet" href="../css/frame.css">
	</head>
	<body>
		<?php
			//Se llama al archivo para conectarse a la base de datos.
			include "../connection.php"; 
			//Se válida que se enviaron los datos requeridos.
			if (isset($_POST['submit'])) {
			
				$categoria = $_POST['nombre_categoria'];
				$mensaje = "";
				$flag = true;

				$query = mysql_query("select categoria from categoria");
				
				while($row = mysql_fetch_array($query)){
					if($categoria == $row['categoria']){
						$flag = false;
					}
				}
				
				if($flag){
					$add = "INSERT into categoria(categoria) values('$categoria')";
					mysql_query($add) or die(mysql_error());
					$mensaje = "Categor&iacute;a Agregada Exitosamente!";
				}else{
					$mensaje = "La Categor&iacute;a ya Existe!";
				}
				
				echo "<h2>".$mensaje."</h2>";
				echo "<script>setTimeout('document.location.reload()',1000); </script>";
		
			}
			else 
			{
				?>
		<h1 style="font-weight:bold;">Agregar Categor&iacute;a</h1>
		<form action="categoria.php" method="POST">
			<br />
			<label style="margin-left:10%;" for="nombre_categoria">Nombre 
				<span style="color:red;">*</span>
			</label>
			<input name="nombre_categoria" id="nombre_categoria" type="text" placeholder="Nombre de la Categor&iacute;a" size="40" required />
			<br /><br />
			<input type="submit" name="submit" class="agregar" style="margin-left:50%; cursor:pointer;" value="Agregar" />
		</form>
				<?php
			}
		?>
	</body>
<html>