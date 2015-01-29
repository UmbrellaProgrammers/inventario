
//Renderea en la pagina el div info general cuando carga la pagina
function cargarInfo(imagen){
	var template = $('#template-info').html();
	var data = {
		foto : imagen
	};
	var rendered = Mustache.render(template,data);
	$('#ca-container').append(rendered);
}

$(document).ready(function() {
	cargarInfo("../css/images/insert_image.png");
	$('#close').click(function(){
		$("#panel").attr('src','panel.php');
	});
	$('#panel').load(function() {
		var cat = $("a",panel.document);
		for(var i=0;i<cat.length;i++){
			cat[i].onclick = function(){seleccionado(this)};
		}
	});
	
	$('#file-input').change(function(){
		alert('cambie');
	});
});

function subirImagen(cat,tabla,id,opcion){
	//console.log('entre');
	var input = $('#file-input');
	formdata = new FormData();
	
	input.change(function(){
		//console.log('cambio');
		var file =  input[0].files[0];
		var nombreFile = file.name;
		var extension = nombreFile.substring(nombreFile.lastIndexOf('.') + 1);
		if (formdata){
			formdata.append('images', file);
			formdata.append('nom', cat);
			formdata.append('ext', extension);
			formdata.append('tabla', tabla );
			formdata.append('id', id);
			formdata.append('opcion', opcion);
            $.ajax({
                url : '../item/upload.php',
                type : 'POST',
                data : formdata,
                processData : false, 
                contentType : false, 
                success : function(res){
                    console.log(res);
                },
				error : function(){
					console.log("no funciono");
				}
            });
        };
	})
}

function frame(){
	var select = $('#filtro').val();
	if(select == "lugar") {
		$('#my-button').removeClass("pop2").addClass("pop1");
		javascript:document.getElementById('panel').src = 'panel.php';
	}
	if(select == "categoria"){
		$('#my-button').removeClass("pop1").addClass("pop2");
		javascript:document.getElementById('panel').src = 'panel2.php';
	}
}

//Se elimina el div ca-wrapper para poder reiniciar la galeria 
function removerGaleria(){
	$('.ca-wrapper').remove();
}

function remove_cat(n){
	var flag = false;
	if($('#b_activos').className == "border a-boton active_activos"){
		var items = $("#cont_cat > a");
		var aux = "";
		for(var i=0;i<items.length;i++){
			if(item[i].className == "a-select seleccionado"){
				flag = true;
			}
		}
	}
	if(n == 2 && flag == false){
		remove_subCat();
	}else{
		var cat = $("a",panel.document);
		var select = $('#filtro').val();
		if(select == "lugar") {
			select = "departamento";
		}
		var remove = true;
		var i=0;
		while(i < cat.length && remove == true){
			if(cat[i].className == "a-select seleccionado"){
				if(confirm("¿Realmente deseas eliminar esta categoría?")){
					window.location = "item.php?categoria="+cat[i].name+"&select="+select;
				}
				remove = false;
			}
			i++;
		}
		if(remove){
			alert("No se ha seleccionado nada");
			remove = false;
		}
	}
}

function remove_subCat(){
	confirm("<b>¿Realmente deseas eliminar esta categoría?</b>\n\nlala");
}

function seleccionado(category){
	removerGaleria();
	$('#ca-container').find('.ca-nav').remove();
	$('#activos').css({"display":"none"});
	activo('1','',1,true);
	$('#b_activos').removeClass("active_activos");
	$('#img_edit').css({"margin":"0px 30px 0px 42%"});
	$('#img_notes').css({"margin":"10px 0px 0px 10px"});
	$('#li_archi').css({"pointer-events":"none"});
	$('#li_info').addClass("active");
	$('#li_archi').removeClass("active");
	$('#a_archi').css({"color":"gray"});
	var obj=hallarObj(category);
	var cats = $("a",panel.document);
	var aux = "";
	for(var i=0;i<cats.length;i++){
		aux = obj+i;
		if(aux == category.id){
			category.style.background = '#1275ae';
			category.style.color = '#fff';
			category.classList.add("seleccionado");
		}else{
			cats[i].style.background = 'transparent';
			cats[i].style.color =  '#000';
			cats[i].classList.remove("seleccionado");
		}
	}
	peticion(category.name, obj);
	category.ondblclick=function(){
		activo(category.name, obj, 2,false);
	}
}

function peticion(cat, table){
	var parametros = {
        "categoria" : cat,
		"tabla" : table
    };
	
    $.ajax({
        data:  parametros,
		url:   'info.php',
        type:  'post',
        success:  function (response) {
			informacion(response,cat,table);    
		}
    });
	
}

function informacion(response,cat,tabla){
	var imagen;
	var ban = 0;
	data = response.split(';');
	var string = "<h2 id='lala' style='margin:0px 10px;font-weight:bold'>"+String(data[0])
		+"</h2><p id='info_p' style='margin:0px 10px;font-weight:bold'>"+String(data[1])
		+"<br />"+String(data[2])+"<br />"+String(data[3])+"</p>";
	if (data[4]==""){
		imagen = "../css/images/insert_image.png";
	}else{
		ban = 1;
		imagen = String(data[4]);
	}
	cargarInfo(imagen);
	var info = $("#info");
	if (ban!=0) {
		info.find('#file-input').remove(); 
		var img = info.find('img');
		img.css('cursor','default');
	}
	$(string).hide().appendTo(info).fadeIn(500);
	//subirImagen(cat,tabla,"",0);
}

//listar activos
function listar(cat,obj,sw,mostrar){
	document.getElementById("cont_cat").innerHTML = ""; 
	if(sw){
		$('#img_edit').css({"margin":"0px 30px 0px 24.75%"});
		$('#img_notes').css({"margin":"10px 0px 0px 280px"});
		$('#activos').css({"display":"block"});
		var parametros = {
			"categoria" : cat,
			"tabla" : obj
		};
		$.ajax({
			data:  parametros,
			url:   'list_inv.php',
			type:  'post',
			success:  function (response) {
				if(response == ""){
					listar("","",false,1);
				}else{
					list_inv(response);    
				}
			}
		});
	}else{
		if(mostrar == 0){
			$('#img_edit').css({"margin":"0px 30px 0px 42%"});
			$('#img_notes').css({"margin":"10px 0px 0px 10px"});
			$('#activos').css({"display":"none"});
		}
	}
}

var cont = 0;
function activo(cat,obj,n,flag) {
	if(cat == ""){
		var aux = $("a",panel.document);
		var flag = true;
		var i = 0;
		while(i < aux.length && flag == true){
			if(aux[i].className == "a-select seleccionado"){
				cat = aux[i];
				flag = false;
			}
			i++;
		}
		if(!(flag)){
			obj = hallarObj(cat);
			cat = cat.name;
		}else{
			alert("No se ha seleccionado nada");
			cont--;
		}
	}
	cont = cont*n;
	if (cont % 2 == 0 && flag==false) {
		$('#b_activos').addClass("active_activos");
		listar(cat,obj,true,1);
	} else {
		$('#b_activos').removeClass("active_activos");
		listar(cat,obj,false,0);
	}
	cont++;
}

function list_inv(response){
	var info = document.getElementById("cont_cat");
	data = response.split(';');
	for(var i=0;i<data.length;i++){
		if(i == 0){
			var hr = document.createElement("hr");
			info.appendChild(hr);
		}
		var a = document.createElement("a");
		a.id="item"+i;
		a.name=data[i];
		a.className = "a-select";
		a.setAttribute("onclick","seleccionado2(this);");
		a.innerHTML = data[i];
		info.appendChild(a);
		var hr = document.createElement("hr");
		info.appendChild(hr);
	}
}

function seleccionado2(slct){
	removerGaleria();
	$('#li_archi').css({"pointer-events":"all"});
	$('#a_archi').removeAttr('style');
	var items = $("#cont_cat > a");
	var aux = "";
	for(var i=0;i<items.length;i++){
		aux = "item"+i;
		if(aux == slct.id){
			slct.style.background = '#1275ae';
			slct.style.color = '#fff';
			slct.classList.add("seleccionado");
		}else{
			items[i].style.background = 'transparent';
			items[i].style.color =  '#000';
			items[i].classList.remove("seleccionado");
		}
	}
	var cat = consultaCat();
	var tabla = hallarObj(cat);
	busqueda(slct.name, cat.name, tabla);
}


//Esta funcion permite realizar la busqueda del item seleccionado
function busqueda(item, cat, tabla){
	var parametros = {
        "item" : item,
		"categoria" : cat,
		"tabla" : tabla
    };
	//El archivo info2 devuelve un json con los datos de la consulta
    $.ajax({
        data:  parametros,
		url:   'info2.php',
        type:  'post',
        success:  function (response) {
			//se formate el json como un array de objetos
			var json = eval(response);
			loadUser(json);
		}
    });
	
}


//Funcion permite cargar la informacion de cada uno de los item traidos de la consulta
function loadUser(data) {
	var ban = 0;
	var i=0;
	var div = $('<div />',{'class' : 'ca-wrapper'});
	$('#ca-container').append(div);
	numeroItems = data.length;
	//por cada item del json se renderea el template con la informacion del item
	for (i in data){
		var template = $('#template-ca-item').html();
		/*console.log("hola");
		if (data[i].foto == ""){
			console.log(data[i].foto);
			data[i].foto = "../css/images/insert_image.png";
			subirImagen(data[i].id,"",data[i].id,1);
		}*/
		var datos = {
			foto : data[i].foto,
			nombre : data[i].subcategoria,
			marca : data[i].marca,
			modelo : data[i].modelo,
			descripcion : data[i].descripcion,
			precioNuevo : data[i].precio_nuevo,
			precioUsado : data[i].precio_usado,
			vida : data[i].vida,
			barcode : data[i].barcode,
			serial : data[i].serial,
			responsable : data[i].responsable,
			fechaCompra : data[i].fecha_compra,
			fechaGarantia: data[i].fecha_garantia,
			tipoGarantia : data[i].tipo_garantia,
			fechaIngreso : data[i].fecha_ingreso,
			fechaEgreso : data[i].fecha_egreso,
			estado : data[i].estado,
			comentario : data[i].comentario_inventario
		};
		var rendered = Mustache.render(template, datos);
		$(rendered).hide().appendTo('.ca-wrapper').fadeIn(500);
	}
	
	$('.ca-wrapper').contentcarousel();
	//borrar las flechas de navegacion
	if (numeroItems == 1) {
		$('#ca-container').find('.ca-nav').remove();
	}
}
	
	
function consultaCat(){
	var aux = $("a",panel.document);
	var flag = true;
	var i = 0;
	while(i < aux.length && flag == true){
		if(aux[i].className == "a-select seleccionado"){
			cat = aux[i];
			flag = false;
		}
		i++;
	}
	return cat
}

function hallarObj(category){
	if(category.id.substr(0,9) == "categoria"){
		var obj = "categoria";
	}else{
		var obj = "departamento";
	}
	return obj;
}

function remover(){
	$('#info > h2').remove();
	$('#info > p').remove();
	$('#info > span').remove();
}