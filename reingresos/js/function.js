function valida_campos(){
	var js_matricula = document.getElementById("imatricula").value.trim();
	var js_nombre = document.getElementById("inombre").value.trim();
	var js_grado = document.getElementById("igrado").value.trim();
	var js_tel = document.getElementById("itelefono").value.trim();
	var js_corr = document.getElementById("iemail").value.trim();
	var js_carrera = document.getElementById("scarrera").selectedIndex;

	
	if (js_matricula.length == 0){
		alert("Error: Campo 'MATRICULA' no debe estar vacio");
		return false;
	}
	else if (js_nombre.length == 0){
		alert("Error: Campo 'NOMBRE' no debe estar vacio");
		return false;
	}

	else if (js_grado.length == 0){
		alert("Error: Campo 'GRADO' no debe estar vacio");
		return false;
	}

	else if (js_grado <= 0 || js_grado >12){
		alert("Error: Campo 'GRADO' debe estar el rango de entre 1 a 12");
		return false;
	}

else if (isNaN(js_grado)) {
            alert("No es numero, Ingrese solo números en grado del 1 al 12");
            return false;
      }

    else if (js_carrera == null || js_carrera ==0) {
        alert("Error: Campo 'CARRERA' no debe estar vacio");
        return false;
    }
	else if (js_tel.length == 0){
		alert("Error: Campo 'TELEFONO' no debe estar vacio");
		return false;
	}

	else if (js_corr.length == 0){
		alert("Error: Campo 'CORREO' no debe estar vacio");
		return false;
	}
}
	function valida_mat(){
		var js_matricula = document.getElementById("imatricula").value.trim();
		var auth = grecaptcha.getResponse();
		
		if (!validaMATRICULA()){
			alert("error 'MATRICULA' mal formulada o campo vacio");
			return false;
		}
		else if (auth.length == 0){
			alert("Captcha no verificado.");
			return false;
	}
		}
	function validaMATRICULA(){
		pattern=/^[0-9]{5,8}$/;
		matricula=document.getElementById("imatricula").value;
		document.getElementById("estatus").innerHTML = pattern.test(matricula);
		return pattern.test(matricula);
	
		
	}
	function actucap(){
		var obj=document.getElementById("cap");
		if (!obj) obj=window.document.all.cap; //es para IE The document.all property is an array of all the HTML elements that are in the document.
		if (obj){
		obj.src= "captcha.php?" + Math.random();   //uso de parametro fantasma para evitar cache del navegador
		}
		}
		
		  var Alert = new CustomAlert();
		
		function dialogo_bootstrap(msg,url){
		BootstrapDialog.show({
		  title: 'Facultad de Sistemas UAdeC',
		  type: BootstrapDialog.TYPE_SUCCESS,
		  closable: false,
			message: msg,
			buttons: [{
			  label: 'OK',
				action: function(dialog) {
				  dialog.close();
				  window.location.href=url;
				}
			}]
		});
		}
		   function valida_usuario(){
			var matricula=$( "#matricula" ).val();
			var capt=$( "#tmptxt" ).val();
		
			if (matricula.length==0){
			  //dialogo_bootstrap('Registre un usuario:','login.php');
			  
			 Alert.render('Registre una matricula, no puede ir vacío, verifique.');
			}
			
			else if (capt.length==0){
			  //dialogo_bootstrap('Registre su password:','login.php');
			 Alert.render('Registre el código de seguridad, no puede ir vacía, verifique.');
			}    
			else{
					$('#contentplace').html('<div><img src="images/loading4.gif"/>Cargando...</div>');
		
			   var datos={matricula,capt};
		  $.ajax({
					  url: 'verifica_matricula.php',
					  type: 'POST',
					  dataType: 'html',
					  data: datos,
					  success: function(response){
					
						if(response=="true")
						  {
		  
							 //Alert.render("Candidato de desempeño, recargado con éxito.");
							 window.location.href = "../reg.php";
		
						}else{
							  dialogo_bootstrap(response,'views/mat.view.php');
						}         
					  },
						error: function(xhr, desc, err) {
						  console.log(xhr);
						  console.log("Details: " + desc + "\nError:" + err);
						}
		  });
		
			}
		  }



 
