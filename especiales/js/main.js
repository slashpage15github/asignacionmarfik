$(document).ready(function() {
	//alert("jquery listo");

$("#f_carrera").change(function(event) {
            $("#f_materias").empty();
            v_carrera=$("#f_carrera").val();
            //v_matricula=$("#imatricula").val();
            

  			if (v_carrera!='0'){

           $.ajax({
                url: './carga_materias_de_carrera.php',
                type: 'POST',
                data: {v_carrera: v_carrera},
                dataType: 'json',
            success: function (data) {

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

	//alert(response.length);
	var f_mat= document.getElementById("first-name").value;
	if (f_mat.length<7){
		Swal.fire({
            type: 'error',
            title: 'Verificar Matrícula',
            html: '<b>* El campo de matrícula no puede ir vacio<br>* El  campo matrícula debe tener mínimo 7 dígitos</b>'
            });
		//alert("Matrícula debe ser al menos 7 caracteres");
		return false;
	}
	else if(response.length == 0){
		Swal.fire({
            type: 'error',
            title: 'Control CAPTCHA',
            html: '<b>* Captcha no verificado<br>* Marque la casilla de verificación "No soy un Robot"</b>'
            });
		//alert("Captcha no verificado");
		return false;
	}
	return true;
} 


function valida_alumno_upd(){
	var js_matricula = document.getElementById("matricula").value.trim();
	var js_cve_mat = document.getElementById("cve_mat").selectedIndex;
	var js_email = document.getElementById("email").value.trim();
	var js_telefono = document.getElementById("telefono").value.trim();
	var js_estatus = document.getElementById("estatus").value.trim();
	var js_grado = document.getElementById("grado").value.trim();
	var js_carrera = document.getElementById("carrera").value.trim();
	var js_nombre = document.getElementById("nombre").value.trim();


	if (js_matricula.length == 0){
		Swal.fire({
            type: 'error',
            title: 'Verificar Nombre',
            html: '<b>* Campo NOMBRE no debe estar vacio.'
            });
		//alert("Error: Campo 'NOMBRE' no debe estar vacio");
		return false;
	}
	else if (js_cve_mat == null){
		Swal.fire({
            type: 'error',
            title: 'Verificar Materia',
            html: '<b>* Campo MATERIA no debe estar vacio.'
            });		
		//alert("Error: Campo 'MATERIA' no debe estar vacio");
		return false;
	}
	else if (js_email.length == 0){
		Swal.fire({
            type: 'error',
            title: 'Verificar Correo',
            html: '<b>* Campo CORREO no debe estar vacio.'
            });		
		//alert("Error: Campo 'CORREO' no debe estar vacio");
		return false;
	}
	if (validar_email(js_email) == false){
		Swal.fire({
            type: 'error',
            title: 'Verificar Correo Inválido',
            html: '<b>* Campo CORREO no cumple el formato correcto.'
            });		
		//alert("Error: 'CORREO INVALIDO'");
		return false;
	}
	else if (js_telefono.length == 0){
		Swal.fire({
            type: 'error',
            title: 'Verificar Teléfono',
            html: '<b>* Campo TELEFONO no debe estar vacio.'
            });
		//alert("Error: Campo 'TELEFONO' no debe estar vacio");
		return false;
	}
	else if (js_grado.length == 0){
		Swal.fire({
            type: 'error',
            title: 'Verificar Grado',
            html: '<b>* Campo GRADO no debe estar vacio.'
            });
		//alert("Error: Campo 'GRADO' no debe estar vacio");
		return false;
	}
	else if (js_carrera == null){
		Swal.fire({
            type: 'error',
            title: 'Verificar Carrera',
            html: '<b>* Campo CARRERA no debe estar vacio.'
            });		
		//alert("Error: Campo 'CARRERA' no debe estar vacio");
		return false;
	}
	else if (js_nombre == null){
		Swal.fire({
            type: 'error',
            title: 'Verificar Nombre del Alumno',
            html: '<b>* Campo Nombre del Alumno no debe estar vacio.'
            });		
		//alert("Error: Campo 'CARRERA' no debe estar vacio");
		return false;
	}	


}


function valida_alumno(){
	var js_nom = document.getElementById("inombre").value.trim();
	var js_corr = document.getElementById("icorreo").value.trim();
	var js_tel = document.getElementById("itelefono").value.trim();
	var js_igra = document.getElementById("igrado").value.trim();
	var js_cra = document.getElementById("f_carrera").selectedIndex;
	var js_mat = document.getElementById("f_materias").selectedIndex;
	//var auth = grecaptcha.getResponse();
//var auth = grecaptcha.getResponse();
	//alert(js_cra);
	if (js_nom.length == 0){
		Swal.fire({
            type: 'error',
            title: 'Verificar Nombre',
            html: '<b>* Campo NOMBRE no debe estar vacio.'
            });
		//alert("Error: Campo 'NOMBRE' no debe estar vacio");
		return false;
	}
	else if (js_corr.length == 0){
		Swal.fire({
            type: 'error',
            title: 'Verificar Correo',
            html: '<b>* Campo CORREO no debe estar vacio.'
            });		
		//alert("Error: Campo 'CORREO' no debe estar vacio");
		return false;
	}
	else if (js_tel.length == 0){
		Swal.fire({
            type: 'error',
            title: 'Verificar Teléfono',
            html: '<b>* Campo TELEFONO no debe estar vacio.'
            });
		//alert("Error: Campo 'TELEFONO' no debe estar vacio");
		return false;
	}
	else if (js_igra.length == 0){
		Swal.fire({
            type: 'error',
            title: 'Verificar Grado',
            html: '<b>* Campo GRADO no debe estar vacio.'
            });
		//alert("Error: Campo 'GRADO' no debe estar vacio");
		return false;
	}
	else if (js_cra == null || js_cra == 0){
		Swal.fire({
            type: 'error',
            title: 'Verificar Carrera',
            html: '<b>* Campo CARRERA no debe estar vacio.'
            });		
		//alert("Error: Campo 'CARRERA' no debe estar vacio");
		return false;
	}
	else if (js_mat == null || js_mat == 0){
		Swal.fire({
            type: 'error',
            title: 'Verificar Materia',
            html: '<b>* Campo MATERIA no debe estar vacio.'
            });		
		//alert("Error: Campo 'MATERIA' no debe estar vacio");
		return false;
	}
	/*else if (auth.length == 0){
		alert("Captcha no verificado.");
		return false;
	}*/
	if (validar_email(js_corr) == false){
		Swal.fire({
            type: 'error',
            title: 'Verificar Correo Inválido',
            html: '<b>* Campo CORREO no cumple el formato correcto.'
            });		
		//alert("Error: 'CORREO INVALIDO'");
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
	