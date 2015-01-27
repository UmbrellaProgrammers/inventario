$(document).ready(function(){
	$("#43165859670970").submit(function() {
		return validacion();
	});
});

function validacion(){
	existente($('#cod_barras').val());
//	subcategoria();
//	return false;
	if($('#categoria').val() == ""){
		$('#categoria').css("border", "1px solid rgb(255, 0, 0)");
		return false;
	}else{
		$('#categoria').css("border", "1px solid rgb(80, 211, 109)");
	}
	
	if($('#subcategoria').val() == ""){
		$('#subcategoria').css("border", "1px solid rgb(255, 0, 0)");
		return false;
	}else{
		$('#subcategoria').css("border", "1px solid rgb(80, 211, 109)");
	}
	
	if($('#crearSub').is(':checked')){
		$('#error').css("display","none");
		if($('#precio_nuevo').val() == ""){
			$('#precio_nuevo').css("border", "1px solid rgb(255, 0, 0)");
		return false;
		}else{
		$('#precio_nuevo').css("border", "1px solid rgb(80, 211, 109)");
		}
		
		if($('#precio_usado').val() == ""){
			$('#precio_usado').css("border", "1px solid rgb(255, 0, 0)");
		return false;
		}else{
		$('#precio_usado').css("border", "1px solid rgb(80, 211, 109)");
		}
		
	}else{
		subcategoria();
	}
	
	if($('#pais').val() == ""){
		$('#pais').css("border", "1px solid rgb(255, 0, 0)");
		return false;
	}else{
		$('#pais').css("border", "1px solid rgb(80, 211, 109)");
	}
	
	if($('#departamento').val() == ""){
		$('#departamento').css("border", "1px solid rgb(255, 0, 0)");
		return false;
	}else{
		$('#departamento').css("border", "1px solid rgb(80, 211, 109)");
	}
	
	if($('#responsable').val() == ""){
		$('#responsable').css("border", "1px solid rgb(255, 0, 0)");
		return false;
	}else{
		$('#responsable').css("border", "1px solid rgb(80, 211, 109)");
	}
	
	if($('#cod_barras').hasClass('valido')){
		return false;
	}else{
		return false;
	}
}

function existente(codebar){
	var parametros = {
        "codebar" : codebar,
		"lala" : "lal"
    };
    $.ajax({
        data:  parametros,
		url:   'lala.php',
        type:  'post',
        success:  function (response) {
			console.log(response);
		//	alert(response);
			if(response == "true"){
				$('#error').css("display","none");
				$('#cod_barras').removeClass("invalido").addClass("valido");
			}else{
				$('#error').css("display","block");
				$('#cod_barras').removeClass("valido").addClass("invalido");
			}
		}
    });
}

function subcategoria(){
	var parametros = {
		"categoria" : $('#categoria').val(),
		"subcategoria" : $('#subcategoria').val(),
		"marca" : $('#marca').val(),
		"modelo" : $('#modelo').val(),
		"lala" : "lel"
	};
	$.ajax({
        data:  parametros,
		url:   'lala.php',
        type:  'post',
        success:  function (response) {
			console.log(response);
			if(response == "true"){
				$('#error2').css("display","none");
				//$('#cod_barras').removeClass("invalido").addClass("valido");
			}else{
				$('#error2').css("display","block");
			//	$('#cod_barras').removeClass("valido").addClass("invalido");
			}
		}
    });
}

function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;

	return true;
}

function isNumberKey2(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57 ) && (charCode < 45 || charCode > 45) && (charCode < 43 || charCode > 43))
            return false;
 
         return true;
      }