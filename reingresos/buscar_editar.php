<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/miestilo.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jumbotron.css" rel="stylesheet">
    <link href="css/bootstrap-dialog.css" rel="stylesheet">
    <link href="css/mystyles.css" rel="stylesheet">
    <script src="js/jquery-3.1.0.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-dialog.js"></script>
    <script src="js/myfunctions_js.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
function valida_usuario_edita(){
    var matricula=$( "#imatricula" ).val().trim();
    var capt=$( "#tmptxt" ).val();
    var response = grecaptcha.getResponse();

if (matricula.length == 0){
    //alert("Error: Campo 'MATRICULA' no debe estar vacio");
    swal({
      title:"Alerta: Matrícula",
      text:"Campo 'MATRICULA' no debe estar vacio",
      type:"warning",
      icon:"error",
      timer:10000
     }) 
    return false;
  }
        
  else if(response.length == 0){
       swal({
      title:"Alerta: Facultad de Sistemas",
      text:"Favor de verificar el captcha",
      type:"warning",
      icon:"error",
      timer:10000
     }) 
      return false;
     
    }
}
    </script>
    <title>Registro</title>
<style>
h1{
color:black;
}
</style>    
</head>
<body>
<div class="row">

<?php include "menu.php"; ?>
</div>
<br>
    <h1>Formulario de Edición de registro &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <img src="images/logo.png"  width="200"></h1>

<div class="container"> 
    <form action="editar_registro.php" method="post" accept-charset="utf-8" onsubmit="return valida_usuario_edita();">

    <div class="row">
        <div class="col-25">
            <label for="lmatricula">Matricula:</label>
        </div>
        <div class="col-75">
            <input type="text" pattern="[0-9]{7,8}" class="form-control" id="imatricula" maxlength="8" name="imatricula" placeholder="INGRESA TU MATRICULA" title="Se requiren formato númerico de entre 7 y 8 dígitos">
        </div>
    </div>  

        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="center" class="descdet" >
                        <div class="fondo_control">
                        <div class="g-recaptcha" data-sitekey="6LcUp24UAAAAAIMbz4GVp_jIvYJG_0UN4DCrlVXA" data-callback="enabledSubmit"></div>
                        </div>
                         </td>
                      </tr>
                    </table>

    <div class="row">
        <div class="boton">
            <input type="submit" value="Buscar">    
        </div>  
    </div>

    </form>
<button class="bottom-back" onclick="goBack()"> Regresar</button>
</div> <!-- end class=container -->
</body>
<script src="js/function.js"></script>
</html>

<script>
  function goBack(){
  window.location.href = "mat.php";
}
</script>