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
			
				$lugar = $_POST['nombre_lugar'];
				$mensaje = "";
				$flag = true;

				$query = mysql_query("select departamento from departamento");
				
				while($row = mysql_fetch_array($query)){
					if($lugar == $row['departamento']){
						$flag = false;
					}
				}
				
				if($flag){
					$add = "INSERT into departamento(departamento) values('$lugar')";
					mysql_query($add) or die(mysql_error());
					$mensaje = "Departamento Agregado Exitosamente!";
				}else{
					$mensaje = "El Departamento ya Existe!";
				}
				
				echo "<h2>".$mensaje."</h2>";
				echo "<script>setTimeout('document.location.reload()',1000); </script>";
		
			}
			else 
			{
				?>
				<h1 style="font-weight:bold;">Agregar Lugar</h1>
				<form action="lugar.php" method="POST">
					<br />
					<label style="margin-left:10%;" for="nombre_lugar">Nombre 
						<span style="color:red;">*</span>
					</label>
					<input name="nombre_lugar" id="nombre_lugar" type="text" placeholder="Nombre del Departamento" size="40" required />
					<br /><br />
					<input type="submit" name="submit" class="agregar" style="margin-left:50%; cursor:pointer;" value="Agregar" />
				</form>
				<?php
			}
		?>
	</body>
<html>