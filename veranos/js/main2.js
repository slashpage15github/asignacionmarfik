$(document).ready(function() {
	//alert("jquery listo");
$("#f_carrera").change(function(event) {

            $("#f_materias").empty();
            v_carrera=$("#f_carrera").val();
            //alert(v_carrera);
  			if (v_carrera!='0'){
           $.ajax({
                url: './carga_materias_de_carrera.php',
                type: 'post',
                data: {v_carrera: v_carrera},
                dataType: 'json',
            success: function (data) {
				//alert(data);
            	//data = JSON.parse(data);
            	//alert(data);
            	//data=JSON.stringify(data);
            	//alert (data);
                    
                    //var obj=JSON.stringify(data);
                   //console.log(obj);

		$('#f_materias').append('<option value="0" selected="selected">Seleccione:</option>');
              $.each(data, function(clave, materia){
              $('#f_materias').append( $('<option></option>').text(this.materia).val(this.clave) );
           });
        	}
        	});

  			}
  			else{

				$('#f_materias').append('<option value="0" selected="selected">Seleccione:</option>');
  			}
  });    

});


function vmat(){
	var js_mtr = document.getElementById("imatricula").value.trim();
	if (js_mtr.length > 0){
		var datos = {js_mtr};

		$.ajax({
			url: 'busca_mat.php',
			type: 'POST',
			dataType: 'html',
			data: datos,
			success: function(response){
				$('#id_result').html(response).show();
				return true;
			},
			error: function(xhr,desc,err){
				console.log(xhr);
			}
		});
	}
}
function valida_captcha() {
	var response = grecaptcha.getResponse();

	if(response.length == 0){
		alert("Captcha no verificado")
		return false;
	}
	return true;
}

function valida_alumno(){
	var js_nom = document.getElementById("inombre").value.trim();
	var js_corr = document.getElementById("icorreo").value.trim();
	var js_tel = document.getElementById("itelefono").value.trim();
	var js_igra = document.getElementById("igrado").selectedIndex;
	var js_cra = document.getElementById("f_carrera").selectedIndex;
	var js_mat = document.getElementById("f_materias").selectedIndex;
	var js_est = document.getElementById("iestatus").value.trim();
	//var auth = grecaptcha.getResponse();
	
	if (js_nom.length == 0){
		alert("Error: Campo 'NOMBRE' no debe estar vacio");
		return false;
	}
	else if (js_corr.length == 0){
		alert("Error: Campo 'CORREO' no debe estar vacio");
		return false;
	}
	else if (js_tel.length == 0){
		alert("Error: Campo 'TELEFONO' no debe estar vacio");
		return false;
	}
	else if (js_igra == null || js_igra == 0){
		alert("Error: Campo 'GRADO' no debe estar vacio");
		return false;
	}
	else if (js_cra == null || js_cra == 0){
		alert("Error: Campo 'CARRERA' no debe estar vacio");
		return false;
	}
	else if (js_mat == null || js_mat == 0){
		alert("Error: Campo 'MATERIA' no debe estar vacio");
		return false;
	}
	else if (js_est == null || js_est == 3){
		alert("Error: Campo 'ESTATUS' no debe estar vacio");
		return false;
	}
	/*else if (auth.length == 0){
		alert("Captcha no verificado.");
		return false;
	}*/
	if (validar_email(js_corr) == false){
		alert("Error: 'CORREO INVALIDO'");
		return false;
	}
	return true;
}

function validar_mtr(evt){
	var ch = String.fromCharCode(evt.which);

	if(!(/[0-9]/.test(ch))){
		evt.preventDefault();
	}

}

function validar_email( email ) {
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}

function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for(var i in especiales){
         if(key == especiales[i]){
             tecla_especial = true;
             break;
         }
     }

     if(letras.indexOf(tecla)==-1 && !tecla_especial){
         return false;
     }
 }
