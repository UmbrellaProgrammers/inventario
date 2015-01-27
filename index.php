<!doctype html>
<html>
	<head>
		<title>Inventario</title>
		<meta charset='utf-8'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="css/images/favicon.ico" type="image/vnd.microsoft.icon" />
		<link rel="stylesheet" href="css/styles.css">
		<script src="js/jquery-latest.min.js" type="text/javascript"></script>
		<script src="js/script.js" type="text/javascript"></script>
	</head>
	<body>

	<div id='cssmenu' style="margin: -7px 0px 0px -7px;">
		<ul>
			<li id="li_home" class='active'>
				<a href='#' style="margin-bottom: -13px;" onclick="menu(0)">
					<img src="css/images/home.png" style="margin: -4px 0px 0px 0px;" height="30" width="30">
				</a>
			</li>
			<li id="li_item">
				<a href='#' onclick="menu(1)">
					<span>Activos</span>
				</a>
			</li>
			<li id="li_reports" class='last'>
				<a href='#' onclick="menu(2)">
					<span>Reportes</span>
				</a>
			</li>
			<li class="search" style="float: right; margin: -30px 20px 0px 0px; background: none;">
				<a href="#"></a>
				<input type="text" placeHolder="Buscar"  />
			</li>
		</ul>
	</div>
    <iframe name="frame" id="frame" style="min-width: 100%; min-height: 830px;margin: 0px 0px 0px -4px; border:0px;" src="home/home.php"></iframe>
<!---<footer>&copy; Todos los derechos reservados UltraViajes S.A.S</footer>-->
</body>
<html>
