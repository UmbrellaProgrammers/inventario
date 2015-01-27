<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/tablesaw.css">
	<style>
		.image-upload > input
		{
			display: none;
		}
		hr.style-one {
			border: 0;
			height: 1px;
			background: #333;
			background-image: -webkit-linear-gradient(left, #ccc, #333, #ccc); 
			background-image:    -moz-linear-gradient(left, #ccc, #333, #ccc); 
			background-image:     -ms-linear-gradient(left, #ccc, #333, #ccc); 
			background-image:      -o-linear-gradient(left, #ccc, #333, #ccc); 
		}
		.vertical{
			float:left;
			border-left: 2px solid #999999; 
			width:1px;
			height:95%;
			border: 0;
			background: #333;
			background-image: -webkit-linear-gradient(left, #ccc, #D5D5D5, #ccc);
			background-image:    -moz-linear-gradient(left, #ccc, #333, #ccc); 
			background-image:     -ms-linear-gradient(left, #ccc, #333, #ccc); 
			background-image:      -o-linear-gradient(left, #ccc, #333, #ccc); 
		}
	</style>
</head>
<body>
	<div class="image-upload" style="width: 50%; height: 400px;float:left; margin: 20px 0px 0px 40px">
	<label for="file-input" style="padding-left:25%">
        <img style="cursor:pointer;" src="../css/images/insert_image.png"/>
    </label>
    <input id="file-input" type="file" accept="image/*" />
	</div>
	<hr class="vertical">
	<div style="width: 530px; height: 400px; float:right;font-family: arial;">
		<h3>Proximos Mantenimientos</h3>
		<div style="width: 100%; height: 310px; border: 1px solid;">
			<table class="tablesaw" data-mode="stack" style="font-size: 12;">
				<thead style="font-size: 13px;">
					<tr>
						<th>Fecha</th>
						<th>Dispositivo</th>
						<th>Tarea</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					</tr>
					<tr>
					</tr>
				</tbody>
			</table>
		</div>
		<br />
		<hr class="style-one">
	<br />
	</div>
	<br />
	<div style="width: 530px; height: 370px; float:right;font-family: arial;">
		<h3>Nuevos Activos</h3>
		<div style="width: 100%; height: 310px; border: 1px solid;">
			<table class="tablesaw" data-mode="stack" style="font-size: 12;">
				<thead style="font-size: 13px;">
					<tr>
						<th>Fecha</th>
						<th>Nombre</th>
						<th>Lugar</th>
						<th>Valor</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					</tr>
					<tr>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>