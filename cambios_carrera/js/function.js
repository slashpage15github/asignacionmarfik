function completar()/*function to check userid & password*/
{
	var matricula=document.getElementById("matricula").value.trim(); 
}

function valida(){

  var JS_mat=document.getElementById("matricula").value.trim();
  var JS_nombre=document.getElementById("nombre").value.trim();
  var JS_telefono=document.getElementById("telefono").value.trim();
  var JS_corre=document.getElementById("correo").value.trim();
  var JS_status=document.getElementById("estatus").value.trim();
  var JS_plan=document.getElementById("plan").value.trim();
  var JS_plan_nuevo=document.getElementById("plan_nuevo").value.trim();
  
 
  if (JS_mat.length==0){
    alert("Error: Campo matricula no debe estar vacio");
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
  else if (JS_status==0){
    alert("Error: Selecciona su estatus de la lista en el cuadro");
    return false;
  }

  else if (JS_plan==0){
    alert("Error: Selecciona plan actual de la lista en el cuadro");
    return false;
  }

  else if (JS_plan_nuevo==0){
    alert("Error: Selecciona nuevo plan de la lista en el cuadro");
    return false;
  }

}

