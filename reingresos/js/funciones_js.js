	function valida_cliente(){
	
		var js_irfc=document.getElementById("irfc").value.trim();
		var js_inombre=document.getElementById("inombre").value.trim();
		var js_ipaterno=document.getElementById("ipaterno").value.trim();
		var js_imaterno=document.getElementById("imaterno").value.trim();
		var js_iempresa=document.getElementById("iempresa").value.trim();
		var js_itelefono=document.getElementById("itelefono").value.trim();
		var js_iemail=document.getElementById("iemail").value.trim();
		var js_scurso=document.getElementById("scurso").value;

		if (js_irfc.length==0){
			alert("Error: Campo RFC no debe estar vacío");
			return false;
		} 
		else if (js_inombre.length==0){
			alert("Error: Campo NOMBRE no debe estar vacío");
			return false;
		}
		else if (js_ipaterno.length==0){
			alert("Error: Campo PATERNO no debe estar vacío");
			return false;
		}
		else if (js_imaterno.length==0){
			alert("Error: Campo MATERNO no debe estar vacío");
			return false;
		}
		else if (js_iempresa.length==0){
			alert("Error: Campo EMPRESA no debe estar vacío");
			return false;
		}
		else if (js_itelefono.length==0){
			alert("Error: Campo TELEFONO no debe estar vacío");
			return false;
		}
		else if (js_iemail.length==0){
			alert("Error: Campo CORREO ELECTRONICO no debe estar vacío");
			return false;
		}
		else if (js_scurso=="0"){
			alert("Error: Seleccione curso de la lista en el campo cursos");
			return false;
		}
	}

	function valida_cliente_a_borrar(){
		var js_irfc=document.getElementById("irfc").value.trim();
		if (js_irfc.length==0){
			alert("Error al borrar: Campo RFC no debe estar vacío");
			return false;
		} 
	}

		function valida_cliente_busca_nombres(){
	
		var js_inombre=document.getElementById("inombre").value.trim();
		var js_ipaterno=document.getElementById("ipaterno").value.trim();
		var js_imaterno=document.getElementById("imaterno").value.trim();

		if (js_inombre.length==0 && js_ipaterno.length==0 && js_imaterno.length==0){
			alert("Error: Por lo menos debe llenar algun campo para la búsqueda");
			return false;
		}
	}
