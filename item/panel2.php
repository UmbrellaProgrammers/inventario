    `       
	-<html style="overflow-x:hidden;">
	<head>
		<link rel="stylesheet" href="../css/item.css">
		<script src="../js/jquery-1.10.2.min.js"></script>
	</head>
	<body>
		<div id="menu" style="font-size:12px">
			<hr>
			<?php
				include "../connection.php";
				$query = mysql_query("select categoria from categoria");
				$i = 0;
				while($row = mysql_fetch_array($query)){
					?>
					<a id="<?php echo "categoria".$i?>" name="<?=$row['categoria']?>" class="a-select"><?=$row['categoria']?></a><hr>
					<?php
					$i++;
				}
			?>
		</div>
	</body>
</html>