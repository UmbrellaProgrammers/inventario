<html style="overflow-x:hidden;">
	<head>
		<link rel="stylesheet" href="../css/item.css">
		<script src="../js/jquery-1.10.2.min.js"></script>
	</head>
	<body>
		<div id="menu" style="font-size:12px">
			<hr>
			<?php
				include "../connection.php";
				$query = mysql_query("select departamento from departamento");
				$i = 0;
				while($row = mysql_fetch_array($query)){
					?>
					<a id="<?php echo "departamento".$i?>" name="<?=$row['departamento']?>" class="a-select"><?=$row['departamento']?></a><hr>
					<?php
					$i++;
				}
			?>
		</div>
	</body>
</html>