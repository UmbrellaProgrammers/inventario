<?php
	if(isset($_GET['categoria']) && isset($_GET['select'])){
		include "../connection.php";
		$categoria = $_GET['categoria'];
		$delete="DELETE FROM ".$_GET['select']." WHERE ".$_GET['select']." = '$categoria'";
		mysql_query($delete) or die(mysql_error());
	}
?>
<!doctype html>
<html lang="es" style="overflow:hidden;">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Item</title>
		<!-- Estilos de la galeria-->
		<link rel="stylesheet" type="text/css" href="../css/estiloGaleria.css"/>
		<!-- -->
		
		<link rel="stylesheet" href="../css/menu2.css">
		<link rel="stylesheet" href="../css/item.css">
		<link rel="stylesheet" href="../css/jqmfb.min.css" />
		<link rel="stylesheet" href="../css/jqm.slidemenu.css" />
		<link rel="stylesheet" href="../css/jquery.mobile.structure.min.css" />
		<link rel="stylesheet" href="../css/style.min.css">
		<link rel="stylesheet" href="../css/frame.css">
	
		<script type="text/javascript" src="../js/Mustache.min.js"></script>
		<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="../js/item.js" type="text/javascript"></script>
		<script type="text/javascript" src="../js/jquery.animate-enhanced.min.js"></script>	
		<script type="text/javascript" src="../js/jqm.globals.js"></script>
		<script type="text/javascript" src="../js/jquery.mobile.min.js"></script>
		<script type="text/javascript" src="../js/jqm.slidemenu.js"></script>
		<script type="text/javascript" src="../js/procesos.js"></script>
	</head>
	<body>
                
		<div id="slidemenu" style="overflow:hidden;z-index: 1111;">
			<div class="select">
				<select name="filtro" id="filtro" onchange="frame()">
					<option value="lugar">Departamento</option>
					<option value="categoria">Categor&iacute;a</option>
				</select>
			</div>
			<div id="contenido" style="height:757px;margin: 0px 0px 0px -16px; background:#DADADA">
				<iframe name="panel" id="panel" src="panel.php" style="width:100%;min-height:100%;"></iframe>
			</div>
			<div style="height:35px; border:1px solid;margin: 0px -1px 0px -1px;background:#E9E9E9;">
				<a href="" id="my-button" class="small pop1">
					<img style="margin: 0px -1px -8px 4px; cursor: pointer;" src='../css/images/plus2.png'>
				</a>
				<a id="remove_cat" onclick="remove_cat();">
					<img style="margin: 4px 1px -8px -5px; cursor: pointer;" src='../css/images/minus2.png'>
				</a>
				<a id="b_activos" class="border a-boton" onclick="activo('','',1,true)">Activos</a>
			</div>
		</div>
		<div data-role="page" id="main_page" data-theme="a">
			<div data-role="header" data-position="fixed" data-tap-toggle="false" data-update-page-padding="false">
				<div id='cssmenu2'>
					<ul>
						<li id="li_panel" style="height: 35px;">
							<a href="#" data-slidemenu="#slidemenu" data-slideopen="false" data-icon="smico" data-corners="false" data-iconpos="notext" style="padding: 10px;">
								<img src="../css/images/panel1.png" height="15" width="15">
							</a>
						</li>
						<li id="li_info" class='active' style="height: 35px; margin-left: 25%;">
							<a href='#' onclick="menu2(0)" style="border-left:1px solid rgba(0,0,0,0.15);">
								<span>Informaci&oacute;n</span>
							</a>
						</li>
						<li id="li_archi" class='last' style="height: 35px;pointer-events:none;">
							<a href='#' id="a_archi" onclick="menu2(1)" style="color:gray;">
								<span>Archivos</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div data-role="content" class="background">
				<div id="activos" class="activos">
					<div id="cont_cat" name="cont_cat" style="height:758px;margin: 0px 0px 0px 0px; background:#DADADA;overflow-y:auto;overflow-x:hidden;"></div>
					<div style="height:35px; border:1px solid;margin: 0px -1px 0px -1px;background:#E9E9E9;">
						<a href="" id="my-button2">
							<img style="margin: 0px -1px -8px 4px; cursor: pointer;" src='../css/images/plus2.png'>
						</a>
						<a id="remove_cat2" onclick="">
							<img style="margin: 4px 1px -8px -5px; cursor: pointer;" src='../css/images/minus2.png'>
						</a>
					</div>
				</div>

				<div id="ca-container" class="ca-container">
				</div>
				
			</div>
			<div data-role="footer" style="border: 1px solid;height: 120px;margin-top:-48px">
				<div style="height:84px; background:#DDDDDD;">
					<a onclick="alert('Nota');">
						<img id="img_notes" src="../css/images/note.png" style="margin: 10px 0px 0px 10px; cursor: pointer;">
					</a>
					<a onclick="alert('Editar');">
						<img id="img_edit" src="../css/images/edit.png" style="margin: 0px 30px 0px 42%; cursor: pointer;">
					</a>
					<a onclick="remove_cat();">
						<img src="../css/images/remove.png" style="margin: 0px 0px 1x 0px; cursor: pointer;">
					</a>
				</div>
				<div style="height:35px;border: 1px solid;margin: 0px -1px 0px -1px;">
				</div>
			</div>
		</div>
		<div id="popup" style="min-height:190px">
			<a id="close" style="float:right; cursor:pointer;margin: -4% -4%;" class="b-close">
				<img src="../css/images/close.png">
			</a>
			<iframe name="lugar" id="lugar" src="lugar.php" style="width:100%;min-height:175px;"></iframe>
		</div>
		<div id="popup2" style="min-height:190px">
			<a id="close2" style="float:right; cursor:pointer;margin: -4% -4%;" class="b-close">
				<img src="../css/images/close.png">
			</a>
			<iframe name="categoria" id="categoria" src="categoria.php" style="width:100%;min-height:175px;"></iframe>
		</div>
		<div id="popup3" style="min-height:500px">
			<a id="close3" style="float:right; cursor:pointer;margin: -4% -3%;" class="b-close">
				<img src="../css/images/close.png">
			</a>
			<iframe name="addItem" id="addItem" src="AgregarItem.php" style="width:100%;min-height:inherit;"></iframe>
		</div>
		
		<script type="text/javascript" src="../js/jquery.bpopup-0.10.0.min.js"></script>
		<script type="text/javascript" src="../js/scripting.min.js"></script>	
		<!-- Script de la galeria -->
		<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
		<!-- the jScrollPane script -->
		<script type="text/javascript" src="../js/jquery.contentcarousel.js"></script>
		<!--Es un template para renderizar cada uno de los items en el carrusel-->
		<script id="template-info" type="x-tmpl-mustache">
			<div class="ca-wrapper">
				<div id="info" class="ca-item" style="background:white;">
					<div class="image-upload" style="height: 400px;float: right;margin: 15px 5px 0px 0px;">
						<label for="file-input">
							<img style="cursor:pointer;width:250px" src="{{foto}}" alt="Imagen por defecto"/>
						<label for="file-input" style="">
							<img style="cursor:pointer;width:250px" src="../css/images/insert_image.png" alt="Imagen por defecto"/>
						</label>
						<input id="file-input" type="file" accept="image/*" name="images" style="display:none;" />
						</br>
					</div>	
				</div>
			</div>
		</script>
		<script id="template-ca-item" type="x-tmpl-mustache">
			<div id="info-ca-item" class="ca-item" style="background:white;border:1px solid black">
				<div class="image-upload" style="float: right;margin: 15px 5px 0px 0px;">
					<label for="file-input" style="">
						<img style="cursor:pointer;width: 250px;height: 257px;" src="{{foto}}" alt="Imagen del item"/>
					</label>
					<input id="file-input" type="file" accept="image/*" name="images" style="display:none;" />
					<br />
				</div>
				<h3 class="info nomItem">{{nombre}}<h3>
				<p class="info">     
					<span class="informacion">Marca:&nbsp;</span>{{marca}}&nbsp;&nbsp;<span class="informacion">Modelo:&nbsp;</span>{{modelo}}
					<br />
					<span class="informacion">Descripcion:&nbsp;</span>{{descripcion}}
					<br />
					<span class="informacion">Precio Nuevo:&nbsp;</span>$&nbsp;{{precioNuevo}}&nbsp;&nbsp;<span class="informacion">Precio Usado:&nbsp;</span>$&nbsp;{{precioUsado}}
					<br />
					<span class="informacion">Vida:&nbsp;</span>{{vida}}&nbsp;años
					<br />
					<span class="informacion">Barcode:&nbsp;</span>{{barcode}}&nbsp;&nbsp;<span class="informacion">Serial:&nbsp;</span>{{serial}}
					<br />
					<span class="informacion">Responsable:&nbsp;</span>{{responsable}}
					<br />
					<span class="informacion">Fecha Compra:&nbsp;</span>{{fechaCompra}}&nbsp;&nbsp;<span class="informacion">Fecha garantia:&nbsp;</span>{{fechaGarantia}}
					<br />
					<span class="informacion">Tipo Garantia:&nbsp;</span>{{tipoGarantia}}
					<br />
					<span class="informacion">Fecha Ingreso:&nbsp;</span>{{fechaIngreso}}&nbsp;&nbsp;<span class="informacion">Fecha Egreso:&nbsp;</span>{{fechaEgreso}}
					<br />
					<span class="informacion">Estado:&nbsp;</span>{{estado}}
					<br />
					<span class="informacion">Comentario:&nbsp;</span>{{comentario}}
					<br />
				</p>
			</div>
		</script>
		<!-- -->
	</body>
</html>