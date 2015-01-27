<?php
	include "../connection.php";

	$query2 = mysql_query("select categoria from categoria");
	
	$categoria = array();
	$i = 0;
	while($row = mysql_fetch_array($query2)){
		$categoria[$i] = $row['categoria'];
		$i++;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<!-- saved from url=(0047)http://form.jotformpro.com/form/43165859670970? -->
<html style="overflow-x:hidden;">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="HandheldFriendly" content="true">
        <title>Agregar Item</title>
		<link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css"/>
		<script src="../js/jquery-1.10.2.min.js"></script>
        <link href="./AgregarItem_files/formCss.css" rel="stylesheet" type="text/css">
        <link type="text/css" rel="stylesheet" href="./AgregarItem_files/nova.css">
        <link type="text/css" rel="stylesheet" href="../css/autocomplete.css"></link>
        <style type="text/css">
            .form-label-left{
                width:150px !important;
            }
            .form-line{
                padding-top:5px;
                padding-bottom:10px;
            }
            .form-label-right{
                width:150px !important;
            }
            body, html{
                margin:0;
                padding:0;
                background:false;
            }

            .form-all{
                margin:0px auto;
                padding-top:0px;
                width:498px;
                color:#555 !important;
                font-family:'Arial';
                font-size:14px;
            }
            .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
                color: #555;
            }
			
			.valido{
				border: 1px solid rgb(80, 211, 109);
			}
			
			.invalido{
				border: 1px solid rgb(255, 0, 0);
			}
        </style>
        <script src="../js/autocomplete.jquery.js"></script>
        <script src="../js/validacion.js"></script>
		<script src="../js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8">
		</script>
		<script src="../js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
		</script>

        <script type="text/javascript">
			$(document).ready(function(){
                $('.autocomplete').autocomplete();
				jQuery("#43165859670970").validationEngine();
            });
			function agregarSub(){
				if(document.getElementById('crearSub').checked){
					document.getElementById('formSub').style.display = 'block';
				}else{
					document.getElementById('formSub').style.display = 'none ';
				}
			}
        </script>
    </head>
    <body>
        <form class="jotform-form" action="subcategorias.php" method="post" enctype="multipart/form-data" name="form_43165859670970" id="43165859670970" accept-charset="utf-8" novalidate="true">
            <input type="hidden" name="formID" value="43165859670970">
            <div class="form-all">
                <ul class="form-section">
                    <li id="cid_1" class="form-input-wide" data-type="control_head">
                        <div class="form-header-group">
                            <div class="header-text httal htvam">
                                <h2 id="header_1" class="form-header">
                                    Agregar Item
                                </h2>
                            </div>
                        </div>
                    </li>
                    <li class="form-line form-line-column form-col-1" data-type="control_dropdown" id="id_3">
                        <label class="form-label form-label-top" id="label_3" for="categoria">
                            Categoría
                            <span class="form-required">
                                *
                            </span>
                        </label>
                        <div id="cid_3" class="form-input-wide">
                            <select class="form-dropdown validate[required]" style="width:150px" id="categoria" name="categoria">
                                <option value=""> Seleccionar... </option>
								<?php 
									for($j=0;$j<$i;$j++){
									?>
										<option value="<?=$categoria[$j]?>"><?=$categoria[$j]?></option>
									<?php
									}
								?>
                            </select>
                        </div>
                    </li>
                    <li class="form-line form-line-column form-col-2" data-type="control_autocomp" id="id_16">
                        <label class="form-label form-label-top" id="label_16" for="subcategoria">
                            Subcategor&iacute;a
                            <span class="form-required">
                                *
                            </span>
                        </label>
                        <div id="cid_16" class="form-input-wide autocomplete">
							<input type="text" class="validate[required]" id="subcategoria" name="subcategoria" value="" autocomplete="off" size="20" data-source="search.php?search=" />
                        </div>
						<div class="autocomplete">
						</div>
                    </li>
					<li class="form-line form-line-column form-col-1 form-line-column-clear" data-type="control_textbox" id="id_7">
						<label class="form-label form-label-top" id="label_7" for="marca"> Marca </label>
						<div id="cid_7" class="form-input-wide">
							<input type="text" class=" form-textbox" data-type="input-textbox" id="marca" name="marca" size="20" value="">
						</div>
					</li>
					<li class="form-line form-line-column form-col-2" data-type="control_textbox" id="id_6">
						<label class="form-label form-label-top" id="label_6" for="modelo"> Modelo </label>
						<div id="cid_6" class="form-input-wide">
							<input type="text" class=" form-textbox" data-type="input-textbox" id="modelo" name="modelo" size="20" value="">
						</div>
					</li>
                    <li class="form-line form-line-column form-col-3" data-type="control_checkbox" id="id_30">
                        <label class="form-label form-label-top" id="label_30" for="crearSub"> Si la Subcategoría no existe, puede crearla aquí </label>
                        <div id="cid_30" class="form-input-wide">
                            <div class="form-single-column">
                                <span class="form-checkbox-item" style="clear:left;">
                                    <input type="checkbox" class="form-checkbox" id="crearSub" name="crearSub[]" value="Crear Subcategoría" onclick="agregarSub();">
                                    <label for="crearSub"> Crear Subcategoría </label>
                                </span>
                                <span class="clearfix">
                                </span>
                            </div>
                        </div>
                    </li>
					<div id="formSub" style="display:none;">
						<li class="form-line form-line-column form-col-4" data-type="control_textarea" id="id_5">
							<label class="form-label form-label-top" id="label_5" for="descripcion"> Descripción </label>
							<div id="cid_5" class="form-input-wide">
								<textarea id="descripcion" class="form-textarea" name="descripcion" cols="25" rows="2"></textarea>
							</div>
						</li>
						<li class="form-line form-line-column form-col-1 form-line-column-clear" data-type="control_textbox" id="id_9">
							<label class="form-label form-label-top" id="label_9" for="precio_nuevo">
								Precio Nuevo
								<span class="form-required">
									*
								</span>
							</label>
							<div id="cid_9" class="form-input-wide">
								$ <input type="text" class=" form-textbox validate[required]" data-type="input-textbox" onkeypress="return isNumberKey(event)" id="precio_nuevo" name="precio_nuevo" size="5" value="">
							</div>
						</li>
						<li class="form-line form-line-column form-col-2" data-type="control_textbox" id="id_8">
							<label class="form-label form-label-top" id="label_8" for="precio_usado">
								Precio Usado
								<span class="form-required">
									*
								</span>
							</label>
							<div id="cid_8" class="form-input-wide">
								$ <input type="text" class=" form-textbox validate[required]" data-type="input-textbox" onkeypress="return isNumberKey(event)" id="precio_usado" name="precio_usado" size="5" value="">
							</div>
						</li>
						<li class="form-line form-line-column form-col-3" data-type="control_number" id="id_15">
							<label class="form-label form-label-top" id="label_15" for="vida"> Vida util </label>
							<div id="cid_15" class="form-input-wide">
								<input type="number" class="form-number-input  form-textbox" id="vida" name="vida" style="width:60px" size="5" value="" onkeypress="return isNumberKey(event)" data-type="input-number" placeholder="ex: 23">
							</div>
						</li>
						<li class="form-line form-line-column form-col-1 form-line-column-clear" data-type="control_textbox" id="id_11">
							<label class="form-label form-label-top" id="label_11" for="proveedor"> Proveedor </label>
							<div id="cid_11" class="form-input-wide">
								<input type="text" class=" form-textbox" data-type="input-textbox" id="proveedor" name="proveedor" size="20" value="">
							</div>
						</li>
						<li class="form-line form-line-column form-col-1 form-line-column-clear" data-type="control_textbox" id="id_12">
							<label class="form-label form-label-top" id="label_12" for="ciudad"> Ciudad </label>
							<div id="cid_12" class="form-input-wide">
								<input type="text" class=" form-textbox" data-type="input-textbox" id="ciudad" name="ciudad" size="20" value="">
							</div>
						</li>
						<li class="form-line form-line-column form-col-2" data-type="control_textbox" id="id_13">
							<label class="form-label form-label-top" id="label_13" for="telefono"> Teléfono </label>
							<div id="cid_13" class="form-input-wide">
								<input type="text" class=" form-textbox" data-type="input-textbox" onkeypress="return isNumberKey2(event)" id="telefono" name="telefono" size="20" value="">
							</div>
						</li>
						<li class="form-line form-line-column form-col-3" data-type="control_fileupload" id="id_14">
							<label class="form-label form-label-top" id="label_14" for="imagen"> Imagen </label>
							<div id="cid_14" class="form-input-wide">
								<input class="form-upload validate[upload]" type="file" id="imagen" name="imagen" file-accept="jpg, jpeg, png, gif" file-maxsize="1024" file-limit="0">
							</div>
						</li>
						<li class="form-line" data-type="control_textarea" id="id_28">
							<label class="form-label form-label-left form-label-auto" id="label_28" for="comentariosActivo"> Comentarios de subcategor&iacute;a</label>
							<div id="cid_28" class="form-input">
								<textarea id="comentariosActivo" class="form-textarea" name="comentariosActivo" cols="42" rows="3"></textarea>
							</div>
						</li>
					</div>
                    <li class="form-line form-line-column form-col-4 form-line-column-clear" data-type="control_textbox" id="id_18">
                        <label class="form-label form-label-top" id="label_18" for="cod_barras"> Código de barras </label>
                        <div id="cid_18" class="form-input-wide">
                            <input type="text" class=" form-textbox" data-type="input-textbox" id="cod_barras" name="cod_barras" size="20" value="">
                        </div>
                    </li>
                    <li class="form-line form-line-column form-col-5" data-type="control_textbox" id="id_19">
                        <label class="form-label form-label-top" id="label_19" for="serial"> Serial </label>
                        <div id="cid_19" class="form-input-wide">
                            <input type="text" class=" form-textbox" data-type="input-textbox" id="serial" name="serial" size="20" value="">
                        </div>
                    </li>
                    <li class="form-line form-line-column form-col-6" data-type="control_dropdown" id="id_29">
                        <label class="form-label form-label-top" id="label_29" for="pais">
                            País
                            <span class="form-required">
                                *
                            </span>
                        </label>
                        <div id="cid_29" class="form-input-wide">
                            <select class="form-dropdown validate[required]" style="width:150px" id="pais" name="pais">
                                <option value=""> Seleccionar... </option>
                                <option value="Colombia"> Colombia </option>
                                <option value="Ecuador"> Ecuador </option>
                                <option value="Perú"> Perú </option>
                            </select>
                        </div>
                    </li>
                    <li class="form-line form-line-column form-col-7" data-type="control_textbox" id="id_21">
                        <label class="form-label form-label-top" id="label_21" for="departamento">
                            Departamento
                            <span class="form-required">
                                *
                            </span>
                        </label>
                        <div id="cid_21" class="form-input-wide">
                            <input type="text" class=" form-textbox validate[required]" data-type="input-textbox" id="departamento" name="departamento" size="20" value="">
                        </div>
                    </li>
                    <li class="form-line form-line-column form-col-8" data-type="control_textbox" id="id_22">
                        <label class="form-label form-label-top" id="label_22" for="responsable">
                            Responsable
                            <span class="form-required">
                                *
                            </span>
                        </label>
                        <div id="cid_22" class="form-input-wide">
                            <input type="text" class=" form-textbox validate[required]" data-type="input-textbox" id="responsable" name="responsable" size="20" value="">
                        </div>
                    </li>
                    <li class="form-line form-line-column form-col-9 form-line-column-clear" data-type="control_datetime" id="id_23">
                        <label class="form-label form-label-top" id="label_23" for="input_23"> Fecha de Compra </label>
                        <div id="cid_23" class="form-input-wide">
                            <input type="date" id="fechaCompra" name="fechaCompra">
                        </div>
                    </li>
                    <li class="form-line form-line-column form-col-10 form-line-column-clear" data-type="control_datetime" id="id_24">
                        <label class="form-label form-label-top" id="label_24" for="input_24"> Fecha de Garantía </label>
                        <div id="cid_24" class="form-input-wide">
                            <input type="date" id="fechaGarantia" name="fechaGarantia">
                        </div>
                    </li>
                    <li class="form-line form-line-column form-col-11" data-type="control_dropdown" id="id_25">
                        <label class="form-label form-label-top" id="label_25" for="tipo_garantia"> Tipo de Gatantía </label>
                        <div id="cid_25" class="form-input-wide">
                            <select class="form-dropdown" style="width:150px" id="tipo_garantia" name="tipo_garantia">
                                <option value=""> Seleccionar... </option>
                                <option value="Normal"> Normal </option>
                                <option value="Extendida"> Extendida </option>
                                <option value="N/A"> N/A </option>
                            </select>
                        </div>
                    </li>
                    <li class="form-line form-line-column form-col-12 form-line-column-clear" data-type="control_datetime" id="id_26">
                        <label class="form-label form-label-top" id="label_26" for="input_26"> Fecha Ingreso </label>
                        <div id="cid_26" class="form-input-wide">
                            <input type="date" id="fechaIngreso" name="fechaIngreso">
                        </div>
                    </li>
                    <li class="form-line form-line-column form-col-13" data-type="control_datetime" id="id_27">
                        <label class="form-label form-label-top" id="label_27" for="input_27"> Fecha Egreso </label>
                        <div id="cid_27" class="form-input-wide">
                            <input type="date" id="fechaEgreso" name="fechaEgreso">
                        </div>
                    </li>
                    <li class="form-line" data-type="control_textarea" id="id_28">
                        <label class="form-label form-label-left form-label-auto" id="label_28" for="comentarios"> Comentarios </label>
                        <div id="cid_28" class="form-input">
                            <textarea id="comentarios" class="form-textarea" name="comentarios" cols="40" rows="6"></textarea>
                        </div>
                    </li>
                    <li class="form-line form-line-column form-col-1 form-line-column-clear" data-type="control_button" id="id_2">
                        <div id="cid_2" class="form-input-wide">
                            <div style="margin-left:156px" class="form-buttons-wrapper">
                                <button id="submit" type="submit" name="submit" class="form-submit-button form-submit-button-cool_grey">
                                    Agregar
                                </button>
                            </div>
                        </div>
                    </li>
                    <li style="clear:both">
                    </li>
                    <li id="error" style="display:none;color:red">
                        El código de barras ya existe
                    </li>
                    <li id="error2" style="display:none;color:red">
                        Datos invalidos referente a la subcategor&iacute;a o subcategor&iacute;a no existente
                    </li>
                </ul>
            </div>
        </form>
    </body>
</html>