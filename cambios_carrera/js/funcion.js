function completar()/*function to check userid & password*/
{
	var matricula=document.getElementById("matricula").value.trim(); 
}

function validar_email( email ) {
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}

//el de vela se llama functions.js
function valida(){

  var JS_mat=document.getElementById("matricula").value.trim();
  var JS_nombre=document.getElementById("nombre").value.trim();
  var JS_telefono=document.getElementById("telefono").value.trim();
  var JS_corre=document.getElementById("correo").value.trim();
  var JS_status=document.getElementById("estatus").value.trim();
  var JS_plan=document.getElementById("plan").value.trim();
  var JS_plan_nuevo=document.getElementById("plan_nuevo").value.trim();
  
 
  if (JS_mat.length==0){
    alert("Error: Campo MATRICULA no debe estar vacio");
    return false;
  }
  
  else if (JS_nombre.length==0){
    alert("Error: Campo NOMBRE no debe estar vacio");
    return false;
  }
 else if (JS_telefono.length==0){
    alert("Error: Campo TELEFONO no debe estar vacio");
    return false;
  }

  else if (JS_corre.length==0){
    alert("Error: Campo CORREO no debe estar vacio");
    return false;
  }
  else if (validar_email(JS_corre) == false){
    alert("Error: * Campo CORREO no cumple el formato correcto");
    return false;
  }
  else if (JS_status==0){
    alert("Error: Selecciona tu ESTATUS de la lista");
    return false;
  }

  else if (JS_plan==0){
    alert("Error: Selecciona PLAN ACTUAL de la lista");
    return false;
  }
  else if (JS_plan == JS_plan_nuevo){
    alert("Error: PLAN ACTUAL y NUEVO PLAN no pueden ser iguales");
    return false;
  }

  else if (JS_plan_nuevo==0){
    alert("Error: Selecciona NUEVO PLAN de la lista");
    return false;
  }

}