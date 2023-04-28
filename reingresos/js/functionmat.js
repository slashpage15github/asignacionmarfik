function valida_mat(){
	var js_matricula = document.getElementById("imatricula").value.trim();
	
	if (!validaMATRICULA()){
		alert("error 'MATRICULA' mal formulada");
		return false;
	}
   //  alert(rfcValido(js_matricula));
	}


function validaMATRICULA(){
	pattern=/^[0-9]{5,8}$/;
	matricula=document.getElementById("imatricula").value;
	document.getElementById("estatus").innerHTML = pattern.test(matricula);
	return pattern.test(matricula);
}